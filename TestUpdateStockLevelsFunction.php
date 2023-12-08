<?php
require_once "StockLevels.php";



    if(isset($_POST["product_id"]) && isset($_POST["quantity_decrease"])){
        if(updateStockLevels($_POST["product_id"],$_POST["quantity_decrease"])){
            header("Location: TestUpdateStockLevelsFunction.php?msg=stock updated successfully&type=success");
        }else{
            header("Location: TestUpdateStockLevelsFunction.php?msg=Error! may the product ID not exist or the current stock level not has enough quantity&type=error");
        }
        exit;
    }
?>

<html>
<head>
    <title>Test Update Stock Levels Function</title>
</head>
<body>
<h1>This page just to test function and must delete from final project</h1>
<?php
        if(isset($_GET["msg"]) && $_GET["type"]=="error"){
            echo '<div style="background-color: rgba(255, 0, 0, 0.42);
  border-radius: 25px;
  padding: 30px;
  margin: 15px;">
            <h1>'.$_GET['msg'].'</h1>
        </div>';
        }else if (isset($_GET["msg"]) && $_GET["type"]=="success"){
            echo '<div style="background-color: rgba(32, 255, 0, 0.51);
  border-radius: 25px;
  padding: 30px;
  margin: 15px;">
  <h1>'.$_GET['msg'].'</h1>
</div>';
        }
        ?>

<form action="TestUpdateStockLevelsFunction.php" method="post">
    <input type="number" name="product_id" placeholder="Product ID" />
    <input type="number" name="quantity_decrease" placeholder="Quantity Decrease" />
    <input type="submit" value="Submit">
</form>

</body>
</html>
