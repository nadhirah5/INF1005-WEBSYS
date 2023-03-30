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

        <!--
        Bootstrap JS
        <script defer
        src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"
        integrity="sha384-6khuMg9gaYr5AxOqhkVIODVIvm9ynTT5J4V1cfthmT+emCG6yVmEZsRHdxlotUnm"
        crossorigin="anonymous">
        </script>-->



<!--
       Load menu and review via AJAX-->
       <script>
           $(document).ready(function () {
                            $.ajax({
                                url: "process_IndexMenu.php",
                                type: "GET",
                                success: function (result) {
                                        $("#menu-container").html(result);
                                },
                                error: function (xhr, status, error) {
                                    console.log("Error: " + error);
                                }
                            });
                        });
                        
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

        <!-- header section ends-->

        <!-- search form  -->

        <!--<form action="" id="search-form">
            <input type="search" placeholder="search here..." name="" id="search-box">
            <label for="search-box" class="fas fa-search"></label>
            <i class="fas fa-times" id="close"></i>
        </form>-->






        <!-- home section starts  -->
        <div class="container">

            <section class="home" id="home">


                <div class="swiper home-slider">

                    <div class="swiper-wrapper">

                        <div class="swiper-slide slide">
                            <div class="content">
                                <!--<span>Welcome</span>-->
                                <h3>Welcome to Wackdonalds!</h3>
                                <h2>It's not copyright if it tastes better :)</h2>
                                <!--<p>Welcome to Wacdonalds!</p>-->
                                <a href="menu.php" class="btn">order now</a>
                            </div>
                            <div class="image">
                                <img src="images/mariowacdonald.jpg" alt = ""> <!--class="center"-->
                            </div>
                        </div>

                        <div class="swiper-slide slide">
                            <div class="content">
                                <!--<span>our special dish</span>-->
                                <h3>Our service is terrible</h3>
                                <!--<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit natus dolor cumque?</p>-->
                                <a href="#" class="btn">order now</a>
                            </div>
                            <div class="image">
                                <img src="images/kobeniwacdonald.jpg"  alt="" > <!--class="center"-->

                            </div>
                        </div>

                        <div class="swiper-slide slide">
                            <div class="content">
                                <!--<span>our special dish</span>-->
                                <h3>But we know you'll be back ;)</h3>
                                <!--<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit natus dolor cumque?</p>-->
                                <a href="#" class="btn">order now</a>
                            </div>
                            <div class="image">
                                <img src="images/wacdonaldresized.jpg" alt="">
                            </div>
                        </div>

                    </div>

                    <div class="swiper-pagination"></div>

                </div>

            </section>

        </div>

        <!-- home section ends -->

        <!-- dishes section starts  -->

        <div class="container">

            <section class="dishes" id="dishes">

                <h3 class="sub-heading"> our dishes </h3>
                <h1 class="heading"> (un)popular dishes </h1>

                <div class="box-container" id="menu-container">

                   <!--                insert menu here-->

                </div>   
            </section> 

<!--    <section>
<h3 class="sub-heading"> our dishes </h3>
<h1 class="heading"> Limited time dishes </h1>
</section>  -->


        </div>
        
        <div class="container">

    <section class="about" id="about">

        <h3 class="sub-heading"> about us </h3>
        <h1 class="heading"> why choose us? </h1>
    
        <div class="row">
    
            <div class="image">
                <img src="images/wacdonaldresized.jpg" alt=""> <!--resize this image-->
            </div>
    
            <div class="content">
                <h3>"best" food in the country</h3>
                <p>It's cheap, it's convenient, and it's just one stop away from a heart attack. We just know you'll love it.</p>                
                <div class="icons-container">
                    <div class="icons">
                        <i class="fas fa-shipping-fast"></i>
                        <span>free delivery</span>
                    </div>
                    <div class="icons">
                        <i class="fas fa-dollar-sign"></i>
                        <span>easy payments</span>
                    </div>
                    <div class="icons">
                        <i class="fas fa-headset"></i>
                        <span>24/7 service</span>
                    </div>
                </div>
                <a href="aboutus.html" class="btn">learn more</a>
            </div>
    
        </div>
    
    </section>

</div>

        

        <!-- customer review  -->


        <div class="container">

            <section class="review" id="review-container">

                <h3 class="sub-heading"> customer's review </h3>
                <h1 class="heading"> what they said </h1>

<!--                insert review here-->
            </section>

        </div>


        <!-- customer review end  -->



        <!-- footer section starts  -->

        <?php
        include "footer.inc.php";
        ?>

        <!-- footer section ends -->

        <!-- loader part  -->
        <!-- <div class="loader-container">
            <img src="images/loader.gif" alt="">
        </div> -->



        <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

        <!-- custom js file link  -->
        <script src="js/main.js"></script>

    </body>
</html>

<?php
$conn->close();
?>