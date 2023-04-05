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

function courses(){
  document.getElementById("embed").src = "coursesloged.php"
}
function home(){
  document.getElementById("embed").src = "defaultloged.php"
}
function info(){
  document.getElementById("embed").src = "informationloged.php"
}



function redirectlogedCourses(){
  window.location = "../logedin/coursesloged.php";
}
function redirectlogedHome(){
  window.location = "../logedin/defaultloged.php";
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

function openprofilemobile(){
  var x = document.getElementById("profile-side-mobile");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}




