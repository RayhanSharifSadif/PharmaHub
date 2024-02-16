<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pharma_hub";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get data from the form
$medicineName = $_POST['medicine_name'];
$companyName = $_POST['company_name'];
$companyLocation = $_POST['company_location']; // New field
$stock = $_POST['stock'];

// Insert data into the database
$sql = "INSERT INTO medicines (medicine_name, company_name, company_location, stock) VALUES ('$medicineName', '$companyName', '$companyLocation', $stock)";

if ($conn->query($sql) === TRUE) {
    echo "Medicine added successfully!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
