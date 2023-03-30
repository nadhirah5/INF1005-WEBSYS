<?php

global $email, $emailwithasterisk, $token, $pwd, $pwd_confirm, $hashedpassword;
$email = ($_POST['formemail']);
$emailwithasterisk = str_replace('-', '@', $email);
$token = ($_POST['formtoken']);

$pwd = ($_POST['pwd']);
$pwd_confirm = ($_POST['pwd_confirm']);
$success = true;

if ($pwd == $pwd_confirm) {
    $hashedpassword = password_hash($pwd, PASSWORD_DEFAULT);
} else {
    $success = false;
    $errorMsg = "Password mismatch.";
}

if ($success) {

    updateCustomerPassword();
    removeToken();
    echo "<br><br><br><br><br><br><br><br><div class='container'>";
    echo "<h1 class='heading'>Password reset succcssfully</h1>";
    echo "<h3 class='sub-heading'><a href='login.php'>Click here to login</a></h3>";
    echo "</div>";
} else {
    echo "<br><br><br><br><br><br><br><br><div class='container'>";
    echo "<h1 class='heading'>The following input errors were detected:</h1>";
    echo "<h3 class='sub-heading'>" . $errorMsg . "</h3>";
    echo "</div>";
}


//Helper function that checks input for malicious or unwanted content.
function sanitize_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function updateCustomerPassword() {
    global $emailwithasterisk, $hashedpassword, $token, $errorMsg, $success;
// Create database connection.
    $config = parse_ini_file('../../private/db-config.ini');
    $conn = new mysqli($config['servername'], $config['username'],
            $config['password'], $config['dbname']);
// Check connection
    if ($conn->connect_error) {
        $errorMsg = "Connection failed: " . $conn->connect_error;
        $success = false;
    } else {

        $stmt = $conn->prepare("UPDATE customers SET pwd = ? WHERE email = ? AND token = ?");
// Bind & execute the query statement:
        $stmt->bind_param("sss", $hashedpassword, $emailwithasterisk, $token);
        if (!$stmt->execute()) {
            $errorMsg = "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
            $success = false;
        }
        $stmt->close();
    }
    $conn->close();
}

function removeToken() {
    global $emailwithasterisk, $resetdatetime, $resettoken;

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
        $stmt = $conn->prepare("UPDATE customers SET token = NULL, tokenDate = NULL  WHERE email = ?");
// Bind & execute the query statement:
        $stmt->bind_param("s", $emailwithasterisk);
        if (!$stmt->execute()) {
            $errorMsg = "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
            $success = false;
        }
        $stmt->close();
    }
    $conn->close();
}

?>
