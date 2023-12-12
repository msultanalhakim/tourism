<?php
session_start();
include('connection.php');

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $konfir = $_POST['konfir'];
    $currtime = date('Y-m-d H:i:s');

    // Validasi panjang minimal 8 karakter dan minimal satu huruf besar
    if (strlen($password) < 8 || !preg_match("/[A-Z]/", $password)) {
        header("Location:register.php?message=requirement");
    } else {
        $password = md5($password);

        $sql = "SELECT * FROM users WHERE username = '$username' OR email = '$email'";
        $filter = mysqli_query($conn, $sql);
        $check = mysqli_num_rows($filter);

        if ($check > 0) {
            header('Location:register.php?message=exist');
            exit;
        } else {
            if ($password != md5($konfir)) {
                header("Location:register.php?message=unsychronize");
            } else {
                $query = "INSERT INTO users(username, email, password, level,last_login) VALUES ('$username', '$email', '$password', 'Visitor','$currtime')";

                $result = mysqli_query($conn, $query);

                if ($result) {
                    header('Location:login.php?message=registered');
                    exit;
                } else {
                    header("Location:register.php?message=failure");
                }
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Register</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css" />
</head>

<body>
    <div class="register-container">
        <h1><a href="login.php"><i class="fa-solid fa-arrow-left"></i></a> Register Account</h1>
        <div class="account-content">
            <?php
                if($_GET['message'] == "failure"){
                    echo "<div class='register-notification' id='register-notification'><span>Registration was unsuccessfully!</span><a class='close-notification' onclick='notificationRegister();'>&times;</a></div>";
                }else if($_GET['message'] == "unsynchronized"){
                    echo "<div class='register-notification' id='register-notification'><span>Registration password doesn't match!</span><a class='close-notification' onclick='notificationRegister();'>&times;</a></div>";
                }else if($_GET['message'] == "exists"){
                    echo "<div class='register-notification' id='register-notification'><span>Username or email already exists!</span><a class='close-notification' onclick='notificationRegister();'>&times;</a></div>";
                }else if($_GET['message'] == "requirement"){
                    echo "<div class='register-notification' id='register-notification'><span>Minimum password must be 8 characters and 1 capital letter!</span><a class='close-notification' onclick='notificationRegister();'>&times;</a></div>";
                }
                ?>
            <form name="register-form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST"
                class="account-form" enctype="multipart/form-data">
                <label for="username">Username</label>
                <input type="text" name="username" required>
                <label for="username">Email</label>
                <input type="email" name="email" required>
                <label for="password">Password</label>
                <input type="password" name="password" required>
                <label for="password">Confirm Password</label>
                <input type="password" name="confirm_password" required>
                <span>Already have an account? <a href="login.php"> Login</a></span>
                <input type="submit" name="submit" value="Register" class="register-button">
            </form>
        </div>
    </div>
    <script src="https://kit.fontawesome.com/d9b2e6872d.js" crossorigin="anonymous"></script>
</body>

</html>