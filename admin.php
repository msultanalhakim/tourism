<?php
session_start();
include('connection.php');

if ($_SESSION['level'] == "") {
    header('Location:login.php?message=session');
}


?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <title>QUIETLESS</title>
    <link rel="stylesheet" type="text/css" href="style2.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        nav {
            width: initial;
            padding: 26px 40px;
            left: initial;
            right: 0;
        }

        body {
            background-color: rgb(31, 31, 31);
        }
    </style>
    <script src="script.js"></script>

</head>

<body>
    <div class="sidebar">
        <div class="sidebar-content">
            <a href="index.php">
                <h2>QUIETLESS</h2>
            </a>
            <ul>
                <a onclick="userProfile();" id="sidebarProfile" class="active">
                    <li><i class="fa-solid fa-user"></i> Profil</li>
                </a>
                <a onclick="changePassword();" id="sidebarPassword">
                    <li><i class="fa-solid fa-lock"></i> Ubah Kata Sandi</li>
                </a>
                <a onclick="insertHomestay();" id="sidebarHomestay">
                    <li><i class="fa-solid fa-newspaper"></i> Tambah Homestay</li>
                </a>
                <a onclick="insertTransportasi();" id="sidebarTransportasi">
                    <li><i class="fa-solid fa-newspaper"></i> Tambah Transportasi</li>
                </a>
            </ul>
        </div>
    </div>
    <nav>
        <ul></ul>
        <ul>

            <?php if (isset($_SESSION['username'])) {
                echo "<a href='logout.php' class='btn-logout'><li>Logout</li></a>";
            } else {
                echo "<a href='login.php' class='btn-login'><li>Masuk</li></a>";
            } ?>
        </ul>
    </nav>
    <div class="dashboard-section">
        <div class="dashboard-content" id="user-profile">
            <h2>Profil User</h2>
            <div class="dashboard-input">
                <form name="user-profile" action="process.php" method="POST">
                    <label>Username</label>
                    <input type="text" name="username" placeholder="Harap masukan username .." value="<?php echo $_SESSION['username']; ?>" required>
                    <label>Email</label>
                    <input type="email" name="email" placeholder="Harap masukan email .." value="<?php echo $_SESSION['email']; ?>" required>
                    <input type="submit" value="Ubah" name="update-profile">
                </form>
            </div>
        </div>
        <div class="dashboard-content" id="change-password" style="display:none">
            <h2>Ubah Kata Sandi</h2>
            <div class="dashboard-input">
                <form name="change-password" action="process.php" method="POST">
                    <label>Username</label>
                    <input type="text" name="fullname" value="<?php echo $_SESSION['username']; ?>" disabled required>
                    <label>Kata Sandi Lama</label>
                    <input type="password" name="password" placeholder="Harap masukan kata sandi lama .." required>
                    <label>Konfirmasi Kata Sandi</label>
                    <input type="password" name="confirm-password" placeholder="Harap masukan konfirmasi kata sandi .." required>
                    <label>Kata Sandi Baru</label>
                    <input type="password" name="new-password" placeholder="Harap masukan kata sandi baru .." required>
                    <input type="submit" name="change-password" value="Ubah">
                </form>
            </div>
        </div>
        <div class="dashboard-content" id="insert-homestay" style="display:none">
            <h2>Tambah Homestay</h2>
            <div class="dashboard-input">
                <form name="insert-homestay" action="homestay.php" method="POST" enctype="multipart/form-data">
                    <label>Lokasi</label>
                    <input type="text" name="lokasi" placeholder="Masukkan Nama Kota" required>
                    <label>Homestay Class</label>
                    <select name="class" required>
                        <option value="" disabled selected>--- Pilih Jenis Kelas Hotel ---</option>
                        <option value="Luxury">Luxury</option>
                        <option value="Regular">Regular</option>
                    </select>
                    <label>Alamat</label>
                    <input type="text" name="alamat" placeholder="Harap masukan alamat .." required>
                    <label>Harga Satuan</label>
                    <input type="number" name="harga_satuan" placeholder="Masukkan Harga.." required>
                    <input type="submit" name="tambah_homestay" value="Tambah">
                </form>
            </div>
        </div>
        <div class="dashboard-content" id="insert-transportasi" style="display:none">
            <h2>Tambah Transportasi</h2>
            <div class="dashboard-input">
                <form name="insert-transportasi" action="transportasi.php" method="POST" enctype="multipart/form-data">
                    <label>Jenis Transportasi</label>
                    <select name="transportation" required>
                        <option value="" disabled selected>--- Pilih Jenis Transportasi ---</option>
                        <option value="Airline">Airline</option>
                        <option value="Train">Train</option>
                        <option value="Vehicle">Vehicle</option>
                    </select>
                    <label>Tujuan Awal</label>
                    <input type="text" name="tujuan_awal" placeholder="Harap masukan Tujuan Awal .." required>
                    <label>Tujuan Akhir</label>
                    <input type="text" name="tujuan_akhir" placeholder="Harap masukan Tujuan Akhir .." required>
                    <label>Kategori</label>
                    <select name="kategori" required>
                        <option value="" disabled selected>--- Pilih Jenis kategori ---</option>
                        <option value="Ekonomi">Ekonomi</option>
                        <option value="Eksekutif">Eksekutif</option>
                    </select>
                    <label>Harga Satuan</label>
                    <input type="number" name="harga_satuan" placeholder="Masukkan Harga.." required>
                    <input type="submit" name="tambah_transportasi" value="Tambah">
                </form>
            </div>
        </div>
        <script src="https://kit.fontawesome.com/d9b2e6872d.js" crossorigin="anonymous"></script>
</body>

</html>