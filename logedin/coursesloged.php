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
    <link rel="stylesheet" href="../styles/stylecourses.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="icon" type="image/x-icon" href="https://th.bing.com/th/id/R.73b3ee8749998c6a22b219fd1c6ae291?rik=8Q9ro4mSpvT1XA&riu=http%3a%2f%2fwww.habitac.cl%2fassets%2fimg%2fglobal%2flogo.png&ehk=384eecrpF76HkVInIRcazWy16UeCjGvSW9uK%2btwzFRw%3d&risl=&pid=ImgRaw&r=0">
    <script src="../js/script.js"></script>
</head>
<body>
    </div>
    </div>
    <div class="main-info">
        <div class="main-info-select">
            <div class="nav-search-bar">
                <input type="text" placeholder="Search" id="searchbar"><img src="https://th.bing.com/th/id/R.602ef64bc31a62f9ebd523d97fc9f369?rik=o2tvMDweo50J2A&pid=ImgRaw&r=0"></input>
            </div>
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