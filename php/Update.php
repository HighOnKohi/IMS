<?php
// Establish database connection
include "MyConnection.php";

if (isset($_POST['update_item'])) {
  // Retrieve the updated item data
  $id = $_POST["rec_id_e"];
  $name = mysqli_real_escape_string($conn, $_POST['Student']);
  $Grade_Sec = mysqli_real_escape_string($conn, $_POST['Section']);
  $Infraction = mysqli_real_escape_string($conn, $_POST['Infraction']);
  $Reason = mysqli_real_escape_string($conn, $_POST['Reason']);
  $Infraction_Date = mysqli_real_escape_string($conn, $_POST['Date']);
  $Infraction_Time = mysqli_real_escape_string($conn, $_POST['Time']);
  
  // Update the item data in the database
  $sql = "UPDATE records SET Student_Name='$name', Grade_Section='$Grade_Sec', Infraction='$Infraction', Reason='$Reason', I_Date='$Infraction_Date', I_Time='$Infraction_Time' WHERE Rec_ID='$id'";
  mysqli_query($conn, $sql);
  
  // Redirect the user back to the main page
  header('Location: ./Main.php');
  exit;
}
?>
