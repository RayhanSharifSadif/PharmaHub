<?php
session_start();
if (isset($_SESSION["username"])) {
    $username = $_SESSION["username"];
    session_write_close();
} else {
    // since the username is not set in session, the user is not-logged-in
    // he is trying to access this page unauthorized
    // so let's clear all session variables and redirect him to index
    session_unset();
    session_write_close();
    $url = "./index.php";
    header("Location: $url");
}

?>
<HTML>
<HEAD>
<TITLE>Admin Homepage</TITLE>
<link href="assets/css/phppot-style.css" type="text/css"
    rel="stylesheet" />
<link href="assets/css/user-registration.css" type="text/css"
    rel="stylesheet" />
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
				<style>
        .container {
            width: 400px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .container label {
            display: inline-block;
            width: 150px;
            text-align: right;
            margin-right: 10px;
        }

        .container input[type="text"],
        .container input[type="number"] {
            width: 230px;
            padding: 5px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        .container input[type="submit"] {
            margin-left: 160px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 3px;
            padding: 8px 15px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Add New Medicine</h1>
        <form action="addmeds.php" method="post">
            <label for="medicine_name">Medicine Name:</label>
            <input type="text" id="medicine_name" name="medicine_name" required><br><br>
            
            <label for="company_name">Company Name:</label>
            <input type="text" id="company_name" name="company_name" required><br><br>
            
            <label for="company_location">Company Location:</label>
            <input type="text" id="company_location" name="company_location" required><br><br>
            
            <label for="stock">Stock:</label>
            <input type="number" id="stock" name="stock" required><br><br>
            
            <input type="submit" value="Add Medicine">
			<a href="modify_stock.php">Modify Existing Stock</a> <!-- Add this line -->
        </form>
            </span>
        </div>
        <div class="page-content">Admin Homepage <?php echo $username;?></div>
    </div>
<style>
body {
  background-image: url("images/home.jpeg");
  background-color: #cccccc;
  background-repeat: no-repeat;
  background-size: cover; /* This ensures the image covers the entire background */
}
</style>	
</BODY>
</HTML>