<?php
session_start();
include('connection.php');

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
        </form>
    </div>
        
</body>

</html>
>>>>>>> 66a92f3efab7b7991e21ccbe5346ca2cce61201e
