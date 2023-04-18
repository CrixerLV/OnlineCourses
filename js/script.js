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




