<?php

session_start();
$success = true;
$email = ($_SESSION['email']);



fetchUserinfo();
saveOrderToPrimary();
getMenuID();
saveOrderToSecondary();



function fetchUserinfo() {
    global $customerID, $address, $postalcode;
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
        $stmt = $conn->prepare("SELECT customerID,address,postalcode FROM customers WHERE email=?");
// Bind & execute the query statement:
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
// Note that email field is unique, so should only have
// one row in the result set.
            $row = $result->fetch_assoc();

            $customerID = $row["customerID"];
            $address = $row["address"];
            $postalcode = $row["postalcode"];
            $stmt->close();
        }
        $conn->close();
    }
}

function saveOrderToPrimary() {
    global $customerID, $address, $postalcode, $orderID;

    $dateTime = time();
    $total = "10.00";
    $deliverystatus = 'out for delivery';

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
        $stmt = $conn->prepare("INSERT INTO orders (customerID, orderDate, orderTotal, orderDeliveryAddress, orderDeliveryPostalCode ,orderDeliverStatus) VALUES (?, ?, ?, ?, ?, ?)");
// Bind & execute the query statement:
        $stmt->bind_param("isssss", $customerID, $dateTime, $total, $address, $postalcode, $deliverystatus);
        if (!$stmt->execute()) {
            $errorMsg = "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
            $success = false;
        } else {
            $orderID = mysqli_insert_id($conn);
        }
        $stmt->close();
    }
    $conn->close();
}

function getMenuID() {

    global $menu_items;
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
        $stmt = $conn->prepare("SELECT foodID,foodName FROM menu");
// Bind & execute the query statement:
        $stmt->execute();
        $result = $stmt->get_result();

// Create an empty array to hold the menu items
        $menu_items = array();
        // Loop through each row of the result set and add it to the menu_items array
        while ($row = $result->fetch_assoc()) {
            $menu_items[] = $row;
        }
    }
    $conn->close();

    // Return the array of menu items
}

function saveOrderToSecondary() {
    global $orderID;
// Create database connection.
    $config = parse_ini_file('../../private/db-config.ini');
    $conn = new mysqli($config['servername'], $config['username'],
            $config['password'], $config['dbname']);
// Check connection
    if ($conn->connect_error) {
        $errorMsg = "Connection failed: " . $conn->connect_error;
        $success = false;
    } else {

        foreach ($_SESSION['cart_items'] as $cartItem) {
            foreach ($menu_items as $menuitem) {
                if ($menuitem['foodName'] == $cartItem['foodName']) {
                    
                    $subtotal = $cartItem['foodQuantity'] * $cartItem['foodPrice'];
                    
                    $stmt = $conn->prepare("INSERT INTO orderdetails (orderID, orderfoodID, orderfoodQuantity, orderfoodRequest, orderfoodSubTotal) VALUES (?, ?, ?, ?, ?)");
                    // Bind & execute the query statement:
                    $stmt->bind_param("iisss", $orderID, $menuitem['foodID'], $cartItem['foodQuantity'], $cartItem['request'], $subtotal);
                    if (!$stmt->execute()) {
                        $errorMsg = "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
                        $success = false;
                    }
                    $stmt->close();
                }
            }
        }



// Prepare the statement:

        
    }
    $conn->close();
}
?>




