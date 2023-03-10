<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Other/html.html to edit this template
-->

<!--href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"-->


<html>
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
       <!--scroll back to top button-->
        <button onclick="topFunction()" id="myBtn" title="Go to top" class="btn"><i class="fa fa-arrow-up"></i></button>
        
        <script>
            // Get the button
            let mybutton = document.getElementById("myBtn");

            // When the user scrolls down 20px from the top of the document, show the button
            window.onscroll = function() {scrollFunction()};

            function scrollFunction() {
              if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                mybutton.style.display = "block";
              } else {
                mybutton.style.display = "none";
              }
            }

            // When the user clicks on the button, scroll to the top of the document
            function topFunction() {
              document.body.scrollTop = 0;
              document.documentElement.scrollTop = 0;
            }
            </script>
        
            <?php
                include "nav.inc.php";
            ?>
            
        <header class="jumbotron text-center">
            <h1 class="display-4">Welcome to Wackdonalds!</h1>
            <h2>It's not copyright if it tastes better :)</h2>
        </header>

            
             <div class="w3-content w3-display-container">
                
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
                    <!--width="800" height="400"-->
                    <div class="w3-display-bottomright w3-large w3-container w3-padding-16 w3-black">
                      But we know you'll be back ;)
                    </div>
                </div>
            
                 <!--make sure the button size is the same height/length as the image, and not just a very tiny spot-->
                <button class="w3-button w3-display-left w3-black" onclick="plusDivs(-1)">&#10094;</button>
                <button class="w3-button w3-display-right w3-black" onclick="plusDivs(1)">&#10095;</button>
                
                
                <!--problem dots aren't working, they can't go to the specific picture when it is clicked-->
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
            </script>
            
            

            
            
            
            <div>
            <button class="button button1"><i class="fa fa-home"></i>Dine-In</button>
            <button class="button button2"><i class="fa fa-home"></i>Takeaway</button>
            <button class="button button3"><i class="fa fa-home"></i>Delivery</button>
            </div>
            

            
  



<!-- Contact us -->
<section id="reserve">
<div class="w3-container w3-padding-64 w3-blue-grey w3-grayscale-min w3-xlarge"> 
  <div class="w3-content">
    <h1 class="w3-center w3-jumbo " style="margin-bottom:10px">Reserve a Table</h1>
    <h3>Find us at ### address</h3>
    <form action="/action_page.php" target="_blank">
      <p><input class="w3-input w3-padding-16 w3-border" type="text" placeholder="Name" required name="Name"></p>
      <p><input class="w3-input w3-padding-16 w3-border" type="number" placeholder="Number of people" required name="People"></p>
      <p><input class="w3-input w3-padding-16 w3-border" type="datetime-local" placeholder="Date and time" required name="date" value="2020-11-16T20:00"></p>
      <p><input class="w3-input w3-padding-16 w3-border" type="text" placeholder="Message / Special requirements" required name="Message"></p>
      <p><button class="w3-button w3-light-grey w3-block" type="submit">SEND MESSAGE</button></p>
    </form>
  </div>
</div>
</section>

<section id="help">
    <div class = "w3-content">
      <h3>Have any enquiries? Contact us at via <a href="Wackdonalds@gmail.com.sg">Wackdonalds@gmail.com.sg</a> or <a href="tel:9999 9999">+65 9999 9999</a> now!</h3>
        <form action="/action_page.php" target="_blank">
      <p><input class="w3-input w3-padding-16 w3-border" type="text" placeholder="Name" required name="Name"></p>
      <p><input class="w3-input w3-padding-16 w3-border" type="text" placeholder="Email" required name="Email"></p>
      <p><input class="w3-input w3-padding-16 w3-border" type="text" placeholder="Message" required name="Message"></p>
      <p><button class="w3-button w3-light-grey w3-block" type="submit">SEND MESSAGE</button></p>
    </form>
    </div>
</section>
        


            <?php
                include "footer.inc.php";
            ?>

    </body>
</html>
