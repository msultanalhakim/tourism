<?php
session_start();
include("connection.php");

?>

<html>

<head>
    <title></title>
    <meta name="viewport" content="width-device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>

<body>
    <nav id="navigation-bar">
        <button id="nav-toggle" class="nav-toggle"><i class="fa-solid fa-list"></i></button>
        <a href="index.php"><img src="assets/images/logo.png" class="logo" alt="Logo"></a>
        <ul>
            <li><a onclick="homeSection();">Home</a></li>
            <li><a onclick="destinationSection();">Destinations</a></li>
            <li><a onclick="articleSection();">Article</a></li>
            <li class="dropdown">
                <a class="dropbtn" onclick="dropdownNav()"><i class='fa-solid fa-user'></i><i
                        class="fa-solid fa-caret-down"></i></a>
                <ul class="dropdown-content" id="myDropdown">
                    <a onclick="trackTrips()" id="tracking">
                        <li>Track <i class="fa-solid fa-compass"></i> </li>
                    </a>
                    <?php
                    if(!isset($_SESSION['username'])){
                            echo "<a href='login.php'><li>Login <i class='fa-solid fa-right-to-bracket'></i></li></a>";
                    }else{
                        echo "<a href='logout.php' class='logout'>Logout <i class='fa-solid fa-right-to-bracket'></i></a>";
                    }
                    ?>
                </ul>
            </li>
        </ul>
    </nav>
    <!-- The Modal -->
    <div id="myModal" class="modal">

        <!-- Modal content -->
        <div class="modal-content">
            <div class="modal-header">
                <span class="close">&times;</span>
                <h2>Tracking your trip</h2>
            </div>
            <?php if(isset($_SESSION['username'])){ ?>
            <form action="section-track.php" method="POST" class="modal-form">
                <div class="modal-body">
                    <label for="from">Your Current Location</label>
                    <select name="from" required>
                        <option value="" disabled selected>Current Location</option>
                        <?php
                    $result = mysqli_query($conn, "SELECT DISTINCT initial_goal FROM transportations");
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<option value='{$row['initial_goal']}'>{$row['initial_goal']}</option>";
                    }
                    ?>
                    </select>
                    <label for="to">Destination</label>
                    <select name="to" required>
                        <option value="" disabled selected>Destination</option>
                        <?php
                        $result = mysqli_query($conn, "SELECT DISTINCT final_destination FROM transportations");
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<option value='{$row['final_destination']}'>{$row['final_destination']}</option>";
                        }
                        ?>
                    </select>
                    <label for="transportation">Transportation</label>
                    <select name="transportation" id="transportation" required onchange="updateTransportationClass()">
                        <option value="" disabled selected>Transport</option>
                        <option value="Airline">Airline</option>
                        <option value="Train">Train</option>
                        <option value="Vehicle">Vehicle</option>
                    </select>
                    <label for="kategori">Transportation Class</label>
                    <select name="kategori" id="kategori" required>
                        <option value="" disabled selected>Transport Class</option>
                        <!-- Options will be dynamically populated based on the selected transportation -->
                    </select>
                    <label for="hotel">Hotel Class</label>
                    <select name="hotel" id="hotel" required>
                        <option value="" disabled selected>Hotel Class</option>
                        <?php
                        $result = mysqli_query($conn, "SELECT DISTINCT homestay_class FROM homestays");
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<option value='{$row['homestay_class']}'>{$row['homestay_class']}</option>";
                        }
                        ?>
                    </select>
                </div>
                <?php }else{ ?>
                <div class="modal-body modal-access">
                    <p>You've must login to access this section! <a href="login.php">Login</a></p>
                </div>
                <?php } ?>

                <?php if(isset($_SESSION['username'])){ ?>
                <div class="modal-footer">
                    <input type="submit" value="Track" name="pesan">
                </div>
                <?php } ?>
            </form>
        </div>

    </div>
    <div class="container" id="hero-section">
        <div class="tabs">
            <input type="radio" name="slider" id="web" checked>
            <input type="radio" name="slider" id="graphics">
            <input type="radio" name="slider" id="photography">
            <input type="radio" name="slider" id="certificate">
            <div class="buttons">
                <label for="web"></label>
                <label for="graphics"></label>
                <label for="photography"></label>
                <label for="certificate"></label>
            </div>
            <div class="content">
                <div class="box web">
                    <div class="overlay"></div>
                    <div class="contentBx">
                        <h2>Discovering the Unseen</h2>
                        <p class="typed-out">Discover on a journey of discovery into untouched realms, an exploration
                            transcending known boundaries, unravel mysteries from the ordinary eye.</p>
                        <a onclick="discoverSection();">Discover</a>
                    </div>
                </div>
                <div class="box graphics">
                    <div class="overlay"></div>
                    <div class="contentBx">
                        <h2>Secretly Exploring</h2>
                        <p class="typed-out">Secretly exploring embodies a clandestine adventure, a whispered escapade
                            into uncharted
                            territories away from prying eyes.</p>
                        <a onclick="discoverSection();">Discover</a>
                    </div>
                </div>
                <div class="box photography">
                    <div class="overlay"></div>
                    <div class="contentBx">
                        <h2>Journey the Hidden Realms</h2>
                        <p class="typed-out">Journeying through the hidden realms encapsulates an expedition beyond the
                            ordinary, a passage into realms veiled from the everyday gaze.</p>
                        <a onclick="discoverSection();">Discover</a>
                    </div>
                </div>
                <div class="box certificae">
                    <div class="overlay"></div>
                    <div class="contentBx">
                        <h2>Endless Discovery</h2>
                        <p class="typed-out">Begin on an endless path of discovery is an ever-evolving journey, a
                            never-ending exploration of a new chapter of fascination and understanding. </p>
                        <a onclick="discoverSection();">Discover</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="journey-display" id="journey-display">
        <div class="display-content">
            <div class="display-title">
                <img src="assets/images/logo-white.png" class="img-display" alt="Quietless" id="display-logo">
                <p class="display-paragraph" id="display-paragraph">Step into a world where the hustle and bustle fade
                    away and you can enjoy tranquil moments surrounded by breathtaking scenery. Discover a hidden gem
                    away from the hustle and bustle of the city, offering solace to those seeking peace and tranquility.
                </p>
                <span class="display-footer" id="display-footer">
                    <span class="display-mark">Scope: </span>Banten, West Java, Central Java, and East Java
                </span>
            </div>
        </div>
        <div class="floating-bar" id="floating-bar">
            <div class="floating-content">
                <div class="floating-items">
                    <ul>
                        <li><img src="assets/images/logo-white.png" class="floating-image"
                                alt="Jujutsu Kaisen Highschool"></li>
                    </ul>
                    <a href="section-revealed.php" class="button-floating">Unreveal Mystery</a>
                </div>
            </div>
        </div>
    </div>
    <div class="destination-section" id="destination-section">
        <div class="destination-content">
            <h2 class="destination-header">Preferred Destinations</h2>
            <p class="destination-paragraph">The attraction of the stunning natural landscapes and rich cultural legacy,
                spanning from picturesque scenery and serene coastlines, entices each traveler to embark on an
                unforgettable journey.</p>
            <div class="gallery-image" id="gallery-image">
                <div class="img-box">
                    <img src="assets/images/gallery/gallery-01.jpg" alt="" />
                    <div class="transparent-box">
                        <div class="caption">
                            <p>Menganti Beach</p>
                            <p class="opacity-low">Kebumen, Central Java</p>
                        </div>
                    </div>
                </div>
                <div class="img-box">
                    <img src="assets/images/gallery/gallery-02.jpg" alt="" />
                    <div class="transparent-box">
                        <div class="caption">
                            <p>Dieng</p>
                            <p class="opacity-low">Wonosobo, Central Java</p>
                        </div>
                    </div>
                </div>
                <div class="img-box">
                    <img src="assets/images/gallery/gallery-03.jpg" alt="" />
                    <div class="transparent-box">
                        <div class="caption">
                            <p>Brown Canyon</p>
                            <p class="opacity-low">Purwokerto, Central Java</p>
                        </div>
                    </div>
                </div>
                <div class="img-box">
                    <img src="assets/images/gallery/gallery-04.jpg" alt="" />
                    <div class="transparent-box">
                        <div class="caption">
                            <p>Telaga Sunyi</p>
                            <p class="opacity-low">Purwokerto, Central Java</p>
                        </div>
                    </div>
                </div>
                <div class="img-box">
                    <img src="assets/images/gallery/gallery-05.jpg" alt="" />
                    <div class="transparent-box">
                        <div class="caption">
                            <p>Green Canyon</p>
                            <p class="opacity-low">Pangandaran, West Java</p>
                        </div>
                    </div>
                </div>
                <div class="img-box">
                    <img src="assets/images/gallery/gallery-06.jpg" alt="" />
                    <div class="transparent-box">
                        <div class="caption">
                            <p>Mount Bromo</p>
                            <p class="opacity-low">Malang, East Java</p>
                        </div>
                    </div>
                </div>
                <div class="img-box">
                    <img src="assets/images/gallery/gallery-07.jpg" alt="" />
                    <div class="transparent-box">
                        <div class="caption">
                            <p>Petruk Cave</p>
                            <p class="opacity-low">Kebumen, Central Java</p>
                        </div>
                    </div>
                </div>
                <div class="img-box">
                    <img src="assets/images/gallery/gallery-08.jpg" alt="" />
                    <div class="transparent-box">
                        <div class="caption">
                            <p>Merbabu</p>
                            <p class="opacity-low">Boyolali, Central Java</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="article-section" id="article-section">
        <a onclick="homeSection();" class="arrow-home"><i class="fa-solid fa-arrow-up"></i></a>
        <div class="article-content">
            <div class="article-items">
                <div class="article-title">
                    <h2><a href="#">Recently Article <span></span><img src="assets/images/logo-white.png"
                                alt="Article Logo" class="article-logo"></a></h2>

                </div>
                <div class="article-list list-first">
                    <ul>
                        <li>
                            <img src="assets/images/articles/articles-01.png" alt="article-img" class="article-image">
                        </li>
                        <li>
                            <h3><?php echo mb_strimwidth("Dieng Culture Festival 2023 Resmi Ditiadakan", 0, 78, "..."); ?>
                            </h3>
                            <span><?php echo date('F j, Y', strtotime("2023/07/22")); ?></span>
                            <p><?php echo mb_strimwidth("Provinsi Jawa Tengah tak hanya dikenal dengan keindahan alamnya, tetapi juga ragam budayanya. Salah satu budaya yang masih lestari hingga kini ialah tradisi pemotongan rambut gimbal anak Dieng yang bisa disaksikan dalam sebuah event budaya Dieng Culture Festival. 
                            Dieng Culture Festival adalah salah satu event unggulan Jawa Tengah dan juga masuk dalam Top 10 Kharisma Event Nusantara Kementerian Pariwisata dan Ekonomi Kreatif Republik Indonesia. Dieng Culture Festival telah menjadi magnet wisata Dieng. Event ini selalu dinanti dan mampu menarik puluhan ribu pengunjung. Tahun 2023, Dieng Culture Festival sedianya akan memasuki penyelenggaraan ke-14, namun Pemerintah Kabupaten Banjarnegara secara resmi telah mengumumkan bahwa Dieng Culture Festival 2023 ditiadakan.", 0, 500, "..."); ?>
                            </p>
                            <a href="article-details.php?id=<?php echo $article['id']; ?>">Read More</a>
                        </li>
                    </ul>
                </div>
                <div class="article-list list-second">
                    <ul>
                        <li>
                            <img src="assets/images/articles/articles-02.png" alt="article-img" class="article-image">
                        </li>
                        <li class="right">
                            <h3><?php echo mb_strimwidth("BNPB: Aktivitas Gunung Merapi Tinggi, Berpotensi Guguran Awan Panas", 0, 78, "..."); ?>
                            </h3>
                            <span><?php echo date('F j, Y', strtotime("2023/07/22")); ?></span>
                            <br>
                            <p><?php echo mb_strimwidth("Badan Nasional Penanggulangan Bencana (BNPB) menyebut aktivitas vulkanik Gunung Merapi di perbatasan Jawa Tengah dan Yogyakarta masih tinggi. BNPB mengungkap kondisi itu berpotensi menimbulkan guguran lava dan awan panas di sektor selatan dan barat daya serta tenggara. 'Aktivitas vulkanik Gunung Merapi masih cukup tinggi berupa erupsi efusif. Keadaan ini berpotensi menghasilkan guguran lava dan awan panas pada sektor selatan-barat daya serta sektor tenggara,' kata Kepala Pusat Data, Informasi dan Komunikasi Kebencanaan BNPB Abdul Muhari dalam keterangan, di Jakarta, dikutip Minggu (10/12/2023). Baca juga: Hujan Abu di Boyolali dan Magelang Imbas Guguran Awan Panas Merapi Berdasarkan data Balai Penyelidikan dan Pengembangan Teknologi Kebencanaan Geologi (BPPTKG), Gunung Merapi sempat mengeluarkan Awan Panas Guguran (APG) pada Jumat (8/12) siang. Kejadian tersebut bersamaan dengan turunnya hujan sehingga mengakibatkan hujan air berwarna kecokelatan di wilayah Desa Krinjing dan Desa Paten, Kecamatan Dukun, Kabupaten Magelang.", 0, 500, "..."); ?>
                            </p>
                            <a href="article-details.php?id=<?php echo $article['id']; ?>">Read More</a>
                        </li>
                    </ul>
                </div>
                <div class="article-list list-third">
                    <ul>
                        <li>
                            <img src="assets/images/articles/articles-03.png" alt="article-img" class="article-image">
                        </li>
                        <li>
                            <h3><?php echo mb_strimwidth("Wisata Pantai Anyer dengan keindahan yang memukau", 0, 78, " ..."); ?>
                            </h3>
                            <span><?php echo date('F j, Y', strtotime("2023/07/22")); ?></span>
                            <p><?php echo mb_strimwidth("Provinsi Jawa Tengah tak hanya dikenal dengan keindahan alamnya, tetapi juga ragam budayanya. Salah satu budaya yang masih lestari hingga kini ialah tradisi pemotongan rambut gimbal anak Dieng yang bisa disaksikan dalam sebuah event budaya Dieng Culture Festival. 
                            Dieng Culture Festival adalah salah satu event unggulan Jawa Tengah dan juga masuk dalam Top 10 Kharisma Event Nusantara Kementerian Pariwisata dan Ekonomi Kreatif Republik Indonesia. Dieng Culture Festival telah menjadi magnet wisata Dieng. Event ini selalu dinanti dan mampu menarik puluhan ribu pengunjung. Tahun 2023, Dieng Culture Festival sedianya akan memasuki penyelenggaraan ke-14, namun Pemerintah Kabupaten Banjarnegara secara resmi telah mengumumkan bahwa Dieng Culture Festival 2023 ditiadakan.", 0, 500, " ..."); ?>
                            </p>
                            <a href="article-details.php?id=<?php echo $article['id']; ?>">Read More</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <script>

    </script>
    <script src="assets/js/script.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/d9b2e6872d.js" crossorigin="anonymous"></script>
</body>

</html>
