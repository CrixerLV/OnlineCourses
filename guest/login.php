<?php
require("../backend/db_con.php");

session_start();

$check = false;

if (isset($_REQUEST['email'])) {

    $error1 = 0;

    $email = stripslashes($_REQUEST['email']);
    $email = mysqli_real_escape_string($con,$email);

    $password = stripslashes($_REQUEST['password']);
    $password = mysqli_real_escape_string($con,$password);

    $query = "SELECT * FROM `users` WHERE Email='$email'";
    $result = mysqli_query($con, $query);

    if (!$result) {
        echo "Error executing query: " . mysqli_error($con);
        $check = false;
    } else if (mysqli_num_rows($result) == 0) {
        $check = true;
    } else {
        $row = mysqli_fetch_array($result);
        if (password_verify($password, $row["Password"])) {
            $check = false;
            $_SESSION['email'] = $email;
            $_SESSION['name'] = $row["Name"];
            $_SESSION['lastname'] = $row["Lastname"];
            $_SESSION['rank'] = $row["Type"];
            header("Location: ../logedin/indexloged.php");
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/stylelogin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="../js/script.js"></script>
    <link rel="icon" type="image/x-icon" href="https://th.bing.com/th/id/R.73b3ee8749998c6a22b219fd1c6ae291?rik=8Q9ro4mSpvT1XA&riu=http%3a%2f%2fwww.habitac.cl%2fassets%2fimg%2fglobal%2flogo.png&ehk=384eecrpF76HkVInIRcazWy16UeCjGvSW9uK%2btwzFRw%3d&risl=&pid=ImgRaw&r=0">
    <title>OnlineCourses</title>
</head>
<body>
    <div class="form-container">
        <form>
            <div class="info-container">
            <a href="index.php" id="back">Back</a>
            <img src="https://th.bing.com/th/id/R.73b3ee8749998c6a22b219fd1c6ae291?rik=8Q9ro4mSpvT1XA&riu=http%3a%2f%2fwww.habitac.cl%2fassets%2fimg%2fglobal%2flogo.png&ehk=384eecrpF76HkVInIRcazWy16UeCjGvSW9uK%2btwzFRw%3d&risl=&pid=ImgRaw&r=0">
                <p>Sign in with your email and password!</p>
            </div>
            <div class='input-container'>           
                <label id='labels'>Your E-Mail</label>
                <input type="email" id="email" name="email" placeholder="Email" required>
                <label id='labels'>Your Password</label>
                <input type="password" name="password" placeholder="Password" required>
            </div>
            <div class="remember-me">
                <input type="checkbox">
                <label>Rember Me!</label>
                <a href="#" class="forgot-password">Forgot password?</a>
            </div>
            <?php
            if ($check == true){
                echo "<h1 id='error'>Account with this email doesn't exist!</h1>";
            }
            ?>
            <input type="submit" value="Login">
            <div class="notmember">
                <label>Not a member yet?</label>
                <a href="signup.php">Register here!</a>
            </div>
        </form>
    </div>
</body>
</html>