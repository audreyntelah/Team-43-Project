<!DOCTYPE html>
<html lang="en-UK">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="HomePageCSS.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<title>Page Title</title>
</head>
<body>
<?php
session_start();
//$_SESSION["username"]="MubarakUsername";
$data=[];
if(isset($_SESSION["username"])){
    include_once "connectdb.php";

    $data=query("Select * from users where username='".$_SESSION["username"]."'");
    $data=$data->fetch();
//    print_r($data);
}else{
    header("Location: HomePage.html");
}


?>

	<header>
	<div  class="flex_logo_container" id="logo_div">
  		<img class="logo_transition" id="logo" src="logo.png"> 
	</div>
	</header>
	<nav>
		<div class="nav_container"  id="nav_div">		
			<a href = "" class="Link_Button"target="_blank" id="nav_button1"><button class="nav_btn">Men</button></a>
			<a href = "" class="Link_Button" target="_blank"id="nav_button2"><button class="nav_btn" >Women</button></a>
  			<a href = "" class="Link_Button" target="_blank"id="nav_button3"><button class="nav_btn" >Unisex</button></a>
  			<a href = "" class="Link_Button" target="_blank"id="nav_button4"><button class="nav_btn" >Sale</button></a>
  			<a href = "" class="Link_Button" target="_blank"id="nav_button5"><button class="nav_btn" >Gift Sets</button></a>
  		
  		</div>
  		<div class="flex_search_bar_container">
    	<div class="search_bar">
        <input type="text" placeholder="Search...">
        <button class="search_button">Search</button>
    	</div>
		</div>

	</nav>


	

 
	

	<section>
		<div class="section_middle_container"></div>
	</section>
	
    <section>


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
        <form action="profile_backend.php" method="post">
            <div style="display: flex;justify-content: center;width: 100%">
                <div style="display: flex;justify-content: center;min-width: 50%;flex-direction: column;align-items: center;">
                    <input readonly value="<?= is_array($data)&&isset($data["username"])?$data["username"]:"" ?>" style="margin-top: 15px;" class="input-field" type="text" name="username" placeholder="Username"/>
                    <input value="<?= is_array($data)&&isset($data["firstname"])?$data["firstname"]:"" ?>" style="margin-top: 15px;" class="input-field" type="text" name="firstname" placeholder="First Name"/>
                    <input value="<?= is_array($data)&&isset($data["lastname"])?$data ["lastname"]:"" ?>" style="margin-top: 15px;" class="input-field" type="text" name="lastname" placeholder="Last Name"/>
                    <input value="<?= is_array($data)&&isset($data["mobile"])?$data["mobile"]:"" ?>" style="margin-top: 15px;" class="input-field" type="text" name="mobile" placeholder="Mobile Phone"/>
                    <input value="<?= is_array($data)&&isset($data["email"])?$data["email"]:"" ?>" style="margin-top: 15px;" class="input-field" type="email" name="email" placeholder="E-Mail"/>
                    <input style="margin-top: 15px;" class="input-field" type="password" name="password" placeholder="Password"/>
                    <input style="width: 50%" type="submit" class="btn-black" value="Save"/>
                </div>
            </div>
        </form>
    </section>

	<section>
		<div class="section_middle_container"></div>
	</section>
	<footer>
		<div class="Home_page_footer">
			<div class="Footer_lists">
				<ul><h2>Help</h2>
				<a href="#"><li>Delivery Information</li></a>
				<a href=""><li>Customer Service</li></a>
				<a href=""><li>Return Policy</li></a>
				<a href=""><li>Contact Us</li></a>
				<a href=""><li>FAQs</li></a>
				</ul>

				<ul><h2>About Us</h2>
				<a href="#"><li>About Us</li></a>
				<a href=""><li>Careers</li></a>
				<a href=""><li>Affiliates</li></a>
				<a href=""><li>Student Discount</li></a>
				</ul>
		

				<ul><h2>Legal</h2>
				<a href="#"><li>Terms & Conditions</li></a>
				<a href=""><li>Privacy Policy</li></a>
				<a href=""><li>Cookie Policy</li></a>

				</ul>
			</div>
			<div class="Review_container">
				<img class="Review_img" src="reviews.png">
				
			</div>
			<div class="Social_media_logos">
				<a href="#" class="fa fa-instagram"></a>
				<a href="#" class="fa fa-facebook"></a>
				<a href="#" class="fa fa-twitter"></a>
			</div>

			
		</div>
	</footer>

<script src="Home_Page.js"></script>
</body>
</html> 