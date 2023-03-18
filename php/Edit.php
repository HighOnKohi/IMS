<?php
// Establish database connection
include "MyConnection.php";

if (isset($_POST['edit_item'])) {
    // Retrieve the ID of the item to be deleted
    $rec_id_e = $_POST["rec_id_e"];
}

$query = "SELECT * FROM records WHERE Rec_ID = '$rec_id_e'";
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

    <!--Add Form-->
    <div class="main-container">
        <div class="form-container">

            <form action="../php/Update.php" class="form-add" method="post" name="Infraction_Form">
                <label for="Student">Name</label>
                <input type="text" name="Student" id="Student-textbox" placeholder="Student's Name" required value="<?php echo $name; ?>">

                <label for="Section">Grade & Section</label>
                <input type="text" name="Section" id="Section-textbox" placeholder="The Student's Grade & Section" required value="<?php echo $Grade_Sec; ?>">

                <label for="Infraction">Infraction</label>
                <select name="Infraction" id="Infraction-dropdown" placeholder="The Student's Infraction" required>
                    <optgroup label="Infraction">
                        <option value="uniform">Uniform</option>
                        <option value="Phone">Phone</option>
                        <option value="haircut">Haircut</option>
                        <option value="late">Late</option>
                        <option value="vape">Vape</option>
                        <option value="others">Others</option>
                    </optgroup>
                </select>

                <label for="Reason">Reason</label>
                <input type="text" name="Reason" id="Reason-textbox" placeholder="The Student's Reason" value="<?php echo $Reason; ?>">

                <label for="Date">Date</label>
                <input type="date" name="Date" id="Date-textbox" required value="<?php echo $Infraction_Date; ?>">

                <label for="Time">Time</label>
                <input type="time" name="Time" id="Time-textbox" required value="<?php echo $Infraction_Time; ?>">

                <div class="add_btn">
                    <form method="post" action="Update.php">
                        <input type="hidden" name="rec_id_e" value="<?php echo $rec_id_e; ?>">
                        <input type="submit" value="Update" id="btn-add" name="update_item">
                    </form>
                </div>
                <a href="./List.php">
                <div class="add_btn">
                    <h3 id="btn-add">Back</h3>
                </div></a>
            </form>
        </div>
    </div>
</body>

</html>
