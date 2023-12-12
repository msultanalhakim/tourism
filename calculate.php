<?php
session_start();
include('connection.php');

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
        $transportationData = mysqli_fetch_assoc($transportationResult);

        // Display the transportation details
        echo "<h2>Transportation Details:</h2>";
        echo "<p>Transportation Name: " . $transportationType . "</p>";
        echo "<p>From: $from</p>";
        echo "<p>To: $to</p>";
        echo "<p>Transportation Class: " . $transportationClass . "</p>";

        // Format the transportation price into Indonesian Rupiah
        if ($transportationData['price'] == 0.00) {
            echo "<p>Transportation Price: Tidak tersedia";
        } else {
            $formattedTransportationPrice = "Rp. " . number_format($transportationData['price'], 0, ',', '.');
            echo "<p>Transportation Price: $formattedTransportationPrice</p>";
        }

        // Retrieve hotel details based on the final destination and hotel class
        $hotelQuery = "SELECT * FROM homestays WHERE Lokasi = '$to' AND homestay_class = '$hotelClass'";
        $hotelResult = mysqli_query($conn, $hotelQuery);

        if ($hotelResult) {
            $hotelData = mysqli_fetch_assoc($hotelResult);

            // Display the hotel details
            echo "<h2>Hotel Details:</h2>";
            echo "<p>Hotel Name: " . $hotelData['Lokasi'] . "</p>";
            echo "<p>Hotel Class: " . $hotelData['homestay_class'] . "</p>";
            echo "<p>Hotel Strategic Area: " . $hotelData['alamat'] . "</p>";

            // Format the hotel price into Indonesian Rupiah
            $formattedHotelPrice = "Rp. " . number_format($hotelData['price'], 0, ',', '.');
            echo "<p>Hotel Price per Night: $formattedHotelPrice</p>";

            // Calculate the total cost
            $totalCost = $transportationData['price'] + $hotelData['price'];

            // Format the total cost into Indonesian Rupiah
            $formattedTotalCost = "Rp. " . number_format($totalCost, 0, ',', '.');

            // Display the total cost
            echo "<h2>Total Cost:</h2>";
            echo "<p>$formattedTotalCost</p>";
        } else {
            echo "Error fetching hotel details: " . mysqli_error($conn);
        }
    } else {
        echo "Error fetching transportation details: " . mysqli_error($conn);
    }
}
?>

<form action="index.php" method="get">
    <button type="submit">OK</button>
</form>


