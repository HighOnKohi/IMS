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

            <form action="../php/Add.php" class="form-add" method="post" name="Infraction_Form">
                <label for="Student">Name</label>
                <input type="text" name="Student" id="Student-textbox" placeholder="Student's Name" required>

                <label for="Section">Grade & Section</label>
                <input type="text" name="Section" id="Section-textbox" placeholder="The Student's Grade & Section" required>

                <label for="Infraction">Infraction</label>
                <select name="Infraction" id="Infraction-dropdown" placeholder="The Student's Infraction" required>
                    <optgroup label="Infraction">
                        <option value="Uniform">Uniform</option>
                        <option value="Phone">Phone</option>
                        <option value="Haircut">Haircut</option>
                        <option value="Haircut">Hair Color</option>
                        <option value="Late">Late</option>
                        <option value="Vape">Vape</option>
                        <option value="Others">Others</option>
                    </optgroup>
                </select>

                <label for="Reason">Reason</label>
                <input type="text" name="Reason" id="Reason-textbox" placeholder="The Student's Reason">

                <label for="Date">Date</label>
                <input type="date" name="Date" id="Date-textbox" required>

                <label for="Time">Time</label>
                <input type="time" name="Time" id="Time-textbox">

                <div class="add_btn">
                    <input type="submit" value="Add" id="btn-add">
                </div>
                <a href="./Main.php">
                <div class="add_btn">
                    <h3 id="btn-add">Back</h3>
                </div></a>
            </form>
        </div>
    </div>
</body>

</html>