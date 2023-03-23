<?php
session_start();
$dbemail = $_SESSION['email'];
$customerID = $_SESSION['customerID'];
fetchPassword();

$deletepwd = ($_POST['deletepwd']);

if (!password_verify($_POST['deletepwd'], $hashedpassword)) {
// Don't be too specific with the error message - hackers don't
// need to know which one they got right or wrong. :)
    $errorMsg = "Password doesn't match...";
    $success = false;
} else {
    deleteAccount();
    session_destroy();
    $success = true;
}

if ($success) {
    echo "<h1 class='heading'>Account Deleted</h1>";
} else {
    echo "<h4>The following input errors were detected:</h4>";
    echo "<p>" . $errorMsg . "</p>";
}

function fetchPassword() {
    global $customerID, $email, $hashedpassword, $errorMsg, $success, $dbemail;
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
        $stmt = $conn->prepare("SELECT * FROM customers WHERE
email=?");
// Bind & execute the query statement:
        $stmt->bind_param("s", $dbemail);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
// Note that email field is unique, so should only have
// one row in the result set.
            $row = $result->fetch_assoc();
            $hashedpassword = $row["pwd"];
            $stmt->close();
        }
        $conn->close();
    }
}

function deleteAccount() {
    global $customerID, $dbemail, $hashedpassword, $errorMsg, $success;
// Create database connection.
    $config = parse_ini_file('../../private/db-config.ini');
    $conn = new mysqli($config['servername'], $config['username'],
            $config['password'], $config['dbname']);
// Check connection
    if ($conn->connect_error) {
        $errorMsg = "Connection failed: " . $conn->connect_error;
        $success = false;
    } else {
        $stmt = $conn->prepare("DELETE FROM customers WHERE customerID = ? AND email = ?");
// Bind & execute the query statement:
        $stmt->bind_param("ss", $customerID, $dbemail);
    }
    if (!$stmt->execute()) {
        $errorMsg = "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
        $success = false;
    }
    $stmt->close();

    $conn->close();
}

?>