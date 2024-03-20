<?php
require_once "DB.php";
class Product
{

    private $product;
    private $db;
    public function __construct($id)
    {
        $this->db=new DB();
        $sql = "SELECT * FROM product WHERE productID = ?";
        $result=$this->db->select($sql,function ($stmt) use ($id){
           $stmt->bind_param("s", $id);
           return $stmt;
        });
        if($result){
            $this->product=$result[0];
        }else{
            $this->product=null;
        }
    }

    public static function getAll(){
        $db=new DB();
        $sql = "SELECT * FROM product WHERE 1";
        return $db->select($sql);
    }

    public function increaseStock($number)
    {
        $current_stock=$this->product["quantity"];
        $new_stock=$current_stock+$number;
        return  $this->updateStock($new_stock);
    }

    public function decreaseStock($number)
    {
        $current_stock=$this->product["quantity"];
        $new_stock=$current_stock-$number;
        if($new_stock>=0){
            return  $this->updateStock($new_stock);
        }else {
            return false;
        }
    }
    public function updateStock($number)
    {
        if($this->product!=null){
            $sql="UPDATE product SET  quantity=? WHERE productID = ?";
            $this->db->update($sql,function ($stmt) use ($number){
                 $stmt->bind_param("ss", $number,$this->product["productID"]);
                 return $stmt;
            });
            return  true;
        }else{
            return false;
        }
    }

    public function getProduct()
    {
        return $this->product;
    }
}


