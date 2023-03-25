<?php

session_start();
$fname = ($_POST['fname']);
$lname = ($_POST['lname']);
$address = ($_POST['address']);
$mobileNumber = ($_POST['mobilenumber']);
$dbemail = $_SESSION['email'];
$customerID = $_SESSION['customerID'];

$success = true;
if (empty($_POST["email"])) {
    $errorMsg .= "Email is required.<br>";
    $success = false;
} else {
    $email = sanitize_input($_POST["email"]);
// Additional check to make sure e-mail address is well-formed.
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errorMsg = "Invalid email format.";
        $success = false;
    }
    fetchPassword();
}

if (!password_verify($_POST['updatepwd'], $hashedpassword)) {
// Don't be too specific with the error message - hackers don't
// need to know which one they got right or wrong. :)
    $errorMsg = "Password doesn't match...";
    $success = false;
} else {
    updateCustomerDB();
}

if ($success) {
    session_destroy();
    echo "<h1 class='heading'>Update Successfull</h1>";
    echo "<h3 class='sub-heading'><a href='login.php'>Click here to login again</a></h3>";
} else {
    echo "<h1 class='heading'>The following input errors were detected:</h1>";
    echo "<h3 class='sub-heading'>" . $errorMsg . "</h3>";
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

function sanitize_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function updateCustomerDB() {
    global $dbemail, $customerID, $fname, $lname, $email, $address, $mobileNumber, $errorMsg, $success;
// Create database connection.
    $config = parse_ini_file('../../private/db-config.ini');
    $conn = new mysqli($config['servername'], $config['username'],
            $config['password'], $config['dbname']);
// Check connection
    if ($conn->connect_error) {
        $errorMsg = "Connection failed: " . $conn->connect_error;
        $success = false;
    } else {

        $stmt = $conn->prepare("UPDATE customers SET fname = ?, lname = ?, email = ?, address = ?, mobilenumber = ? WHERE customerID = ? AND email = ?");
// Bind & execute the query statement:
        $stmt->bind_param("sssssss", $fname, $lname, $email, $address, $mobileNumber, $customerID, $dbemail);
        if (!$stmt->execute()) {
            $errorMsg = "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
            $success = false;
        }
        $stmt->close();
    }
    $conn->close();
}

?>