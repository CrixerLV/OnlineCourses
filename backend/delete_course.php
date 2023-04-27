<?php
if (isset($_GET['Course_ID'])) {
    DelCourse();
}
function DelCourse()
{
    include 'db_con.php';
    $sql = "DELETE FROM courses WHERE Course_ID='" . $_GET["Course_ID"] . "'";
    echo $_GET["Course_ID"];
    echo $sql;
    if (mysqli_query($con, $sql)) {
        header("Location: ../logedin/profile.php");
    } else {
        echo "Error deleting record: " . mysqli_error($con);
    }
    mysqli_close($con);
}
?>
