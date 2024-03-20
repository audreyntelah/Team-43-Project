<?php
require_once "Product.php";
$allData=Product::getAll();
$product=null;


if(isset($_POST["save"])){
    $product=new Product($_POST["productid"]);
    $product->updateStock($_POST["quantity"]);
    $allData=Product::getAll();
    $product=null;
}else if(isset($_GET["productid"])){
    $product=new Product($_GET["productid"]);
}
?>

<html>
<head>
    <title>Test Update Stock Level</title>
</head>
<body>
<table>
    <tr>
        <th>#id</th>
        <th>Name</th>
        <th>Quantity</th>
        <th>Update</th>
    </tr>

    <?php foreach ($allData as $item){?>

    <tr>
        <td><?= $item["productID"] ?></td>
        <td><?= $item["name"] ?></td>
        <td><?= $item["quantity"] ?></td>
        <td><a href="test_update_stock_level.php?productid=<?= $item["productID"] ?>" >update</a></td>

    </tr>
    <?php } ?>
</table>
<?php if($product!=null) { ?>
    <form action="test_update_stock_level.php" method="post">
        <label><?= $product->getProduct()["name"] ?></label>
        <input name="quantity" type="text" value="<?= $product->getProduct()['quantity'] ?>" style="border-radius: 5px;min-width: 50px;min-height: 30px;" >
        <input name="productid" type="hidden" value="<?= $product->getProduct()['productID'] ?>" style="border-radius: 5px;min-width: 50px;min-height: 30px;" >
        <input name="save" type="submit" value="Save" style="min-width: 30px;min-height: 35px;background-color: #5cb85c" />
    </form>
<?php } ?>
</body>
</html>
