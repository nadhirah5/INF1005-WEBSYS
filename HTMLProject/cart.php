<?php

session_start();
if ($_GET['action'] == 'remove') {
    unset($_SESSION['cart_items'][$_GET['item']]);
    header('location:cart.php');
    exit();
}
  if ($_GET['action'] == 'removeAll') {
    unset($_SESSION['cart_items']);
    header('location:cart.php');
    exit();
}
//global $cartArray;
//if (isset($_POST['add_to_cart'])) {
//    console . log("past the post add to cart");
//    $foodName = $_SESSION['foodname'];
//    $productQty = 1;
//
//    getFoodData();
//    console . log("cartArray" . $cartArray['foodID']);
//    if (!isset($_SESSION['cart_items']) && empty($_SESSION['cart_items'])) {
//        $foodNames = [];
//        foreach ($_SESSION['cart_items'] as $cartKey => $cartItem) {
//            $foodNames[] = $cartItem['foodName'];
//            if ($cartItem['foodName'] == $foodName) {
//                $_SESSION['cart_items'][$cartKey]['qty'] = $productQty;
//                $_SESSION['cart_items'][$cartKey]['total_price'] = $calculateTotalPrice;
//                break;
//            }
//        }
//
//        if (!in_array($foodName, $foodNames)) {
//            $_SESSION['cart_items'][] = $cartArray;
//        }
//
//        $successMsg = true;
//    } else {
//        $_SESSION['cart_items'][] = $cartArray;
//        $successMsg = true;
//    }
//}

//
//function getFoodData() {
//    global $foodName, $productQty, $cartArray, $errorMsg, $success;
//// Create database connection.
//    $config = parse_ini_file('../../private/db-config.ini');
//    $conn = new mysqli($config['servername'], $config['username'],
//            $config['password'], $config['dbname']);
//// Check connection
//    if ($conn->connect_error) {
//        $errorMsg = "Connection failed: " . $conn->connect_error;
//        $success = false;
//    } else {
//// Prepare the statement:
//        $stmt = $conn->prepare("SELECT * from menu where foodName=?");
//// Bind & execute the query statement:
//        $stmt->bind_param("s", $foodName);
//        $stmt->execute();
//        $result = $stmt->get_result();
//        if ($result->num_rows > 0) {
//// Note that email field is unique, so should only have
//// one row in the result set.
//            $row = $result->fetch_assoc();
//            $calculateTotalPrice = number_format($productQty * $row['foodPrice'], 2);
//
//            $cartArray = [
//                'foodID' => $row['foodID'],
//                'qty' => $productQty,
//                'foodName' => $foodName,
//                'foodPrice' => $row['foodPrice'],
//                'total_price' => $calculateTotalPrice,
//                'foodImg' => $row['foodPicture']
//            ];
////            return $cartArray;
//        } else {
//            $errorMsg = "No food item found with the name $foodName";
//            $success = false;
//        }
//        $stmt->close();
//    }
//    $conn->close();
//}
?>
<html lang="en">
    <!--    place all javascript/css links here-->
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
        <style>
            .row h1{
                text-align: center;
            }
            #paymentbtn{
                background-color: darkblue;
                color: white;
            }
          
        </style>
    </head>


    <body>

        <?php
        include "nav.inc.php";
        ?>



        <div class="row">
            <h1>My Cart</h1>
            <div class="col-md-12">
                <?php if (empty($_SESSION['cart_items'])) { ?>
                    <table class="table">
                        <tr>
                            <td>
                                <p>Your cart is empty.</p>
                            </td>
                        </tr>
                    </table>
                <?php } ?>
                <?php if (isset($_SESSION['cart_items']) && count($_SESSION['cart_items']) > 0) { ?>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Food</th>
                                <th>Price</th>
                                <th>Qty</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $totalCounter = 0;
                            $itemCounter = 1;
                            foreach ($_SESSION['cart_items'] as $key => $item) {

                                $imgUrl = $item['foodPicture'];

                                $total = $item['foodPrice'] * $item['qty'];
                                $totalCounter += $total;
                                $itemCounter += $item['qty'];
                                ?>
                                <tr>
                                    <td>
                                        <img src="<?php echo 'images/'.$imgUrl; ?>" class="rounded img-thumbnail mr-2" style="width:60px;"><?php echo $item['foodName']; ?>

                                        <a href="cart.php?action=remove&item=<?php echo $key ?>" class="text-danger">
                                            <i class="bi bi-trash-fill"></i>
                                        </a>

                                    </td>
                                    <td>
                                        $<?php echo $item['product_price']; ?>
                                    </td>
                                    <td>
                                        <span name="" class="cart-qty-single" data-item-id="<?php echo $key?>" value="<?php echo $item['qty']; ?>"></span>
                                    </td>
                                    <td>
                                        <?php echo $total; ?>
                                    </td>
                                </tr>
                            <?php } ?>
                            <tr class="border-top border-bottom">
                                <td><a href="cart.php?action=removeAll"><button class="btn btn-danger btn-sm" id="emptyCart">Clear Cart</button></a></td>
                                <td></td>
                                <td>
                                    <strong>
                                        <?php echo ($itemCounter == 1) ? $itemCounter . ' item' : $itemCounter . ' items'; ?>
                                    </strong>
                                </td>
                                <td><strong>$<?php echo $totalCounter; ?></strong></td>
                            </tr> 
                            </tr>
                        </tbody> 
                    </table>
                    <div class="row">
                        <div class="col-md-11">
                            <a href="payment.php">
                                <button class="btn btn-primary btn-lg float-right" id="paymentbtn">Proceed to Payment</button>
                            </a>
                        </div>
                    </div>

                <?php } ?>
            </div>
        </div>
        <?php include('footer.inc.php'); ?>

  

    </body>