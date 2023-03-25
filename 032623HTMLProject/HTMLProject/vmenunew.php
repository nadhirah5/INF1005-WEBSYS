<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php 
session_start(); 


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
    </head>


    <body>

        <?php
        include "nav.inc.php";
        ?>


        <!--    ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~   Header   ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->

        <header class="header">

            <br><br><br>
            <div class="slideshow-container">

                <div class="mySlides">
                    <div class="numbertext">1 / 3</div>
                    <img src="images/food1.jpeg" style="width:100%">
                    <div class="text">Most Popular</div>
                </div>

                <div class="mySlides">
                    <div class="numbertext">2 / 3</div>
                    <img src="images/food2.jpeg" style="width:100%">
                    <div class="text">Caption Two</div>
                </div>

                <div class="mySlides">
                    <div class="numbertext">3 / 3</div>
                    <img src="images/food3.jpeg" style="width:100%">
                    <div class="text">Caption Three</div>
                </div>

                <a class="prev" onclick="plusSlides(-1)">❮</a>
                <a class="next" onclick="plusSlides(1)">❯</a>

            </div>
            <br>

            <div style="text-align:center">
                <span class="dot" onclick="currentSlide(1)"></span> 
                <span class="dot" onclick="currentSlide(2)"></span> 
                <span class="dot" onclick="currentSlide(3)"></span> 
            </div>


        </header>

        <!--    ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~  Header Section End   ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->

        <!-- slider section start -->




        <!-- slider section end -->


        <!-- Food section row 1 -->
        <main>
            <section id="food">
                <div class="menu_h2">Burgers</div>
                <div class="food_row">
                    <div class="menu_column">
                        <figure>
                            <img class="menu_img" src="images/burger.png" alt="Cheesy Teriyaki Burger" style="width:100%" onclick="displayForm('images/burger.png', 'Cheesy Teriyaki Burger')">
                            <figcaption>Cheesy Teriyaki Burger</figcaption> 
                        </figure>
                    </div>
                    <div class="menu_column">
                        <figure>
                            <img class="menu_img" src="images/burger2.png" alt="Double Cheese Burger" style="width:100%" onclick="displayForm('images/burger2.png', 'Double Cheese Burger')">
                            <figcaption>Double Cheese Burger</figcaption> 
                        </figure>
                    </div>
                </div>

                <!-- Customize form Start -->

                <!--           
                                Add the IDs and values that can link with the database
                                
                                - The hidden input fields is named "id" and "price" > this is with their respective values for the burger
                                - Values from hidden fields are to be retrieved from database and insert dynamically into the form.
                                - Added the "method" attribute with the value "post" into the form element. This is to send data to server in a secured manner
                -->

                <?php

                function displayForm($imagePath, $foodName) {
                    $_SESSION['foodname'] = $foodName;
                    return '
    <div class="form-popup" id="myForm">
        <form method ="post" class="form-container">
            <h1>Customize Your Meal</h1>
            <img src="' . $imagePath . '" alt="' . $foodName . '">
            </br>
            <input type="hidden" name="id" value="1">
            <input type="hidden" name="price" value="8.7">
            <label for="sauce"><b>Sauce</b></label>
            <select name="sauce" id="sauce">
                <option value="0">0</option>
                <option value="1" selected>1</option>
                <option value="2">2</option>
            </select>
            <br>
            <label for="cheese"><b>Cheese</b></label>
            <select name="cheese" id="cheese">
                <option value="0">0</option>
                <option value="1" selected>1</option>
                <option value="2">2</option>
            </select>
            <br>
            
            <button type="submit" class="btn" name="add_to_cart">Add To Cart</button>
            <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
        </form>
    </div>
    ';
                }

// Call the function wherever you want to display the form
                echo displayForm('', '');
                ?>


                <!-- Customize form End -->
            </section>

            <script>
                function displayForm(imagePath, foodName) {
                    var form = document.getElementById("myForm");
                    var img = form.getElementsByTagName("img")[0];
                    img.src = imagePath;
                    img.alt = foodName;
                    form.style.display = "block";
                }

                function closeForm() {
                    document.getElementById("myForm").style.display = "none";
                }
            </script>


            <!-- food sec row 1 end -->




            <section id="drinks">
                <div class= "menu_h2">Beverages</div>
                <div class="food_row">
                    <div class="menu_column">
                        <figure>
                            <img class="menu_img" src="images/drink1.jpg" alt="Soft Drinks" style="width:100%" onclick="displayForm('images/drink1.jpg', 'Soft Drinks')">
                            <figcaption>Soft Drinks</figcaption> 
                        </figure>
                    </div>
                    <div class="menu_column">
                        <figure>
                            <img class="menu_img" src="images/drink2.jpeg" alt="Smoothie" style="width:100%" onclick="displayForm('images/drink2.jpeg', 'Smoothie')">
                            <figcaption>Smoothie</figcaption> 
                        </figure>
                    </div>
                    <div class="menu_column">
                        <figure>
                            <img class="menu_img" src="images/drink3.gif" alt="Caffeinated Drinks" style="width:100%" onclick="displayForm('images/drink3.gif', 'Caffeinated Drinks')">
                            <figcaption>Caffeinated Drinks</figcaption> 
                        </figure>
                    </div>
                    <div class="menu_column">
                        <figure>
                            <img class="menu_img" src="images/PngItem_491793.png" alt="water" style="width:100%" onclick="displayForm('images/PngItem_491793.png', 'Water')">
                            <figcaption>Water</figcaption> 
                        </figure>
                    </div>
                </div>
                <?php
            
            if (isset($_POST['add_to_cart'])) {
               
                $foodName = $_SESSION['foodname'];
                $productQty = 1;

                getFoodData();
                console.log("cartArray" . $cartArray['foodID']);
                if (isset($_SESSION['cart_items']) && !empty($_SESSION['cart_items'])) {
                    $foodNames = [];
                    foreach ($_SESSION['cart_items'] as $cartKey => $cartItem) {
                        $foodNames[] = $cartItem['foodName'];
                        if ($cartItem['foodName'] == $foodName) {
                            $_SESSION['cart_items'][$cartKey]['qty'] = $productQty;
                            $_SESSION['cart_items'][$cartKey]['total_price'] = $calculateTotalPrice;
                            break;
                        }
                    }

                    if (!in_array($foodName, $foodNames)) {
                        $_SESSION['cart_items'][] = $cartArray;
                    }

                    $successMsg = true;
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



            </section>
            <!-- drink sec row 1 end -->


            <?php
            include "footer.inc.php";
            ?>
             <?php if(!isset($row)){?>
        <?php if(isset($successMsg) && $successMsg == true){?>
            <div class="row mt-3">
                <div class="col-md-12">
                    <div class="alert alert-success alert-dismissible">
                         <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <img src="<?php echo $_SESSION['cart_items']['foodImg'] ?>" class="rounded img-thumbnail mr-2" style="width:40px;"><?php echo $_SESSION['cart_items']['foodName']?> is added to cart. <a href="cart.php" class="alert-link">View Cart</a>
                    </div>
                </div>
            </div>
             <?php }}?>

            
        </main>

    </body>

</html>
