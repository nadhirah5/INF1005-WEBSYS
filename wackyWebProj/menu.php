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
        
        
        <!-- dishes section starts  -->

        <div class="container">

            <section class="dishes" id="menu">
                
                <br><br><br>
                <h1 class="heading">food</h1>

                <div class="box-container">

                    <?php
                        function displayForm($imagePath, $foodName) {
                            return '
                            <div class="form-popup" id="myForm">
                                <form action="index.php" method ="post" class="form-container">
                                    <h1 class="sub-heading">Customize Your Meal</h1>
                                    </br>
                                    <img src="' . $imagePath . '" alt="' . $foodName . '" width=100%>
                                    
                                    </br>
                                    <h2>' . $foodName . '</h2>
                                    </br>
                                        
                                    <label><b>Pickles</b></label>
                                    <select name="pickles" id="pickles">
                                        <option value="0">0</option>
                                        <option value="1" selected>1</option>
                                        <option value="2">2</option>
                                    </select>
                                    <br>
                                    <label for="tomatoes"><b>Tomatoes</b></label>
                                    <select name="tomatoes" id="tomatoes">
                                        <option value="0">0</option>
                                        <option value="1" selected>1</option>
                                        <option value="2">2</option>
                                    </select>
                                    <br>

                                    <div class=button-container2>
                                    <button type="submit" class="btn">Add To Cart</button>
                                    <button type="button" class="btn" onclick="closeForm()">Close</button>
                                    </div>
                                </form>
                            </div>
                            ';
                        }
                        // Call the function wherever you want to display the form
                        echo displayForm('', '');
                    ?>

                    <div class="box">
                        <a href="#" class="fas fa-heart"></a>
                        <a href="#" class="fas fa-eye"></a>
                        <img src="images/eggless_omelette.jpg" alt="" onclick="displayForm('images/eggless_omelette.jpg', 'Eggless Omelette')">
                        <h3>Eggless Omelette</h3>
                        <span>$15.99</span>
                    </div>

                    <div class="box">
                        <a href="#" class="fas fa-heart"></a>
                        <a href="#" class="fas fa-eye"></a>
                        <img src="images/fingerfood.jfif" alt="" onclick="displayForm('images/fingerfood.jfif', 'Finger food')">
                        <h3>Finger food</h3>
                        <span>$15.99</span>
                    </div>

                    <div class="box">
                        <a href="#" class="fas fa-heart"></a>
                        <a href="#" class="fas fa-eye"></a>
                        <img src="images/altdimensionfood.jpg" alt="" onclick="displayForm('images/altdimensionfood.jpg', 'Found in The Backrooms')">
                        <h3>Found in The Backrooms</h3>
                        <span>$15.99</span>
                    </div>

                    <div class="box">
                        <a href="#" class="fas fa-heart"></a>
                        <a href="#" class="fas fa-eye"></a>
                        <img src="images/husbando.jfif" alt="">
                        <h3>Husbando</h3>
                        <span>$15.99</span>
                    </div>

                    <div class="box">
                        <a href="#" class="fas fa-heart"></a>
                        <a href="#" class="fas fa-eye"></a>
                        <img src="images/waifu.jfif" alt="">
                        <h3>Waifu</h3>
                        <span>$15.99</span>
                    </div>

                    <div class="box">
                        <a href="#" class="fas fa-heart"></a>
                        <a href="#" class="fas fa-eye"></a>
                        <img src="images/pet.jpg" alt="">
                        <h3>Pet</h3>
                        <span>$15.99</span>
                    </div>
                    
                    <div class="box">
                        <a href="#" class="fas fa-heart"></a>
                        <a href="#" class="fas fa-eye"></a>
                        <img src="images/altdimensionfood.jpg" alt="">
                        <h3>Found in The Backrooms</h3>
                        <span>$15.99</span>
                    </div>
                    
                    <div class="box">
                        <a href="#" class="fas fa-heart"></a>
                        <a href="#" class="fas fa-eye"></a>
                        <img src="images/altdimensionfood.jpg" alt="">
                        <h3>Found in The Backrooms</h3>
                        <span>$15.99</span>
                    </div>
                    
                    <div class="box">
                        <a href="#" class="fas fa-heart"></a>
                        <a href="#" class="fas fa-eye"></a>
                        <img src="images/altdimensionfood.jpg" alt="">
                        <h3>Found in The Backrooms</h3>
                        <span>$15.99</span>
                    </div>
                    

                    <script>
                        function displayForm(imagePath, foodName) {
                            var form = document.getElementById("myForm");
                            var img = form.getElementsByTagName("img")[0];
                            img.src = imagePath;
                            img.alt = foodName;
                            
                            form.getElementsByTagName("h2")[0].textContent = foodName;
                            
                            form.style.display = "block";
                        }

                        function closeForm() {
                            document.getElementById("myForm").style.display = "none";
                        }
                    </script>
                </div>
                
                <br><br><br>
                <h1 class="heading">drinks</h1>

                <div class="box-container">

                    <div class="box">
                        <a href="#" class="fas fa-heart"></a>
                        <a href="#" class="fas fa-eye"></a>
                        <img src="images/eggless_omelette.jpg" alt="">
                        <h3>Eggless Omelette</h3>
                        <span>$15.99</span>
                    </div>

                    <div class="box">
                        <a href="#" class="fas fa-heart"></a>
                        <a href="#" class="fas fa-eye"></a>
                        <img src="images/fingerfood.jfif" alt="">
                        <h3>Finger food</h3>
                        <span>$15.99</span>
                    </div>

                    <div class="box">
                        <a href="#" class="fas fa-heart"></a>
                        <a href="#" class="fas fa-eye"></a>
                        <img src="images/altdimensionfood.jpg" alt="">
                        <h3>Found in The Backrooms</h3>
                        <span>$15.99</span>
                    </div>

                    <div class="box">
                        <a href="#" class="fas fa-heart"></a>
                        <a href="#" class="fas fa-eye"></a>
                        <img src="images/husbando.jfif" alt="">
                        <h3>Husbando</h3>
                        <span>$15.99</span>
                    </div>

                    <div class="box">
                        <a href="#" class="fas fa-heart"></a>
                        <a href="#" class="fas fa-eye"></a>
                        <img src="images/waifu.jfif" alt="">
                        <h3>Waifu</h3>
                        <span>$15.99</span>
                    </div>

                    <div class="box">
                        <a href="#" class="fas fa-heart"></a>
                        <a href="#" class="fas fa-eye"></a>
                        <img src="images/pet.jpg" alt="">
                        <h3>Pet</h3>
                        <span>$15.99</span>
                    </div>
                </div>
            </section>    
        
        
        
        <!-- footer section starts  -->

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