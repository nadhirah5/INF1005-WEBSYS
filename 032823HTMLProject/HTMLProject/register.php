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

    </head>
    <body>

        <!-- header section starts -->

        <header>

            <?php
            include "nav.inc.php";

            ?>

        </header>

        <!-- header section ends-->

        <!-- update particulars section starts  -->

        <div class="container" id="register-container">

            <section class="update-particulars" id="update-particulars">

                <br><br><br><br><br><br><br><br><br>
                <h1 class="heading"> Register </h1>
                <h3 class="sub-heading">Already have an account?<a href="login.php">Log In</a></h3>
                <h3 class="sub-heading"> Enter your particulars below </h3>

                <form method="POST" id="register-form">

                    <div class="inputBox">
                        <div class="input">
                            <span>First Name</span>
                            <input type="text" name="fname" id="fname" placeholder="Tony">
                        </div>

                    </div>

                    <div class="inputBox">
                        <div class="input">
                            <span>Last Name</span>
                            <input type="text" name="lname" id="lname" required placeholder="Tan">
                        </div>

                    </div>

                    <div class="inputBox">

                        <div class="input">
                            <span>Email</span>
                            <input type="email" name="email" id="email" required placeholder="TonyTan@gmail.com">
                        </div>
                    </div>


                    <div class="inputBox">
                        <div class="input">
                            <span>Mobile Number</span>
                            <input type="number" name="mobileNumber" id="mobileNumber" placeholder="11111111">
                        </div>
                    </div>
                    
                    <div class="inputBox">
                        <div class="input">
                            <span>Date of Birth</span>
                            <input type="date" id="dob" name="dob" required value="2023-03-07" min="2007-01-01" max="2023-01-01">
                        </div>
                    </div>
                    
                    <div class="inputBox">
                        <div class="input">
                            <span>Address</span>
                            <textarea name="address" id="address" cols="20" rows="3" required placeholder="111 PASIR RIS ST 11 BLK 111 #11"></textarea><br>
                        </div>
                    </div>
                    
                    <div class="inputBox">
                        <div class="input">
                            <span>Postal Code</span>
                            <input type="text" name="postalcode" id="postalcode" required placeholder="111111" min="6" max="6">
                        </div>
                    </div>

                    <div class="inputBox">
                        <div class="input">
                            <span>Password</span>
                            <input type="password" name="pwd" id="pwd" required placeholder="Password">
                        </div>
                    </div>
                    
                    <div class="inputBox">
                        <div class="input">
                            <span>Password</span>
                            <input type="password" name="pwd_confirm" id="pwd_confirm" required placeholder="Confirm Password Verification">
                        </div>
                    </div>
                    <button class="btn" type="submit" name="createAccount">Create account</button>
                </form>
            </section>

        </div>
        
        <script>
            $(document).ready(function () {
            $('#register-form').submit(function (event) {
            event.preventDefault(); // prevent the form from submitting normally


                    var fname = $('#fname').val();
                    var lname = $('#lname').val();
                    var email = $('#email').val();
                    var pwd = $('#pwd').val();
                    var pwd_confirm = $('#pwd_confirm').val();
                    var mobileNumber = $('#mobileNumber').val();
                    var dob = $('#dob').val();
                    var address = $('#address').val();
                    var postalcode = $('#postalcode').val();
                    $.ajax({
                            url: 'process_register.php',
                            type: 'POST',
                            data: {fname: fname, lname: lname, email: email, pwd:pwd, pwd_confirm:pwd_confirm ,mobileNumber: mobileNumber , dob:dob,address:address,postalcode:postalcode},
                            success: function (result) {
                            $("#register-container").html(result);
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

        <!-- footer section ends -->




        <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

        <!-- custom js file link  -->
        <script src="js/main.js"></script>

    </body>
</html>