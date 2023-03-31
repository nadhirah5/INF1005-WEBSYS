<?php

session_start();
$sessionfoodAdminLogin = $_SESSION['adminlogin'];

authenticateUser();

if ($success) {
    updateadminmenu();
}

function updateadminmenu() {
            $foodID = ($_POST['foodID']);
            $foodName = ($_POST['foodName']);
            $foodPrice = ($_POST['foodPrice']);
            $foodDescription = ($_POST['foodDescription']);
            $foodCategory = ($_POST['foodCategory']);
            $foodFrontPage = ($_POST['foodFrontPage']);
            

            if (isset($_FILES['foodPicture'])) {
                $file = $_FILES['foodPicture'];
                if ($file['error'] === UPLOAD_ERR_OK) {
                    $name = $file['name'];
                    $tmp_name = $file['tmp_name'];
                    $uploads_dir = '/var/www/html/HTMLProject/images/';
                    move_uploaded_file($tmp_name, $uploads_dir . $name);

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
                        $stmt = $conn->prepare("UPDATE menu SET foodName = ?, foodPrice = ?, foodPicture = ?, foodDescription = ?, foodCategory = ?, foodFrontPage = ? WHERE foodID = ? ");
                        $stmt->bind_param("ssssssi", $foodName, $foodPrice, $name, $foodDescription, $foodCategory, $foodFrontPage, $foodID);
                        if (!$stmt->execute()) {
                            $errorMsg = "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
                            $success = false;
                        }
                        $stmt->close();
                    }

                    $conn->close();
                    header("Location: http://35.212.156.153/HTMLProject/adminmenu.php");
                } else {
                    echo "Error uploading file.";
                }
            } else {
                echo "No file uploaded.";
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
