
<?php 

//To do:
//add password complexity requirements

try{
	
	#register user by inserting the user info 
	$stat=$db->prepare("insert into users values(default,?,?)");
	$stat->execute(array($email, $password));
	
	$id=$db->lastInsertId();
	echo "Congratulations! You are now registered. Your ID is: $id  ";  	
	
 }
 catch (PDOexception $ex){
	echo "Sorry, a database error occurred! <br>";
	echo "Error details: <em>". $ex->getMessage()."</em>";
 }

 ?>