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
  window.location = "../login.html";
}
function redirectsignup(){
  window.location = "../signup.html";
}

function redirectCourses(){
  window.location = "../courses.html";
}
function redirectHome(){
  window.location = "../index.html";
}
function redirectInformation(){
  window.location = "../information.html";
}