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
    <?php
        include "nav.inc.php";
    ?>
      
<!-- Sidebar -->
<div class="w3-sidebar w3-light-grey w3-bar-block" style="width:25%;">
    <h3 class="w3-red" style="border-radius: 15px 15px"><b>My Account</b></h3>
    <br>
    <a href="profile.html" class="w3-bar-item w3-button">Account Settings</a>
    <a href="#" class="w3-bar-item w3-button"><b>Order History</b></a>
  <a href="address_book.html" class="w3-bar-item w3-button">Address Book</a>
  <br><br>
  <img src="images/sidebar-bg.png" style="display: block; margin: 0 auto; max-width: 100%; height: auto; text-align: center;">
</div>



<!-- Page Content -->
<div style="margin-left:25%">

<div class="w3-container w3-red">
  <h1>Account Information</h1>
</div>


<div class="w3-container">
<h3>Your past orders:</h3>

<table class="profile-table">
  <tr>
    <th>OrderID</th>
    <th>Order</th>
  </tr>
  <tr>
     <!--sample data--> 
    <td data-th="Order ID">345</td>
    <td data-th="Order">burger1 combo</td>
  </tr>

</table>
</div>
</div>
    <?php
        include "footer.inc.php";
    ?>
    
</body>