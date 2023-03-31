 <?php
        
        
$email = $_POST['email'];
$pwd = $_POST['pwd'];

        $success = true;
        if (empty($_POST["email"])) {
            $errorMsg .= "Email is required.<br>";
            $success = false;
        } else {
            $email = sanitize_input($_POST["email"]);
// Additional check to make sure e-mail address is well-formed.
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errorMsg .= "Invalid email format.";
                $success = false;
            }
        }

        if (empty($_POST["pwd"])) {
            $success = false;
            $errorMsg .= "Password empty.";
        }

        $password = ($_POST['pwd']);
        $inputhashedpassword = password_hash($password, PASSWORD_DEFAULT);

        authenticateUser();

        if ($success) {
            session_start();
            $_SESSION['email'] = $dbemail;
            
            echo "<br><br><br><br><br><br><br><h1 class='heading'>Login successful!</h1>";
            echo "<h3 class='sub-heading'>Dont have an account?<a href='index.php'>Go to home page</a></h3>";
            echo "<h3 class='sub-heading'>Dont have an account?<a href='menu.php'>Go to menu</a></h3>";
            
        } else {
            echo "<h1 class='heading'>The following input errors were detected:</h1>";
            echo "<h3 class='sub-heading'>" . $errorMsg . "</h3>";
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
            global $fname, $lname, $email, $hashedpassword, $errorMsg, $success, $dbemail, $wrongpasscount, $lockedout;
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
                    $fname = $row["fname"];
                    $lname = $row["lname"];
                    $dbemail = $row["email"];
                    $hashedpassword = $row["pwd"];
                    $wrongpasscount = $row["wrongpasscount"];
                    $lockedout = $row["lockedout"];
// Check if the password matches:
                    if ($lockedout==1) {
// Don't be too specific with the error message - hackers don't
// need to know which one they got right or wrong. :)
                        
                        $errorMsg = "Account locked out, please contact administrator";
                        $success = false;
                    }
                    elseif(!password_verify($_POST["pwd"], $hashedpassword))
                    {
                        updatewrongpasscount();
                        $errorMsg = "Email not found or password doesn't match...";
                        $success = false;
                    }
                } else {
                    $errorMsg = "Email not found or password doesn't match...";
                    $success = false;
                }
                if($success)
                {
                    resetwrongpasscount();
                }
                $stmt->close();
            }
            $conn->close();
        }
        
        function updatewrongpasscount() {
            global $email, $wrongpasscount, $lockedout, $errorMsg, $success;
// Create database connection.
            $config = parse_ini_file('../../private/db-config.ini');
            $conn = new mysqli($config['servername'], $config['username'],
                    $config['password'], $config['dbname']);
// Check connection
            if ($conn->connect_error) {
                $errorMsg = "Connection failed: " . $conn->connect_error;
                $success = false;
            } else {
                $wrongpasscount +=1;
                if($wrongpasscount>=3)
                {
                    $lockedout=1;
                }
                else 
                {
                    $lockedout=0;
                }

                $stmt = $conn->prepare("UPDATE customers SET wrongpasscount = ?, lockedout = ? WHERE email = ?");
// Bind & execute the query statement:
                $stmt->bind_param("iis", $wrongpasscount, $lockedout, $email);
                if (!$stmt->execute()) {
                    $errorMsg = "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
                    $success = false;
                }
                $stmt->close();
            }
            $conn->close();
        }
        
         function resetwrongpasscount() {
            global $email, $wrongpasscount, $lockedout, $errorMsg, $success;
            $wrongpasscount=0;
            $lockedout=0;
// Create database connection.
            $config = parse_ini_file('../../private/db-config.ini');
            $conn = new mysqli($config['servername'], $config['username'],
                    $config['password'], $config['dbname']);
// Check connection
                $stmt = $conn->prepare("UPDATE customers SET wrongpasscount = ?, lockedout = ? WHERE email = ?");
// Bind & execute the query statement:
                $stmt->bind_param("iis", $wrongpasscount, $lockedout, $email);
                if (!$stmt->execute()) {
                    $errorMsg = "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
                    $success = false;
                }
                $stmt->close();
            
            $conn->close();
        }
        
       
        
        
        
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['goBack'])) {
            header("Location: http://35.212.156.153/HTMLProject/login.php");
        }

        ?>

        


