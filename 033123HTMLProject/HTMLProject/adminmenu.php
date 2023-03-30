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
                        url: "process_MenuAdmin.php?",
                        type: "GET",
                        data: {category: "1"},
                        success: function (result) {
                            $("#food-container").html(result);
                        },
                        error: function (xhr, status, error) {
                            console.log("Error: " + error);
                        }
                    });
                });

                $(document).ready(function () {
                    $.ajax({
                        url: "process_MenuAdmin.php",
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

                $(document).ready(function () {
                    $.ajax({
                        url: "process_MenuAdmin.php",
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

        <!-- header section starts -->

        <header>

            <?php
            session_start();
            $sessionfoodAdminLogin = $_SESSION['adminlogin'];
            include "nav.inc.php";
            include "adminnav.php";
            
            ?>
            <script>
                  function convertToForm(foodid, foodname, foodprice, foodDescription,foodCategory,foodFrontPage,element) {
                        //make Delete button dissapear
                        document.getElementById("DELETEMENU").style.display = "none";
                        
                        // Create a new form element
                        var form = document.createElement("form");

                        // Set the form method and action
                        form.method = "post";
                        form.enctype = "multipart/form-data";
                        form.action="process_MenuAdminUpdate.php";

                        // Create a new input element
                        var image = document.createElement("input");
                        var foodID = document.createElement("input");
                        var input = document.createElement("input");
                        var input2 = document.createElement("input");
                        var input3 = document.createElement("input");
                        var input4 = document.createElement("input");
                        var input5 = document.createElement("input");
                        var br = document.createElement("br");
                        var submit = document.createElement("button");

                        // Set the input type and name

                        image.type = "file";
                        image.name = "foodPicture";
                        image.required = true;

                        foodID.type = "hidden";
                        foodID.name = "foodID";
                        foodID.value = foodid;
                        foodID.required = true;


                        input.type = "text";
                        input.name = "foodName";
                        input.value = foodname;
                        input.required = true;

                        input2.type = "text";
                        input2.name = "foodPrice";
                        input2.value = foodprice;
                        input2.required = true;

                        input3.type = "text";
                        input3.name = "foodDescription";
                        input3.value = foodDescription;
                        input3.required = true;
                        
                        input4.type = "text";
                        input4.name = "foodCategory";
                        input4.value = foodCategory;
                        input4.required = true;
                        
                        input5.type = "text";
                        input5.name = "foodFrontPage";
                        input5.value = foodFrontPage;
                        input5.required = true;

                        submit.name = "updateMenuToDB";
                        submit.value = "Update";
                        submit.innerText = "Update";



                        // Append the input element to the form
                        form.appendChild(image);
                        form.appendChild(foodID);
                        form.appendChild(input);
                        form.appendChild(input2);
                        form.appendChild(input3);
                        form.appendChild(input4);
                        form.appendChild(input5);
                        form.appendChild(br);
                        form.appendChild(submit);


                        // Replace the clicked element with the form
                        element.parentNode.replaceChild(form, element);

                        // Focus on the input element
                        input.focus();
                    }
                    
                    function convertToFormDelete(foodid, element) {
                        //make Update button dissapear
                        document.getElementById("UPDATEMENU").style.display = "none";
                        
                        // Create a new form element
                        var form = document.createElement("form");

                        // Set the form method and action
                        form.method = "post";
                        form.action="process_MenuAdminDelete.php"

                        // Create a new input element
                        var foodID = document.createElement("input");
                        var checkboxtext = document.createElement("label");
                        var checkbox = document.createElement("input");
                        var br = document.createElement("br");
                        var submit = document.createElement("button");

                        // Set the input type and name

                        foodID.type = "hidden";
                        foodID.name = "foodID";
                        foodID.value = foodid;
                        foodID.required = true;
                        
                        checkboxtext.innerText="Confirm deletion from menu";
                        
                        checkbox.type="checkbox";
                        checkbox.name="checkbox";
                        checkbox.required = true;


                        submit.name = "deleteMenuToDB";
                        submit.value = "Delete";
                        submit.innerText = "Delete";



                        // Append the input element to the form
                        form.appendChild(foodID);
                        form.appendChild(checkboxtext);
                        form.appendChild(br);
                        form.appendChild(checkbox);
                        form.appendChild(br);
                        form.appendChild(submit);


                        // Replace the clicked element with the form
                        element.parentNode.replaceChild(form, element);

                        // Focus on the input element
                        input.focus();
                    }
                </script>

        </header>
        <!-- dishes section starts  -->
        
  
        <br><br><br><br><br><br><br><br><br><br><br><br><br><br>
        <div class="container">
            <section class="dishes" id="menu">
                <br><br><br>
                <h1 class="heading">food</h1>

                <div class="box-container" id="food-container">  


                </div>

                <br><br><br>
                <h1 class="heading">drinks</h1>


                <div class="box-container" id="drink-container">

                </div>




                <br><br><br>
                <h1 class="heading">desert</h1>
                <div class="box-container" id="desert-container">



                </div>


            </section> 
        </div>

        <!-- footer section starts  -->

        <?php
        include "footer.inc.php";
        ?>

        <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

        <!-- custom js file link  -->
        <script src="js/main.js"></script>

    </body>
</html>