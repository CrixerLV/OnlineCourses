function mobiledropdownon() {
    var x = document.getElementById("nav-bar-menu-mobile-dropdown");
    if (x.style.display === "block") {
      x.style.display = "none";
    } else {
      x.style.display = "block";
    }
}

function mobiledropdownoff() {
  var x = document.getElementById("nav-bar-menu-mobile-dropdown");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
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
function redirectHome(){
  window.location = "../guest/index.php";
}
function redirectInformation(){
  window.location = "../guest/information.php";
}


function redirectlogedCourses(){
  window.location = "../logedin/coursesloged.php";
}
function redirectlogedHome(){
  window.location = "../logedin/indexloged.php";
}
function redirectlogedInformation(){
  window.location = "../logedin/informationloged.php";
}


function openprofile(){
  var x = document.getElementById("profile-side");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}




