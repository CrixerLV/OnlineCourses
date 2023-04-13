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
            <li>Home</li>
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
        <div class="main-info-who">
            <div class="main-info-who-card">
                <h1>History</h1>
                <img src="https://images.squarespace-cdn.com/content/v1/60194eee956c02769139b433/1633468233149-S6KYGCR0M2CVEC1838SG/Nickerson_Mansion%2C_circa_1880_.jpg?format=1000w">
                <p>
                    Our webpage started selling online courses in 2015, and since then, we have grown rapidly, offering courses in various topics, from business and technology to language and art. We pride ourselves on our team of experienced instructors and subject matter experts who are passionate about creating courses that meet the needs of our students.
                <p>
            </div>
            <div class="main-info-who-card">
                <h1>Commitment</h1>
                <img src="https://bookboon.com/blog/wp-content/uploads/sites/5/2016/04/leadership-models-ebook-bookboon-bl.jpg">
                <p>
                    At our online courses webpage, we believe that education should be accessible to everyone, regardless of their location or schedule. That's why we offer courses that can be taken at your own pace, on your own schedule, and from anywhere in the world.
                    We understand that online learning can sometimes be challenging, which is why we provide a supportive and collaborative learning environment. Our instructors are available to answer your questions and provide feedback, and we also offer a variety of resources to help you succeed, such as online forums, virtual study groups, and multimedia content.
                <p>
            </div>
            <button onclick="redirectsignup()" >Join us Now!</button>
        </div>
    </div>
</body>
</html>