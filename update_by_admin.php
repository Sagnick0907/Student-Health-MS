<?php
session_start();
require "partials/_dbconnect.php";
$Enrollment_no=$_POST['Enrollment_no'];
$query="UPDATE `students` SET `s_name` = '$_POST[s_name]',`Dept` = '$_POST[Dept]',`Year` = '$_POST[Year]',`Contact_no` = '$_POST[Contact_no]' WHERE Enrollment_no = $Enrollment_no";
$result=mysqli_query($conn,$query);
?>

<script type="text/javascript">
    alert("Updated successfully");
    window.location.href="admin_dashboard.php";
</script>