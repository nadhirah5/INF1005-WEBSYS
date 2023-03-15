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
                        <a href="#" class="btn">order now</a>
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




<!--middle section windows slidable start-->

 
<!--       <div class="w3-content w3-display-container">
                
                 <div class="w3-display-container mySlides">
                <img src="images/mariowacdonald.jpg" class="center" >
                <div class="w3-display-bottomright w3-large w3-container w3-padding-16 w3-black">
                  Welcome to Wacdonalds!
                </div>
                </div>
                 
                 <div class="w3-display-container mySlides">
                    <img src="images/kobeniwacdonald.jpg" class="center" >
                    <div class="w3-display-bottomright w3-large w3-container w3-padding-16 w3-black">
                      Our service is terrible
                    </div>
                </div>
            
                <div class="w3-display-container mySlides">
                    <img src="images/wacdonaldresized.jpg" class="center" >
                    width="800" height="400"
                    <div class="w3-display-bottomright w3-large w3-container w3-padding-16 w3-black">
                      But we know you'll be back ;)
                    </div>
                </div>
            
                 make sure the button size is the same height/length as the image, and not just a very tiny spot
                <button class="w3-button w3-display-left w3-black" onclick="plusDivs(-1)">&#10094;</button>
                <button class="w3-button w3-display-right w3-black" onclick="plusDivs(1)">&#10095;</button>
                
                
                problem dots aren't working, they can't go to the specific picture when it is clicked
                <div style="text-align:center">
                    <span class="dot" onclick="currentSlide(1)"></span>
                    <span class="dot" onclick="currentSlide(2)"></span>
                    <span class="dot" onclick="currentSlide(3)"></span>
                </div>  
      </div>
            
            

            <script>
            var myIndex = 0;
            carousel();

            function carousel() {
              var i;
              var x = document.getElementsByClassName("mySlides");
              for (i = 0; i < x.length; i++) {
                x[i].style.display = "none";  
              }
              myIndex++;
              if (myIndex > x.length) {myIndex = 1}    
              x[myIndex-1].style.display = "block";  
              setTimeout(carousel, 3000); // Change image every 2 seconds
            }
            
            
             var slideIndex = 1;
                showDivs(slideIndex);

                function plusDivs(n) {
                  showDivs(slideIndex += n);
                }
            
            function showDivs(n) {
                  var i;
                  var x = document.getElementsByClassName("mySlides");
//                  var dots = document.getElementsByClassName("dot");
                  if (n > x.length) {slideIndex = 1;}
                  if (n < 1) {slideIndex = x.length;}
                  for (i = 0; i < x.length; i++) {
                     x[i].style.display = "none";  
                  }
//                  for (i = 0; i < 4; i++) {
//                    dots[i].className = dots[i].className.replace(" active", "");
                  x[slideIndex-1].style.display = "block"; 
//                  dots[slideIndex-1].className += " active";

                }
            </script>-->


<!--middle section windows slidable ends-->





<!-- dishes section starts  -->

<div class="container">

    <section class="dishes" id="dishes">

        <h3 class="sub-heading"> our dishes </h3>
        <h1 class="heading"> (un)popular dishes </h1>
    
        <div class="box-container">
    
            <div class="box">
                <a href="#" class="fas fa-heart"></a>
                <a href="#" class="fas fa-eye"></a>
                <img src="images/eggless_omelette.jpg" alt="">
                <h3>Eggless Omelette</h3>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
                <span>$15.99</span>
                <a href="#" class="btn">add to cart</a>
            </div>
    
            <div class="box">
                <a href="#" class="fas fa-heart"></a>
                <a href="#" class="fas fa-eye"></a>
                <img src="images/fingerfood.jfif" alt="">
                <h3>Finger food</h3>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
                <span>$15.99</span>
                <a href="#" class="btn">add to cart</a>
            </div>
    
            <div class="box">
                <a href="#" class="fas fa-heart"></a>
                <a href="#" class="fas fa-eye"></a>
                <img src="images/altdimensionfood.jpg" alt="">
                <h3>Found in The Backrooms</h3>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
                <span>$15.99</span>
                <a href="#" class="btn">add to cart</a>
            </div>
    
            <div class="box">
                <a href="#" class="fas fa-heart"></a>
                <a href="#" class="fas fa-eye"></a>
                <img src="images/husbando.jfif" alt="">
                <h3>Husbando</h3>
                <!--need to change all jfif to png or jpg-->
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
                <span>$15.99</span>
                <a href="#" class="btn">add to cart</a>
            </div>
    
            <div class="box">
                <a href="#" class="fas fa-heart"></a>
                <a href="#" class="fas fa-eye"></a>
                <img src="images/waifu.jfif" alt="">
                <h3>Waifu</h3>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
                <span>$15.99</span>
                <a href="#" class="btn">add to cart</a>
            </div>
    
            <div class="box">
                <a href="#" class="fas fa-heart"></a>
                <a href="#" class="fas fa-eye"></a>
                <img src="images/pet.jpg" alt="">
                <h3>Pet</h3>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
                <span>$15.99</span>
                <a href="#" class="btn">add to cart</a>
            </div>
            
            
 <!--solve the takeaway buttons in line problem-->
    <div class='button-container1'>
         <a href="aboutus.html" class="btn">Delivery</a>
         <a href="aboutus.html" class="btn">Takeaway</a>
         <a href="aboutus.html" class="btn">Eat here</a>
   </div>

        </div>
       </section> 
        
<!--    <section>
        <h3 class="sub-heading"> our dishes </h3>
        <h1 class="heading"> Limited time dishes </h1>
    </section>  -->
        

</div>

<!-- dishes section ends -->

