
	window.onscroll = function() {scrollFunction()};
	// This function is necessary becuase we need to create a point where the user scrolls down past a point so the logo can "disappear" and "reappear"
	function scrollFunction() {
	  if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50) {
	    document.getElementById("logo_div").style.padding ="10px 5px";
	    
	    document.getElementById("logo").style.width ="0%";
	    document.getElementById("logo").style.height ="0%";



	  } else {
	    document.getElementById("logo_div").style.padding = "10px 10px";

	   

	    document.getElementById("logo").style.width ="300px";
	    document.getElementById("logo").style.height ="300px";
	  }
	}

		let slideIndex = 0;
		showSlides();
		//This function is required so that the slideshow can automatically move along and have the indicators follow in suit 
		function showSlides() {
		  let i;
		  let slides = document.getElementsByClassName("mySlides");
		  let dots = document.getElementsByClassName("Slide_Indicator");
		  for (i = 0; i < slides.length; i++) {
		    slides[i].style.display = "none";  
		  }
		  slideIndex++;
		  if (slideIndex > slides.length) {slideIndex = 1}    
		  for (i = 0; i < dots.length; i++) {
		    dots[i].className = dots[i].className.replace(" active", "");
		  }
		  slides[slideIndex-1].style.display = "block";  
		  dots[slideIndex-1].className += " active";
		  setTimeout(showSlides, 10000); 
		}


        
    //This function has been designed to display a modal window the first time a user visits a webpage and then hide it on subsequent visits. It accomplishes this by using cookies to keep track of whether the modal has been shown before .
	        
	window.addEventListener('load', function() {
	    var modal = document.getElementById('my_Modal');
	    var closeModal = document.getElementById('close_Modal');

	    var modalShown = getCookie('modalShown');

	    if (!modalShown) {
	        modal.style.display = 'block';

	        closeModal.addEventListener('click', function() {
	            modal.style.display = 'none';
	            setCookie('modalShown', 'true', 30);
	        });
	    }
	});

	function setCookie(name, value, days) {
	    var expires = '';
	    if (days) {
	        var date = new Date();
	        date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
	        expires = '; expires=' + date.toUTCString();
	    }
	    document.cookie = name + '=' + value + expires + '; path=/';
	}

	function getCookie(name) {
	    var nameEQ = name + '=';
	    var cookies = document.cookie.split(';');
	    for (var i = 0; i < cookies.length; i++) {
	        var cookie = cookies[i];
	        while (cookie.charAt(0) == ' ') {
	            cookie = cookie.substring(1, cookie.length);
	        }
	        if (cookie.indexOf(nameEQ) == 0) {
	            return cookie.substring(nameEQ.length, cookie.length);
	        }
	    }
	    return null;
	}


    	var owl = $('.owl-carousel');
        
        function pauseCarousel() {
            owl.trigger('stop.owl.autoplay');
        }

        function playCarousel() {
            owl.trigger('play.owl.autoplay');
        }

        owl.owlCarousel({
            loop: true,
            margin: 10,
            nav: false,
            autoplay: true,
            dots: false,
            autoplayTimeout: 1000,
            padding: 50,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 3
                },
                1000: {
                    items: 5
                }
            }
        });

    	//This function is needed to change the login modal so that other forms can be displayed 
        function showRegisterForm() {
            // Get the form element
            const modalForm = document.getElementById('modalForm');

            // Change the form content
            modalForm.innerHTML = `
                <button class="Register_button" onclick="showLoginForm()">Back to Login</button>
                <span class="close" id="close_Modal" onclick="closeModal()">&times;</span>
                <div class="model_img_container">
                    <a href="javascript:showAdminForm()"><img src="logo.png" class="Login_img"></a>
                </div>
                <div class="username_password_container">
                    <label for="newUsername"><h2>Create a Username</h2></label>
                    <input type="username" placeholder="Enter a Username" name="newUsername">
                    <label for="newPassword"><b><h2>New Password</h2></b></label>
                    <input type="password" placeholder="Enter a Password" name="newPassword">
                    <button class="Login_submit_button" type="submit">Register</button>
                </div>
            `;
        }

        function showLoginForm() {
            
            const modalForm = document.getElementById('modalForm');
            modalForm.innerHTML = `
                <button class="Register_button" onclick="showRegisterForm()">Register</button>
                <span class="close" id="close_Modal"onclick="closeModal()">&times;</span>
                <div class="model_img_container">
                    <a href="javascript:showAdminForm()"><img src="logo.png" class="Login_img"></a>
                </div>
                <div class="username_password_container">
                    <label for="uname"><h2>Username</h2></label>
                    <input type="username" placeholder="Enter Username" name="uname">
                    <label for="psw"><b><h2>Password</h2></b></label>
                    <input type="password" placeholder="Enter Password" name="psw">
                    <button class="Login_submit_button" type="submit">Login</button>
                    <div class="username_password_footer">
                        <label>
                            <input type="checkbox" unchecked="unchecked" name="remember"> Remember me
                        </label>
                        <br><br>
                        <span><a href="javascript:alert('We have sent a password reset email to your email address , please check your inbox');" style="color: white;">Forgot Password?</a></span>
                    </div>
                </div>
            `;
        }
        function showAdminForm(){
        	const modalForm = document.getElementById('modalForm');
            modalForm.innerHTML = `
                <button class="Register_button" onclick="showLoginForm()">Customer Login</button>
                <span class="close" id="close_Modal"onclick="closeModal()">&times;</span>
                <div class="model_img_container">
                    <a href="javascript:showAdminForm()"><img src="logo.png" class="Login_img"></a>
                </div>
                <div class="username_password_container">
                    <label for="uname"><h2>Admin Username</h2></label>
                    <input type="username" placeholder="Enter Admin Username" name="uname">
                    <label for="psw"><b><h2>Admin Password</h2></b></label>
                    <input type="password" placeholder="Enter Admin Password" name="psw">
                    <button class="Login_submit_button" type="submit">Login</button>
                    <div class="username_password_footer">
                    <br>
                        <span><a href="javascript:alert('We have sent a password reset email to your email address , please check your inbox');" style="color: white;">Forgot Password?</a></span>
                    </div>
                </div>
            `;
        }

        function closeModal() {
            const openModal = document.querySelector('.login_modal[style="display: block;"]');
            if (openModal) {
                openModal.style.display = 'none';
                }
            }

     
    