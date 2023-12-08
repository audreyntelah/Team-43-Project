<?php


function connect(){
    $db_host = 'localhost';
    $db_name = 'fragrancewebsite';
    $username = 'root';
    $password = '';
    try{
        $db = new PDO("mysql:dbname=$db_name;host=$db_host", $username, $password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $db;
    } catch(PDOException $ex) {
        echo("Failed to connect to the database.<br>");
        echo($ex->getMessage());
        return null;
    }
}

function query($q){
    $db=connect();
    $p=$db->prepare($q);
    $p->execute();
    $p->setFetchMode(PDO::FETCH_ASSOC);
    return $p;
}


?>