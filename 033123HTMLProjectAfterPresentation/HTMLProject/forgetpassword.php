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

    </head>
    <body>

        <!-- header section starts -->

        <header>

            <?php
include "nav.inc.php"; 
            ?>

        </header>


        <!-- login here  -->
        <div class="container" id="forgetpassword-container">

            <section class="update-particulars" id="update-particulars">

                <br><br><br><br><br><br><br><br><br>
                <h1 class="heading"> Forget Password </h1>
                <h3 class="sub-heading">Remember your password?<a href="login.php"> Log In</a></h3>
                <h3 class="sub-heading"> Enter your particulars below </h3>

                <form method="POST" id="forgetpassword-form">

                    <div class="inputBox">

                        <div class="input">
                            <span>Email</span>
                            <input type="email" name="email" id="email" required placeholder="TonyTan@gmail.com">
                        </div>
                    </div>

                    <button class="btn" type="submit" name="forgetpw">Reset Password</button>
                </form>
            </section>

        </div>
        
        <script>
            $(document).ready(function () {
            $('#forgetpassword-form').submit(function (event) {
            event.preventDefault(); // prevent the form from submitting normally

                    var email = $('#email').val();
                    $.ajax({
                            url: 'process_forgetpassword.php',
                            type: 'POST',
                            data: {email: email},
                            success: function (result) {
                            $("#forgetpassword-container").html(result);
                            },
                            error: function (xhr, status, error) {
                            console.log("Error: " + error);
                            }
                    });
            });
            });
        </script>


        <!-- footer section starts  -->

        <?php
        include "footer.inc.php";
        ?>

        <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

        <!-- custom js file link  -->
        <script src="js/main.js"></script>

    </body>
</html>
