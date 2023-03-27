<?php
session_start();
$success = true;
$email = ($_POST['email']);


fetchUserinfo();

$_SESSION['customerID'] = $customerID;

function fetchUserinfo() {
    global $customerID, $email, $editfname, $editlname, $editemail, $hashedpassword, $editdob, $editaddress, $editmobilenumber, $errorMsg, $success, $dbemail;
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
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
// Note that email field is unique, so should only have
// one row in the result set.
            $row = $result->fetch_assoc();
            
            $customerID = $row["customerID"];
            echo "<div class='container'>".
            "<section class='particulars' id='particulars'>".
            "<h1 class='sub-heading'> Your saved particulars: </h1>".
            "<table class='profile-table'>".
            "<tr>".
            "<th>First Name</th>".
            "<th>Last Name</th>".
            "<th>Email</th>".
            "<th>Phone Number</th>".
            "<th>Date of Birth</th>".
            "</tr>".
            "<tr>".
            "<td data-th='First Name'>". $row["fname"] ."</td>".
            "<td data-th='Last Name'>". $row["lname"] ."</td>".
            "<td data-th='Email'>". $row["email"] ."</td>".
            "<td data-th='Mobile Number'>". $row["mobilenumber"] ."</td>".
            "<td data-th='Date of birth'>". $row["dob"] ."</td>".
            "</tr>".
            "</table>".
            "</section>".
            "</div>".
            "<div class='container'>".
            "<div class='container' id='errormsg'></div>".
            "<section class='update-particulars' id='update-particulars'>".
            "<h1 class='heading'> Update Particulars </h1>".
            "<h3 class='sub-heading'> Change the ones you wish to update </h3>".
            "<form method='POST' id='updateform'>".
            "<div class='inputBox'>".
            "<div class='input'>".
            "<span>your first name</span>".
            "<input type='text' name='fname' id='fname' placeholder='Tony' value='". $row["fname"] ."'>".
            "</div>".
            "</div>".
            "<div class='inputBox'>".
            "<div class='input'>".
            "<span>your last name</span>".
            "<input type='text' name='lname' id='lname' required placeholder='Tan' value='". $row["lname"] ."'>".
            "</div>".
            "</div>".
            "<div class='inputBox'>".
            "<div class='input'>".
            "<span>your email</span>".
            "<input type='email' name='email' id='email' placeholder='example@gmail.com' value='". $row["email"] ."'>".
            "</div>".
            "</div>".
            "<div class='inputBox'>".
            "<div class='input'>".
            "<span>your mobile number</span>".
            "<input type='tel' name='mobilenumber' id='mobilenumber' placeholder='88888888' pattern='[0-9]{8}' value='". $row["mobilenumber"] ."'>".
            "</div>".
            "</div>".
            "<div class='inputBox'>".
            "<div class='input'>".
            "<span>To change particulars, enter current password</span>".
            "<input type='password' name='updatepwd' id='updatepwd' required placeholder='Password Verification' >".
            "</div>".
            "</div>".
            "<button class='btn' type='submit' id='updateAccount' name='updateAccount'>Update</button>".
            "</form>".
            "</section>".
            "</div>";
 
   
            $stmt->close();
        }
        $conn->close();
    }
}
?>
        


