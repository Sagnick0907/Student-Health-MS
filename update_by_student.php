<?php
session_start();
require "partials/_dbconnect.php";
$username=$_SESSION['username'];
$query="UPDATE `students` SET `s_name` = '$_POST[s_name]',`Dept` = '$_POST[Dept]',`Year` = '$_POST[Year]',`Contact_no` = '$_POST[Contact_no]' WHERE s_username='$username'";
$result=mysqli_query($conn,$query);
?>

<script type="text/javascript">
    alert("Updated successfully");
    window.location.href="student_dashboard.php";
</script>