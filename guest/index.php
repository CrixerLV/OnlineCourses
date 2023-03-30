<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OnlineCourses-HomePage</title>
    <link rel="stylesheet" href="../styles/styleguest.css">
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
            <li style="text-decoration: underline;">Home</li>
            <li onclick="redirectCourses()">Courses</li>
            <li onclick="redirectInformation()">Information</li>
        </div>
        <div class="nav-bar-menu-mobile">
            <i onclick="mobiledropdownon()" class="fa fa-bars"></i>
            <div id="profile-side-mobile">
                <div id="profile-side-mobile-middle">
                    <ul><li>Home</li></ul>
                    <ul><li>Courses</li></ul>
                    <ul><li>Information</li></ul>
                </div>
                <div id="profile-side-mobile-bottom">
                    <button onclick="redirectlogin()" >Login</button>
                    <button onclick="redirectsignup()" >Sign up</button>
                </div>
            </div>
        </div>
        <div class="nav-bar-sl">
            <button onclick="redirectlogin()" >Login</button>
            <button onclick="redirectsignup()" >Sign up</button>
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