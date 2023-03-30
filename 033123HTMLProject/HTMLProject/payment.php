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
        
        
        <script src="https://www.paypal.com/sdk/js?client-id=ATwFp3ItkUuGcUDGyGOxE3KM6Bo4PBKcxb6FtGfSXnUVa8emZH0J-AyLs3U7ivZC4V8ENzj37G2RKKrr&components=buttons&currency=SGD"></script>
        <style>
            h1{
                color: black;
                text-align: center;
            }
            #payable_amount{
                color: red;
            }
            dt{
                color: black;
            }
            button{
                /*margin-top: 1rem;*/
                display: inline-block;
                font-size: 1.7rem;
                color: white;
                background: black;
                border-radius: 0.5rem;
                cursor: pointer;
                padding: 0.8rem 3rem;
            }
            form
            {
                max-width: 300px;
            }
            
            #pay-field
            {
                font-size: 20px;
            }
            

        </style>
    </head>



    <header>
        <?php
        session_start();
        include "nav.inc.php";
        $dbemail = $_SESSION['email'];
        $total = $_POST['total'];
        ?>
    </header>
    <body>
        <br><br><br><br><br><br><br><br>
        <div class="container" id="paycontainer">
            <section>
                <form action="" id="transaction_form">
                    <!--                <fieldset id="information">
                                        <legend class="text-info">Payment Information</legend>
                                    </fieldset>-->
                    <fieldset id="pay-field">
                        <legend class="text-info">Payment Information</legend>
                        <h1 class="text-center text-info" id="payable_amount"></h1>
                        <hr class="border-light">
                        <div class="form-group">
                            <dl class="row">
                                <dt class='text-info col-4'>Amount to Pay</dt>
                                <dd class="col-8 text-right" id="pay_amount"><?php echo $total; ?></dd>
                                <dt class='text-info col-4'>Delivery Fee</dt>
                                <dd class="col-8 text-right"id="fee">2.30</dd>
                                <input type="hidden" name="fee" value='0'>
                                <input type="hidden" name="payable_amount" value='<?php echo $total; ?>'>
                                <input type="hidden" name="payment_code" value=''>
                            </dl>
                        </div>
                        <div class="form-group text-center">
                            <div id="paypal-button"></div>
                            <script>

                    var payamount = document.getElementById("pay_amount");
                    var fee = document.getElementById("fee");
                    var paytotal = parseFloat(<?php echo $total; ?>) + parseFloat(fee.textContent);


                    paypal.Buttons({
                        createOrder: function (data, actions) {
                            // Set up the order details
                            return actions.order.create({
                                purchase_units: [{
                                        amount: {
                                            value: paytotal.toFixed(2).toString() // Replace with the amount you want to charge
                                        }
                                    }]
                            });
                        },
                        onApprove: function (data, actions) {
                            // Capture the payment when the customer approves the transaction
                            return actions.order.capture().then(function (details) {
                                // Show a success message to the customer
                                alert('Payment complete! Transaction ID: ' + details.id); //need change this to order history page

                                $(document).ready(function () {
                                    $.ajax({
                                        url: "process_Order.php",
                                        type: "POST",
                                        data: {total: paytotal.toFixed(2)},
                                        success: function (result) {
                                            $("#paycontainer").html(result);
                                        },
                                        error: function (xhr, status, error) {
                                            console.log("Error: " + error);
                                        }
                                    });
                                });
                            });
                        }
                    }).render('#paypal-button');
                            </script>
                        </div>
                    </fieldset>
                    <div class="form-group">
                        <div class="col-12">
                            <div class="d-flex justify-content-end align-items-center">
                                <a href="cart.php"><button class="btn btn-light btn-flat" type="button" id="cancel" data-dismiss="modal">Cancel</button></a>
                            </div>
                        </div>
                    </div>
                </form>
            </section>
        </div>




        <?php
        include "footer.inc.php";
        ?>

        <!-- footer section ends -->




        <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

        <!-- custom js file link  -->
        <script src="js/main.js"></script>

    </body>
</html>
