<?php

session_start();

if (isset($_SESSION['email'])) {

    fetchUserinfo();
    addReview();
}

function addReview() {
    global $customerID, $errorMsg, $success;

    $orderReviewContent = sanitize_input($_POST['orderReviewContent']);
    $orderReviewRating = $_POST['rating'];
    $orderReviewApproval = 0;

// Create database connection.
    $config = parse_ini_file('../../private/db-config.ini');
    $conn = new mysqli($config['servername'], $config['username'],
            $config['password'], $config['dbname']);
// Check connection
    if ($conn->connect_error) {
        $errorMsg = "Connection failed: " . $conn->connect_error;
        $success = false;
    } else {

        $stmt = $conn->prepare("INSERT INTO orderReview (customerID, orderReviewContent, orderReviewRating, orderReviewApproval) VALUES (?,?,?,?)");
// Bind & execute the query statement:
        $stmt->bind_param("isii", $customerID, $orderReviewContent, $orderReviewRating, $orderReviewApproval);
        if (!$stmt->execute()) {
            $errorMsg = "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
            $success = false;
        }
        $stmt->close();
    }
    $conn->close();

    header("Location: http://35.212.156.153/HTMLProject/order_history.php");
}

function sanitize_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function fetchUserinfo() {
    global $customerID, $errorMsg, $success;
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
        $stmt = $conn->prepare("SELECT customerID FROM customers WHERE email=?");
// Bind & execute the query statement:
        $stmt->bind_param("s", $_SESSION['email']);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
// Note that email field is unique, so should only have
// one row in the result set.
            $row = $result->fetch_assoc();
            $customerID = $row['customerID'];
            $stmt->close();
        }
    }
}
?>



