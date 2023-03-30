<?php

session_start();
$success = true;
$email = ($_SESSION['email']);

fetchUserinfo();
getMenuID();
fetchOrder();

function fetchUserinfo() {
    global $customerID, $success, $errorMsg;
    $email = ($_SESSION['email']);
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
        $stmt = $conn->prepare("SELECT * FROM customers WHERE email=?");
// Bind & execute the query statement:
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
// Note that email field is unique, so should only have
// one row in the result set.
            $row = $result->fetch_assoc();

            $customerID = $row["customerID"];
            $stmt->close();
        }
        $conn->close();
    }
}

function fetchOrder() {
    global $customerID, $success, $errorMsg, $menu_items;
    $email = ($_SESSION['email']);
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
        $stmt = $conn->prepare("SELECT orders.orderID, orders.orderDate, orders.orderTotal, "
                . "GROUP_CONCAT(orderDetails.orderfoodID) AS foodIDs,  "
                . "GROUP_CONCAT(orderDetails.orderfoodQuantity) AS foodQuantities, "
                . "GROUP_CONCAT(orderDetails.orderfoodRequest) AS foodRequests  "
                . "FROM orders "
                . "INNER JOIN orderDetails ON orders.OrderID = orderDetails.OrderID "
                . "WHERE orders.customerID=?"
                . " GROUP BY orders.orderID");
// Bind & execute the query statement:
        $stmt->bind_param("i", $customerID);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
// Note that email field is unique, so should only have
// one row in the result set.

            $prevID = 0;

            $row = $result->fetch_assoc();
            echo "<table class='profile-table'>" .
            "<tr>" .
            "<th>OrderID</th>" .
            "<th>Food</th>" .
            "<th>Order Quantity</th>" .
            "<th>Order Total</th>" .
            "<th>Food Date</th>" .
            "</tr>";
            while ($row = $result->fetch_assoc()) {

                $foodIDs = $row['foodIDs'];
                foreach ($menu_items as $menuitem) {
                    $foodIDs = str_replace($menuitem['foodID'], $menuitem['foodName'], $foodIDs);
                }
                $foodIDs = str_replace(',', '<br>', $foodIDs);
                $foodQuantities = str_replace(',', '<br>', $row['foodQuantities']);

                echo "<tr>" .
                "<td>" . $row['orderID'] . "</td>" .
                "<td>" . $foodIDs . "</td>" .
                "<td>" . $foodQuantities . "</td>" .
                "<td>" . $row['orderTotal'] . "</td>" .
                "<td>" . $row['orderDate'] . "</td>" .
                "</tr>";
                
            }
            echo " </table>";
        }
    }
    $conn->close();
}

function getMenuID() {

    global $menu_items, $success, $errorMsg;
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
}
?>
        


