<?php
session_start();
include('connection.php');

if ($_SESSION['level'] == "") {
    header('Location: login.php?message=session');
}   
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pemesanan</title>
</head>
<body>
    <h2>Daftar Pemesanan</h2>

    <form action="calculate.php" method="post">
        <label for="transportation">Select Transportation:</label>
        <select name="transportation" id="transportation" required onchange="updateTransportationClass()">
            <option value="" disabled selected>--- Pilih Jenis Transportasi ---</option>
            <option value="Airline">Airline</option>
            <option value="Train">Train</option>
            <option value="Vehicle">Vehicle</option>
        </select><br>

        <label for="transportation_class">Select Transportation Class:</label>
        <select name="hotel" id="hotel" required>
            <option value="" disabled selected>--- Pilih Class Transportasi ---</option>
            <!-- Options will be dynamically populated based on the selected transportation -->
        </select><br>

        <label for="from">From:</label>
        <select name="from" required>
            <option value="" disabled selected>--- Pilih Destinasi Awal ---</option>
            <?php
            $result = mysqli_query($conn, "SELECT DISTINCT initial_goal FROM transportations");
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<option value='{$row['initial_goal']}'>{$row['initial_goal']}</option>";
            }
            ?>
        </select><br>

        <label for="to">To:</label>
        <select name="to" required>
            <option value="" disabled selected>--- Pilih Destinasi Akhir ---</option>
            <?php
            $result = mysqli_query($conn, "SELECT DISTINCT final_destination FROM transportations");
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<option value='{$row['final_destination']}'>{$row['final_destination']}</option>";
            }
            ?>
        </select><br>

        <label for="hotel">Hotel Class:</label>
        <select name="hotel" id="hotel" required>
            <option value="" disabled selected>--- Pilih Class Hotel ---</option>
            <?php
            $result = mysqli_query($conn, "SELECT DISTINCT homestay_class FROM homestays");
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<option value='{$row['homestay_class']}'>{$row['homestay_class']}</option>";
            }
            ?>
        </select><br>

        <input type="submit" name="pesan" value="Pesan">
    </form>

    <script>
    function updateTransportationClass() {
        var transportationDropdown = document.getElementById("transportation");
        var transportationClassDropdown = document.getElementById("hotel");

        // Reset the transportation class dropdown
        transportationClassDropdown.innerHTML = '<option value="" disabled selected>--- Pilih Class Transportasi ---</option>';

        // Enable or disable the transportation class dropdown based on the selected transportation
        if (transportationDropdown.value === "Train") {
            // If Train is selected, allow both Ekonomi and Eksekutif classes
            transportationClassDropdown.innerHTML += '<option value="Ekonomi">Ekonomi</option>';
            transportationClassDropdown.innerHTML += '<option value="Eksekutif">Eksekutif</option>';
        } else {
            // If Vehicle or Airline is selected, only allow Ekonomi class
            transportationClassDropdown.innerHTML += '<option value="Ekonomi">Ekonomi</option>';
        }
        // Call the function to update the Hotel Class dropdown as well
    }
    </script>

</body>
</html>
