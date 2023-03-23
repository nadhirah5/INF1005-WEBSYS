<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Wackdonalds</title>

        <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />



        <!--  <link rel="stylesheet"
                    href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
                    integrity=
                        "sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh"
                    crossorigin="anonymous">
                
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
                <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
                <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Amatic+SC"> -->



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
            

            fetchReview();

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
            ?>

        </header>


        <div class="container">

            <section class="contact" id="contact">

                <br><br><br><br> 

                <h3 class="sub-heading"> Contact us </h3>
                <h1 class="heading"> We won't guarantee we'll reply you bc we don't care </h1>

                <form action="">

                    <div class="inputBox">
                        <div class="input">
                            <span>your name</span>
                            <input type="text" placeholder="enter your name">
                        </div>
                    </div>

                    <div class="inputBox">

                        <div class="input">
                            <span>your number</span>
                            <input type="number" placeholder="enter your number">
                        </div>
                    </div>


                    <div class="inputBox">

                        <div class="input">
                            <span>email</span>
                            <input type="text" placeholder="enter your email">
                        </div>
                    </div>

                    <div class="inputBox">
                        <div class="input">
                            <span>your message</span>
                            <textarea name="" placeholder="enter your message" id="" cols="30" rows="10"></textarea>
                        </div>
                    </div>

                    <input type="submit" value="Submit" class="btn"> 
                    <!--value="Order now"-->
                </form>
            </section>

        </div>

        <!-- order section ends -->





        <!-- review section starts  -->

        <div class="container">

            <section class="review" id="review">

                <h3 class="sub-heading"> customer's review </h3>
                <h1 class="heading"> what they said </h1>

                <?php
                $starcount = 0;
                if ($result->num_rows > 0) {

                    while ($row = $result->fetch_assoc()) {

                        if ($row["orderReviewApproval"] == 1) {
                            fetchUserinfo($row["customerID"]);
                            echo "<div class='swiper review-slider'>" .
                            "<div class='swiper-wrapper'>" .
                            "<div class='swiper-slide slide'>" .
                            "<i class='fas fa-quote-right'></i>" .
                            "<div class='user'>" .
                            "<img src='images/pet.jpg' alt='profile picture'>" .
                            "<div class='user-info'>" .
                            "<h3>" . $reviewfname . " " . $reviewlname . "</h3>" .
                            "<div class='stars'>";
                            while ($starcount < $row["orderReviewRating"]) {
                                echo "<i class='fas fa-star'></i>";
                                $starcount += 1;
                            }
                            $starcount=0;
                            
                            echo "</div>" .
                            "</div>" .
                            "</div>" .
                            "<p>" . $row["orderReviewContent"] . "</p>" .
                            "</div>" .
                            "</div>" .
                            "<div class='swiper-pagination'></div>" .
                            "</div>";
                        }
                    }
                } else {
                    echo "<p>No data found.</p>";
                }
                $conn->close();
                ?>
    
            </section>

        </div>

        <!-- review section ends -->





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