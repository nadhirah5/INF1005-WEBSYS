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


<!--        <div class="container">

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
                    value="Order now"
                </form>
            </section>

        </div>-->

        <!-- order section ends -->


<!-- our team start -->
<div class="container">

    <section class="aboutus" id="aboutus">

        <br><!-- line break -->
        <br>
        <br>
        <br>
        <br>
        <br>

        <h1 class="heading"> Our Team </h1>

        <div class="box-container">

            <div class="box">
                <img src="images/maskmale3.PNG" alt="">
                <h3>Chia Rui Feng</h3>
                <span>CEO & Founder</span>
                <a href="mailto:ruifeng@gmail.com.sg">ruifeng@gmail.com.sg</a>
            </div>

            <div class="box">
                <img src="images/maskfem5.PNG" alt="">
                <h3>Vianiece Tan Yingqi</h3>
                <span>CEO & Founder</span>
                <a href="mailto:vianiece@gmail.com.sg">vianiece@gmail.com.sg</a>
            </div>

            <div class="box">
                <img src="images/maskfem3.jpg" alt="">
                <h3>Ng Zi Hwee</h3>
                <span>CEO & Founder</span>
                <a href="mailto:zihwee.nzh@gmail.com.sg">zihwee@gmail.com.sg</a>
            </div>

            <div class="box">
                <img src="images/maskfem2.PNG" alt="">
                <h3>Nadhirah Binti Ayub Khan</h3>
                <span>CEO & Founder</span>
                <a href="mailto:nadhirah@gmail.com.sg">nadhirah@gmail.com.sg</a>
            </div>

            <div class="box">
                <img src="images/maskfem4.PNG" alt="">
                <h3>Awil Alessandra Antoinette Javier</h3>
                <span>CEO & Founder</span>
                <a href="mailto:alessandra@gmail.com.sg">alessandra@gmail.com.sg</a>
            </div>
        </div>
       </section> 
</div>
<!-- our team end --> 

<!-- more info on our working environment start--> <!--30-3 -->
<div class="container">

    <section class="workplace" id="workplace"> 

        <!--<h3 class="sub-heading"> about us </h3>-->
        <h1 class="heading"> Our Working Environment </h1>

        <div class="row">
            <iframe width="625" height="400" src="https://www.youtube.com/embed/RczT7gdkV8E?controls=0"></iframe>
            <div class="content">
                <h3>Our Work Package</h3>
                <p> There are plenty of opportunities for professional development, 
                    and a 100% guarantee of constantly learning and growing in your role. 
                    Overall, the working environment is fantastic, and it makes coming into work each day a real pleasure. </p>
                <div class="icons-container">
                    <div class="icons">
                        <i class="fas fa-shipping-fast"></i>
                        <span>Medical Insurance included</span>
                    </div>
                    <div class="icons">
                        <i class="fas fa-dollar-sign"></i>
                        <span>High paying salary</span>
                    </div>
                    <div class="icons">
                        <i class="fas fa-briefcase"></i>
                        <span>Guaranteed fast career advancement</span>
                    </div>
                </div>
                <p>*therapy not included in package</p>
            </div>
        </div>
    </section>
    </div>
<!-- more info on our working environment end--> 
<!-- Location in singapore interactive map start --><!--30-3 -->
<div class="container">
    <section class="location" id="location"> 
        <h1 class="heading"> Our Location </h1>
                <div class="content">
                <p> SIT@NYP, level 8 </p> 
                <h3>How to get there</h3>
                </div>
                <br>
                <div class="google-map">
                <iframe src="https://www.google.com/maps/embed?pb=!1m28!1m12!1m3!1d3329.9215003465556!2d103.84687524303321!3d1.3795473921301726!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m13!3e6!4m5!1s0x31da16eaa0fc8357%3A0xe9edd755995fe8a5!2sAng%20Mo%20Kio%20Avenue%208%2C%20Yio%20Chu%20Kang%20MRT%20Station%2C%20Singapore!3m2!1d1.3817199!2d103.84503989999999!4m5!1s0x31da16e96db0a1ab%3A0x3d0be54fbbd6e1cd!2ssit%20%40nyp!3m2!1d1.3774334!2d103.848787!5e0!3m2!1sen!2ssg!4v1680202097769!5m2!1sen!2ssg" width="600" height="400" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
    </section>
    </div>
<!-- Location in singapore interactive map end-->


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