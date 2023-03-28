<?php

session_start();
$success = true;



fetchUserinfo();
saveOrderToPrimary();
getMenuID();
saveOrderToSecondary();

if($success)
{
    if(isset($_SESSION['cart_items']))
{
    unset($_SESSION['cart_items']);
}

echo "<div class='col-12'>".
"<h1 class='heading '>Order placed successfully!</h1>";
echo "<br><h3 class='sub-heading'> Your order ID is: ". $orderID." </h3>".
"</div>";
}
else
{
    echo "<h1 class='heading'>Error placing order, please contact Administrator</h1>";
}







function fetchUserinfo() {
    global $customerID, $address, $postalcode, $success, $errorMsg;
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
            $address = $row["address"];
            $postalcode = $row["postalcode"];
            $stmt->close();
        }
        $conn->close();
    }
}

function saveOrderToPrimary() {
    global $customerID, $datetime, $total,  $address, $postalcode, $orderID, $deliverystatus, $success, $errorMsg;

    $datetime = date('Y-m-d H:i:s');
    $total = $_POST['total'];
    $deliverystatus = "out for delivery";

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
        $stmt->bind_param("isssss", $customerID, $datetime, $total, $address, $postalcode, $deliverystatus);
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

function saveOrderToSecondary() {
    global $orderID, $menu_items,$subtotal, $success, $errorMsg;
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
                if ($menuitem['foodName'] === $cartItem['foodName']) {
                    $foodID=$menuitem['foodID'];
                    $foodQuantity =$cartItem['foodQuantity'];
                    $foodRequest = $cartItem['request'];
                    
                    $subtotal = $cartItem['foodQuantity'] * $cartItem['foodPrice'];
                    
                    $stmt = $conn->prepare("INSERT INTO orderDetails (orderID, orderfoodID, orderfoodQuantity, orderfoodRequest, orderfoodSubTotal) VALUES (?, ?, ?, ?, ?)");
                    // Bind & execute the query statement:
                    $stmt->bind_param("iisss", $orderID, $foodID, $foodQuantity,$foodRequest , $subtotal);
                    if (!$stmt->execute()) {
                        $errorMsg = "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
                        $success = false;
                    }
                    $stmt->close();
                }
            }
        }
    }
    $conn->close();
}
?>




