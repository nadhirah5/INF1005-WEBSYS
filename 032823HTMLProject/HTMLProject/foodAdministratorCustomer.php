<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

<html lang="en">
    <!--    place all javascript/css links here-->
    <head>
        <title>Wackdonalds</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet"
              href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
              integrity=
              "sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh"
              crossorigin="anonymous">

        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Amatic+SC">


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
    </head>


    <body>

        <?php
        include "nav.inc.php";

        session_start();
        $sessionfoodAdminLogin = $_SESSION['adminlogin'];
        authenticateUser();

        if ($success) {
            fetchCustomer();
        }


        function fetchCustomer() {
            global $foodID, $foodName, $foodPrice, $foodPicture, $errorMsg, $success, $result;
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
                $stmt = $conn->prepare("SELECT customerID,fname,lname,email,dob,address,mobilenumber,wrongpasscount,lockedout FROM menu");
// Bind & execute the query statement:
                $stmt->execute();
                $result = $stmt->get_result();
            }
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

        //Add new menu
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['addNewMenu'])) {

            $foodName = ($_POST['foodName']);
            $foodPrice = ($_POST['foodPrice']);
            $foodDescription = ($_POST['foodDescription']);

            if (isset($_FILES['foodPicture'])) {
                $file = $_FILES['foodPicture'];
                if ($file['error'] === UPLOAD_ERR_OK) {
                    $name = $file['name'];
                    $tmp_name = $file['tmp_name'];
                    $uploads_dir = '/var/www/html/HTMLProject/images/';
                    move_uploaded_file($tmp_name, $uploads_dir . $name);

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
                        $stmt = $conn->prepare("INSERT INTO menu (foodName, foodPrice, foodPicture, foodDescription) VALUES (?, ?, ?, ?)");
                        $stmt->bind_param("ssss", $foodName, $foodPrice, $name, $foodDescription);
                        if (!$stmt->execute()) {
                            $errorMsg = "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
                            $success = false;
                        }
                        $stmt->close();
                    }

                    $conn->close();
                    header("Location: http://35.212.156.153/HTMLProject/foodAdministratorMenu.php");
                } else {
                    echo "Error uploading file.";
                }
            } else {
                echo "No file uploaded.";
            }
        }

        //Update  menu
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['updateMenuToDB'])) {

            $foodName = ($_POST['foodName']);
            $foodPrice = ($_POST['foodPrice']);
            $foodDescription = ($_POST['foodDescription']);
            $foodID = ($_POST['foodID']);

            if (isset($_FILES['foodPicture'])) {
                $file = $_FILES['foodPicture'];
                if ($file['error'] === UPLOAD_ERR_OK) {
                    $name = $file['name'];
                    $tmp_name = $file['tmp_name'];
                    $uploads_dir = '/var/www/html/HTMLProject/images/';
                    move_uploaded_file($tmp_name, $uploads_dir . $name);

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
                        $stmt = $conn->prepare("UPDATE menu SET foodName = ?, foodPrice = ?, foodPicture = ?, foodDescription = ? WHERE foodID = ? ");
                        $stmt->bind_param("sssss", $foodName, $foodPrice, $name, $foodDescription, $foodID);
                        if (!$stmt->execute()) {
                            $errorMsg = "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
                            $success = false;
                        }
                        $stmt->close();
                    }

                    $conn->close();
                    header("Location: http://35.212.156.153/HTMLProject/foodAdministratorMenu.php");
                } else {
                    echo "Error uploading file.";
                }
            } else {
                echo "No file uploaded.";
            }
        }
        
        //Delete Menu Item
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['deleteMenuToDB'])) {
            
            $foodID = ($_POST['foodID']);
        
            global $customerID, $editemail, $hashedpassword,   $errorMsg, $success;
// Create database connection.
            $config = parse_ini_file('../../private/db-config.ini');
            $conn = new mysqli($config['servername'], $config['username'],
                    $config['password'], $config['dbname']);
// Check connection
            if ($conn->connect_error) {
                $errorMsg = "Connection failed: " . $conn->connect_error;
                $success = false;
            } else {
                $stmt = $conn->prepare("DELETE FROM menu WHERE foodID = ?");
// Bind & execute the query statement:
                $stmt->bind_param("s", $foodID);
            }
            if (!$stmt->execute()) {
                $errorMsg = "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
                $success = false;
            }
            $stmt->close();

            $conn->close();
            header("Location: http://35.212.156.153/HTMLProject/foodAdministratorMenu.php");
        }
        ?>


        <!--    ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~   Header   ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->

        <header class="header">

            
            <script>
                    let slideIndex = 1;
                    showSlides(slideIndex);

                    function plusSlides(n) {
                        showSlides(slideIndex += n);
                    }

                    function currentSlide(n) {
                        showSlides(slideIndex = n);
                    }

                    function showSlides(n) {
                        let i;
                        let slides = document.getElementsByClassName("mySlides");
                        let dots = document.getElementsByClassName("dot");
                        if (n > slides.length) {
                            slideIndex = 1;
                        }
                        if (n < 1) {
                            slideIndex = slides.length;
                        }
                        for (i = 0; i < slides.length; i++) {
                            slides[i].style.display = "none";
                        }
                        for (i = 0; i < dots.length; i++) {
                            dots[i].className = dots[i].className.replace(" active", "");
                        }
                        slides[slideIndex - 1].style.display = "block";
                        dots[slideIndex - 1].className += " active";

                    }

                    function convertToForm(foodid, foodname, foodprice, foodDescription, element) {
                        //make Delete button dissapear
                        document.getElementById("DELETEMENU").style.display = "none";
                        
                        // Create a new form element
                        var form = document.createElement("form");

                        // Set the form method and action
                        form.method = "post";
                        form.enctype = "multipart/form-data";

                        // Create a new input element
                        var image = document.createElement("input");
                        var foodID = document.createElement("input");
                        var input = document.createElement("input");
                        var input2 = document.createElement("input");
                        var input3 = document.createElement("input");
                        var br = document.createElement("br");
                        var submit = document.createElement("button");

                        // Set the input type and name

                        image.type = "file";
                        image.name = "foodPicture";
                        image.required = true;

                        foodID.type = "hidden";
                        foodID.name = "foodID";
                        foodID.value = foodid;
                        foodID.required = true;


                        input.type = "text";
                        input.name = "foodName";
                        input.value = foodname;
                        input.required = true;

                        input2.type = "text";
                        input2.name = "foodPrice";
                        input2.value = foodprice;
                        input2.required = true;

                        input3.type = "text";
                        input3.name = "foodDescription";
                        input3.value = foodDescription;
                        input3.required = true;

                        submit.name = "updateMenuToDB";
                        submit.value = "Update";
                        submit.innerText = "Update";



                        // Append the input element to the form
                        form.appendChild(image);
                        form.appendChild(foodID);
                        form.appendChild(input);
                        form.appendChild(input2);
                        form.appendChild(input3);
                        form.appendChild(br);
                        form.appendChild(submit);


                        // Replace the clicked element with the form
                        element.parentNode.replaceChild(form, element);

                        // Focus on the input element
                        input.focus();
                    }
                    
                    function convertToFormDelete(foodid, element) {
                        //make Update button dissapear
                        document.getElementById("UPDATEMENU").style.display = "none";
                        
                        // Create a new form element
                        var form = document.createElement("form");

                        // Set the form method and action
                        form.method = "post";

                        // Create a new input element
                        var foodID = document.createElement("input");
                        var checkboxtext = document.createElement("label");
                        var checkbox = document.createElement("input");
                        var br = document.createElement("br");
                        var submit = document.createElement("button");

                        // Set the input type and name

                        foodID.type = "hidden";
                        foodID.name = "foodID";
                        foodID.value = foodid;
                        foodID.required = true;
                        
                        checkboxtext.innerText="Confirm deletion from menu";
                        
                        checkbox.type="checkbox";
                        checkbox.name="checkbox";
                        checkbox.required = true;


                        submit.name = "deleteMenuToDB";
                        submit.value = "Delete";
                        submit.innerText = "Delete";



                        // Append the input element to the form
                        form.appendChild(foodID);
                        form.appendChild(checkboxtext);
                        form.appendChild(br);
                        form.appendChild(checkbox);
                        form.appendChild(br);
                        form.appendChild(submit);


                        // Replace the clicked element with the form
                        element.parentNode.replaceChild(form, element);

                        // Focus on the input element
                        input.focus();
                    }


            </script>

        </header>

        <!--    ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~  Header Section End   ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->

        <!-- Food section row 1 -->
        <main>
