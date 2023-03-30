<html>
    <header>  
        <link rel="stylesheet"
              href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
              integrity=
              "sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh"
              crossorigin="anonymous">

        <link rel="stylesheet" href="css/main.css">

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

        <!-- Custom JS -->
        <script defer src="js/main.js"></script>

        <?php
        include "nav.inc.php";

        $success = true;
        if (empty($_POST['foodAdminLogin'])) {
            $errorMsg .= "Login is required.<br>";
            $success = false;
        } else {
            $foodAdminLogin = sanitize_input(($_POST['foodAdminLogin']));
// Additional check to make sure e-mail address is well-formed.
        }

        if (empty($_POST["pwd"])) {
            $success = false;
            $errorMsg .= "Password empty.";
        }
        
        authenticateUser();

        if ($success) {
            session_start();
            $_SESSION['adminlogin'] = $foodAdminLogin;
            
            header("Location: http://35.212.156.153/HTMLProject/adminhub.php");
            
            
        } else {
            lockoutAdmin();
            echo "<h4>The following input errors were detected:</h4>";
            echo "<p>" . $errorMsg . "</p>";
            echo "<form method='post'>" . 
            "<div class='form-group'>".
            "<button class='btn btn-primary' type='submit' name='goBack'>Back</button>".
            "</div>".
            "</form>";
        }

//Helper function that checks input for malicious or unwanted content.
        function sanitize_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        function authenticateUser() {
            global $foodAdminLogin, $hashedpassword, $lockout,$errorMsg, $success;
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
                $stmt->bind_param("s", $foodAdminLogin);
                $stmt->execute();
                $result = $stmt->get_result();
                if ($result->num_rows > 0) {
// Note that email field is unique, so should only have
// one row in the result set.
                    $row = $result->fetch_assoc();
                    $lockout = $row["lockout"];
                    $hashedpassword = $row["foodAdminPassword"];
// Check if the password matches:
                    if (!password_verify($_POST["pwd"], $hashedpassword)) {
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
        
        function lockoutAdmin() {
            global  $foodAdminLogin, $errorMsg, $success;
            $lockout=1;
// Create database connection.
            $config = parse_ini_file('../../private/db-config.ini');
            $conn = new mysqli($config['servername'], $config['username'],
                    $config['password'], $config['dbname']);
// Check connection
            if ($conn->connect_error) {
                $errorMsg = "Connection failed: " . $conn->connect_error;
                $success = false;
            } else {

                $stmt = $conn->prepare("UPDATE foodAdmin SET lockout = ? WHERE foodAdminLogin = ?");
// Bind & execute the query statement:
                $stmt->bind_param("ss", $lockout, $foodAdminLogin);
                if (!$stmt->execute()) {
                    $errorMsg = "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
                    $success = false;
                }
                $stmt->close();
            }
            $conn->close();
        }
        
        
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['goBack'])) {
            header("Location: http://35.212.156.153/HTMLProject/login.php");
        }

        ?>

        






    </header>
</html>


