<?php
date_default_timezone_set('Asia/Jakarta');
session_start();

if(isset($_SESSION['logged_in'])){
    header('location: questions.php');
}

include('connection.php');
require_once 'vendor/autoload.php';
use Google\Service\Oauth2;
use Google\Service\SQLAdmin\TruncateLogContext;

//tampung client id secret dan redirect uri
$client_id      = "933192687315-9nb4gqj1ltq5pune5g2cbmlk0k02sm6b.apps.googleusercontent.com";
$client_secret  = "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";
$redirect_uri   = "http://localhost/tourism/index.php";

//inisiasi google client
$client = new Google_Client();

//konfigurasi google client
$client->setClientId($client_id);
$client->setClientSecret($client_secret);
$client->setRedirectUri($redirect_uri);

$client->addScope('email');
$client->addScope('profile');

if(isset($_GET['code'])){
    $token  = $client->fetchAccessTokenWithAuthCode($_GET['code']);

    if(!isset($token['error'])){
        $client->setAccessToken($token['access_token']);

        //inisiasi google service oauth2
        $service = new Oauth2($client);
        $profile    = $service->userinfo->get();

        $g_name = $profile['name'];
        $g_email=$profile['email'];
        $g_id   =$profile['id'];
        $currtime = date('Y-m-d H:i:s');


        $query_check   = 'SELECT * from users WHERE oauth_id = "'.$g_id.'" ';
        $run_query_check = mysqli_query($conn,$query_check);
        $d = mysqli_fetch_object($run_query_check);

        if($d){
            $query_update = 'UPDATE users set username = "'.$g_name.'", email = "'.$g_email.'",
            last_login = "'.$currtime.'" WHERE oauth_id = "'.$g_id.'"';
            $run_query_update = mysqli_query($conn,$query_update);
        }else{
            $query_insert = 'INSERT into users (username,email, level,oauth_id,last_login) 
            VALUE ("'.$g_name.'","'.$g_email.'","Visitor","'.$g_id.'","'.$currtime.'")';
            $run_query_insert = mysqli_query($conn,$query_insert);
        }

        $_SESSION['logged in'] = true;
        $_SESSION['access_token'] = $token['access_token'];
        $_SESSION['uname'] = $g_name;

        header('location:questions.php');


    }else{
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
    $check = mysqli_num_rows($result);
    if ($check > 0) {
        $data = mysqli_fetch_assoc($result);
        if ($data['level'] == "Administrator") {
            $_SESSION['username'] = $username;
            $_SESSION['email'] = $data['email'];
            $_SESSION['level'] = "Administrator";
            header('Location:questions.php');
        } elseif ($data['level'] == "Visitor") {
            $_SESSION['username'] = $username;
            $_SESSION['email'] = $data['email'];
            $_SESSION['level'] = "Visitor";
            header('Location:questions.php');
        } else {
            if ($password != $konfir) {
                $password_mismatch_error = "Username atau Password salah";
            }
        }
    } else {
        if ($password != $konfir) {
            $password_mismatch_error = "Username atau Password salah";
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

    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        div {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 300px;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            margin-bottom: 5px;
        }

        input {
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            background-color: #4caf50;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }

        span {
            color: red;
            margin-top: 5px;
        }

        p {
            text-align: center;
            margin-top: 10px;
        }

        a {
            color: #007bff;
            text-decoration: none;
            font-weight: bold;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>

    <div>
        <form name="login-form" action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" class="login-form">
            <label for="username">Username</label>
            <input type="text" name="username" required>
            <label for="password">Password</label>
            <input type="password" name="password" required>
            <?php if (isset($password_mismatch_error)) { ?>
                <span><?php echo $password_mismatch_error; ?></span>
            <?php } ?>
            <button type="submit" name="submit">Login</button>
            <script src="https://kit.fontawesome.com/d9b2e6872d.js" crossorigin="anonymous"></script>
            <p>Belum punya akun? <a href="register.php"><b>Click Here!</b></a></p>
            <a href="<?= $client->createAuthUrl();?>"><img src="assets/images/google-login.png" alt="button google"></a>
        </form>
    </div>
        
</body>

</html>
