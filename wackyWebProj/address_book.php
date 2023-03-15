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
         <a href="preferences.php" class="btn">Preferences</a>
        </div>
<!-- account page navbar ends -->
    
    </section>

</div>




<!-- address table section starts  -->

<div class="container">

    <section class="particulars" id="particulars">
        <form action="">

        
        <h1 class="sub-heading"> Address Book </h1>
    
            <table class="profile-table">
              <tr>
                <th>Name</th>
                <th>Street Name</th>
                <th>Postal Code</th>
                <th>Remove Address?</th>
              </tr>
              <tr>
                 <!--sample data--> 
                <td data-th="Name">Home</td>
                <td data-th="Street Name">abc</td>
                <td data-th="Postal Code">123456</td>
                <td data-th="Remove Address">
                    
                    <input type="checkbox" class="form-check-input" id="remove_address" name="checkbox" value="remove_address"> 
                <label class="form-check-label" for="remove_address"></label>
                </td>
              </tr>

            </table>
        <div class='button-container2'>
        <input type="submit" value="Remove selected addresses" class="btn"> 
        </div>
        </form>
    </section>
</div>

<!-- address table section ends -->

<!-- add new address sections starts-->
<div class="container">

    <section class="update-particulars" id="update-particulars">

        
        <h1 class="heading"> Add New Address </h1>
    
        <form action="">
    
            <div class="inputBox">
                <div class="input">
                    <span>your address name</span>
                    <input type="text" required placeholder="home, work or school?">
                </div>
            </div>

            <div class="inputBox">
                <div class="input">
                    <span>your street name</span>
                    <input type="text" required placeholder="enter your street name">
                </div>
            </div>

            <div class="inputBox">
                <div class="input">
                    <span>your postal code</span>
                    <input type="text" required placeholder="enter your postal code">
                </div>
            </div>
         
            <div class='button-container2'>
            <input type="submit" value="Add Address" class="btn"> 
            </div>
            
        </form>
    </section>

</div>

<!--add new address section ends-->





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
