<?php
require("../backend/db_con.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OnlineCourses-HomePage</title>
    <link rel="stylesheet" href="../styles/stylecourses.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="icon" type="image/x-icon" href="https://th.bing.com/th/id/R.73b3ee8749998c6a22b219fd1c6ae291?rik=8Q9ro4mSpvT1XA&riu=http%3a%2f%2fwww.habitac.cl%2fassets%2fimg%2fglobal%2flogo.png&ehk=384eecrpF76HkVInIRcazWy16UeCjGvSW9uK%2btwzFRw%3d&risl=&pid=ImgRaw&r=0">
    <script src="../js/script.js"></script>
</head>
<body>
    <div class="nav-bar">
        <div class="nav-bar-logo">
            <img src="https://th.bing.com/th/id/R.73b3ee8749998c6a22b219fd1c6ae291?rik=8Q9ro4mSpvT1XA&riu=http%3a%2f%2fwww.habitac.cl%2fassets%2fimg%2fglobal%2flogo.png&ehk=384eecrpF76HkVInIRcazWy16UeCjGvSW9uK%2btwzFRw%3d&risl=&pid=ImgRaw&r=0">
        </div>
        <div class="nav-bar-menu">
            <li onclick="redirectHome()">Home</li>
            <li>Courses</li>
            <li onclick="redirectInformation()">Information</li>
        </div>
        <div class="nav-bar-menu-mobile">
            <i onclick="mobiledropdownon()" class="fa fa-bars"></i>
            <div id="nav-bar-menu-mobile-dropdown">
                <i onclick="mobiledropdownoff()" class="fa fa-bars"></i><br>
                <li>Home</li>
                <li>Courses</li>
                <li>Information</li>
                <div class="sign-up-mobile">
                    <button onclick="redirectlogin()">Login</button>
                    <button>Sign up</button>
                </div>
            </div>
        </div>
        <div class="nav-bar-sl">
            <button onclick="redirectlogin()" >Login</button>
            <button onclick="redirectsignup()" >Sign up</button>
        </div>
    </div>
    <div class="main-info">
        <div class="main-info-select">
            <form>
             <select name="languages" id="lang">
                    <option value="" disabled selected hidden>Languages</option>
                    <option value="English">English</option>
                    <option value="Russian">Russian</option>
                    <option value="Latvian">Latvian</option>
                </select>
            <select name="type" id="type">
                <option value="" disabled selected hidden>Type</option>
                <option value="IT">IT</option>
                <option value="Architecture">Architecture</option>
                <option value="Mechanical">Mechanical</option>
                <option value="Law">Law</option>
                <option value="Economics ">Economics </option>
                <option value="Medicine">Medicine</option>
                <option value="Business ">Business </option>
            </select>
            <select name="date" id="date">
                <option value="" disabled selected hidden>Sort By</option>
                <option value="Newest">Newest</option>
                <option value="Oldest">Oldest</option>
            </select>
            <input type="submit" value="Select">
            </form>
        </div>
    </div>
</body>
</html>