<?php


if (isset($_SESSION['adminlogin'])) {
    echo "<div class='container'>".
            "<section class='account-info' id='account-info'>".
            "<div class='button-container2'>".
            "<a href='admincustomer.php' class = 'btn'>Manage Customer</a>".
            "<a href='adminmenu.php' class='btn'>Manage Menu</a>".
            " <a href='adminreview.php' class='btn'>Manage Review</a>".
            " <a href='logout.php' class='btn'>Logout</a>".
            "</div>".
            "</section>".
            "</div>";
}



?>