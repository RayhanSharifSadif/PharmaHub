<?php
session_start();
if (isset($_SESSION["username"])) {
    $username = $_SESSION["username"];
    session_write_close();
} else {
    // Since the username is not set in session, the user is not logged in
    // He is trying to access this page unauthorized
    // So let's clear all session variables and redirect him to index
    session_unset();
    session_write_close();
    $url = "./index.php";
    header("Location: $url");
}

$servername = "localhost";
$db_username = "root";
$db_password = "";
$dbname = "pharma_hub";

// Create connection
$conn = new mysqli($servername, $db_username, $db_password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve medicines from the database
$sql = "SELECT * FROM medicines";
$result = $conn->query($sql);

?>

<HTML>
<HEAD>
<TITLE>Welcome</TITLE>
<link href="assets/css/phppot-style.css" type="text/css"
    rel="stylesheet" />
<link href="assets/css/user-registration.css" type="text/css"
    rel="stylesheet" />
<style>
body {
  background-image: url("images/home.jpeg");
  background-color: #cccccc;
  background-repeat: no-repeat;
  background-size: cover; /* This ensures the image covers the entire background */
}
</style>	
</HEAD>
<BODY>
    <div class="phppot-container">
        <div class="page-header">
            <span class="login-signup">
                <a href="user.php">BIO</a> | 
                <a href="review.php">Reviews</a> | 
                <a href="checkreviews.php">View Reviews</a>	|			
                <a href="logout.php">Logout</a>
				<br></br>
                <a href="deleteuser.php">Delete Account</a>
            </span>
        </div>
        <div class="page-content">Welcome <?php echo $username;?></div>
        
        <div class="page-content">
            <h2>List of Medicines</h2>
            <?php
            if ($result->num_rows > 0) {
                echo "<table border='1'>
                        <tr>
                            <th>ID</th>
                            <th>Medicine Name</th>
                            <th>Company Name</th>
                            <th>Company Location</th>
                            <th>Stock</th>
                        </tr>";
        
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>".$row['id']."</td>
                            <td>".$row['medicine_name']."</td>
                            <td>".$row['company_name']."</td>
                            <td>".$row['company_location']."</td>
                            <td>".$row['stock']."</td>
                        </tr>";
                }
        
                echo "</table>";
            } else {
                echo "No medicines found.";
            }
            ?>
        </div>
    </div>
</BODY>
</HTML>
<?php
$conn->close();
?>
