<?php
require "db_connect.php";
function saveCustomisation($data,$item_id){
    $sessionId = $_SESSION['sessionID'] ?? session_id();
    $sql = "UPDATE basket SET  customisation=? WHERE sessionID = ? and productID=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $data,$sessionId,$item_id);
    $stmt->execute();
}