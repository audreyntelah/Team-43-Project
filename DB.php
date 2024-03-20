<?php

class DB
{

    public $servername = "localhost"; // Replace with your server name
    public $username = "root"; // Replace with your database username
    public $password = ""; // Replace with your database password
    public $dbname = "fragrancewebsite"; // Replace with your database name
    public $conn;
    public function __construct()
    {
        $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    public function select($query,$function=null)
    {
        $stmt = $this->conn->prepare($query);
        if($function!=null){
            $stmt=$function($stmt);
        }
        $stmt->execute();
        $result = $stmt->get_result();
        $data=[];
        if ($result->num_rows > 0) {
            while($row=$result->fetch_assoc()){
                $data[]=$row;
            }
            return $data;
        }else{
            return [];
        }
    }

    public function update($query,$function)
    {
        $stmt = $this->conn->prepare($query);
        if($function!=null){
            $stmt=$function($stmt);
        }
        $stmt->execute();
    }

    public function insert($query,$function)
    {
        $stmt = $this->conn->prepare($query);
        if($function!=null){
            $stmt=$function($stmt);
        }
        $stmt->execute();
        $id=$this->conn->insert_id;
        return $id;
    }


}