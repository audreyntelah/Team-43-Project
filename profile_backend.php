<?php
include_once "connectdb.php";
function update_profile($data){
    $emailExisting=query("select * from users where email='".$data['email']."' and username<>'".$data['username']."'");
    $emailExisting=$emailExisting->fetch();
    if(isset($emailExisting["username"])){
        header("Location: profile.php?msg=email already exists&type=error");
        exit;
    }
    $q="UPDATE `users` SET 
                   `firstname`='".$data["firstname"]."',
                   `lastname`='".$data["lastname"]."',
                   `email`=   '".$data["email"]."',
                   `mobile`=  '".$data["mobile"]."'";
    if(isset($data["password"]) && $data["password"]!=""){
        $q.=",`password`='".$data["password"]."'";
    }
    $q.="WHERE username='".$data["username"]."'";
    query($q);
    header("Location: profile.php?msg=profile updated successfully&type=success");
}


if (isset($_POST["username"])){
    update_profile($_POST);
}