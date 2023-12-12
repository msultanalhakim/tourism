<?php
include('connection.php');
session_start();

    if($_SESSION['level'] == ""){
        header('Location:login.php?message=session');
    }

    if(isset($_POST['update-profile'])){
        $username = $_POST['username'];
        $old_username = $_SESSION['username'];
        $email = $_POST['email'];

        $sql = "SELECT * FROM users WHERE username = '$username'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            if($username == $old_username){
                    $sql = "SELECT * FROM users WHERE username = '$old_username'";
                    $query = mysqli_query($conn, $sql);
                    if(mysqli_num_rows($query) > 0){
                        $update = "UPDATE users SET email = '$email' WHERE username = '$old_username'";
                        $query = mysqli_query($conn, $update);
                        if ($query) {
                            $_SESSION['email'] = $email;
        
                            $sql = "UPDATE users SET email = '$email' WHERE username = '$old_username'";
                            $update = mysqli_query($conn, $sql);
                            if($update){
                                echo "<script>alert('Profil user telah berhasil diubah!');window.location.href = 'admin.php'</script>";
                            }else{
                                echo "<script>alert('Error! Tidak dapat mengubah data user');window.location.href = 'admin.php'</script>";
                            }
                        } else {
                            echo "<script>alert('Error! Tidak dapat mengubah data user');window.location.href = 'admin.php'</script>";
                        }
                    }else{
                        $update = "UPDATE users SET email = '$email' WHERE username = '$old_username'";
                        $query = mysqli_query($conn, $update);
                        if ($query) {
                            $_SESSION['fullname'] = $fullname;
                            $_SESSION['email'] = $email;
                            echo "<script>alert('Profil user telah berhasil diubah!');window.location.href = 'admin.php'</script>";
                        }else {
                            echo "<script>alert('Error! Tidak dapat mengubah data user');window.location.href = 'admin.php'</script>";
                        }
                    }
            }else{
                echo "<script>alert('Username yang digunakan tidak tersedia!');window.location.href = 'admin.php'</script>";
            }
        } else {
            $sql = "SELECT * FROM users WHERE username = '$old_username'";
            $query = mysqli_query($conn, $sql);
            if(mysqli_num_rows($query) > 0){
                $update = "UPDATE users SET username = '$username', email = '$email' WHERE username = '$old_username'";
                $query = mysqli_query($conn, $update);

                if ($query) {
                    $_SESSION['username'] = $username;
                    $_SESSION['email'] = $email;

                    $sql = "UPDATE users SET  email = '$email', username = '$username' WHERE username = '$old_username'";
                    $update = mysqli_query($conn, $sql);
                    if($update){
                        echo "<script>alert('Profil user telah berhasil diubah!');window.location.href = 'admin.php'</script>";
                    }else{
                        echo "<script>alert('Error! Tidak dapat mengubah data user');window.location.href = 'admin.php'</script>";
                    }
                }else{
                    echo "<script>alert('Error! Tidak dapat mengubah data user');window.location.href = 'admin.php'</script>";
                }
            }else{
                $update = "UPDATE users username = '$username', email = '$email' WHERE username = '$old_username'";
                $query = mysqli_query($conn, $update);
                if ($query) {
                    $_SESSION['username'] = $username;
                    $_SESSION['email'] = $email;
                    
                    echo "<script>alert('Profil user telah berhasil diubah!');window.location.href = 'admin.php'</script>";
                } else {
                    echo "<script>alert('Error! Tidak dapat mengubah data user');window.location.href = 'admin.php'</script>";
                }
            }
        }
    }

    if(isset($_POST['change-password'])){
        $username = $_SESSION['username'];
        $password = $_POST['password'];
        $confirm_password = $_POST['confirm-password'];
        $new_password = $_POST['new-password'];
        $passwordError = false;

        $sql = "SELECT * FROM users WHERE username = '$username'";
        $result = mysqli_query($conn, $sql);
        
        $row = mysqli_fetch_array($result);
        if(password_verify($password, $row['password'])){
            if ($password == $confirm_password) {
                $password = md5($new_password, PASSWORD_DEFAULT);
                $update = "UPDATE user SET password = '$password' WHERE username = '$username'";
                $query = mysqli_query($conn, $update);
                if ($query) {
                    session_unset();
                    session_destroy();
                    header('Location: login.php?message=registered');
                } else {
                    echo "<script>alert('Password tidak berhasil diubah!');window.location.href = 'admin.php'</script>";
                }
            } else {
                echo "<script>alert('Konfirmasi password tidak sesuai!');window.location.href = 'admin.php'</script>";
            }
        }else{
            $passwordError = true;
            echo "<script>alert('Harap masukan kata sandi yang sesuai!');window.location.href = 'admin.php'</script>";
        }
    }

    


?>