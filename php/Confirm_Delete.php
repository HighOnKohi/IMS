<?php
// connect to database
include "MyConnection.php";

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form has been submitted
if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER["REQUEST_METHOD"] == "POST") {
  // Get the input values from the form
  $input_username = $_POST["UName"];
  $input_password = $_POST["Pass"];
    
    // Prepare a SELECT statement to retrieve data from the table
    $stmt = $conn->prepare("SELECT * FROM administrators WHERE Username = ? AND Password = ?");
    $stmt->bind_param("ss", $input_username, $input_password);
    $stmt->execute();
    $result = $stmt->get_result();
    
    // Check if there is a match in the table
    if ($result->num_rows == 1) {
        // Match found, redirect to Main.php
        header("Location: ./List.php");
        exit;
    } else {
      $error_msg = "Invalid Username or Password!";
    }
}

// Close the connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

<!--FONTS-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit&display=swap" rel="stylesheet">

<!--LINKS-->
    <link rel="stylesheet" href="../css/Login.css">
    <script src="../js/Login.js"></script>
    <link rel="icon" href="../res/BEC Logo.png">

    <title>Confirm</title>

</head>
<body>



    <nav class="navigation">
        <div class="IMS">
            <div class="Logo">
                <a href="https://bec.edu.ph/"><img src="../res/BEC Logo.png" alt="BEC Logo"></a>
            </div>
            <div class="title"></div>
        </div>
            <div class="nav_links">
            </div>
    </nav>

    <div class="main-contaianer">
        
    <div class="login_container">
        <div class="confirmation">
            <h2>Please Login to Confirm</h2>
        </div>
        <div class="form-container">
            <form action="./Confirm.php" class="form-login" method="POST" name="Login_Form">
                <label for="UName">Username</label>
                <input type="text" name="UName" id="UName" placeholder="Username">
                <label for="Pass">Password</label>
                <input type="password" name="Pass" id="Pass" placeholder="Password">
                <input type="submit" value="Login">
              <?php
              // Display error message if it exists
              if (isset($error_msg)) {
                  echo "<p style='color:#FFD700'>$error_msg</p>";
              }
              ?>
            </form>
        </div>
    </div>

    </div>
</body>
</html>