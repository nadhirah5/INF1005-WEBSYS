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
            session_start();
            include "nav.inc.php";
            $dbemail = $_SESSION['email'];
            ?>

        </header>
<?php


    $foodName = $_POST['foodName'];
    $foodPrice = $_POST['foodPrice'];
    // Sanitize input data
    $foodQuantity = filter_var($_POST['foodQuantity'], FILTER_SANITIZE_NUMBER_INT);
    $quantityPickles = filter_var($_POST['quantityPickles'], FILTER_SANITIZE_NUMBER_INT);
    $quantityTomatoes = filter_var($_POST['quantityTomatoes'], FILTER_SANITIZE_NUMBER_INT);
    $quantityOnions = filter_var($_POST['quantityOnions'], FILTER_SANITIZE_NUMBER_INT);
    
    $request = "Pickle:".$quantityPickles."\nTomato:".$quantityTomatoes."\nOnion:".$quantityOnions;

    // Check if the cart exists in the session
    if (!isset($_SESSION['cart_items'])) {
        // Cart does not exist, create it and add the item
        $_SESSION['cart_items'] = array(
            array(
                'foodName' => $foodName,
                'foodPrice' => $foodPrice,
                'foodQuantity' => $foodQuantity,
                'request' => $request
            )
        );
    } else {
        // Cart exists, check if the item already exists in the cart
        $itemExists = false;
        foreach ($_SESSION['cart_items'] as $index => $cartItem) {
            if ($cartItem['foodName'] === $foodName && $cartItem['request'] === $request) {
                // Item already exists, update the quantity
                $_SESSION['cart_items'][$index]['foodQuantity'] += $foodQuantity;     
                $itemExists = true;
                break;
            }
        }

        if (!$itemExists) {
            // Item does not exist, add it to the cart
            array_push($_SESSION['cart_items'], array(
                'foodName' => $foodName,
                'foodPrice' => $foodPrice,
                'foodQuantity' => $foodQuantity,
                'request' => $request
            ));
        }
    }
    
     echo "<br><br><br><br><br><br><br><br><div class='container'>";
    echo "<h1 class='heading'>Added to cart</h1>";
    echo "<h3 class='sub-heading'><a href='menu.php'>Order more</a></h3>";
    echo "</div>";

?>
        
        
        

        
                <?php
        include "footer.inc.php";
        ?>

        <!-- footer section ends -->




        <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

        <!-- custom js file link  -->
        <script src="js/main.js"></script>

    </body>
</html>