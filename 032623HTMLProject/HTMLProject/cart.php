<?php
// Start the session
session_start();

// Check if the cart is not empty
if (isset($_SESSION['cart_items']) && count($_SESSION['cart_items']) > 0) {
?>
    <table>
        <thead>
            <tr>
                <th>Food Name</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Loop through the cart items and display them in the table
            foreach ($_SESSION['cart_items'] as $cartItem) {
                $foodName = $cartItem['foodName'];
                $foodPrice = $cartItem['foodPrice'];
                $foodQuantity = $cartItem['foodQuantity'];
                $subtotal = $foodPrice * $foodQuantity;
            ?>
                <tr>
                    <td><?php echo $foodName; ?></td>
                    <td><?php echo $foodPrice; ?></td>
                    <td><?php echo $foodQuantity; ?></td>
                    <td><?php echo $subtotal; ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
<?php
} else {
    // Cart is empty
    echo "Your cart is empty.";
}
?>