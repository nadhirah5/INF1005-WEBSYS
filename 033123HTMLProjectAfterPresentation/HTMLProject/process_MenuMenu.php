<?php




$foodCategory = $_GET['category'];

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
    $stmt = $conn->prepare("SELECT * FROM menu");
// Bind & execute the query statement:
    $stmt->execute();
    $result = $stmt->get_result();

    // Create an empty array to hold the menu items
    $menu_items = array();
    // Loop through each row of the result set and add it to the menu_items array
    
    if($foodCategory==1)
    {
    while ($row = $result->fetch_assoc()) {
        if ($row["foodCategory"] == $foodCategory) {
            echo "<div class='box'>" .
         
            "<img class='' src='images/" . $row["foodPicture"] . "' alt='" . $row["foodDescription"] . " ' onclick=\"displayFormFood('images/" . $row["foodPicture"] . "', '" . $row["foodName"] . "' , '" . $row["foodPrice"] . "')\">" .
            "<h3>" . $row["foodName"] . "</h3>" .
            "<span>$" . $row["foodPrice"] . "</span>" .
            "</div>";
        }
    }
    }
    elseif($foodCategory==0)
    {
    while ($row = $result->fetch_assoc()) {
        if ($row["foodCategory"] == $foodCategory) {
            echo "<div class='box'>" .
            
            "<img class='' src='images/" . $row["foodPicture"] . "' alt='" . $row["foodDescription"] . " ' onclick=\"displayFormDrink('images/" . $row["foodPicture"] . "', '" . $row["foodName"] . "' , '" . $row["foodPrice"] . "')\">" .
            "<h3>" . $row["foodName"] . "</h3>" .
            "<span>$" . $row["foodPrice"] . "</span>" .
            "</div>";
        }
    }
    }
    elseif($foodCategory==2)
    {
    while ($row = $result->fetch_assoc()) {
        if ($row["foodCategory"] == $foodCategory) {
            echo "<div class='box'>" .
        
            "<img class='' src='images/" . $row["foodPicture"] . "' alt='" . $row["foodDescription"] . " ' onclick=\"displayFormDesert('images/" . $row["foodPicture"] . "', '" . $row["foodName"] . "' , '" . $row["foodPrice"] . "')\">" .
            "<h3>" . $row["foodName"] . "</h3>" .
            "<span>$" . $row["foodPrice"] . "</span>" .
            "</div>";
        }
    }
    }
    

    $conn->close();
}
?>
