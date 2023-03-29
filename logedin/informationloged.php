<?php
require("../backend/db_con.php");
include("../backend/authorization.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OnlineCourses-HomePage</title>
    <link rel="stylesheet" href="../styles/style.css">
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
            <li onclick="redirectlogedHome()">Home</li>
            <li onclick="redirectlogedCourses()">Courses</li>
            <li style="text-decoration: underline;">Information</li>
            <div class="nav-search-bar">
                <input type="text" placeholder="Search" id="searchbar"><img src="https://th.bing.com/th/id/R.602ef64bc31a62f9ebd523d97fc9f369?rik=o2tvMDweo50J2A&pid=ImgRaw&r=0"></input>
            </div>
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
            <img onclick="openprofile()" src=https://cdn-icons-png.flaticon.com/512/6522/6522516.png>
        </div>
    </div>
    <div id="profile-side">
        <div id="profile-side-top">
            <h1>
                <?php
                    echo $_SESSION["name"], " " ,$_SESSION["lastname"];
                ?>
            </h1>
            <h2>
                <?php
                    echo 'Title: ',$_SESSION["rank"];
                ?>
            </h2>
            <img>
        </div>
        <div id="profile-side-bottom">
            <a href="../backend/logout.php"><button>Sign out</button></a>
        </div>
    </div>
    </div>
    <div class="main-info">
    </div>
    <div class="main-footer">
        <div class="main-footer-menu">
            <li>Terms & Conditions</li>
            <li>FAQ</li>
            <li>@2023 OnlineCourses</li>
        </div>
    </div>
</body>
</html>