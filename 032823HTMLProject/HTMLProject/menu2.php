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
                        crossorigin="anonymous"></script>

            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>



        <script>
            $(document).ready(function () {
                    $.ajax({
                    url: "process_MenuMenu.php",
                            type: "GET",
                            data:{ category: "1" },
                            success: function (result) {
                            $("#food-container").html(result);
                            },
                            error: function (xhr, status, error) {
                                console.log("Error: " + error);
                                }
                        });
                        });
            $(document).ready(function ()     
                {
                        $.ajax({
                            url: "process_MenuMenu.php",
                            type: "GET",
                            data: {category: "0"},
                            success: function (result) {
                                $("#drink-container").html(result);
                            },
                            error: function (xhr, status, error) {
                                    console.log("Error: " + error);
                                }
            });
        });
        $(document).ready(function ()    
                    {
                            $.ajax({
                                url: "process_MenuMenu.php",
                                type: "GET",
                                data: {category: "2"},
                            success: function (result) {
                                $("#desert-container").html(result);
                            },
                            error: function (xhr, status, error) {
                                    console.log("Error: " + error);
                       }
                            });
                            });         
</script>





   </head>
    <body>

        <!-- headersectionstarts -->

  <header>

                        <?php
                        session_start();
                        include "nav.inc.php";

                        if (isset($_POST['add_to_cart'])) {

//                $foodName = $_SESSION['foodname'];
                            $addFoodName = ($_POST['foodName']);
                            $addFoodPrice = ($_POST['foodPrice']);
                            $addFoodQuantity = ($_POST['foodQuantity']);
                            $addFoodPickle = ($_POST['quantityPickles']);
                            $addFoodTomatoe = ($_POST['quantityTomatoes']);
                            $addFoodOnion = ($_POST['quantityOnions']);

                            $cartArray = array(
                                'foodName' => $_POST['foodName'],
                                'foodPrice' => $_POST['foodPrice'],
                                'foodQuantity' => $_POST['foodQuantity'],
                                'quantityPickles' => $_POST['quantityPickles'],
                                'quantityTomatoes' => $_POST['quantityTomatoes'],
                                'quantityOnions' => $_POST['quantityOnions']
                            );

                            if (isset($_SESSION['cart_items'])) {
                                // Check if the item already exists in the cart
                                foreach ($_SESSION['cart_items'] as $key => $value) {
                                    if ($value['foodName'] == $cartArray['foodName']) {
                                        // Update the quantity of the existing item
                                        $_SESSION['cart_items'][$key]['foodQuantity'] += $cartArray['foodQuantity'];
                                        $successMsg = true;
                                        break;
                                    }
                                }

                                // Add the new item to the cart
                                if (!$successMsg) {
                                    $_SESSION['cart_items'][] = $cartArray;
                                }
                            } else {
                                $_SESSION['cart_items'][] = $cartArray;
                                $successMsg = true;
                            }
                        }

                        function getFoodData() {
                            global $foodName, $productQty, $cartArray, $errorMsg, $success;
// Create database connection.
                            $config = parse_ini_file('../../private/db-config.ini');
                            $conn = new mysqli($config['servername'], $config['username'],
                                    $config['password'], $config['dbname']);
// Check connection
                            if ($conn->connect_error) {
                                $errorMsg = "Connection failed: " . $conn->connect_error;
                                $success = false;
                            } else {
// Prepare the statement:
                                $stmt = $conn->prepare("SELECT * from menu where foodName=?");
// Bind & execute the query statement:
                                $stmt->bind_param("s", $foodName);
                                $stmt->execute();
                                $result = $stmt->get_result();
                                if ($result->num_rows > 0) {
                                    $row = $result->fetch_assoc();
                                    $calculateTotalPrice = number_format($productQty * $row['foodPrice'], 2);

                                    $cartArray = [
                                        'foodID' => $row['foodID'],
                                        'qty' => $productQty,
                                        'foodName' => $foodName,
                                        'foodPrice' => $row['foodPrice'],
                                        'total_price' => $calculateTotalPrice,
                                        'foodImg' => $row['foodPicture']
                                    ];
//            return $cartArray;
                                } else {
                                    $errorMsg = "No food item found with the name $foodName";
                                    $success = false;
                                }
                                $stmt->close();
                            }
                            $conn->close();
                        }
                        ?>

                </header>


                <!-- dishes section starts  -->

            <div class="container">

                <section class="dishes" id="menu">

                    <br><br><br>
                    <h1 class="heading">food</h1>

                    <div class="box-container" id="food-container">

                        <?php

                        function displayFormFood($imagePath, $foodName, $foodPrice) {
                            return '
                            <div class="form-popup" id="myFormFood">
                                <form method="post" class="form-container">
                                    <h1 class="sub-heading">Customize Your Meal</h1>
                                    </br>
                                    <img src="' . $imagePath . '" alt="' . $foodName . '" width=40%>
                                    
                                    </br>
                                    <h2 id="myFoodName">' . $foodName . '</h2>
                                    <h3 id="myFoodPrice">' . $foodPrice . '</h3>
                                    </br>  
                                    <input type="hidden" name="foodName" id=foodName" required value="' . $foodName . '">
                                    <input type="hidden" name="foodPrice" id=foodPrice" required value="' . $foodPrice . '">
                                    <label><b>Quantity</b></label>
                                    <div class="quantity" id="quantity">
                                        <button class="quantity-minus" onclick=decrementValueLimit("foodQuantity")>-</button>
                                        <input type="number" class="quantity-input" name="foodQuantity" id="foodQuantity" value="1" min="1">
                                        <button class="quantity-plus" onclick=incrementValueNoLimit("foodQuantity")>+</button>
                                    </div>
                                    
                                    <label><b>Orange</b></label>
                                    <div class="quantity" id="pickles">
                                        <button class="quantity-minus" onclick=decrementValue("quantityPickles")>-</button>
                                        <input type="number" class="quantity-input" name="quantityPickles" id="quantityPickles" value="1" min="0" max="2">
                                        <button class="quantity-plus" onclick=incrementValue("quantityPickles")>+</button>
                                    </div>
                                    
                                    <label><b>Tomatoes</b></label>
                                    <div class="quantity" id="tomatoes">
                                        <button class="quantity-minus" onclick=decrementValue("quantityTomatoes")>-</button>
                                        <input type="number" class="quantity-input" name="quantityTomatoes" id="quantityTomatoes" value="1" min="0" max="2">
                                        <button class="quantity-plus" onclick=incrementValue("quantityTomatoes")>+</button>
                                    </div>
                                    
                                    <label><b>Onions</b></label>
                                    <div class="quantity" id="onions">
                                        <button class="quantity-minus" onclick=decrementValue("quantityOnions")>-</button>
                                        <input type="number" class="quantity-input" name="quantityOnions" id="quantityOnions" value="1" min="0" max="2">
                                        <button class="quantity-plus" onclick=incrementValue("quantityOnions")>+</button>
                                    </div>
                                    <br>

                                    <div class=button-container2>
                                    <button type="submit" class="btn" name="add_to_cart">Add To Cart</button>
                                    <button type="button" class="btn" onclick="closeFormFood()">Close</button>
                                    </div>
                                </form>
                            </div>
                            ';
                        }

                        function displayFormDrink($imagePath, $foodName, $foodPrice) {
                            return '
                            <div class="form-popup" id="myFormDrink">
                                <form method ="post" class="form-container">
                                    <h1 class="sub-heading">Customize Your Meal</h1>
                                    </br>
                                    <img src="' . $imagePath . '" alt="' . $foodName . '" width=40%>
                                    
                                    </br>
                                    <h2 id="myFoodName">' . $foodName . '</h2>
                                    <h3 id="myFoodPrice">' . $foodPrice . '</h3>
                                    </br>
                                    

                                    <label><b>Quantity</b></label>
                                    <div class="quantity" id="quantity">
                                        <button class="quantity-minus" onclick=decrementValueLimit("drinkQuantity")>-</button>
                                        <input type="number" class="quantity-input" id="drinkQuantity" value="1" min="1">
                                        <button class="quantity-plus" onclick=incrementValueNoLimit("drinkQuantity")>+</button>
                                    </div>
                                    
                                    <label><b>Ice</b></label>
                                    <div class="quantity" id="Ice">
                                        <button class="quantity-minus" onclick=decrementValue("IceQuantity")>-</button>
                                        <input type="number" class="quantity-input" id="IceQuantity" value="1" min="0" max="1">
                                        <button class="quantity-plus" onclick=incrementValue("IceQuantity")>+</button>
                                    </div>
                                    <br>

                                    <div class=button-container2>
                                    <button type="submit" class="btn">Add To Cart</button>
                                    <button type="button" class="btn" onclick="closeFormDrink()">Close</button>
                                    </div>
                                </form>
                            </div>
                            ';
                        }

                        function displayFormDesert($imagePath, $foodName, $foodPrice) {
                            return '
                            <div class="form-popup" id="myFormDesert">
                                <form method ="post" class="form-container">
                                    <h1 class="sub-heading">Customize Your Meal</h1>
                                    </br>
                                    <img src="' . $imagePath . '" alt="' . $foodName . '" width=40%>
                                    
                                    </br>
                                    <h2 id="myFoodName">' . $foodName . '</h2>
                                    <h3 id="myFoodPrice">' . $foodPrice . '</h3>
                                    </br>
                                    
                                   <label><b>Quantity</b></label>
                                    <div class="quantity" id="quantity">
                                        <button class="quantity-minus" onclick=decrementValueLimit("desertQuantity")>-</button>
                                        <input type="number" class="quantity-input" id="desertQuantity" value="1" min="0">
                                        <button class="quantity-plus" onclick=incrementValueNoLimit("desertQuantity")>+</button>
                                    </div>
                                    
                                    <div class=button-container2>
                                    <button type="submit" class="btn">Add To Cart</button>
                                    <button type="button" class="btn" onclick="closeFormDesert()">Close</button>
                                    </div>
                                </form>
                            </div>
                            ';
                        }

                        // Call the function wherever you want to display the form
                        echo displayFormFood('', '', '');
                        echo displayFormDrink('', '', '');
                        echo displayFormDesert('', '', '');
                        ?>

                            <script>
                            function incrementValue(id) 
                            
                            
                    {
                            event.preventDefault();
                    var value = parseInt(document.getElementById(id).value, 10);
                    value = isNaN(value) ? 0 : value;
                    if (value < 2) { // set maximum value as 2
                            value++;
                    }
                    document.getElementById(id).value = value;
                                }
                    
                            
                            
                            
                                function decrementValue(id) {
                            event.preventDefault();
                    var value = parseInt(document.getElementById(id).value, 10);
                    value = isNaN(value) ? 0 : value;
                    if (value > 0) { // set minimum value as 0
                                value--;
}
                                document.getElementById(id).value = value;
                                }
                        
                                
                                
                                
                            function incrementValueNoLimit(id) {
                                event.preventDefault();
                        var value = parseInt(document.getElementById(id).value, 10);
                        value = isNaN(value) ? 0 : value;
                        //no limit
                        value++;

                                document.getElementById(id).value = value;
        }
                        
        
        
        
  function decrementValueLimit(id) {
                                event.preventDefault();
                        var value = parseInt(document.getElementById(id).value, 10);
                        value = isNaN(value) ? 0 : value;
                        if (value > 1) { // set minimum value as 0
                                                    value--;
                                        }
            document.getElementById(id).value = value;
                            }
                                        
                            
                            
                            </script>

   

   

           </div>

                <br><br><br>
                <h1 class="heading">drinks</h1>
  
                
                                <div class="box-container" id="drink-container">

