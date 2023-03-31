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
            session_start();
            include "nav.inc.php";
            $dbemail = $_SESSION['email'];
            ?>

        </header>
        
        <script>
            $(document).ready(function () {
                    
                    var email = '<?php echo $dbemail?>';
                    $.ajax({
                            url: 'process_profileFetch.php',
                            type: 'POST',
                            data: {email: email},
                            success: function (result) {
                            $("#userinfo-container").html(result);
                            },
                            error: function (xhr, status, error) {
                            console.log("Error: " + error);
                            }
                    });
            });
            
            $(document).on('click', '#updateAccount', function(event) {
            $('#updateform').submit(function (event) {
            event.preventDefault(); // prevent the form from submitting normally
                    
                    var fname = $('#fname').val();
                    var lname = $('#lname').val();
                    var email = $('#email').val();
                    var mobilenumber = $('#mobilenumber').val();
                    var updatepwd = $('#updatepwd').val();
                    $.ajax({
                            url: 'process_profileUpdate.php',
                            type: 'POST',
                            data: {fname: fname, lname: lname, email:email ,mobilenumber:mobilenumber ,updatepwd: updatepwd},
                            success: function (result) {
                            $("#update-particulars").html(result);
                            },
                            error: function (xhr, status, error) {
                            console.log("Error: " + error);
                            }
                    });
            });
            });
            
             $(document).ready(function () {
            $('#deleteaccount-form').submit(function (event) {
            event.preventDefault(); // prevent the form from submitting normally

                    var deletepwd = $('#deletepwd').val();
                    $.ajax({
                            url: 'process_profileDelete.php',
                            type: 'POST',
                            data: {deletepwd: deletepwd},
                            success: function (result) {
                            $("#delete-container").html(result);
                            },
                            error: function (xhr, status, error) {
                            console.log("Error: " + error);
                            }
                    });
            });
            });
        </script>

        <!-- header section ends-->



        <!-- account title section starts  -->

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




        <!-- saved particulars section starts  -->

        <div id="userinfo-container">

            
        </div>

        <!-- saved particulars section ends -->



        <!-- update particulars section starts  -->


        <!-- update particulars section ends -->

        <!--delete account sections starts-->
        <div class="container" id="delete-container">

            <section class="update-particulars" id="update-particulars">


                <h1 class="heading"> Delete Account </h1>

             
                <form method="post" id="deleteaccount-form">

                    <div class="inputBox">
                        <div class="input">
                            <span>To delete account, enter current password</span>
                            <input type="password" name="deletepwd" id="deletepwd" required placeholder="Password Verification">
                        </div>
                    </div>


                    <div class="form-check">
                        <input type="checkbox" required class="form-check-input" id="delete_acc" name="checkbox" value="delete_acc"> Confirm Account Deletion
                        <label class="form-check-label" for="delete_acc"></label>
                    </div>

                    <button class="btn" type="submit" name="deleteAccount">Delete Account</button> 
                </form>
            </section>

        </div>

        <!--delete account section ends-->

        <!--logout section starts-->
 

        <!--logout section ends-->


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