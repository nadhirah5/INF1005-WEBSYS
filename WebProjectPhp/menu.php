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
    ?>
      

        <!--    ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~   Header   ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->

        <header class="header">
            
            <div class="slideshow-container">

                <div class="mySlides">
                    <div class="numbertext">1 / 3</div>
                    <img src="images/food1.jpeg" style="width:100%">
                    <div class="text">Caption Text</div>
                </div>

                <div class="mySlides">
                    <div class="numbertext">2 / 3</div>
                    <img src="images/food2.jpeg" style="width:100%">
                    <div class="text">Caption Two</div>
                </div>

                <div class="mySlides">
                    <div class="numbertext">3 / 3</div>
                    <img src="images/food3.jpeg" style="width:100%">
                    <div class="text">Caption Three</div>
                </div>

                <a class="prev" onclick="plusSlides(-1)">❮</a>
                <a class="next" onclick="plusSlides(1)">❯</a>

            </div>
            <br>

            <div style="text-align:center">
                <span class="dot" onclick="currentSlide(1)"></span> 
                <span class="dot" onclick="currentSlide(2)"></span> 
                <span class="dot" onclick="currentSlide(3)"></span> 
            </div>

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
              if (n > slides.length) {slideIndex = 1;}    
              if (n < 1) {slideIndex = slides.length;}
              for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";  
              }
              for (i = 0; i < dots.length; i++) {
                dots[i].className = dots[i].className.replace(" active", "");
              }
              slides[slideIndex-1].style.display = "block";  
              dots[slideIndex-1].className += " active";
            }
            </script>
<!--            <figure>
                <img class="img-thumbnail" src="images/burger.jpg" alt="Burger">
                <br>
            </figure>-->


        </header>

        <!--    ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~  Header Section End   ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->

        <!-- slider section start -->

        


        <!-- slider section end -->


        <!-- Food section row 1 -->
        <main>
            <section id="food">
                <div class= "menu_h2">Burgers</div>
                <div class="food_row">
                    <div class="menu_column">
                        <figure>
                            <img class = "" src="images/burger.png" alt="food1" style="width:100%">
                            <figcaption>Samurai Burger</figcaption> 
                        </figure>
                                <button type="button" class="btn btn-default btn-sm">
                                    <span class="glyphicon glyphicon-shopping-cart"></span> Add To Cart
                                </button>
                        <p><br>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                            Integer tincidunt, ex ac interdum dapibus, elit neque efficitur odio,
                            vitae euismod mauris odio nec nunc.
                        </p>

                    </div>
                    <div class="menu_column">
                        <figure>
                            <img class = "" src="images/burger2.png" alt="food1" style="width:100%">
                            <figcaption>Chicken Wrap</figcaption> 
                        </figure>
                        <button type="button" class="btn btn-default btn-sm">
                            <span class="glyphicon glyphicon-shopping-cart"></span> Add To Cart
                        </button>
                        <p><br>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                            Integer tincidunt, ex ac interdum dapibus, elit neque efficitur odio,
                            vitae euismod mauris odio nec nunc.
                        </p>

                    </div>
                    <div class="menu_column">
                        <figure>
                            <img class = "" src="images/burger3.png" alt="food1" style="width:90%">
                            <figcaption>Jjang Jjang Burger</figcaption> 
                        </figure>
                        <button type="button" class="btn btn-default btn-sm">
                            <span class="glyphicon glyphicon-shopping-cart"></span> Add To Cart
                        </button>
                        <p><br>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                            Integer tincidunt, ex ac interdum dapibus, elit neque efficitur odio,
                            vitae euismod mauris odio nec nunc.
                        </p>

                    </div>
                </div>

            </section>
            <!-- food sec row 1 end -->

            <br><br><br><br><br>


            <section id="drinks">
                <div class= "menu_h2">Top Beverages</div>
                <div class="food_row">
                    <div class="menu_column">
                        <figure>
                            <img class = "img-thumbnail" src="images/drink1.jpg" alt="drink1" style="width:100%">
                            <figcaption>Soft Drinks</figcaption> 
                        </figure>
                                <button type="button" class="btn btn-default btn-sm">
                                    <span class="glyphicon glyphicon-shopping-cart"></span> Add To Cart
                                </button>
                        <p><br>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                            Integer tincidunt, ex ac interdum dapibus, elit neque efficitur odio,
                            vitae euismod mauris odio nec nunc.
                        </p>

                    </div>
                    <div class="menu_column">
                        <figure>
                            <img class = "img-thumbnail" src="images/drink2.jpeg" alt="drink2" style="width:100%">
                            <figcaption>Smoothies</figcaption> 
                        </figure>
                                <button type="button" class="btn btn-default btn-sm">
                                    <span class="glyphicon glyphicon-shopping-cart"></span> Add To Cart
                                </button>
                        <p><br>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                            Integer tincidunt, ex ac interdum dapibus, elit neque efficitur odio,
                            vitae euismod mauris odio nec nunc.
                        </p>

                    </div>
                    <div class="menu_column">
                        <figure>
                            <img class = "img-thumbnail" src="images/drink3.gif" alt="drink3" style="width:100%">
                            <figcaption>Coffee</figcaption> 
                        </figure>
                                <button type="button" class="btn btn-default btn-sm">
                                    <span class="glyphicon glyphicon-shopping-cart"></span> Add To Cart
                                </button>
                        <p><br>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                            Integer tincidunt, ex ac interdum dapibus, elit neque efficitur odio,
                            vitae euismod mauris odio nec nunc.
                        </p>

                    </div>
                </div>

            </section>
            <!-- drink sec row 1 end -->


            <?php
                include "footer.inc.php";
            ?>
            
         
        </main>

    </body>

</html>
