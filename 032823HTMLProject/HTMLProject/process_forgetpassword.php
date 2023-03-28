<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

global $email;
$success = true;
$email = ($_POST['email']);
checkLockout();
retrieveDateTime();
checkDateTime();
if ($success) {
    generatetokenandlink();
    storeToken();
    sendemail();
} else {
    echo "<br><br><br><br><br><br><br><br><div class='container'>";
    echo "<h1 class='heading'>The following input errors were detected:</h1>";
    echo "<h3 class='sub-heading'>" . $errorMsg . "</h3>";
    echo "</div>";
}

function generatetokenandlink() {
    global $email, $token, $resetlink;
    $token = bin2hex(random_bytes(16)); // 16 bytes = 128 bits = 32 hex characters
    $emailwithoutasterisk = str_replace('@', '-', $email);
    $resetlink = "http://35.212.156.153/HTMLProject/forgetpassword_reset.php?email=" . urlencode($emailwithoutasterisk) . "&token=" . urlencode($token);
}

function checkLockout() {
    global $lockedout, $fname, $lname, $success, $errorMsg, $email;
    $config = parse_ini_file('../../private/db-config.ini');
    $conn = new mysqli($config['servername'], $config['username'],
            $config['password'], $config['dbname']);
// Check connection
    if ($conn->connect_error) {
        $errorMsg = "Connection failed: " . $conn->connect_error;
        $success = false;
    } else {
// Prepare the statement:
        $stmt = $conn->prepare("SELECT lockedout,fname,lname FROM customers WHERE email=?");
// Bind & execute the query statement:
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->bind_result($lockedout);
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
// Note that email field is unique, so should only have
// one row in the result set.
            $row = $result->fetch_assoc();
            $lockedout = $row["lockedout"];
            $fname = $row["fname"];
            $lname = $row["lname"];

            if ($lockedout == 1) {
                $errorMsg = "Account locked out and unable to reset password, please contact administrator";
                $success = false;
            }
            $stmt->close();
        }
        $conn->close();
    }
}

function storeToken() {
    global $email, $token, $datetime;

    $datetime = date('Y-m-d H:i:s');

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
        $stmt = $conn->prepare("UPDATE customers SET token = ?, tokenDate = ?  WHERE email = ?");
// Bind & execute the query statement:
        $stmt->bind_param("sss", $token, $datetime, $email);
        if (!$stmt->execute()) {
            $errorMsg = "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
            $success = false;
        }
        $stmt->close();
    }
    $conn->close();
}

function sendemail() {
    global $email, $resetlink;
    require 'PHPMailer-master/src/PHPMailer.php';
    require 'PHPMailer-master/src/Exception.php';
    require 'PHPMailer-master/src/SMTP.php';

    $smtp = parse_ini_file('../../private/smtp-config.ini');

    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host = 'smtp.office365.com';
    $mail->SMTPAuth = true;
    $mail->Username = $smtp['email'];
    $mail->Password = $smtp['password'];
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;
    $mail->setFrom($smtp['email'], 'Admin of GenericFood');
    $mail->addAddress($email, $fname . " " . $lname);
    $mail->Subject = 'Password reset ';
    $mail->Body = 'Hello'. $fname . " " . $lname . PHP_EOL . PHP_EOL .'Reset your email with this link: ' . $resetlink . 
            PHP_EOL . PHP_EOL . 'Regards, Admin of GenericFood';
    if (!$mail->send()) {
        echo "<br><br><br><br><br><br><br><br><div class='container'>";
        echo "<h1 class='heading'>Message could not be sent</h1>";
        echo "</div>";
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    } else {
        echo "<br><br><br><br><br><br><br><br><div class='container'>";
        echo "<h1 class='heading'>An email is sent to input address</h1>";
        echo "</div>";
    }
}

function retrieveDateTime() {
    global $email, $tokenDate, $success, $errorMsg;

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
        $stmt = $conn->prepare("SELECT tokenDate FROM customers WHERE email=?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
// Note that email field is unique, so should only have
// one row in the result set.
            $row = $result->fetch_assoc();
            $tokenDate = $row["tokenDate"];
            $stmt->close();
        }
        $conn->close();
    }
}

function checkDateTime() {
    global $tokenDate, $success, $errorMsg;

    if (is_null($tokenDate)) {
        
    } else {
        $dbdateTime = strtotime($tokenDate);
        $currentdatetime = time();
        $expiredateTime = strtotime('+1 hour', $dbdateTime);

        if ($currentdatetime < $expiredateTime) {
            $errorMsg = "Cannot issue new reset request until current expires";
            $success = false;
        }
    }
}

?>
