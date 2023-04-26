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
            <ul><li onclick='profile()'>Profile</li></ul>
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
            <ul><li onclick="profile()">Profile</li></ul>
            <?php
                $email = $_SESSION['email'];
                $sql = "SELECT type FROM users WHERE Email='$email'";
                $result = mysqli_query($con, $sql);

                if (mysqli_num_rows($result) > 0) {
                    while($row = mysqli_fetch_assoc($result)) {
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
       <h1>Courses</h1>
    </div>
    <div class="main-info">
        <div class="main-info-select">
            <form id='filter'>
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
                    <option value="Economics">Economics</option>
                    <option value="Medicine">Medicine</option>
                    <option value="Business">Business </option>
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
                <?php
                    $email = $_SESSION['email'];
                    $sql = "SELECT type FROM users WHERE Email='$email'";
                    $result = mysqli_query($con, $sql);

                    if (mysqli_num_rows($result) > 0) {
                        while($row = mysqli_fetch_assoc($result)) {
                            if($row["type"] == "Teacher") {
                                echo "<button onclick='toggnewcourse()' id='btn-edit'>Create a Course</button>";
                            }
                        }
                    } else {
                        echo "0 results";
                    }
                ?>
            <form id="newcourse">
                <h1>New course</h1>
                <label>Name of the course</label>
                <input name='name' type='Text' placeholder='Example:Journalist' required>
                <label>Type of the course</label>
                <select name='type' required>
                    <option value="" disabled selected hidden>Type</option>
                    <option value="IT">IT</option>
                    <option value="Architecture">Architecture</option>
                    <option value="Mechanical">Mechanical</option>
                    <option value="Law">Law</option>
                    <option value="Economics ">Economics</option>
                    <option value="Medicine">Medicine</option>
                    <option value="Business ">Business</option>
                </select>
                <label>Language of the course</label>
                <input name='lang' type='Text' placeholder='Example:Latvian' required>
                <label>Starting date of the course</label>
                <input name='start' type='Date' required>
                <label>Price of the course</label>
                <input name='price' type='Number' step="0.01" placeholder="Example:16.99" required>
                <input name='submit' type='Submit' value='Create'>
                <button onclick="toggnewcourse()">Close</button>
            </form>
            <?php
            if (isset($_REQUEST['name']) && isset($_REQUEST['type']) && isset($_REQUEST['lang']) && isset($_REQUEST['start']) && isset($_REQUEST['price'])){
                $name = stripslashes($_REQUEST['name']);
                $name = mysqli_real_escape_string($con,$name);

                $type = stripslashes($_REQUEST['type']);
                $type = mysqli_real_escape_string($con,$type);

                $lang = stripslashes($_REQUEST['lang']);
                $lang = mysqli_real_escape_string($con,$lang);

                $created = date("Y/m/d");

                $start = stripslashes($_REQUEST['start']);
                $start = mysqli_real_escape_string($con,$start);

                $email = $_SESSION['email'];
                $sql = "SELECT User_ID FROM users WHERE Email='$email'";
                $result = mysqli_query($con, $sql);
                $row2 = mysqli_fetch_array($result);

                $teacher = $row2['User_ID'];

                $price = stripslashes($_REQUEST['price']);
                $price = mysqli_real_escape_string($con,$price);

                $check_query = "SELECT * FROM courses WHERE name = '$name'";
                $check_result = mysqli_query($con, $check_query);
                if (mysqli_num_rows($check_result) > 0) {
                    echo("<h1 style='color:red;' id='error'>Name is already taken!</h1>");
                } else {
                    $query = "INSERT INTO courses (Name,Type,Language,Created,Start,Teacher,Price)
                    VALUES ('$name','$type','$lang','$created','$start','$teacher','$price')";
                    $result2 = mysqli_query($con,$query);

                    if($result2){
                        echo("<h1 id='error'>Added Sucesfully!</h1>");
                    }
                }
            }
?>
        </div>
        <div id='hidethis' class="main-info-table">
            <div class="tablecontainer">
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
                    </thead>
                    <?php
                        $query = "SELECT * FROM Courses";
                        $result = mysqli_query($con,$query);
                        while($row = mysqli_fetch_array($result)) {
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
                            }else{
                                echo "<td name='display-btn'><button>Purchase</button></td>";
                            }
                        ?>
                    </tr>
                    <?php
                        }
                        ?>
                </table>
            </div>
        </div>
    </div>
    <div class="edit-container">
        <div class="edit-form">
            <form>       
            </form>
        </div>
    </div>
	<div class="footer" style='display:none;'>
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