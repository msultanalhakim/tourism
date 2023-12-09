<?php
session_start();
include('connection.php');

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $konfir = $_POST['konfir'];

    // Validasi panjang minimal 8 karakter dan minimal satu huruf besar
    if (strlen($password) < 8 || !preg_match("/[A-Z]/", $password)) {
        $password_error = "Password minimal 8 karakter dan 1 huruf besar.";
    } else {
        $password = md5($password);

        $sql = "SELECT * FROM users WHERE username = '$username' OR email = '$email'";
        $filter = mysqli_query($conn, $sql);
        $check = mysqli_num_rows($filter);

        if ($check > 0) {
            header('Location:register.php?pesan=eksis');
            exit;
        } else {
            if ($password != md5($konfir)) {
                $password_mismatch_error = "Password tidak sama";
            } else {
                $query = "INSERT INTO users(username, email, password, level) VALUES ('$username', '$email', '$password', 'Visitor')";

                $result = mysqli_query($conn, $query);

                if ($result) {
                    header('Location:index.php?pesan=berhasil');
                    exit;
                } else {
                    $error_message = "Gagal menyimpan data. Pesan kesalahan: " . mysqli_error($koneksi);
                }
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <style>
        body {
            background-color: #f5f5f5;
            font-family: 'Arial', sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }

        .register-container {
            max-width: 400px;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .register-container h1 {
            color: #3498db;
        }

        .register-form label {
            display: block;
            margin: 10px 0 5px;
            text-align: left;
        }

        .register-form input {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .register-form button {
            background-color: #3498db;
            color: #fff;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .register-form button:hover {
            background-color: #2980b9;
        }

        .error-message {
            color: red;
            margin-top: 8px;
        }
    </style>
</head>

<body>
    <div class="register-container">
        <h1>Selamat Datang!</h1>
        <form name="login-form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" class="register-form" enctype="multipart/form-data">
            <label for="name">Username</label>
            <input type="text" name="username" required>
            <label for="email">Email</label>
            <input type="email" name="email" required>
            <label for="password">Password</label>
            <input type="password" name="password" required>
            <label for="confirm-password">Konfirmasi Password</label>
            <input type="password" name="konfir" required>
            <?php if (isset($password_mismatch_error) || isset($password_error)) { ?>
                <span class="error-message">
                    <?php echo isset($password_mismatch_error) ? $password_mismatch_error : $password_error; ?>
                </span>
            <?php } ?>
            <?php if (isset($error_message)) { ?>
                <span class="error-message"><?php echo $error_message; ?></span>
            <?php } ?>
            <button type="submit" name="submit">Daftar</button>
            <div class="alternative">
                <p>Sudah punya akun? <a href="index.php">Masuk</a></p>
            </div>
        </form>
    </div>
</body>

</html>