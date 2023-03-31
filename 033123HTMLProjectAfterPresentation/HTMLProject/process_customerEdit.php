<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Complete Responsive Food Website Design Tutorial</title>

        <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />

        <script 
            src="https://code.jquery.com/jquery-3.4.1.min.js"
            integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
            crossorigin="anonymous">
        </script>



        <!--    <link rel="stylesheet"
                    href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
                    integrity=
                        "sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh"
                    crossorigin="anonymous">
                
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
                <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
                <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Amatic+SC">-->



        <!-- font awesome cdn link  -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

        <!-- custom css file link  -->
        <link rel="stylesheet" href="css/main.css">


        <!--    jQuery
        -->     <script defer
                        src="https://code.jquery.com/jquery-3.4.1.min.js"
                        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
        crossorigin="anonymous"></script>


        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

        <script>
                $(document).on('click', '#updateAccount', function (event) {
                    $('#updateform').submit(function (event) {
                        event.preventDefault(); // prevent the form from submitting normally
                        
                        var customerID = $('#customerID').val();
                        var fname = $('#fname').val();
                        var lname = $('#lname').val();
                        var email = $('#email').val();
                        var dob = $('#dob').val();
                        var address = $('#address').val();
                        var postalcode = $('#postalcode').val();
                        var mobilenumber = $('#mobilenumber').val();
                        var wrongpasscount = $('#wrongpasscount').val();
                        var lockedout = $('#lockedout').val();
                        var updatepwd = $('#updatepwd').val();
                        $.ajax({
                            url: 'process_customerUpdate.php',
                            type: 'POST',
                            data: {customerID : customerID ,fname: fname, lname: lname, email: email,dob:dob,address:address,postalcode:postalcode, mobilenumber: mobilenumber,wrongpasscount:wrongpasscount,lockedout:lockedout, updatepwd: updatepwd},
                            success: function (result) {
                                $("#update-particulars").html(result);
                            },
                            error: function (xhr, status, error) {
                                console.log("Error: " + error);
                            }
                        });
                    });
                });
        </script>


    </head>
    <body>

        <!-- header section starts -->

        <header>

            <?php
            session_start();
            include "nav.inc.php";
            include "adminnav.php";
            ?>

        </header>
        <!-- dishes section starts  -->


        <br><br><br><br><br><br><br><br><br><br><br><br><br><br>
        <div class="container">
            <section class="dishes" id="menu">
                <br><br><br>
                <h1 class="heading">Edit customer details</h1>


                <?php
                $sessionfoodAdminLogin = $_SESSION['adminlogin'];

                authenticateUser();

                if ($success) {

                    showForm();
                }

                function showForm() {
                    $customerID = ($_POST['customerID']);
                    $fname = ($_POST['fname']);
                    $lname = ($_POST['lname']);
                    $email = ($_POST['email']);
                    $dob = ($_POST['dob']);
                    $address = ($_POST['address']);
                    $postalcode = ($_POST['postalcode']);
                    $mobilenumber = ($_POST['mobilenumber']);
                    $wrongpasscount = $_POST['wrongpasscount'];
                    $lockedout = $_POST['lockedout'];

                    echo "<section class='update-particulars' id='update-particulars'>" .
                    "<div class='container'>" .
                    "<form method='POST' id='updateform'>" .
                    "<input type='hidden' value='".$customerID."' name='customerID' id='customerID'>".
                    "<div class='inputBox'>" .
                    "<div class='input'>" .
                    "<span>First name</span><br>" .
                    "<input type='text' name='fname' id='fname' placeholder='Tony' value='" . $fname . "'>" .
                    "</div>" .
                    "</div>" .
                    "<div class='inputBox'>" .
                    "<div class='input'>" .
                    "<span>Last name</span><br>" .
                    "<input type='text' name='lname' id='lname' required placeholder='Tan' value='" . $lname . "'>" .
                    "</div>" .
                    "</div>" .
                    "<div class='inputBox'>" .
                    "<div class='input'>" .
                    "<span>Email</span><br>" .
                    "<input type='email' name='email' id='email' placeholder='example@gmail.com' value='" . $email . "'>" .
                    "</div>" .
                    "</div>" .
                    "<div class='inputBox'>" .
                    "<div class='input'>" .
                    "<span>Date of birth</span><br>" .
                    "<input type='date' name='dob' id='dob' value='" . $dob . "'>" .
                    "</div>" .
                    "</div>" .
                    "<div class='inputBox'>" .
                    "<div class='input'>" .
                    "<span>Address</span><br>" .
                    "<input type='text' name='address' id='address' placeholder='111 STREET 111' value='" . $address . "'>" .
                    "</div>" .
                    "</div>" .
                    "<div class='inputBox'>" .
                    "<div class='input'>" .
                    "<span>Postal Code</span><br>" .
                    "<input type='text' name='postalcode' id='postalcode' placeholder='111111' value='" . $postalcode . "'>" .
                    "</div>" .
                    "</div>" .
                    "<div class='inputBox'>" .
                    "<div class='input'>" .
                    "<span>Mobile number</span><br>" .
                    "<input type='number' name='mobilenumber' id='mobilenumber' placeholder='88888888' value='" . $mobilenumber . "'>" .
                    "</div>" .
                    "</div>" .
                    "<div class='inputBox'>" .
                    "<div class='input'>" .
                    "<span>Wrong pass Count, 0 to reset</span><br>" .
                    "<input type='text' name='wrongpasscount' id='wrongpasscount' placeholder='0 to reset' value='" . $wrongpasscount . "'>" .
                    "</div>" .
                    "</div>" .
                    "<div class='inputBox'>" .
                    "<div class='input'>" .
                    "<span>Locked Out? 1 to Lock 0 to Unlock</span><br>" .
                    "<input type='text' name='lockedout' id='lockedout' placeholder='0 to reset' value='" . $lockedout . "'>" .
                    "</div>" .
                    "</div>" .
                    "<div class='inputBox'>" .
                    "<div class='input'>" .
                    "<span>To change customer details, enter admin password</span>" .
                    "<input type='password' name='updatepwd' id='updatepwd' required placeholder='Password Verification' >" .
                    "</div>" .
                    "</div>" .
                    "<button class='btn' type='submit' id='updateAccount' name='updateAccount'>Update</button>" .
                    "</form>" .
                    "</div>" .
                    "</section>";
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
            </section> 
        </div>

        <!-- footer section starts  -->

        <?php
        include "footer.inc.php";
        ?>

        <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

        <!-- custom js file link  -->
        <script src="js/main.js"></script>

    </body>
</html>



