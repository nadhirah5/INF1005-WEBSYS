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
        <!--home section starts-->
<div class="container">
    <section class="home" id="home">

            <h3 class="sub-heading"> Wackdonalds </h3>
        <h1 class="heading"> It's not copyright if it tastes better 🙂 </h1>

            <div class="slideshow-container">

            <div class="mySlides fade">
<!--              <div class="numbertext">1 / 3</div>-->
              <img src="images/mariowacdonald.jpg" style="width:100%" alt="">
              <div class="text">Welcome to Wacdonalds!</div>
            </div>

            <div class="mySlides fade">
<!--              <div class="numbertext">2 / 3</div>-->
              <img src="images/kobeniwacdonald.jpg" style="width:100%" alt="">
              <div class="text">Our service is terrible</div>
            </div>

            <div class="mySlides fade">
<!--              <div class="numbertext">3 / 3</div>-->
              <img src="images/wacranma.png" style="width:100%" alt="">
              <div class="text">But we know you'll be back ;)</div>
            </div>

            </div>
            <br>

            <div style="text-align:center">
              <span class="dot"></span> 
              <span class="dot"></span> 
              <span class="dot"></span> 
            </div> 
    </section>
</div>
    <!--home section ends-->


        <!-- dishes section starts  -->

        <div class="container">

            <section class="dishes" id="dishes">

                <h3 class="sub-heading"> our dishes </h3>
                <h1 class="heading"> (un)popular dishes </h1>

                <div class="box-container" id="menu-container">

                   <!--                insert menu here-->

                </div>   
            </section> 
 

        </div>
        
        <div class="container">
    <section class="menuoption" id="menuoption">
        <h1 class="heading"> Menu Options </h1>

        <div class="box-container">

            <div class="box">
                <img src="images/menufood2.jpg" alt="">
                <h3>Food</h3>
                <a href="menu.php#food-container" class="btn">Go to Food Section</a>
            </div>

            <div class="box">
                <img src="images/menudrink.jpg" alt="">
                <h3>Drinks</h3>
                <a href="menu.php#drink-container" class="btn">Go to Drinks Section</a>
            </div>

            <div class="box">
                <img src="images/menudessert.jpg" alt="">
                <h3>Dessert</h3>
                <a href="menu.php#desert-container" class="btn">Go to Dessert Section</a>
            </div>
        </div>
       </section> 
</div>
<!-- menu option end -->
        
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
                <a href="aboutus.php" class="btn">learn more</a>
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