<?php
// Call the function wherever you want to display the form
echo displayFormDrink('', '', '');
?>




                            </div>




                            <br><br><br>
                            <h1 class="heading">desert</h1>
                            <div class="box-container" id="desert-container">

<?php
// Call the function wherever you want to display the form
echo displayFormDesert('', '', '');
?>




                            </div>


                            <script>
                            function displayFormFood(imagePath, foodName, foodPrice) {
                                                var form = document.getElementById("myFormFood");
                                        var img = form.getElementsByTagName("img")[0];
                                        img.src = imagePath;
                                        img.alt = foodName;

                                        form.getElementsByTagName("h2")[0].textContent = foodName;

                                form.getElementsByTagName("h3")[0].textContent = foodPrice;

                                        form.style.display = "block";
                                }
                                 function closeFormFood() {
                                document.getElementById("myFormFood").style.display = "none";
                                        }
                                        
                                        
                                        
                                        
                                        function displayFormDrink(imagePath, foodName, foodPrice) {
                                                var form = document.getElementById("myFormDrink");
                                        var img = form.getElementsByTagName("img")[0];
                                        img.src = imagePath;
                                        img.alt = foodName;

                                        form.getElementsByTagName("h2")[0].textContent = foodName;

                                form.getElementsByTagName("h3")[0].textContent = foodPrice;

                                        form.style.display = "block";
                            }
                                        



