
<?php

$fname = sanitize_input(($_POST['fname']));
$lname = sanitize_input(($_POST['lname']));
$dob = ($_POST['dob']);
$address = sanitize_input(($_POST['address']));
$postalcode = sanitize_input(($_POST['postalcode']));
$mobileNumber = sanitize_input(($_POST['mobileNumber']));
$pwd = ($_POST['pwd']);
$pwd_confirm = ($_POST['pwd_confirm']);

$success = true;
if (empty($_POST["email"])) {
    $errorMsg .= "Email is required.<br>";
    $success = false;
} else {
    $email = sanitize_email($_POST["email"]);
// Additional check to make sure e-mail address is well-formed.
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errorMsg = "Invalid email format.";
        $success = false;
    }
}

if ($pwd == $pwd_confirm) {
    $hashedpassword = password_hash($pwd, PASSWORD_DEFAULT);
} else {
    $success = false;
    $errorMsg = "Password mismatch.";
}


if ($success) {
    echo "<br><br><br><br><br><br><br><br><div class='container'>";
    echo "<h1 class='heading'>Registration successful!</h1>";
    echo "<h3 class='sub-heading'>Email: " . $email . "</h3>";
    echo "</div>";
    saveMemberToDB();
    fetchNewCustomerID();
    saveAddresstoAddressBook();
} else {

    echo "<br><br><br><br><br><br><br><br><div class='container'>";
    echo "<h1 class='heading'>The following input errors were detected:</h1>";
    echo "<h3 class='sub-heading'>Email: " . $errorMsg . "</h3>";
    echo "</div>";
}

//Helper function that checks input for malicious or unwanted content.
function sanitize_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    $data = preg_replace('/[^a-zA-Z0-9\s]/', '', $data);
    return $data;
}

function sanitize_email($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function saveMemberToDB() {
    global $fname, $lname, $email, $hashedpassword, $dob, $address, $postalcode, $mobileNumber, $errorMsg, $success;
    $wrongpasscount = 0;
    $lockedout = 0;
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
        $stmt = $conn->prepare("INSERT INTO customers (fname, lname, email, pwd, dob ,address , postalcode , mobilenumber , wrongpasscount , lockedout) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
// Bind & execute the query statement:
        $stmt->bind_param("ssssssssii", $fname, $lname, $email, $hashedpassword, $dob, $address, $postalcode, $mobileNumber, $wrongpasscount, $lockedout);
        if (!$stmt->execute()) {
            $errorMsg = "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
            $success = false;
        }
        $stmt->close();
    }
    $conn->close();
}

function fetchNewCustomerID() {
    global $customerID, $email, $errorMsg, $success;
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

function saveAddresstoAddressBook() {
    global $address, $postalcode, $customerID, $errorMsg, $success;
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
        $stmt = $conn->prepare("INSERT INTO customerAddress (customerID, customerAddressStreet , customerAddressPostalCode) VALUES (?, ?, ?)");
// Bind & execute the query statement:
        $stmt->bind_param("iss", $customerID, $address, $postalcode);
        if (!$stmt->execute()) {
            $errorMsg = "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
            $success = false;
        }
        $stmt->close();
    }
    $conn->close();
}
?>




