


<section class="flex">

    <a href="index.php" class="logo"><i class="fas fa-utensils"></i> Wackdonalds </a>

    <nav class="navbar">
        <a class="active" href="index.php">home</a>
        <a href="index.php#dishes">dishes</a>
        <a href="index.php#about">about us</a> 
        <!--under about section, will link to, learn more about us-->

        <a href="menu.php">menu</a>
        <!--<a href="#review">review</a>-->
        <a href="aboutus.php">more</a>

    </nav>

    <div class="icons">
        <i class="fas fa-bars" id="menu-bars"></i>
        <!--<i class="fas fa-search" id="search-icon"></i>-->
<!--        <a href="profile.php" class="fas fa-user"></a>-->
        <div class="dropdown">
             <a href="#" class="fas fa-user"></a>
             <div class="dropdown-content">
               <?php
               session_start();
                if (isset($_SESSION['email'])) {
                    echo "<a href='profile.php'>Profile</a>".
                    "<a href='order_history.php'>Order history</a>".
                    "<a href='address_book.php'>Address</a>".
                    "<a href='logout.php'>Logout</a>";
                }
                else 
                {
                    echo "<a href='login.php'>Login</a>";
                }
                ?>        
             </div>
           </div>
        <a href="cart.php" class="fas fa-shopping-cart"></a>
        
        
    </div>
    
    <script>
  // get all the navbar links
  const navLinks = document.querySelectorAll('.navbar a');

  // add a click event listener to each link
  navLinks.forEach(link => {
    link.addEventListener('click', (event) => {
      // prevent the default behavior of the link
      

      // remove the "active" class from all links
      navLinks.forEach(link => link.classList.remove('active'));

      // add the "active" class to the clicked link
      link.classList.add('active');
    });
  });
</script>

</section>