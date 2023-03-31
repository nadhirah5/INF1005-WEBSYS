<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Wackdonalds</title>

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
                        crossorigin="anonymous">

            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>



        <script>
            $(document).ready(function () {

                    var email = '<?php echo $dbemail ?>';
            $.ajax({
            url: 'process_OrderFetch.php',
                    type: 'POST',
                    success: function (result) {
                    $("#orderTable").html(result);
                    },
                    error: function (xhr, status, error) {
                    console.log("Error: " + error);
                    }
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
                    $dbemail = $_SESSION['email'];
                    ?>

                </header>

                <!-- Sidebar -->
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
                        </div>
                        <!-- account page navbar ends -->

                    </section>

                </div>


                <!-- Page Content -->




                <div class="w3-container" id="orderTable">
                    <h3>Your past orders:</h3>


                </div>

                <?php
                if (isset($_SESSION['email'])) {
                    echo "<div>" .
                    "<section class='update-particulars'>" .
                    "<h1 class='heading'> Love our food? </h1>" .
                    "<h3 class='sub-heading'> Leave an review </h3>" .
                    "<form method='POST' action='process_newReview.php'>" .
                    "<div class='inputBox'>" .
                    "<div class='input'>" .
                    "<span>What you loved about us</span>" .
                    "<textarea name='orderReviewContent' id='orderReviewContent' cols='20' rows='3' required placeholder='Wow the food here is sedap!'></textarea><br>" .
                    "</div>" .
                    "</div>" .
                    "<div class='inputBox'>" .
                    "<div class='input'>" .
                    "<span>Your Rating</span>" .
                    "<select name ='rating' id='rating'>" .
                    "<option value = '1'>1</option>" .
                    "<option value = '2'>2</option>" .
                    "<option value = '3'>3</option>" .
                    "<option value = '4'>4</option>" .
                    "<option value = '5'>5</option>" .
                    "</select >" .
                    "</div>" .
                    "</div>" .
                    "<button class='btn' type='submit' id='updateAccount' name='updateAccount'>Update</button>" .
                    "</form>" .
                    "</section>" .
                    "</div>";
                }
                ?>



                <?php
                include "footer.inc.php";
                ?>

            </body>