
    window.onscroll = function() {scrollFunction()};
    // This function is necessary becuase we need to create a point where the user scrolls down past a point so the logo can "disappear" and "reappear"
    //The Scroll Function is triggered when the user scrolls past a certain point , then it will adjust the styling on the logo div and the logo image itself.This creates a animation 
    function scrollFunction() {
      if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50) {
        document.getElementById("logo_div").style.padding ="10px 5px";
        
        document.getElementById("logo").style.width ="5%";
        document.getElementById("logo").style.height ="5%";



      } else {
        document.getElementById("logo_div").style.padding = "10px 10px";

       

        document.getElementById("logo").style.width ="300px";
        document.getElementById("logo").style.height ="300px";
      }
    }



        
    //This function has been designed to display a modal window the first time a user visits a webpage and then hide it on subsequent visits. It accomplishes this by using cookies to keep track of whether the modal has been shown before .
            
    window.addEventListener('load', function() {
        var modal = document.getElementById('Login_Modal');
        var closeModal = document.getElementById('close_Modal');
        var modalShown = getCookie('modalShown');

        if (!modalShown) {
            modal.style.display = 'none';
        }
    });

    //Sets a cookie with a given name, value and expiration time 
    function setCookie(name, value, days) {
        var expires = '';
        if (days) {
            var date = new Date();
            date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
            expires = '; expires=' + date.toUTCString();
        }
        document.cookie = name + '=' + value + expires + '; path=/';
    }
    //Retrieves the value of a cookie by name 
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



        // ShowRegisterForm , ShowAdminForm ,ShowLoginForm these dynamically change the modal in realtime 
        //This function is needed to change the login modal so that other forms can be displayed 
    function showRegisterForm() {
        // Get the form element
        const modalForm = document.getElementById('modalForm');

        // Change the form content
        modalForm.innerHTML = `
        
            <button class="Register_button" onclick="showLoginForm()">Back to Login</button>
            <span class="close" id="close_Modal" onclick="closeModal()">&times;</span>
            <div class="model_img_container">
                <a href="javascript:showAdminForm()"><img src="Images/logo.png" class="Login_img"></a>
            </div>
            <div class="username_password_container">
                <label class="Label" for="newUsername"><b><p> Create a Username</b></p></label>
                <input type="username" placeholder="Enter a Username" name="newUsername">
                <label class="Label" for="newPassword"><b><p>Create a Password</p></b</label>
                <input type="password" placeholder="Enter a Password" name="newPassword">
                <button class="Login_submit_button" type="submit"><b>Register</b></button>
            </div>
        </form>
        `;

       

    }

    function showLoginForm() {
        
        const modalForm = document.getElementById('modalForm');
        modalForm.innerHTML = `
        <form action="login.php" method="POST">
            <button class="Register_button" onclick="showRegisterForm()">Register Here</button>
            <span class="close" id="close_Modal"onclick="closeModal()">&times;</span>
            <div class="model_img_container">
                <a href="javascript:showAdminForm()"><img src="Images/logo.png" class="Login_img"></a>
            </div>
            <div class="username_password_container">
                <label class="Label" for="uname"><b><p>Username</p></b></label>
                <input type="username" placeholder="Enter Username" name="uname">
                <label class="Label" for="psw"><b><p>Password</p></b></label>
                <input type="password" placeholder="Enter Password" name="psw">
                <button class="Login_submit_button" type="submit"><b>Login</b></button>
                <div class="username_password_footer">
                    <label>
                        <input type="checkbox" unchecked="unchecked" name="remember"><b> Remember me</b>
                    </label>
                    <br><br>
                    <a href="javascript:alert('We have sent a password reset email to your email address , please check your inbox');" ><b>Change Password</b></a>
                </div>
            </div>
         </form>
        `;
    }
    function showAdminForm(){
        const modalForm = document.getElementById('modalForm');
        modalForm.innerHTML = `
            <button class="Register_button" onclick="showLoginForm()">Customer Login</button>
            <span class="close" id="close_Modal"onclick="closeModal()">&times;</span>
            <div class="model_img_container">
                <a href="javascript:showAdminForm()"><img src="Images/logo.png" class="Login_img"></a>
            </div>
            <div class="username_password_container">
                <label class="Label" for="uname"><b><p>Admin Username<b></p></label>
                <input type="username" placeholder="Enter Admin Username" name="uname">
                <label class="Label" for="psw"><b><p>Admin Password</p></b></label>
                <input type="password" placeholder="Enter Admin Password" name="psw">
                <button class="Login_submit_button" type="submit"><b>Login</b></button>
                <div class="username_password_footer">
                    <a href="javascript:alert('We have sent a password reset email to your email address , please check your inbox');" ><b>Change Password</b></a>
                </div>
            </div>
        `;
    }
    // Closes the login modal
    function closeModal() {
        const openModal = document.querySelector('.login_modal[style="display: block;"]');
        if (openModal) {
            openModal.style.display = 'none';
            }
        }



    //Opens up the login modal when a button is pressed and sets up to needed behaviours 
    function Open_Login_Modal(){
        var modal = document.getElementById('Login_Modal');
        var closeModal = document.getElementById('close_Modal');
        var modalShown = getCookie('modalShown');

        if (!modalShown) {
            modal.style.display = 'block';
            showLoginForm();

            closeModal.addEventListener('click', function() {
            
                modal.style.display = 'none';
                setCookie('modalShown', 'true', 30);
            });
        }
    }


//This function allows users to toggle opening and closing the FAQs boxes to reveal/conceal answers
function according1(){
    var acc = document.getElementsByClassName
    ("according");
    var i;

    for(i = 0; i < acc.length; i++) {
        acc[i].addEventListener("click", function(){
            this.classList.toggle("active");
            this.parentElement.classList.toggle("active");

            var panel = this.nextElementSibling;

            if (panel.style.display === "block") {
                panel.style.display = "none";
            } else {
                panel.style.display = "block";
            }
        });
    }
}