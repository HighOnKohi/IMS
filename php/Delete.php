<?php
// connect to database
include "MyConnection.php";


if (isset($_POST['delete_item'])) {
  // Retrieve the ID of the item to be deleted
  $rec_id = $_POST["rec_id"];
  
  // Delete the item from the database
  $sql = "DELETE FROM records WHERE Rec_ID = $rec_id";
  if ($conn->query($sql) === TRUE) {
  
  // Redirect the user back to the previous page
  header('Location: ' . $_SERVER['HTTP_REFERER']);
  exit();
} else {
    die("Error deleting record: " . $conn->error);
}
}

// Close the database connection
$conn->close();
?>