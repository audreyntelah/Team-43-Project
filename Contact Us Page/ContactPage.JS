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
function validateForm() {
  var fname = document.getElementById('fname').value;
  var lname = document.getElementById('lname').value;
  var email = document.getElementById('email').value;
  var subject = document.getElementById('subject').value;

  if (fname === '') {
    alert('Please fill in the First Name field.');
    return false;
  }
  if (lname === '') {
    alert('Please fill in the Last Name field.');
    return false;
  }

  if (subject === '') {
    alert('Please fill in the How Can We Help You? field.');
    return false;
  }

  var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  if (!emailRegex.test(email)) {
    alert('Please enter a valid email address. This is not a valid email address.');
    return false;
  }

  alert('Form submitted successfully!');
  return true;
}
