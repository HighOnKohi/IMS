<?php
include "MyConnection.php";

// Initialize the search term and infraction variable
$search_term = "";
$selected_infraction = "";

// Check if a search term and infraction have been submitted
if (isset($_POST["search_term"])) {
    $search_term = $_POST["search_term"];
}

if (isset($_POST["selected_infraction"])) {
    $selected_infraction = $_POST["selected_infraction"];
}

// SQL query to retrieve data from the table
$sql = "SELECT * FROM records WHERE (Student_Name LIKE '%$search_term%' OR Grade_Section LIKE '%$search_term%')";

if (!empty($selected_infraction)) {
    $sql .= " AND Infraction = '$selected_infraction'";
}

$sql .= " ORDER BY Student_Name";

// Execute the query
$result = $conn->query($sql);

// Check for query errors
if (!$result) {
    die("Query failed: " . $conn->error);
}

// Create an associative array to store the data
$data = array();

// Fetch the data and store it in the array
while ($row = $result->fetch_assoc()) {
    $Rec_ID = $row["Rec_ID"];
    $name = $row["Student_Name"];
    $Grade_Sec = $row["Grade_Section"];
    $Infraction = $row["Infraction"];
    $Reason = $row["Reason"];
    $Infraction_Date = $row["I_Date"];
    $Infraction_Time = $row["I_Time"];
    
    if (!isset($data[$name])) {
        $data[$name] = array(
            "Grade_Section" => $Grade_Sec,
            "Infractions" => array()
        );
    }
    
    $data[$name]["Infractions"][] = array(
        "Rec_ID" => $Rec_ID,
        "Infraction" => $Infraction,
        "Reason" => $Reason,
        "Infraction_Date" => $Infraction_Date,
        "Infraction_Time" => $Infraction_Time
    );
}

// Close the database connection
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
    <link rel="stylesheet" href="../css/Main.css">
    <script src="../js/Main.js"></script>
    <link rel="icon" href="../res/BEC Logo.png">
    <title>Infraction Monitoring System</title>
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
            <ul>

                <li>
                    <div class="search_wrapper">
                    <form method="GET">
                    <input type="text" name="search_query" id="Search" onkeyup="filterResults()" placeholder="Search for records">
                    <input type="date" name="search_date" id="date_filter" onchange="filterResults()">
                    <select name="infraction_filter" onchange="filterResults()">
                        <option value="">All infractions</option>
                        <option value="none">None</option>
                        <option value="uniform">Uniform</option>
                        <option value="vape">Vape</option>
                        <option value="haircut">Haircut</option>
                        <option value="haircolor">Hair Color</option>
                        <option value="late">Late</option>
                        <option value="others">Others</option>
                    </select>
                    <button type="submit">Search</button>
                    </form>

                    </div>
                </li>
                    <li><a href="../Home.html">Home</a></li>
                    <li><a href="../pages/About.html">About</a></li>
                    <li><a href="../pages/Privacy.html">Privacy</a></li>
                    <li><a href="../pages/Contact.html" >Contact</a></li>
                </ul>
            </div>
    </nav>


    <div class="nav_nav">
    <div class="main_nav">
        <nav class="content_nav">
    <form action="List.php" method="post">
        <input type="submit" name="list_view" value="Edit View" class="list_view">
    </form>
        </nav>
    </div>
    <div class="main_nav">
    <nav class="content_nav">
    <form action="Add_Items.php" method="post">
        <input type="submit" name="Add_Items" value="Add" class="list_view">
    </form>
        </nav>
    </div>
    </div>
    
        <div class="main_content">
            <div class="preview">
                <div class="preview_box">
                    <h2>Infraction Records</h2>
                    
        <div class="rec_items">
        <!-- Loop through the $data array and create separate tables for each name -->
        <?php foreach ($data as $name => $record): ?>
    <h3><?php echo $name; ?> <?php echo $record["Grade_Section"]; ?></h3>

    <table class="Student_record">
        <thead>
            <tr>
                <th>Infraction</th>
                <th>Reason</th>
                <th>Date</th>
                <th>Time</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($record["Infractions"] as $infraction):?>

                <tr>
                    <td><?php echo $infraction["Infraction"]; ?></td>
                    <td><?php echo $infraction["Reason"]; ?></td>
                    <td><?php echo $infraction["Infraction_Date"]; ?></td>
                    <td><?php echo $infraction["Infraction_Time"]; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>

              
</body>

</html>