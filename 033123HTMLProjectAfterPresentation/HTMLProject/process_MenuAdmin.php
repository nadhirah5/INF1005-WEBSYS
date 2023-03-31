<?php

session_start();
$sessionfoodAdminLogin = $_SESSION['adminlogin'];

authenticateUser();

if ($success) {
    
    fetchadminmenu();
}

function fetchadminmenu() {

    $foodCategory = $_GET['category'];
// Create database connection.
    $config = parse_ini_file('../../private/db-config.ini');
    $conn = new mysqli($config['servername'], $config['username'],
            $config['password'], $config['dbname']);
// Check connection
    if ($conn->connect_error) {
        $errorMsg = "Connection failed: " . $conn->connect_error;
        $success = false;
    } else {
// Prepare the statement:
        $stmt = $conn->prepare("SELECT * FROM menu");
// Bind & execute the query statement:
        $stmt->execute();
        $result = $stmt->get_result();

        // Create an empty array to hold the menu items
        $menu_items = array();
        // Loop through each row of the result set and add it to the menu_items array
        
        if ($foodCategory == 1) {
            while ($row = $result->fetch_assoc()) {
                if ($row["foodCategory"] == $foodCategory) {
                    echo "<div class='box'>" .
                    "<img class='' src='images/" . $row["foodPicture"] . "' alt='" . $row["foodDescription"] . " '>" .
                    "<h3>" . $row["foodName"] . "</h3>" .
                    "<span>$" . $row["foodPrice"] . "</span>" .
                    "<br><button type='button' id='UPDATEMENU' name='updatemenu'  onclick='convertToForm(\"" . $row["foodID"] . "\", \"" . $row["foodName"] . "\",  \"" . $row["foodPrice"] . "\", \"" . $row["foodDescription"] . "\",  \"" . $row["foodCategory"] . "\",  \"" . $row["foodFrontPage"] . "\", this)'>" . "<span class='glyphicon glyphicon-shopping-cart'>Update</span>" .
                    "</button>" .
                    "<br><button type='button' id='DELETEMENU' name='deletemenu'  onclick='convertToFormDelete(\"" . $row["foodID"] . "\", this)'>" .
                    "<span class='glyphicon glyphicon-shopping-cart'>Delete</span>" .
                    "</button>" .
                    "</div>";
                }
            }
            echo "<div class='box'>" .
            "<form method='post' action='process_MenuAdminAdd.php' enctype='multipart/form-data'>" .
            "<input type='file' name='addfoodPicture'>" .
            "<input type='text' placeholder='Name of Food'  name='addfoodName'>" .
            "<input type='text' placeholder='Price'  name='addfoodPrice'>" .
            "<input type='text' placeholder='Description of food'  name='addfoodDescription'>" .
            "<input type='text' placeholder='1 for FOOD'  name='addfoodCategory' style='width=300px;'>" .
            "<input type='text' placeholder='Frontpage 1/No frontpage 0'  name='addfoodFrontPage' style='width=300px;'>" .
            "<br><button class='btn' type='submit'>Add Food</button>" .
            "</form>" .
            "</div>";
        } elseif ($foodCategory == 0) {
            while ($row = $result->fetch_assoc()) {
                if ($row["foodCategory"] == $foodCategory) {
                    echo "<div class='box'>" .
                    "<img class='' src='images/" . $row["foodPicture"] . "' alt='" . $row["foodDescription"] . " ' >" .
                    "<h3>" . $row["foodName"] . "</h3>" .
                    "<span>$" . $row["foodPrice"] . "</span>" .
                    "<br><button type='button' id='UPDATEMENU' name='updatemenu'  onclick='convertToForm(\"" . $row["foodID"] . "\", \"" . $row["foodName"] . "\",  \"" . $row["foodPrice"] . "\", \"" . $row["foodDescription"] . "\",  \"" . $row["foodCategory"] . "\",  \"" . $row["foodFrontPage"] . "\", this)'>" .
                    "<span class='glyphicon glyphicon-shopping-cart'>Update</span>" .
                    "</button>" .
                    "<br><button type='button' id='DELETEMENU' name='deletemenu'   onclick='convertToFormDelete(\"" . $row["foodID"] . "\", this)'>" .
                    "<span class='glyphicon glyphicon-shopping-cart'>Delete</span>" .
                    "</button>" .
                    "</div>";
                }
            }
            echo "<div class='box'>" .
            "<form method='post' action='process_MenuAdminAdd.php' enctype='multipart/form-data'>" .
            "<input type='file' name='addfoodPicture'>" .
            "<input type='text' placeholder='Name of Drink' name='addfoodName'>" .
            "<input type='text' placeholder='Price'  name='addfoodPrice'>" .
            "<input type='text' placeholder='Description of food'  name='addfoodDescription'>" .
            "<input type='text' placeholder='0 for DRINK'  name='addfoodCategory' style='width=300px;'>" .
            "<input type='text' placeholder='Frontpage 1/No frontpage 0'  name='addfoodFrontPage' style='width=300px;'>" .
            "<br><button  class='btn' type='submit'>Add Drink</button>" .
            "</form>" .
            "</div>";
        } elseif ($foodCategory == 2) {
            while ($row = $result->fetch_assoc()) {
                if ($row["foodCategory"] == $foodCategory) {
                    echo "<div class='box'>" .
                    "<img class='' src='images/" . $row["foodPicture"] . "' alt='" . $row["foodDescription"] . " ' >" .
                    "<h3>" . $row["foodName"] . "</h3>" .
                    "<span>$" . $row["foodPrice"] . "</span>" .
                    "<br><button type='button' id='UPDATEMENU' name='updatemenu'  onclick='convertToForm(\"" . $row["foodID"] . "\", \"" . $row["foodName"] . "\",  \"" . $row["foodPrice"] . "\", \"" . $row["foodDescription"] . "\",  \"" . $row["foodCategory"] . "\",  \"" . $row["foodFrontPage"] . "\", this)'>" . "<span class='glyphicon glyphicon-shopping-cart'>Update</span>" .
                    "</button>" .
                    "<br><button type='button' id='DELETEMENU' name='deletemenu'  onclick='convertToFormDelete(\"" . $row["foodID"] . "\", this)'>" .
                    "<span>Delete</span>" .
                    "</button>" .
                    "</div>";
                }
            }
            echo "<div class='box'>" .
            "<form method='post' action='process_MenuAdminAdd.php' enctype='multipart/form-data'>" .
            "<input type='file' name='addfoodPicture'>" .
            "<input type='text' placeholder='Name of Desert'  name='addfoodName'>" .
            "<input type='text' placeholder='Price'  name='addfoodPrice'>" .
            "<input type='text' placeholder='Description of food'  name='addfoodDescription'>" .
            "<input type='text' placeholder='2 for DESERT'  name='addfoodCategory' style='width=300px;'>" .
            "<input type='text' placeholder='Frontpage 1/No frontpage 0'  name='addfoodFrontPage' style='width=300px;'>" .
            "<br><button  class='btn' type='submit'>Add Desert</button>" .
            "</form>" .
            "</div>";
        }


        $conn->close();
    }
}

function authenticateUser() {
    global $sessionfoodAdminLogin, $foodAdminLogin, $hashedpassword, $lockout, $errorMsg, $success, $loggedOn;
// Create database connection.
    $config = parse_ini_file('../../private/db-config.ini');
    $conn = new mysqli($config['servername'], $config['username'],
            $config['password'], $config['dbname']);
// Check connection
    if ($conn->connect_error) {
        $errorMsg = "Connection failed: " . $conn->connect_error;
        $success = false;
    } else {
// Prepare the statement:
        $stmt = $conn->prepare("SELECT * FROM foodAdmin WHERE
foodAdminLogin=?");
// Bind & execute the query statement:
        $stmt->bind_param("s", $sessionfoodAdminLogin);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
// Note that email field is unique, so should only have
// one row in the result set.
            $row = $result->fetch_assoc();
            $loggedOn = true;
            $success = true;
        } else {
            $errorMsg = "Insufficient privileges";
            $success = false;
            $loggedOn = false;
        }
        $stmt->close();
    }
    $conn->close();
}

?>
