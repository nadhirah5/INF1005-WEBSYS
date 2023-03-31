<?php

session_start();
$sessionfoodAdminLogin = $_SESSION['adminlogin'];

authenticateUser();


if ($success) {
    fetchReview();

    while ($row = $result->fetch_assoc()) {

        fetchUserinfo($row["customerID"]);
        echo "<div class='swiper review-slider'>" .
        "<div class='swiper-wrapper'>" .
        "<div class='swiper-slide slide'>" .
        "<i class='fas fa-quote-right'></i>" .
        "<div class='user'>" .
        "<img src='images/pet.jpg' alt='profile picture'>" .
        "<div class='user-info'>" .
        "<h3>" . $reviewfname . " " . $reviewlname . "</h3>" .
        "<div class='stars'>";
        while ($starcount < $row["orderReviewRating"]) {
            echo "<i class='fas fa-star'></i>";
            $starcount += 1;
        }
        $starcount = 0;

        echo "</div>" .
        "</div>" .
        "</div>" .
        "<p>" . $row["orderReviewContent"] . "</p>" .
        "<p>Shown=1/Hidden=0</p>" .
        "<p>Current:". $row["orderReviewApproval"] ."</p>".
        "<form method='post' action='process_adminReviewShowHide.php'>" .
        "<input type='hidden' name='orderReviewID' required value='" . $row["orderReviewID"] . "'>" .
        "<input type='hidden' name='orderReviewApproval' required value='" . $row["orderReviewApproval"] . "'>" .
        "<input type='submit' class='btn' value='Show/Hide' name='showorhide'>" .
        "</form>" .
        "<form method='post' action='process_adminReviewDelete.php'>" .
        "<input type='hidden' name='orderReviewID' required value='" . $row["orderReviewID"] . "'>" .
        "<input type='hidden' name='orderReviewApproval' required value='" . $row["orderReviewApproval"] . "'>" .
        "<input type='submit' class='btn' value='Delete' name='deletereview'>" .
        "</form>".
        "</div>" .
        "</div>" .
        "<div class='swiper-pagination'></div>" .
        "</div>";
        
    }
}

function fetchReview() {
    global $errorMsg, $success, $result;
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
        $stmt = $conn->prepare("SELECT * FROM orderReview");
// Bind & execute the query statement:
        $stmt->execute();
        $result = $stmt->get_result();
    }
}

function fetchUserinfo($customerID) {
    global $reviewfname, $reviewlname, $errorMsg, $success;
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
        $stmt = $conn->prepare("SELECT fname,lname FROM customers WHERE customerID=?");
// Bind & execute the query statement:
        $stmt->bind_param("s", $customerID);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
// Note that email field is unique, so should only have
// one row in the result set.
            $row = $result->fetch_assoc();
            $reviewfname = $row["fname"];
            $reviewlname = $row["lname"];
            $stmt->close();
        }
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