<?php
if ($result->num_rows > 0) {
    echo "<table>".
    "<tr><th>ID</th><th>First Name</th><th>Last Name</th><th>email</th></tr>".
    "";
    while ($row = $result->fetch_assoc()) {

        echo "<div class='col-6 col-md-4'>" .
        "<figure>" .
        "<img class='' src='images/" . $row["foodPicture"] . "' alt='" . $row["foodDescription"] . "' style='width:100%;'>" .
        "<figcaption>" . $row["foodName"] . "</figcaption>" .
        "<p>" . $row["foodPrice"] . "</p>" .
        "<button type='button' class='btn btn-default btn-sm' id='UPDATEMENU' name='updatemenu' onclick='convertToForm(\"" . $row["foodID"] . "\", \"" . $row["foodName"] . "\",  \"" . $row["foodPrice"] . "\", \"" . $row["foodDescription"] . "\", this)'>" .
        "<span class='glyphicon glyphicon-shopping-cart'>Update</span>" .
        "</button>" .
        "<button type='button' class='btn btn-default btn-sm' id='DELETEMENU' name='deletemenu'  onclick='convertToFormDelete(\"" . $row["foodID"] . "\", this)'>" .
        "<span class='glyphicon glyphicon-shopping-cart'>Delete</span>" .
        "</button>" .
        "</figure>" .
        "</div>";
    }
    echo "</table>" ;
    
} else {
    echo "<p>No data found.</p>";
}



$conn->close();
?>




            <!--            <label>Add new Food</label>
                        <form method="post" enctype="multipart/form-data">
                            <input type="file" name="foodPicture">
                            <input type="text" name="foodName">
                            <input type="text" name="foodPrice">
                            <input type="text" name="foodDescription">
                            <input type="submit" value="Upload" name="addNewMenu">
                        </form>-->




            <!-- drink sec row 1 end -->


<?php
include "footer.inc.php";
?>


        </main>

    </body>

</html>
