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
    <title>OnlineCourses</title>
    <link rel="stylesheet" href="../styles/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css">
    <script src="../js/script.js"></script>
    <link rel="icon" type="image/x-icon" href="https://th.bing.com/th/id/R.73b3ee8749998c6a22b219fd1c6ae291?rik=8Q9ro4mSpvT1XA&riu=http%3a%2f%2fwww.habitac.cl%2fassets%2fimg%2fglobal%2flogo.png&ehk=384eecrpF76HkVInIRcazWy16UeCjGvSW9uK%2btwzFRw%3d&risl=&pid=ImgRaw&r=0">
</head>
<body>
    <div class="nav-bar">
        <div class="nav-bar-logo">
            <img src="https://th.bing.com/th/id/R.73b3ee8749998c6a22b219fd1c6ae291?rik=8Q9ro4mSpvT1XA&riu=http%3a%2f%2fwww.habitac.cl%2fassets%2fimg%2fglobal%2flogo.png&ehk=384eecrpF76HkVInIRcazWy16UeCjGvSW9uK%2btwzFRw%3d&risl=&pid=ImgRaw&r=0">
        </div>
        <div class="nav-bar-menu">
            <li id="home" onclick="home()">Home</li>
            <li id="courses" onclick="courses()">Courses</li>
        </div>
        <div class="nav-bar-menu-mobile">
            <i onclick="openprofilemobile()" class="fa fa-bars"></i>
        </div>
        <div class="nav-bar-sl">
            <img onclick="openprofile()" src=https://cdn-icons-png.flaticon.com/512/6522/6522516.png>
        </div>
    </div>
    <div id="profile-side-mobile">
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
        <div id="profile-side-middle">
            <ul><li>Home</li></ul>
            <ul><li>Courses</li></ul>
            <ul><li>Profile</li></ul>
            <?php
                $email = $_SESSION['email'];
                $sql = "SELECT type FROM users WHERE Email='$email'";
                $result = mysqli_query($con, $sql);

                if (mysqli_num_rows($result) > 0) {
                    while($row = mysqli_fetch_assoc($result)) {
                        if($row["type"] == "Teacher") {
                            // Display the button
                            echo "<ul><li>Create a course</li></ul>";
                        }
                        if($row["type"] == "User") {
                            // Display the button
                            echo "<ul><li>Become a instructor</li></ul>";
                        }
                    }
                } else {
                    echo "0 results";
                }
            ?>
        </div>
        <div id="profile-side-bottom">
            <a href="../backend/logout.php"><button>Sign out</button></a>
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
        <div id="profile-side-middle">
            <ul><li>Profile</li></ul>
            <?php
                $email = $_SESSION['email'];
                $sql = "SELECT type FROM users WHERE Email='$email'";
                $result = mysqli_query($con, $sql);

                if (mysqli_num_rows($result) > 0) {
                    while($row = mysqli_fetch_assoc($result)) {
                        if($row["type"] == "Teacher") {
                            // Display the button
                            echo "<ul><li>Create a course</li></ul>";
                        }
                        if($row["type"] == "User") {
                            // Display the button
                            echo "<ul><li>Become a instructor</li></ul>";
                        }
                    }
                } else {
                    echo "0 results";
                }
            ?>
        </div>
        <div id="profile-side-bottom">
            <a href="../backend/logout.php"><button>Sign out</button></a>
        </div>
    </div>
    <div class="page-name">
       <h1>Courses</h1>
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
                <input type="submit" value="Filter">
            </form>
            <form id="search">
                <input type="text" placeholder="Search">
                <input type="submit" value="Search">
            </form>
        </div>
        <div class="main-info-table">
            <div class="tablecontainer">
                <table>
                    <thead>
                        <th>Name</th>
                        <th>Type</th>
                        <th>Language</th>
                        <th>Created</th>
                        <th>Starts</th>
                        <th>Teacher</th>
                        <th>Price</th>
                        <th></th>
                    </thead>
                    <?php
                        $query = "SELECT * FROM Courses";
                        $result = mysqli_query($con,$query);
                        while($row = mysqli_fetch_array($result)) {
                        ?>
                    <tr class="table" id='datatable'>
                        <td name='display-name'><?php echo $row['Name']; ?></td>
                        <td name='display-type'><?php echo $row['Type']; ?></td>
                        <td name='display-lang'><?php echo $row['Language']; ?></td>
                        <td name='display-created'><?php echo $row['Created']; ?></td>
                        <td name='display-start'><?php echo $row['Start']; ?></td>
                        <td name='display-teacher'><?php echo $row['Teacher']; ?></td>
                        <td name='display-price'><?php echo $row['Price']; ?> $</td>
                        <td name='display-btn'><button>Purchase</button></td>
                    </tr>
                    <?php
                        }
                        ?>
                </table>
            </div>
        </div>
    </div>
	<div class="footer">
		<p>&copy; 2023 Online Courses Page. All Rights Reserved.</p>
		<ul>
			<li><a href="#">Privacy Policy</a></li>
			<li><a href="#">Terms of Use</a></li>
			<li><a href="#">Contact Us</a></li>
			<li><a href="#">FAQ</a></li>
		</ul>
		<p>Follow us on:</p>
		<ul>
			<li><a href="#">Facebook</a></li>
			<li><a href="#">Twitter</a></li>
			<li><a href="#">Instagram</a></li>
		</ul>
	</div>
</body>
</html>