<?php

session_start();

authenticateUser();

if ($success) {


    updateCustomerDB();

    if ($success) {
        echo "<h1 class='heading'>Updated successfuly</h1>";
        echo "<h3 class='sub-heading'><a href='admincustomer.php'>Back to customer table</a></h3>";
    }
}

function updateCustomerDB() {
    $customerID = sanitize_menu($_POST['customerID']);
    $fname = sanitize_name($_POST['fname']);
    $lname = sanitize_name($_POST['lname']);
    $email = sanitize_email($_POST['email']);
    $dob = ($_POST['dob']);
    $address = sanitize_input($_POST['address']);
    $postalcode = sanitize_menu($_POST['postalcode']);
    $mobilenumber = sanitize_menu($_POST['mobilenumber']);
    $wrongpasscount = sanitize_menu($_POST['wrongpasscount']);
    $lockedout = sanitize_menu($_POST['lockedout']);

    global $errorMsg, $success;
// Create database connection.
    $config = parse_ini_file('../../private/db-config.ini');
    $conn = new mysqli($config['servername'], $config['username'],
            $config['password'], $config['dbname']);
// Check connection
    if ($conn->connect_error) {
        $errorMsg = "Connection failed: " . $conn->connect_error;
        $success = false;
    } else {

        $stmt = $conn->prepare("UPDATE customers SET fname = ?, lname = ?, email = ?, dob = ?, address = ?, postalcode = ?, mobilenumber = ?, wrongpasscount = ?, lockedout = ? WHERE customerID = ?");
        $stmt->bind_param("sssssssiii", $fname, $lname, $email, $dob, $address, $postalcode, $mobilenumber, $wrongpasscount, $lockedout, $customerID);
        if (!$stmt->execute()) {
            $errorMsg = "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
            $success = false;
        }
        $stmt->close();
    }
    $conn->close();
}

function authenticateUser() {
    $sessionfoodAdminLogin = $_SESSION['adminlogin'];

    global $errorMsg, $success;
    $success = true;
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
        $stmt = $conn->prepare("SELECT * FROM foodAdmin WHERE foodAdminLogin=?");
// Bind & execute the query statement:
        $stmt->bind_param("s", $sessionfoodAdminLogin);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
// Note that email field is unique, so should only have
// one row in the result set.
            $row = $result->fetch_assoc();
            $lockout = $row["lockout"];
            $hashedpassword = $row["foodAdminPassword"];
// Check if the password matches:
            if (!password_verify($_POST["updatepwd"], $hashedpassword)) {
// Don't be too specific with the error message - hackers don't
// need to know which one they got right or wrong. :)
                $errorMsg = "Email not found or password doesn't match...";
                $success = false;
            } elseif ($lockout == 1) {
                $errorMsg = "Email not found or password doesn't match...";
                $success = false;
            }
        } else {
            $errorMsg = "Email not found or password doesn't match...";
            $success = false;
        }
        $stmt->close();
    }
    $conn->close();
}

function sanitize_name($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    $data = preg_replace("/[^a-zA-Z]/", "", $data);
    return $data;
}

function sanitize_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    $data = preg_replace('/[^a-zA-Z0-9\s]/', '', $data);
    return $data;
}

function sanitize_email($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function sanitize_menu($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = preg_replace('/[^0-9]/', '', $data); // Remove all non-numeric characters
    return $data;
}

?>