<!-- about section starts  -->

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

<!-- about section ends -->




<!-- menu section starts  -->

<!--<div class="container">

    <section class="menu" id="menu">

        <h3 class="sub-heading"> our menu </h3>
        <h1 class="heading"> today's speciality </h1>
    
        <div class="box-container">
    
            <div class="box">
                <div class="image">
                    <img src="images/menu-1.jpg" alt="">
                    <a href="#" class="fas fa-heart"></a>
                </div>
                <div class="content">
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                    <h3>delicious food</h3>
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Excepturi, accusantium.</p>
                    <a href="#" class="btn">add to cart</a>
                    <span class="price">$12.99</span>
                </div>
            </div>
    
            <div class="box">
                <div class="image">
                    <img src="images/menu-2.jpg" alt="">
                    <a href="#" class="fas fa-heart"></a>
                </div>
                <div class="content">
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                    <h3>delicious food</h3>
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Excepturi, accusantium.</p>
                    <a href="#" class="btn">add to cart</a>
                    <span class="price">$12.99</span>
                </div>
            </div>
    
            <div class="box">
                <div class="image">
                    <img src="images/menu-3.jpg" alt="">
                    <a href="#" class="fas fa-heart"></a>
                </div>
                <div class="content">
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                    <h3>delicious food</h3>
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Excepturi, accusantium.</p>
                    <a href="#" class="btn">add to cart</a>
                    <span class="price">$12.99</span>
                </div>
            </div>
    
            <div class="box">
                <div class="image">
                    <img src="images/menu-4.jpg" alt="">
                    <a href="#" class="fas fa-heart"></a>
                </div>
                <div class="content">
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                    <h3>delicious food</h3>
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Excepturi, accusantium.</p>
                    <a href="#" class="btn">add to cart</a>
                    <span class="price">$12.99</span>
                </div>
            </div>
    
            <div class="box">
                <div class="image">
                    <img src="images/menu-5.jpg" alt="">
                    <a href="#" class="fas fa-heart"></a>
                </div>
                <div class="content">
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                    <h3>delicious food</h3>
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Excepturi, accusantium.</p>
                    <a href="#" class="btn">add to cart</a>
                    <span class="price">$12.99</span>
                </div>
            </div>
    
            <div class="box">
                <div class="image">
                    <img src="images/menu-6.jpg" alt="">
                    <a href="#" class="fas fa-heart"></a>
                </div>
                <div class="content">
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                    <h3>delicious food</h3>
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Excepturi, accusantium.</p>
                    <a href="#" class="btn">add to cart</a>
                    <span class="price">$12.99</span>
                </div>
            </div>
    
            <div class="box">
                <div class="image">
                    <img src="images/menu-7.jpg" alt="">
                    <a href="#" class="fas fa-heart"></a>
                </div>
                <div class="content">
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                    <h3>delicious food</h3>
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Excepturi, accusantium.</p>
                    <a href="#" class="btn">add to cart</a>
                    <span class="price">$12.99</span>
                </div>
            </div>
    
            <div class="box">
                <div class="image">
                    <img src="images/menu-8.jpg" alt="">
                    <a href="#" class="fas fa-heart"></a>
                </div>
                <div class="content">
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                    <h3>delicious food</h3>
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Excepturi, accusantium.</p>
                    <a href="#" class="btn">add to cart</a>
                    <span class="price">$12.99</span>
                </div>
            </div>
    
            <div class="box">
                <div class="image">
                    <img src="images/menu-9.jpg" alt="">
                    <a href="#" class="fas fa-heart"></a>
                </div>
                <div class="content">
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                    <h3>delicious food</h3>
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Excepturi, accusantium.</p>
                    <a href="#" class="btn">add to cart</a>
                    <span class="price">$12.99</span>
                </div>
            </div>
    
        </div>
    
    </section>

</div>-->

<!-- menu section ends -->





<!-- order section starts  -->

<div class="container">

    <section class="order" id="order">

        <h3 class="sub-heading"> Reservations </h3>
        <h1 class="heading"> free and fast </h1>
    
        <form action="">
    
            <div class="inputBox">
                <div class="input">
                    <span>your name</span>
                    <input type="text" placeholder="enter your name">
                </div>
<!--                <div class="input">
                    <span>your number</span>
                    <input type="number" placeholder="enter your number">
                </div>-->
            </div>
            
            <div class="inputBox">
<!--                <div class="input">
                    <span>your name</span>
                    <input type="text" placeholder="enter your name">
                </div>-->
                <div class="input">
                    <span>your number</span>
                    <input type="number" placeholder="enter your number">
                </div>
            </div>
            
<!--            <div class="inputBox">
                <div class="input">
                    <span>your order</span>
                    <input type="text" placeholder="enter food name">
                </div>
                <div class="input">
                    <span>additional food</span>
                    <input type="test" placeholder="extra with food">
                </div>
            </div>-->

            <div class="inputBox">
<!--                <div class="input">
                    <span>how much</span>
                    <input type="number" placeholder="how many orders">
                </div>-->
                <div class="input">
                    <span>date and time</span>
                    <input type="datetime-local">
                </div>
            </div>

            <div class="inputBox">
<!--                <div class="input">
                    <span>your address</span>
                    <textarea name="" placeholder="enter your address" id="" cols="30" rows="10"></textarea>
                </div>-->
                <div class="input">
                    <span>your message</span>
                    <textarea name="" placeholder="enter your message" id="" cols="30" rows="10"></textarea>
                </div>
            </div>
    
            <input type="submit" value="Reserve" class="btn"> 
                        <!--value="Order now"-->
        </form>
    </section>

</div>

<!-- order section ends -->



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