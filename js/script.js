function mobiledropdownon() {
    var x = document.getElementById("profile-side-mobile");
    if (x.style.display === "block") {
      x.style.display = "none";
    } else {
      x.style.display = "block";
    }
}

function redirectlogin(){
  window.location = "../guest/login.php";
}
function redirectsignup(){
  window.location = "../guest/signup.php";
}
function redirectCourses(){
  window.location = "../guest/courses.php";
}

function toggnewcourse() {
  var x = document.getElementById("newcourse");
  var x2 = document.getElementById("hidethis");
  var x3 = document.getElementById("filter");
  if (x.style.display === "block") {
    x.style.display = "none";
    x2.style.display = "flex";
    x3.style.display = "flex";
  } else {
    x.style.display = "block";
    x2.style.display = "none";
    x3.style.display = "none";
  }
}



function courses(){
  window.location = "../logedin/coursesloged.php";
}
function home(){
  window.location = "../logedin/indexloged.php";
}



function openprofile(){
  var x = document.getElementById("profile-side");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}

function openprofilemobile(){
  var x = document.getElementById("profile-side-mobile");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}

var emailInput = document.getElementById("email");
document.querySelector("form").addEventListener("submit", function(event) {
  event.preventDefault();
  var email = emailInput.value;
  localStorage.setItem("email", email);
});

var savedEmail = localStorage.getItem("email");
if (savedEmail !== null) {
  emailInput.value = savedEmail;
}



