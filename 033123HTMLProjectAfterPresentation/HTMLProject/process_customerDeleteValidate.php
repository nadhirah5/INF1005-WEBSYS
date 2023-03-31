<?php

session_start();

authenticateUser();

if ($success) {


 DeletefromCustomerDB();
 
 if($success)
 {
     echo "<h1 class='heading'>Deletedsuccessfuly</h1>";
     echo "<h3 class='sub-heading'><a href='admincustomer.php'>Back to customer table</a></h3>";
     
 }

   
    
}

function DeletefromCustomerDB() {
    $customerID = ($_POST['customerID']);
    
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

     $stmt = $conn->prepare("DELETE FROM customers WHERE customerID = ?");
    $stmt->bind_param("i",$customerID);
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
            $success=true;
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
                    }
                    elseif($lockout==1)
                    {
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

?>
