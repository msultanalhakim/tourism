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
            <li><a href="#">Home</a></li>
            <li><a href="#">Destinations</a></li>
            <li><a href="#">Festival</a></li>
            <li><a href="#">Track your trips</a></li>
            <li>
                <?php
                if(isset($_SESSION['username'])){
                    if($_SESSION['level'] == "Administrator"){
                        echo "<a href='dashboard.php' class='nav-account'>Dashboard</a>";
                    }else if($_SESSION['level'] == "Member"){
                        echo "<a href='account.php' class='nav-account'>Account</a>";

                    }
                }else{
                    echo "<a href='login.php' class='nav-account'><i class='fa-solid fa-user'></i></a>";
                }
                ?>
            </li>
        </ul>
    </nav>
    <div class="container" id="hero-container">
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
                        <a href="">Discover</a>
                    </div>
                </div>
                <div class="box graphics">
                    <div class="overlay"></div>
                    <div class="contentBx">
                        <h2>Secretly Exploring</h2>
                        <p class="typed-out">Secretly exploring embodies a clandestine adventure, a whispered escapade
                            into uncharted
                            territories away from prying eyes.</p>
                        <a href="">Discover</a>
                    </div>
                </div>
                <div class="box photography">
                    <div class="overlay"></div>
                    <div class="contentBx">
                        <h2>Journey the Hidden Realms</h2>
                        <p class="typed-out">Journeying through the hidden realms encapsulates an expedition beyond the
                            ordinary, a passage into realms veiled from the everyday gaze.</p>
                        <a href="">Discover</a>
                    </div>
                </div>
                <div class="box certificae">
                    <div class="overlay"></div>
                    <div class="contentBx">
                        <h2>Endless Discovery</h2>
                        <p class="typed-out">Begin on an endless path of discovery is an ever-evolving journey, a
                            never-ending exploration of a new chapter of fascination and understanding. </p>
                        <a href="">Discover</a>
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
                    <span class="display-mark">Scope: </span>
                    West Java, Central Java, and East Java
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
                    <a href="season.php" class="button-floating">Unreveal Mystery</a>
                </div>
            </div>
        </div>
    </div>
    <div class="destination-section">
        <div class="destination-content">
            <h2 class="destination-header">Preferred Destinations</h2>
            <p class="destination-paragraph">The attraction of the stunning natural landscapes and rich cultural legacy, spanning from picturesque scenery and serene coastlines, entices each traveler to embark on an unforgettable journey.</p>
            <div class="gallery-image" id="gallery-image">
                <div class="img-box">
                    <img src="https://picsum.photos/350/250?image=444" alt="" />
                    <div class="transparent-box">
                        <div class="caption">
                            <p>Library</p>
                            <p class="opacity-low">Architect Design</p>
                        </div>
                    </div>
                </div>
                <div class="img-box">
                    <img src="https://picsum.photos/350/250/?image=232" alt="" />
                    <div class="transparent-box">
                        <div class="caption">
                            <p>Night Sky</p>
                            <p class="opacity-low">Cinematic</p>
                        </div>
                    </div>
                </div>
                <div class="img-box">
                    <img src="https://picsum.photos/350/250/?image=431" alt="" />
                    <div class="transparent-box">
                        <div class="caption">
                            <p>Tea Talk</p>
                            <p class="opacity-low">Composite</p>
                        </div>
                    </div>
                </div>
                <div class="img-box">
                    <img src="https://picsum.photos/350/250?image=474" alt="" />
                    <div class="transparent-box">
                        <div class="caption">
                            <p>Road</p>
                            <p class="opacity-low">Landscape</p>
                        </div>
                    </div>
                </div>
                <div class="img-box">
                    <img src="https://picsum.photos/350/250?image=344" alt="" />
                    <div class="transparent-box">
                        <div class="caption">
                            <p>Sea</p>
                            <p class="opacity-low">Cityscape</p>
                        </div>
                    </div>
                </div>
                <div class="img-box">
                    <img src="https://picsum.photos/350/250?image=494" alt="" />
                    <div class="transparent-box">
                        <div class="caption">
                            <p>Vintage</p>
                            <p class="opacity-low">Cinematic</p>
                        </div>
                    </div>
                </div>
                <div class="img-box">
                    <img src="https://picsum.photos/350/250?image=494" alt="" />
                    <div class="transparent-box">
                        <div class="caption">
                            <p>Vintage</p>
                            <p class="opacity-low">Cinematic</p>
                        </div>
                    </div>
                </div>
                <div class="img-box">
                    <img src="https://picsum.photos/350/250?image=494" alt="" />
                    <div class="transparent-box">
                        <div class="caption">
                            <p>Vintage</p>
                            <p class="opacity-low">Cinematic</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="article-section">
        <div class="article-content">
            <div class="article-items">
                <div class="article-title">
                    <a href="#">
                        <h2>Recently Article <span></span><img src="assets/images/logo-white.png" alt="Article Logo"
                                class="article-logo"></h2>
                    </a>
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
                            <img src="assets/images/articles/articles-01.png" alt="article-img" class="article-image">
                        </li>
                        <li class="right">
                            <h3><?php echo mb_strimwidth("Dieng Culture Festival 2023 Resmi Ditiadakan", 0, 78, "..."); ?>
                            </h3>
                            <span><?php echo date('F j, Y', strtotime("2023/07/22")); ?></span>
                            <br>
                            <p><?php echo mb_strimwidth("Provinsi Jawa Tengah tak hanya dikenal dengan keindahan alamnya, tetapi juga ragam budayanya. Salah satu budaya yang masih lestari hingga kini ialah tradisi pemotongan rambut gimbal anak Dieng yang bisa disaksikan dalam sebuah event budaya Dieng Culture Festival. 
                            Dieng Culture Festival adalah salah satu event unggulan Jawa Tengah dan juga masuk dalam Top 10 Kharisma Event Nusantara Kementerian Pariwisata dan Ekonomi Kreatif Republik Indonesia. Dieng Culture Festival telah menjadi magnet wisata Dieng. Event ini selalu dinanti dan mampu menarik puluhan ribu pengunjung. Tahun 2023, Dieng Culture Festival sedianya akan memasuki penyelenggaraan ke-14, namun Pemerintah Kabupaten Banjarnegara secara resmi telah mengumumkan bahwa Dieng Culture Festival 2023 ditiadakan.", 0, 500, "..."); ?>
                            </p>
                            <a href="article-details.php?id=<?php echo $article['id']; ?>">Read More</a>
                        </li>
                    </ul>
                </div>
                <div class="article-list list-third">
                    <ul>
                        <li>
                            <img src="assets/images/articles/articles-01.png" alt="article-img" class="article-image">
                        </li>
                        <li>
                            <h3><?php echo mb_strimwidth("Dieng Culture Festival 2023 Resmi Ditiadakan", 0, 78, " ..."); ?>
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