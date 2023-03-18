<?php
// database connection code
// $con = mysqli_connect('localhost', 'database_user', 'database_password','database');

include "MyConnection.php";

// get the post records
$Student_Name = $_POST['Student'];
$Section = $_POST['Section'];
$Infraction = $_POST['Infraction'];
$Reason = $_POST['Reason'];
$Date = $_POST['Date'];
$Time = $_POST['Time'];

// database insert SQL code
$sql = "INSERT INTO `records` (`Student_Name`, `Grade_Section`, `Infraction`, `Reason`, `I_Date`, `I_Time`) VALUES ('$Student_Name', '$Section', '$Infraction', '$Reason', '$Date', '$Time')";

// insert in database 
$rs = mysqli_query($conn, $sql);

if($rs)
{

    //redirect to Confirmation page
    header('Location: ./Confirm.php');
    exit;

    echo '<script type="text/javascript">
	alert("Added Succesfully");
    </script>';
}

?>