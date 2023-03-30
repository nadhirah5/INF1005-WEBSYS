<?php

session_start();
$sessionfoodAdminLogin = $_SESSION['adminlogin'];

authenticateUser();

if ($success) {

    fetchcustomertable();
}

function fetchcustomertable() {

    $foodCategory = $_GET['category'];
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
        $stmt = $conn->prepare("SELECT * FROM customers");
// Bind & execute the query statement:
        $stmt->execute();
        $result = $stmt->get_result();

        // Create an empty array to hold the menu items
        $menu_items = array();
        // Loop through each row of the result set and add it to the menu_items array

        echo "<table class='table'>".
        "<thead>".
        "<tr>".
        "<th>Customer ID</th>".
        "<th>Customer First Name</th>".
        "<th>Customer Last Name</th>".
        "<th>Customer email</th> ".
        "<th>Customer DOB</th>".
        "<th>Customer Address</th>".
        "<th>Customer Postal code</th>".
        "<th>Customer Mobile Number</th>".
        "<th>Customer Wrong Pass count</th>".
        "<th>Customer Locked out?</th>".
        "<th>Edit Customer?</th>".
        "<th>Delete Customer?</th>".
        "</tr>".
        "</thead>".
        "<tbody>";

  
        while ($row = $result->fetch_assoc()) {

             echo "<tr>" .
        "<td data-th='Food Name'>" . $row["customerID"]  . "</td>" .
        "<td data-th='First Name'>" . $row["fname"]  . "</td>" .
        "<td data-th='Last Name'>" .  $row["lname"]  . "</td>" .
        "<td data-th='Email'>" .  $row["email"]  . "</td>" .
        "<td data-th='Date of birth'>" .  $row["dob"]  . "</td>" .
        "<td data-th='Address'>" .  $row["address"]  . "</td>" .
        "<td data-th='Postal Code'>" .  $row["postalcode"]  . "</td>" .
        "<td data-th='Mobile Number'>" .  $row["mobilenumber"]  . "</td>" .
        "<td data-th='Wrongpass'>" .  $row["wrongpasscount"]  . "</td>" .
        "<td data-th='lockout'>" . $row["lockedout"] . "</td>" .
        "<td data-th='editcustmerdetails'>".
        "<form method='post' action='process_customerEdit.php'>".
        "<input type='hidden' name='customerID' value='".$row["customerID"]."'>".
        "<input type='hidden' name='fname' value='".$row["fname"]."'>".
        "<input type='hidden' name='lname' value='".$row["lname"]."'>".
        "<input type='hidden' name='email' value='".$row["email"]."'>".
        "<input type='hidden' name='dob' value='".$row["dob"]."'>".
        "<input type='hidden' name='address' value='".$row["address"]."'>".
        "<input type='hidden' name='postalcode' value='".$row["postalcode"]."'>".
        "<input type='hidden' name='mobilenumber' value='".$row["mobilenumber"]."'>".
        "<input type='hidden' name='wrongpasscount' value='".$row["wrongpasscount"]."'>".
        "<input type='hidden' name='lockedout' value='".$row["lockedout"]."'>".
        "<input class='btn' type='submit' name='editcustomer' value='Edit Customer'>".
        "</form>".
        "</td>".
        "<td>".
        "<form method='post' action='process_customerDelete.php'>".
        "<input type='hidden' name='customerID' value='".$row["customerID"]."'>".
        "<input class='btn' type='submit' name='editcustomer' value='Delete Customer'>".
        "</form>".
        "</td>".
        "</tr>";
        }
        
        echo "</tbody>".
        "</table>";



        $conn->close();
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
