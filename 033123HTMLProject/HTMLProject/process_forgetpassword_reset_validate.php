<?php

global $email, $emailwithasterisk, $token;
$email = ($_GET['email']);
$emailwithasterisk = str_replace('-', '@', $email);
$token = ($_GET['token']);

$success = true;
retrieveToken();
cmpTokenChkDate();
if ($success) {
    echo "<div class='container'>" .
    "<section class='update-particulars' id='update-particulars'>" .
    "<br><br><br><br><br><br><br><br><br>" .
    "<h1 class='heading'> Reset Password </h1>" .
    "<form method='post' id='forgetpassword-reset-form'>" .
    "<input type='hidden' name='formemail' id='formemail' required value='".$email."'>" .
    "<input type='hidden' name='formtoken' id='formtoken' required value='".$token."'>" .
    "<div class='inputBox'>" .
    "<div class='input'>" .
    "<span>Password</span>" .
    "<input type='password' name='pwd' id='pwd' required placeholder='Password'>" .
    "</div>" .
    "</div>" .
    "<div class='inputBox'>" .
    "<div class='input'>" .
    "<span>Confirm Password</span>" .
    "<input type='password' name='pwd_confirm' id='pwd_confirm' required placeholder='Password'>" .
    "</div>" .
    "</div>" .
    "<button class='btn' type='submit' id='resetpw' name='resetpw'>Reset Password</button>" .
    "</form>".
    "</section>".
    "</div>";
} else {
    $errorMsg = "Invalid credentials or link has expired, please reset your password again";
    echo "<br><br><br><br><br><br><br><br><div class='container'>";
    echo "<h1 class='heading'>The following input errors were detected:</h1>";
    echo "<h3 class='sub-heading'>" . $errorMsg . "</h3>";
    echo "</div>";
}

function retrieveToken() {
    global $email, $dbToken, $tokenDate, $datetime, $emailwithasterisk, $success, $errorMsg;

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
        $stmt = $conn->prepare("SELECT token, tokenDate FROM customers WHERE email=?");
        $stmt->bind_param("s", $emailwithasterisk);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
// Note that email field is unique, so should only have
// one row in the result set.
            $row = $result->fetch_assoc();
            $dbToken = $row["token"];
            $tokenDate = $row["tokenDate"];
            $stmt->close();
        }
        $conn->close();
    }
}

function cmpTokenChkDate() {
    global $dbToken, $tokenDate, $token, $success, $errorMsg;

    $dbdateTime = strtotime($tokenDate);
    $currentdatetime = time();
    $expiredateTime = strtotime('+1 hour', $dbdateTime);

    if ($currentdatetime > $expiredateTime) {
        $errorMsg = "Invalid credentials or link has expired, please reset your password again";
        $success = false;
    } elseif ($token != $dbToken) {
        $errorMsg = "Invalid credentials or link has expired, please reset your password again";
        $success = false;
    }
}

?>
