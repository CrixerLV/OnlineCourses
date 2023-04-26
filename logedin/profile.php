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
            <ul><li onclick='home()'>Home</li></ul>
            <ul><li onclick='courses()'>Courses</li></ul>
            <ul><li onclick="profile()">Profile</li></ul>
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
            <ul><li onclick='home()'>Home</li></ul>
            <ul><li onclick='courses()'>Courses</li></ul>
            <ul><li onclick='profile()'>Profile</li></ul>
            <?php
                $email = $_SESSION['email'];
                $sql = "SELECT type FROM users WHERE Email='$email'";
                $result = mysqli_query($con, $sql);

                if (mysqli_num_rows($result) > 0) {
                    while($row = mysqli_fetch_assoc($result)) {
                        if($row["type"] == "Teacher") {
                            echo "<ul><li>Create a course</li></ul>";
                        }
                        if($row["type"] == "User") {
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
       <h1>Profile</h1>
    </div>
    <div class="profile-container">
        <div class="profile-info">
            <div class="profile-card" style='width:30%;text-align:center;'>
            <?php
                $sql = "SELECT * FROM users WHERE Email='$email'";
                $result = $con->query($sql);
                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    $image = $row["image"];
                    $title = $row['Type'];
                } else {
                    echo "No image found";
                }
            ?>
            <img src="<?php echo $image; ?>" alt="My Image">
                <h1><?php echo $_SESSION['name'], " " ,$_SESSION["lastname"];?></h1>
                <h2><?php echo 'Title: ',$row["Type"];?></h2>
                <?php
                if (isset($_POST["delete"])) {
                    $sql = "DELETE FROM users WHERE Email='$email'";
                    session_destroy();
                    header("Location: ../guest/index.php");
                    exit();
                if ($con->query($sql) === TRUE) {
                }
                }?>
                <form method="POST">
                    <button name='delete' id='deletebtn'>Delete Account</button>
                </form>
                <?php
                if (isset($_POST["become"])) {
                    if($row['Type'] == 'User'){
                        $sql = "UPDATE users SET Type = 'Teacher' WHERE Email='$email'";
                        header("Refresh:0");
                    }else{
                        $sql = "UPDATE users SET Type = 'User' WHERE Email='$email'";
                        header("Refresh:0");
                    }
                if ($con->query($sql) === TRUE) {
                }
                }?>
                <?php if ($row['Type'] == "User") { ?>
                    <form method="POST">
                        <button name="become" type="submit" id="becomebtn">Become a instructor</button>
                    </form>
                <?php } else{?>
                    <form method="POST">
                        <button name="become" type="submit" id="becomebtn">Quit Teaching</button>
                    </form>
                <?php } ?>
            </div>
            <div class="profile-card">
                <ul><label>Full Name</label><li><?php echo $_SESSION['name'], " " ,$_SESSION["lastname"]; ?></li><button id='editbtn'>Edit</button></ul><br>
                <ul><label>Email</label><li><?php echo $_SESSION['email']; ?></li><button id='editbtn'>Edit</button></ul><br>
                <ul><label>Phone</label><li><?php if($row['phone'] > 0){
                    echo $row['phone'];}else{ echo "Empty!";}?> </li><button id='editbtn'>Edit</button></ul><br>
                <ul><label>Address</label><li><?php if($row['address'] != ""){
                    echo $row['address'];}else{ echo "Empty!";}?> </li><button id='editbtn'>Edit</button></ul><br>
                <ul><label>Profile Image  (Imgur Only!)</label><li><?php echo $row['image']; ?></li><button id='editbtn'>Edit</button></ul><br>
            </div>
        </div>
        <div class="profile-info">
            <div class="profile-card" style='width:80%; margin-top: 20px; text-align: center'>
                <?php
                if($row['Type'] == "Teacher"){
                    echo "<h1>Your created courses</h1>" ;
                }else{
                    echo "<h1>The course you have purchased</h1>";
                }
                ?>
                                <table>
                    <thead>
                        <th></th>
                        <th>Name</th>
                        <th>Type</th>
                        <th>Language</th>
                        <th>Created</th>
                        <th>Starts</th>
                        <th>Teacher</th>
                        <th>Price</th>
                        <th></th>
                        <th></th>
                    </thead>
                    <?php
                        $query = "SELECT * FROM Courses";
                        $usersql = "SELECT User_ID FROM users WHERE Email='$email'";
                        $resultuserid = $con->query($usersql);
                        if ($resultuserid->num_rows > 0) {
                            $rowuserid = $result->fetch_assoc();
                            $userid = $row["User_ID"];
                        }
                        $result = mysqli_query($con,$query);
                        while($row = mysqli_fetch_array($result)){
                            if($userid == $row['Teacher']){
                        ?>
                    <tr class="table" id='datatable'>
                        <td name='display-icon'>
                        <?php 
                            if($row['Type'] == "IT"){
                                echo "<img id='icon' src='../icons/it.png'>";
                            }elseif ($row['Type'] == "Architecture"){
                                echo "<img id='icon' src='../icons/architect.png'>";
                            }elseif ($row['Type'] == "Mechanical"){
                                echo "<img id='icon' src='../icons/mech.png'>";
                            }elseif ($row['Type'] == "Law"){
                                echo "<img id='icon' src='../icons/law.png'>";
                            }elseif ($row['Type'] == "Economics"){
                                echo "<img id='icon' src='../icons/eco.png'>";
                            }elseif ($row['Type'] == "Medicine"){
                                echo "<img id='icon' src='../icons/med.png'>";
                            }elseif ($row['Type'] == "Business"){
                                echo "<img id='icon' src='../icons/business.png'>";
                            }elseif ($row['Type'] == "Other"){
                                echo "<img id='icon' src='../icons/dots.png'>";
                            }
                        ?>
                        </td>
                        <td style='display:none;' name='display-id'><input type="hidden" name="id" value="<?php echo $row['Course_ID']; ?>"><?php echo $row['Course_ID']; ?></td>
                        <td name='display-name'><?php echo $row['Name']; ?></td>
                        <td name='display-type'><?php echo $row['Type']; ?></td>
                        <td name='display-lang'><?php echo $row['Language']; ?></td>
                        <td name='display-created'><?php echo $row['Created']; ?></td>
                        <td name='display-start'><?php echo $row['Start']; ?></td>
                        <td name='display-teacher'>
                        <?php
                            $id = $row['Teacher'];
                            $sql = "SELECT * FROM users WHERE User_ID='$id'";
                            $result2 = mysqli_query($con, $sql);
                            $row2 = mysqli_fetch_array($result2);
                            if($id = $row2['User_ID']){
                                echo $row2['Name'], " " , $row2['Lastname'];
                            }
                        ?>
                        </td>
                        <td name='display-price'><?php echo $row['Price']; ?> $</td>
                        <?php
                            if($_SESSION['name'] === $row2['Name'] && $_SESSION['lastname'] === $row2['Lastname']){
                                echo "<td name='display-btn'><button>Edit</button></td>";
                                echo "<td name='display-btn'><button id='deletebtns'>Delete</button></td>";
                            }else{
                                echo "<td name='display-btn'><button>Purchase</button></td>";
                            }
                        ?>
                    </tr>
                    <?php
                            }
                        }
                        ?>
                </table>
            </div>
        </div>
    </div>
	<div class="footer" style='display: none;'>
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