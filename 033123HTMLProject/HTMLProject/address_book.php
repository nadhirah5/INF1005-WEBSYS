<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Complete Responsive Food Website Design Tutorial</title>

        <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />

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
                <script defer
                src="https://code.jquery.com/jquery-3.4.1.min.js"
                integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
                crossorigin="anonymous">
                </script>
                Bootstrap JS
                <script defer
                src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"
                integrity="sha384-6khuMg9gaYr5AxOqhkVIODVIvm9ynTT5J4V1cfthmT+emCG6yVmEZsRHdxlotUnm"
                crossorigin="anonymous">
                </script>-->


    </head>
    <body>

        <!-- header section starts -->

        <header>

            <?php
            session_start();
            include "nav.inc.php";

            session_start();
            $dbemail = $_SESSION['email'];

            fetchCustomerID();
            fetchAddresses();

            function fetchCustomerID() {
                global $customerID, $address,$postalcode,$dbemail, $errorMsg, $success;
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
                    $stmt = $conn->prepare("SELECT customerID,address,postalcode FROM customers WHERE email=?");
                    // Bind & execute the query statement:
                    $stmt->bind_param("s", $dbemail);
                    $stmt->execute();
                    $result = $stmt->get_result();
                    if ($result->num_rows > 0) {
                    // Note that email field is unique, so should only have
                    // one row in the result set.
                        $row = $result->fetch_assoc();
                        $customerID = $row["customerID"];
                        $postalcode = $row["postalcode"];
                        $address = $row["address"];
                        $stmt->close();
                    }
                    $conn->close();
                }
            }

            // get customers' stored addresses
            function fetchAddresses() {
                global $customerID, $errorMsg, $success, $result;
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
                    $stmt = $conn->prepare("SELECT * FROM customerAddress WHERE customerID=?");
                    // Bind & execute the query statement:
                    $stmt->bind_param("s", $customerID);
                    $stmt->execute();
                    $result = $stmt->get_result();
                }
            }
            
            // function to insert new address into db 
            function addNewAddress() {
                global $customerID, $errorMsg, $success;


                // Create database connection
                $config = parse_ini_file('../../private/db-config.ini');
                $conn = new mysqli($config['servername'], $config['username'], $config['password'], $config['dbname']);

                // Check connection
                if ($conn->connect_error) {
                    $errorMsg = "Connection failed: " . $conn->connect_error;
                    $success = false;
                } else {
                    
                    // Sanitize form inputs
                     $customerAddressStreet = htmlspecialchars($_POST['street']);
                     $customerAddressPostalCode = htmlspecialchars($_POST['postalcode']);
                     
                     
                    // Prepare the statement
                    $stmt = $conn->prepare("INSERT INTO customerAddress (customerID, customerAddressStreet, customerAddressPostalCode) VALUES (?, ?, ?)");

                    // Bind & execute the query statement
                    $stmt->bind_param("sss", $customerID, $customerAddressStreet, $customerAddressPostalCode);
                    $stmt->execute();

                    $stmt->close();
                    $conn->close();

                    $success = true;
                    
                    // Redirect the user to the page where the list of addresses is displayed
                    header("Location: http://35.212.156.153/HTMLProject/address_book.php");
                    exit();
                }
            }
            
            if (isset($_POST['addaddress'])) {
                addNewAddress();
//                
            }
            
            
            // function to delete address
            function deleteAddress(){
                global $errorMsg, $success;
                // Create database connection
                $config = parse_ini_file('../../private/db-config.ini');
                $conn = new mysqli($config['servername'], $config['username'], $config['password'], $config['dbname']);

                // Check connection
                if ($conn->connect_error) {
                    $errorMsg = "Connection failed: " . $conn->connect_error;
                    $success = false;
                } else {
                
                // get AddressID
                $customerAddressID = $_POST['customerAddressID'];
                

                // Delete the address from the customerAddress database
                $stmt = $conn->prepare("DELETE FROM customerAddress WHERE customerAddressID = ?");
                // Bind & execute the query statement:
                $stmt->bind_param("s", $customerAddressID);
                $stmt->execute();

                // Redirect the user to the page where the list of addresses is displayed
                header("Location: http://35.212.156.153/HTMLProject/address_book.php");
                exit();
                }
            }
            
            function updateAddress(){
                global $errorMsg, $success;
                // Create database connection
                $config = parse_ini_file('../../private/db-config.ini');
                $conn = new mysqli($config['servername'], $config['username'], $config['password'], $config['dbname']);

                // Check connection
                if ($conn->connect_error) {
                    $errorMsg = "Connection failed: " . $conn->connect_error;
                    $success = false;
                } else {
                    
                    $customerID = $_POST['customerID'];
                $customerAddressStreet = $_POST['customeraddress'];
                $customerAddressPostalCode = $_POST['customerpostal'];
   
              
                // Delete the address from the customerAddress database
                $stmt = $conn->prepare("UPDATE customers SET address = ?, postalcode= ? WHERE customerID = ?");
                // Bind & execute the query statement:
                $stmt->bind_param("ssi", $customerAddressStreet,$customerAddressPostalCode,$customerID);
                $stmt->execute();

                // Redirect the user to the page where the list of addresses is displayed
                header("Location: http://35.212.156.153/HTMLProject/address_book.php");
                exit();
                }
            }
            
            if (isset($_POST['setAddress'])){
                
                
                updateAddress();           
            }

            
            if (isset($_POST['deleteAddress'])){
                deleteAddress();           
            }

            ?>

        </header>

        <!-- header section ends-->
        
        <!-- account title section starts  -->

        <div class="container">
            <section class="account-info" id="account-info">
                <br><br><br><br><br>
                <h3 class="sub-heading"> My Account </h3>
                <h1 class="heading"> Account Information </h1>

                <!-- account title section ends  -->

                <!-- account page navbar starts -->
                <div class='button-container2'>
                    <a href="profile.php" class="btn">Account Settings</a>
                    <a href="order_history.php" class="btn">Order History</a>
                    <a href="address_book.php" class="btn">Address Book</a>
                    <a href="preferences.php" class="btn">Preferences</a>
                </div>
                <!-- account page navbar ends -->

            </section>

        </div>


        <!-- address table section starts  -->

        <div class="container">

            <section class="particulars" id="particulars">



                <h1 class="sub-heading"> Address Book </h1>

                <?php
                if ($result->num_rows > 0) {
                    echo "<table class='profile-table'>" .
                    "<tr>" .
                    "<th>Name</th>" .
                    "<th>Street Name</th>" .
                    "<th>Postal Code</th>" .
                    "<th>Remove Address?</th>" .
                    "<th>Set as Primary </th>".
                    "</tr>";
                    while ($row = $result->fetch_assoc()) {

                        echo "<tr>";
                        if($address == $row["customerAddressStreet"] && $postalcode==$row["customerAddressPostalCode"])
                        {
                            echo "<td data-th='Name'>Primary</td>" ;
                        }
                        else
                        {
                            echo "<td data-th='Name'> </td>" ;
                        }
                        echo "<td data-th='Street Name'>" . $row["customerAddressStreet"] . "</td>" .
                        "<td data-th='Postal Code'>" . $row["customerAddressPostalCode"] . "</td>" .
                        "<td data-th='Remove Address'>" .
                        "<form method='POST' >" .
                        "<input type='hidden' name ='customerAddressID' value='" . $row["customerAddressID"] . "'>" .
                        "<button class='btn' type='submit' id='deleteAddress' name='deleteAddress'>Delete</button>" .
                        "</form>" .
                        "</td>" .
                        "<td data-th='Set as primary'>" .
                        "<form method='POST'>" .
                        "<input type='hidden' name ='customerID' value='" . $row["customerID"] . "'>" .
                        "<input type='hidden' name ='customeraddress' value='" . $row["customerAddressStreet"] . "'>" .
                        "<input type='hidden' name ='customerpostal' value='" . $row["customerAddressPostalCode"] . "'>" .
                        "<button class='btn' type='submit' id='setAddress' name='setAddress'>Set as Primary</button>" .
                        "</form>" .
                        "</td>" .        
                        "</tr>";
                    } echo "</table>";
                } else {
                    echo "<p>No data found.</p>";
                }
                ?>


            </section>
        </div>
        
        <div class="container">

            <section class="update-particulars" id="update-particulars">


                <h1 class="heading"> Add New Address </h1>

                <form method="post" id="addAddress-form">

                    <div class="inputBox">
                        <div class="input">
                            <span>your address name</span>
                            <input type="text" name="addresstype" id="addresstype" required placeholder="home, work or school?">
                        </div>
                    </div>

                    <div class="inputBox">
                        <div class="input">
                            <span>your street name</span>
                            <input type="text" name="street" id="street" required placeholder="enter your street name">
                        </div>
                    </div>

                    <div class="inputBox">
                        <div class="input">
                            <span>your postal code</span>
                            <input type="text" name="postalcode" id="postalcode" required placeholder="enter your postal code">
                        </div>
                    </div>
                    
                    <!--set as primary address-->
                 
                    <div class='button-container2'>
                        <input type="submit" value="Add Address" class="btn" name="addaddress" id="addaddress"> 
                    </div>

                </form>
            </section>

        </div>

        <!--add new address section ends-->





        <!-- footer section starts  -->

        <?php
        include "footer.inc.php";
        ?>

        <!-- footer section ends -->




        <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

        <!-- custom js file link  -->
        <script src="js/main.js"></script>

    </body>
</html>

<?php
$conn->close();
?>