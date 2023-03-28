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
        <script src="https://www.paypal.com/sdk/js?client-id=ATwFp3ItkUuGcUDGyGOxE3KM6Bo4PBKcxb6FtGfSXnUVa8emZH0J-AyLs3U7ivZC4V8ENzj37G2RKKrr&components=buttons&currency=SGD"></script>
        <style>
            div{
                margin:auto;
            }
            .row{
                width: 110%;
            }
            /*    #uni_modal .modal-footer{
                    display:none
                }*/
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







        <div class="h-100 d-flex align-items-center justify-content-center" id="paycontainer">
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
                                        data: {total:paytotal},
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
        </div>

<!--        <script>
            $(document).ready(function () {
                // Get the element by ID
                var element = document.getElementById("payable_amount");
                var payamount = document.getElementById("pay_amount");
                var fee = document.getElementById("fee");
                // Change the value of the element
                element.value = payamount.value + fee.value;
                


            });


        </script>-->
    </body>

