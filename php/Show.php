<?php
// Establish database connection
include "MyConnection.php";

if (isset($_POST['show_item'])) {
    // Retrieve the ID of the item to be deleted
    $rec_id_s = $_POST["rec_id_s"];
}

$query = "SELECT * FROM records WHERE Rec_ID = '$rec_id_s'";
$result = mysqli_query($conn, $query);

// Fetch the data and store it in the array
while($row = mysqli_fetch_assoc($result)) {
    $name = $row["Student_Name"];
    $Grade_Sec = $row["Grade_Section"];
    $Infraction = $row["Infraction"];
    $Reason = $row["Reason"];
    $Infraction_Date = $row["I_Date"];
    $Infraction_Time = $row["I_Time"];
}
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
    <link rel="stylesheet" href="../css/Pages.css">
    <script src="../js/Add.js"></script>
    <link rel="icon" href="../res/BEC Logo.png">

    <title>Infraction Monitoring System</title>

</head>

<body>
    
    <!--Navigation-->
    <nav class="navigation">
        <div class="IMS">
            <div class="Logo">
                <a href="https://bec.edu.ph/"><img src="../res/BEC Logo.png" alt="BEC Logo"></a>
            </div>
            <div class="title"></div>
        </div>
            <div class="nav_links">
                <ul>
                    <li><a href="../Home.html">Home</a></li>
                    <li><a href="../pages/About.html">About</a></li>
                    <li><a href="../pages/Privacy.html">Privacy</a></li>
                    <li><a href="../pages/Contact.html" >Contact</a></li>
                </ul>
            </div>
    </nav>

    <!--Preview-->
    <div class="main-container">

        

        <div class="form-container">

            <table>
                <thead>
                    <tr>
                        <td><h1>Name</h1></td>
                        <td><h1>Grade and section</h1></td>
                        <td><h1>Reason</h1></td>
                        <td><h1>Infraction</h1></td>
                        <td><h1>Date</h1></td>
                        <td><h1>Time</h1></td>
                    </tr>
                </thead>
                <tbody>

                    <tr>
                        <td><h2><?php echo $name; ?></h2></td>
                        <td><h2><?php echo $Grade_Sec; ?></h2></td>
                        <td><h2><?php echo $Reason; ?></h2></td>
                        <td><h2><?php echo $Infraction; ?></h2></td>
                        <td><h2><?php echo $Infraction_Date; ?></h2></td>
                        <td><h2><?php echo $Infraction_Time; ?></h2></td>
                    </tr>

                </tbody>

            </table>
        
        <div class="main_nav">
            <nav class="content_nav">
                <div class="add">
                    <ul>
                        <li><a href="./List.php">Back</a></li>
                    </ul>
                </div>
            </nav>
        </div>
        
        </div>
    </div>
    
</body>

</html>
