<?php

include_once "connectdb.php";
function updateStockLevels($productId,$qty){
    $db=query("select * from `product` where productID='".$productId."'");
    $db=$db->fetch();
    $current_stock=$db["quantity"];
    $new_stock=$current_stock-$qty;
    if($new_stock>0){
        $db=query("UPDATE `product` SET `quantity`='".$new_stock."' WHERE productID='".$productId."'");
        $affected_rows=$db->rowCount();
        if($affected_rows>0){
            return true;
        }
        return false;
    }else{
        return false;
    }

}