<?php
// connect to your database
include 'db_connect.php';

// Fetch products for the dropdown
$result = mysqli_query($conn, "SELECT productID, name FROM product");
$products = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add to Cart</title>
</head>
<body>
    <h1>Add to Cart</h1>

    <form action="add_to_cart.php" method="post">
        <label for="product">Product:</label>
        <select name="productID" id="product">
            <?php foreach ($products as $product): ?>
                <option value="<?php echo $product['productID']; ?>">
                    <?php echo $product['name']; ?>
                </option>
            <?php endforeach; ?>
        </select>
        <br><br>

        <label for="quantity">Quantity:</label>
        <input type="number" id="quantity" name="quantity" min="1" max="10" value="1">
        <br><br>

        <input type="submit" value="Add to Cart">
    </form>
</body>
</html>
