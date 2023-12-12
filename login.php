<?php
date_default_timezone_set('Asia/Jakarta');
session_start();

// if(isset($_SESSION['logged_in'])){
//     header('location: index.php');
// }

include('connection.php');
require_once 'vendor/autoload.php';

use Google\Service\Oauth2;

//tampung client id secret dan redirect uri
$client_id      = "933192687315-9nb4gqj1ltq5pune5g2cbmlk0k02sm6b.apps.googleusercontent.com";
$client_secret  = "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";
$redirect_uri   = "http://localhost/tourism/login.php";

//inisiasi google client
$client = new Google_Client();

//konfigurasi google client
$client->setClientId($client_id);
$client->setClientSecret($client_secret);
$client->setRedirectUri($redirect_uri);

$client->addScope('email');
$client->addScope('profile');

if (isset($_GET['code'])) {
    $token  = $client->fetchAccessTokenWithAuthCode($_GET['code']);

    if (!isset($token['error'])) {
        $client->setAccessToken($token['access_token']);

        //inisiasi google service oauth2
        $service = new Oauth2($client);
        $profile = $service->userinfo->get();

        $g_name = $profile['name'];
        $g_email = $profile['email'];
        $g_id   = $profile['id'];
        $currtime = date('Y-m-d H:i:s');

        $query_check   = 'SELECT * from users WHERE oauth_id = "' . $g_id . '"';
        $run_query_check = mysqli_query($conn, $query_check);
        $d = mysqli_fetch_object($run_query_check);

        if ($d) {
            $query_update = 'UPDATE users set username = "' . $g_name . '", email = "' . $g_email . '",
            last_login = "' . $currtime . '" WHERE oauth_id = "' . $g_id . '"';
        } else {
            $query_insert = 'INSERT into users (username,email, level,oauth_id,last_login) 
            VALUE ("' . $g_name . '","' . $g_email . '","Visitor","' . $g_id . '","' . $currtime . '")';
        }

        $run_query = mysqli_query($conn, isset($query_update) ? $query_update : $query_insert);

        if ($run_query) {
            $_SESSION['logged_in'] = true;
            $_SESSION['access_token'] = $token['access_token'];
            $_SESSION['uname'] = $g_name;

            $query_user = 'SELECT * FROM users WHERE oauth_id = "' . $g_id . '"';
            $result_user = mysqli_query($conn, $query_user);

            if ($result_user) {
                $data_user = mysqli_fetch_assoc($result_user);
                if ($data_user['level'] == "Administrator") {
                    $_SESSION['username'] = $g_name;
                    $_SESSION['email'] = $g_email;
                    $_SESSION['level'] = "Administrator";
                    header('Location:admin.php');
                } elseif ($data_user['level'] == "Visitor") {
                    $_SESSION['username'] = $g_name;
                    $_SESSION['email'] = $g_email;
                    $_SESSION['level'] = "Visitor";
                    header('Location:index.php');
                }
            } else {
                echo "Login Gagal";
            }
        } else {
            echo "Login Gagal";
        }
    } else {
        echo "Login Gagal";
    }
}

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $konfir = md5($_POST['konfir']);

    $query = "SELECT * FROM users WHERE (username = '$username' OR email = '$email') AND password = '$password'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        $data = mysqli_fetch_assoc($result);
        if ($data['level'] == "Administrator") {
            $_SESSION['username'] = $username;
            $_SESSION['email'] = $data['email'];
            $_SESSION['level'] = "Administrator";
            header('Location:admin.php');
        } elseif ($data['level'] == "Visitor") {
            $_SESSION['username'] = $username;
            $_SESSION['email'] = $data['email'];
            $_SESSION['level'] = "Visitor";
            header('Location:index.php');
        } else {
            if ($password != $konfir) {
                header("Location:login.php?message=failure");
            }
        }
    } else {
        if ($password != $konfir) {
            header("Location:login.php?message=failure");
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>

<body>
    <div class="login-container">
        <h1><a href="index.php"><i class="fa-solid fa-arrow-left"></i></a> Login Account</h1>
        <div class="account-content">
            <?php
                if($_GET['message'] == "failure"){
                    echo "<div class='login-notification' id='login-notification'><span>Username or password is incorrect!</span><a class='close-notification' onclick='notificationLogin();'>&times;</a></div>";
                }else if($_GET['message'] == "registered"){
                    echo "<div class='login-notification' id='login-notification'><span>You have successfully registered!</span><a class='close-notification' onclick='notificationLogin();'>&times;</a></div>";
                }else if($_GET['message'] == "validate"){
                    echo "<div class='login-notification' id='login-notification'><span>You must login first!</span><a class='close-notification' onclick='notificationLogin();'>&times;</a></div>";
                }else if($_GET['message'] == "logout"){
                    echo "<div class='login-notification' id='login-notification'><span>You have successfully logged out!</span><a class='close-notification' onclick='notificationLogin();'>&times;</a></div>";
                }
                ?>
            <form name="login-form" class="account-form" action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
                <label for="username">Username</label>
                <input type="text" name="username" required>
                <label for="password">Password</label>
                <input type="password" name="password" required>
                <span>Don't have an account? <a href="register.php"> Sign up</a></span>
                <div class="logintype-container">
                    <input type="submit" name="submit" value="Login" class="login-button">
                    <span>or login with</span>
                    <a href="<?= $client->createAuthUrl(); ?>"><img src="assets/images/google-login.png"
                        alt="button google"></a>
                </div>
            </form>
        </div>
    </div>
    <script src="https://kit.fontawesome.com/d9b2e6872d.js" crossorigin="anonymous"></script>
</body>
</html>
