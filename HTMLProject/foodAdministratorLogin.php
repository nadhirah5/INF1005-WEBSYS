
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
    </head>
    
    <body>
         <?php
        include "nav.inc.php";
        ?>
        <main>
        <h1 class="container-fluid bg-3 text-center pb-4 pt-4">Login</h1>
        <section>
            <form action="process_foodAdministrator_Login.php" method="post">
                <div class=" d-flex pb-4 justify-content-center">
                    <label class="col-sm-2 pr-5 text-right" for="text">Login:</label>
                    <input class="col-sm-2" type="text" name="foodAdminLogin" id="foodAdminLogin" required><br>
                </div>
                <div class=" d-flex pb-4 justify-content-center">
                    <label class="col-sm-2 pr-5 text-right" for="password">Password:</label>
                    <input class="col-sm-2" type="password" name="pwd" id="pwd" required><br>
                </div>
                <div class=" d-flex pb-4 justify-content-center">
                    <input type="submit" value="Login" class="pr-3 pl-3">
                </div>
            </form>
        </section>
        </main>
        <hr class="solid">
        <?php
        include "footer.inc.php";
        ?>
    </body>
</html>