<?php
require('db_con.php');

session_start();

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
    } else if (mysqli_num_rows($result) == 0) {
        echo "<h1 id='error'>Account Doesn't Exist</h1>" ;
    } else {
        $row = mysqli_fetch_array($result);
        $_SESSION['email'] = $email;
        header("Location: indexloged.php");
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/stylelogin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="script.js"></script>
    <title>OnlineCourses-Login</title>
</head>
<body>
    <div class="input-form">
        <a href="index.php" id="back">←</a>
        <img src="https://th.bing.com/th/id/R.73b3ee8749998c6a22b219fd1c6ae291?rik=8Q9ro4mSpvT1XA&riu=http%3a%2f%2fwww.habitac.cl%2fassets%2fimg%2fglobal%2flogo.png&ehk=384eecrpF76HkVInIRcazWy16UeCjGvSW9uK%2btwzFRw%3d&risl=&pid=ImgRaw&r=0">
        <form>
            <input type="email" name="email" placeholder="Email" required><br>
            <input type="password" name="password" placeholder="Password" required><br>
            <input type="checkbox">Remember me
            <input type="submit" value="Login">
            <label>Or</label>
            <a href="signup.php">Not Signed up yet?</a>
        </form>
    </div>
</body>
</html>