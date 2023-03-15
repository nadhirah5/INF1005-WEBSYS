
<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Other/html.html to edit this template
-->
<html>
    <head>
        <title>INF1005 Project</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet"
              href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
              integrity=
              "sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh"
              crossorigin="anonymous">
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

        <link rel="stylesheet" href="css/main.css">
        <script defer src="js/main.js"></script>
        <script defer src="js/register.js"></script>
        <style>
            #user{
                color:white;
            }
        </style>
    </head>

    <body>
        <?php
        include "nav.inc.php";
        ?>
        <main>
            <div class="text-center">
                <h1 class="mb-3">Register for an account</h1>
                <p>Already have an account? &nbsp;<a href="login.php">Log In</a></p>
                <div class="mb-4">
                    I want to register as: &nbsp;
                    <input type="radio" class="regType" name="regType" value="customer" checked>Customer &nbsp;
                    <input type="radio" class="regType" name="regType" value="merchant">Merchant
                </div>
                <div class="errormsg d-flex pb-4 justify-content-center">
                    <?php
                    if (isset($_SESSION["MregisterMessage"])) {
                        echo $_SESSION["MregisterMessage"];
                        unset($_SESSION["MregisterMessage"]);
                    }
                    if (isset($_SESSION["registerMessage"])) {
                        echo $_SESSION["registerMessage"];
                        unset($_SESSION["registerMessage"]);
                    }
                    ?>
                </div>
            </div>
            <article class="customerRegSection">
                <form action="process_register.php" method="POST">
                    <div class=" d-flex mb-2 mt-2 justify-content-center">
                        <label class="col-sm-2" for="fname">First Name:</label>
                        <input type="text" class="col-sm-2" name="fname" id="fname"><br>
                    </div>
                    <div class=" d-flex mb-2 mt-2 justify-content-center">
                        <label class="col-sm-2" for="fname">Last Name:</label>
                        <input type="text" class="col-sm-2" name="lname" id="lname" required><br>
                    </div>
                    <div class=" d-flex mb-2 mt-2 justify-content-center">
                        <label class="col-sm-2" for="email">Email:</label>
                        <input type="email" class="col-sm-2" name="email" id="email" required><br>
                    </div>
                    <div class="errormsg d-flex pb-4 justify-content-center">
                        <?php
                        if (isset($_SESSION["registerMessage"])) {
                            echo $_SESSION["registerMessage"];
                            unseet($_SESSION["registerMessage"]);
                        }
                        ?>
                    </div>
                    <div class=" d-flex pb-2 pt-2 justify-content-center">
                        <label class="col-sm-2" for="password">Password:</label>
                        <input class="col-sm-2" type="password" name="password" id="password" required><br>
                    </div>
                    <div class=" d-flex pb-2 pt-2 justify-content-center">
                        <label class="col-sm-2" for="mobileNumber">Mobile Number:</label>
                        <input class="col-sm-2" type="number" name="mobileNumber" id="mobileNumber" required><br>
                    </div>
                    <div class=" d-flex pb-2 pt-2 justify-content-center">
                        <label class="col-sm-2" for="dob">Date of Birth:</label>
                        <input class="col-sm-2" type="date" id="dob" name="dob" required><br>
                    </div>  
                    <div class=" d-flex pb-2 pt-2 justify-content-center">
                        <label class="col-sm-2" for="address">Address:</label>
                        <textarea class="col-sm-2" name="address" id="address" cols="20" rows="3" required></textarea><br>
                    </div>
                    <div class=" d-flex pb-2 pt-2 justify-content-center">
                        <input class="col-sm-2" type="submit" value="Register">
                    </div>
                </form>
            </article>
            <article class="merchantRegSection">
                <form action="process_register.php" method="POST">
                    <div class=" d-flex pb-4 justify-content-center">
                        <label class="col-sm-2" for="name">Name:</label>
                        <input class="col-sm-2" type="name" name="name" id="name" required><br>
                    </div>
                    <div class=" d-flex pb-4 justify-content-center">
                        <label class="col-sm-2" for="email">Email:</label>
                        <input class="col-sm-2" type="email" name="email" id="email" required><br>
                    </div>
                    <div class=" d-flex pb-4 justify-content-center">
                        <label class="col-sm-2" for="password">Password:</label>
                        <input class="col-sm-2" type="password" name="password" id="password" required><br>
                    </div>
                    <div class=" d-flex pb-4 justify-content-center">
                        <label class="col-sm-2" for="mobileNumber">Mobile Number:</label>
                        <input class="col-sm-2" type="number" name="mobileNumber" id="mobileNumber" required><br>
                    </div>
                    <div class=" d-flex pb-4 justify-content-center">
                        <input class="col-sm-2" type="submit" value="Register">
                    </div>
                </form>
            </article>
        </main>
        <hr class="solid">
        <?php
        include "footer.inc.php";
        ?>
      
    </body>
</html>