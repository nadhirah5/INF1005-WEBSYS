
<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Other/html.html to edit this template
-->
<html>
    <head>
        <title>INF1005 Project</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet"
              href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
              integrity=
              "sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh"
              crossorigin="anonymous">
        <!--jQuery-->
        <script defer
                src="https://code.jquery.com/jquery-3.4.1.min.js"
                integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
                crossorigin="anonymous">
        </script>
        <!--Bootstrap JS-->
        <script defer
                src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"
                integrity="sha384-6khuMg9gaYr5AxOqhkVIODVIvm9ynTT5J4V1cfthmT+emCG6yVmEZsRHdxlotUnm"
                crossorigin="anonymous">
        </script>

        <link rel="stylesheet" href="css/main.css">
        <script defer src="js/main.js"></script>
    </head>

    <body>
        <?php
        include "nav.inc.php";

        session_start();
        $sessionfoodAdminLogin = $_SESSION['adminlogin'];
        authenticateUser();

        if ($success) {
            fetchReview();
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
                $conn->close();
            }
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['showorhide'])) {


            global $orderReviewID, $orderReviewApproval, $errorMsg, $success;
            $orderReviewID = $_POST['orderReviewID'];
            $orderReviewApproval = $_POST['orderReviewApproval'];

            if ($orderReviewApproval == 1) {
                $orderReviewApproval = 0;
            } elseif ($orderReviewApproval == 0) {
                $orderReviewApproval = 1;
            }

// Create database connection.
            $config = parse_ini_file('../../private/db-config.ini');
            $conn = new mysqli($config['servername'], $config['username'],
                    $config['password'], $config['dbname']);
// Check connection
            if ($conn->connect_error) {
                $errorMsg = "Connection failed: " . $conn->connect_error;
                $success = false;
            } else {

                $stmt = $conn->prepare("UPDATE orderReview SET orderReviewApproval = ? WHERE orderReviewID = ?");
// Bind & execute the query statement:
                $stmt->bind_param("ss", $orderReviewApproval, $orderReviewID);
                if (!$stmt->execute()) {
                    $errorMsg = "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
                    $success = false;
                }
                $stmt->close();
            }
            $conn->close();
            header("Location: http://35.212.156.153/HTMLProject/foodAdministratorReview.php");
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['deletereview'])) {


            global $orderReviewID, $orderReviewApproval, $errorMsg, $success;
            $orderReviewID = $_POST['orderReviewID'];
            $orderReviewApproval = $_POST['orderReviewApproval'];

            if ($orderReviewApproval == 1) {
                $orderReviewApproval = 0;
            } elseif ($orderReviewApproval == 0) {
                $orderReviewApproval = 1;
            }

// Create database connection.
            $config = parse_ini_file('../../private/db-config.ini');
            $conn = new mysqli($config['servername'], $config['username'],
                    $config['password'], $config['dbname']);
// Check connection
            if ($conn->connect_error) {
                $errorMsg = "Connection failed: " . $conn->connect_error;
                $success = false;
            } else {

                $stmt = $conn->prepare("DELETE FROM orderReview WHERE orderReviewID = ?");
// Bind & execute the query statement:
                $stmt->bind_param("s", $orderReviewID);
                if (!$stmt->execute()) {
                    $errorMsg = "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
                    $success = false;
                }
                $stmt->close();
            }
            $conn->close();
            header("Location: http://35.212.156.153/HTMLProject/foodAdministratorReview.php");
        }
        ?>
        <main>
            <h4>Food reviews</h4>
<?php
if ($result->num_rows > 0) {
    echo "<div class='row'>";
    while ($row = $result->fetch_assoc()) {
        fetchUserinfo($row["customerID"]);

        echo "<div class='col-6 col-md-4'>" .
        "<p>" . $reviewfname . " " . $reviewlname . "</p><br>" .
        "<p>" . $row["orderReviewContent"] . "</p>" .
        "<p>" . $row["orderReviewRating"] . "/5" . "</p>" .
        "<p>" . $row["orderReviewApproval"] . "</p>" .
        "<form method='post'>" .
        "<input type='hidden' name='orderReviewID' required value='" . $row["orderReviewID"] . "'>" .
        "<input type='hidden' name='orderReviewApproval' required value='" . $row["orderReviewApproval"] . "'>" .
        "<input type='submit' value='Show/Hide' name='showorhide'>" .
        "</form>" .
        "<form method='post'>" .
        "<input type='hidden' name='orderReviewID' required value='" . $row["orderReviewID"] . "'>" .
        "<input type='hidden' name='orderReviewApproval' required value='" . $row["orderReviewApproval"] . "'>" .
        "<input type='submit' value='Delete' name='deletereview'>" .
        "</form>";
    }
    echo "</div>";
} else {
    echo "<p>No data found.</p>";
}
$conn->close();
?>
        </main>
        <hr class="solid">
<?php
include "footer.inc.php";
?>
    </body>
</html>