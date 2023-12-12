<?php
session_start();
include('connection.php');
?>
<html>

<head>
    <title></title>
    <meta name="viewport" content="width-device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <style>
        #revealed-title h2 a {
            text-decoration: none;
            color: white;
            -webkit-transition: 0.2s;
            transition: 0.2s;
        }

        #revealed-title h2 a:hover {
            color: #767676;
        }
        
        .section-revealed{
            padding: 30px 140px;
        }

        .track-content{
            width: 100%;
            margin: 20px 0px;

        }
        .track-content h4{
            margin-top: 10px;
            color: white;
            font-weight: 600;
            font-size: 24px;
        }
        .track-content p{
            color: #767676;
            font-size: 16px;
        }
        .track-content p.total{
            background-color: #fff;
            color: #0d1928;
            font-size: 16px;
            margin: 8px 0;
            padding: 8px 16px;
            border-radius: 8px;
            font-weight: 400;
        }
        .track-content p.total span{
            background-color: #fff;
            color: #0d1928;
            font-weight: 600;
            font-size: 16px;
        }
        .track-content span{
            color: white;
        }
    </style>
</head>

<body>
    <div class="section-revealed" id="section-revealed">
        <div class="revealed-content">
            <div id="revealed-title">
                <h2><a href="index.php"><i class="fa-solid fa-arrow-left"></i></a> Track Your Trips Report</h2>
                <span>
                    We are here to provide comprehensive support in managing and tracking all your travel-related
                    expenses, aiding in the meticulous documentation and computation necessary for creating detailed
                    travel reports.</span>
            </div>
            <div class="track-content">
                <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                // Fetch user inputs
                $transportationType = $_POST["transportation"];
                $transportationClass = $_POST['kategori'];
                $from = $_POST["from"];
                $to = $_POST["to"];
                $hotelClass = $_POST["hotel"];

                // Assuming $conn is your database connection
                $transportationQuery = "SELECT * FROM transportations WHERE transportation_name = '$transportationType' AND initial_goal = '$from' AND final_destination = '$to' AND kategori = '$transportationClass'";
                $transportationResult = mysqli_query($conn, $transportationQuery);

                if ($transportationResult) {
                    $transportationData = mysqli_fetch_assoc($transportationResult); ?>
                <h4>Transportation Details:</h4>
                <p>Transportation Name: <span><?php echo $transportationType ?></span></p>
                <p>Current Location: <span><?php echo $from ?></p>
                <p>Destination: <span><?php echo $to ?></p>
                <p>Transportation Class: <span><?php echo $transportationClass ?></span></p>
                <?php
                if ($transportationData['price'] == 0.00) {?>
                <p>Transportation Price: <span>Tidak tersedia</span></p>
                <?php
                } else {
                    $formattedTransportationPrice = "Rp. " . number_format($transportationData['price'], 0, ',', '.'); ?>
                <p>Transportation Price: <span><?php echo $formattedTransportationPrice ?></span></p>";
                <?php }

                $hotelQuery = "SELECT * FROM homestays WHERE Lokasi = '$to' AND homestay_class = '$hotelClass'";
                $hotelResult = mysqli_query($conn, $hotelQuery);

                if ($hotelResult) {
                    $hotelData = mysqli_fetch_assoc($hotelResult); ?>

                <h4>Hotel Details:</h4>
                <p>Hotel Name: <span><?php echo $hotelData['Lokasi'] ?></span></p>
                <p>Hotel Class: <span><?php echo $hotelData['homestay_class'] ?></span></p>
                <p>Hotel Strategic Area: <span><?php echo $hotelData['alamat'] ?></span></p>
                <?php
                    // Format the hotel price into Indonesian Rupiah
                    $formattedHotelPrice = "Rp. " . number_format($hotelData['price'], 0, ',', '.');?>
                <p>Hotel Price per Night: <span><?php echo $formattedHotelPrice ?></span></p>";
                <?php
                    $totalCost = $transportationData['price'] + $hotelData['price'];
                    $formattedTotalCost = "Rp. " . number_format($totalCost, 0, ',', '.');?>
                <p class="total">Total Cost: <span><?php echo $formattedTotalCost; ?></span></p>
                <?php
                } else {
                    echo "Error fetching hotel details: " . mysqli_error($conn);
                }
            }
        }?>
            </div>
        </div>
    </div>
    <script src="https://kit.fontawesome.com/d9b2e6872d.js" crossorigin="anonymous"></script>
</body>

</html>