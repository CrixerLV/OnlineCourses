<?php
require("../backend/db_con.php");

$check = false;
$checkpw = false;
$create = false;

if (isset($_REQUEST['email']) && isset($_REQUEST['password']) && isset($_REQUEST['passwordx2']) && isset($_REQUEST['name']) && isset($_REQUEST['lastname'])){


    $email = stripslashes($_REQUEST['email']);
    $email = mysqli_real_escape_string($con,$email);

    $password = stripslashes($_REQUEST['password']);
    $password = mysqli_real_escape_string($con,$password);

    $passwordx2 = stripslashes($_REQUEST['passwordx2']);
    $passwordx2 = mysqli_real_escape_string($con,$passwordx2);

    $name = stripslashes($_REQUEST['name']);
    $name = mysqli_real_escape_string($con,$name);

    $lastname = stripslashes($_REQUEST['lastname']);
    $lastname = mysqli_real_escape_string($con,$lastname);

    $check_query = "SELECT * FROM users WHERE email = '$email'";
    $check_result = mysqli_query($con, $check_query);
    if (mysqli_num_rows($check_result) > 0) {
        $check = true;
        $checkpw = false;
        $create = false;
    } else {
        if($password != $passwordx2){
            $check = false;
            $checkpw = true;
            $create = false;
        }else{
            $check = false;
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            $query = "INSERT INTO users (Email,Password,Name,Lastname)
                VALUES ('$email','$hashedPassword','$name','$lastname')";
            $result = mysqli_query($con,$query);
            if($result){
                $create = true;
                $check = false;
                $checkpw = false;
            }
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
    <link rel="stylesheet" href="../styles/stylesignup.css">
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
                <p>Register by inputing the required data!</p>
            </div>
            <div class='input-container'>           
                <input name="email" type="email" placeholder="Email" required><br>
                <input name="password" type="password" placeholder="Password" required><br>
                <input name="passwordx2" type="password" placeholder="Password X2" required><br>
                <input name="name" type="text" placeholder="Name" required><br>
                <input name="lastname" type="text" placeholder="Lastname" required><br>
                <?php
                    if ($check == true){
                        echo "<h1>Profile with this email already exists!</h1>";
                    }elseif($checkpw == true){
                        echo "<h1>Passwords doesn't match!</h1>";
                    }elseif($create == true){
                        echo "<h1>Profile created sucesfully!</h1>";
                    }
                ?>
            </div>
            <input type="submit" value="Signup">
            <div class="notmember">
                <label>Already registered?</label>
                <a href="login.php">Login here!</a>
            </div>
        </form>
    </div>
</body>
</html>