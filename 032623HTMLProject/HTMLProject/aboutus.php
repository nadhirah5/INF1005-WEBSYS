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
                        crossorigin="anonymous">
                            
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        
                

        
        <script>
            $(document).ready(function () {
                            $.ajax({
                                url: "process_IndexReview.php",
                                type: "GET",
                                success: function (result) {
                                        $("#review-container").html(result);
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

            <section class="review" id="review-container">

                <h3 class="sub-heading"> customer's review </h3>
                <h1 class="heading"> what they said </h1>

                
    
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