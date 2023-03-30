

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
        <br><br><br><br><br><br><br><br><br>
        <h1 class="heading"> Your Cart </h1>
        <?php
// Check if the cart is not empty
        if (isset($_SESSION['cart_items']) && count($_SESSION['cart_items']) > 0) {
            ?>

            <div class='container'>
                <section class='particulars' id='particulars'>
                    <table class='profile-table'>
                        <thead>
                            <tr>
                                <th>Food Name</th>
                                <th>Price</th>
                                <th>Quantity</th>     
                                <th>Request</th> 
                                <th>Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $total = 0;
                            // Loop through the cart items and display them in the table
                            foreach ($_SESSION['cart_items'] as $cartItem) {
                                $foodName = $cartItem['foodName'];
                                $foodPrice = $cartItem['foodPrice'];
                                $foodQuantity = $cartItem['foodQuantity'];
                                $request = $cartItem['request'];
                                $request_display = nl2br($request);
                                $subtotal = $foodPrice * $foodQuantity;

                                $total += $subtotal;

                                echo "<tr>" .
                                "<td data-th='Food Name'>" . $foodName . "</td>" .
                                "<td data-th='Price'>" . $foodPrice . "</td>" .
                                "<td data-th='Quantity'>" . $foodQuantity . "</td>" .
                                "<td data-th='Request'>" . $request_display . "</td>" .
//                                "<td data-th='Pickle'>" . $quantityPickles . "</td>" .
//                                "<td data-th='Tomato'>" . $quantityTomatoes . "</td>" .
//                                "<td data-th='Onion'>" . $quantityOnions . "</td>" .
                                "<td data-th='Subtotal'>" . $subtotal . "</td>" .
                                "</tr>";
                            }
                            echo "<tr>" .
                            "<td colspan='4' class='text-right'><strong>Total</strong></td>" .
                            "<td>" . $total . "</td>" .
                            "</tr>".
                            "<tr>".
                            "<td colspan='4' class='text-right'><strong>Order</strong></td>" ;
                            if(isset($_SESSION['email']))
                            {
                            echo "<td>" . 
                            "<form method='POST' action='payment.php'>".
                            "<div class='inputBox'>".
                            "<input type='hidden' name='total' id='total' value='". $total."'>".
                            "<button class='btn' type='submit' name='order' id='orderFood'>Proceed to order</button>".
                            "</div>".
                            "</form>".
                            "</td>" .
                            "</tr>";
                            }
                            else {
                            echo "<td>" . 
                            "<form method='POST' action='login.php'>".
                            "<div class='inputBox'>".
                            "<button class='btn' type='submit' name='order' id='orderFood'>Login to order</button>".
                            "</div>".
                            "</form>".
                            "</td>" .
                            "</tr>";
                            }
                            ?>


                        </tbody>
                    </table>
                    

                </section>
            </div>
            




            <?php
        } else {
            // Cart is empty
             echo "<br><br><br><br><br><br><br><br><div class='container'>";
             echo "<h3 class='sub-heading'> Your cart is empty! </h3>";
        }
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