function closeFormDrink() {
                                document.getElementById("myFormDrink").style.display = "none";
                            }
                                        
                                    
                                    
                            
                            function displayFormDesert(imagePath, foodName, foodPrice) {
                                                var form = document.getElementById("myFormDesert");
                                        var img = form.getElementsByTagName("img")[0];
                                        img.src = imagePath;
                                        img.alt = foodName;

                                        form.getElementsByTagName("h2")[0].textContent = foodName;
                                form.getElementsByTagName("h3")[0].textContent = foodPrice;

                                        form.style.display = "block";
                                    }
                                        
                                                                       function closeFormDesert() {
                                                document.getElementById("myFormDesert").style.display = "none";
                                        }
                                        
                                        
                                        
                                        </script>




    </section> 

            <!-- footer section starts  -->

<?php if (!isset($row)) { ?>
                                        <?php if (isset($successMsg) && $successMsg == true) { ?>
                                            <div class="row mt-3">
                                                <div class="col-md-12">
                                                    <div class="alert alert-success alert-dismissible">
                                                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                                                        <img src="<?php echo $_SESSION['cart_items']['foodImg'] ?>" class="rounded img-thumbnail mr-2" style="width:40px;"><?php echo $_SESSION['cart_items']['foodName'] ?> is added to cart. <a href="cart.php" class="alert-link">View Cart</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php
                                        }
                                    }
                                    ?>




<?php
include "footer.inc.php";
?>

                                    <!-- footer section ends -->

                                    <!-- loader part  -->
                                    <!-- <div class="loader-container">
                                        <img src="images/loader.gif" alt="">
                                    </div> -->



                                    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

                                    <!-- custom js file link  -->
                                    <script src="js/main.js"></script>

                                    </body>
                                    </html>