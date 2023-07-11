<?php
session_start();
require "partials/_dbconnect.php";
$username=$_SESSION['username'];
$query="select Enrollment_no from `students` where s_username='$username'";
$result=mysqli_query($conn,$query);
$row=mysqli_fetch_assoc($result);
$Enroll_no=$row['Enrollment_no'];
echo $Enroll_no;
//`vaccinated_1`, `vaccinated_2`, `major_disease`, `minor_disease`, `current_status`, `attented_college`, `timestamp`
//UPDATE `s_health` SET `minor_disease` = 'Cough' WHERE `s_health`.`Enrollment_no` = '12019002004024';
$query2="UPDATE `s_health` SET `blood_group` = '$_POST[blood_group]',`major_disease` = '$_POST[major_disease]',`minor_disease` = '$_POST[minor_disease]',
`vaccinated_1` = '$_POST[vaccinated_1]',`vaccinated_2` = '$_POST[vaccinated_2]',`current_status` = '$_POST[current_status]',`attended_college` = '$_POST[attended_college]',`timestamp` = current_timestamp() WHERE Enrollment_no='$Enroll_no'";
$result2=mysqli_query($conn,$query2);

?>

<script type="text/javascript">
    alert("Updated successfully");
    window.location.href="student_dashboard.php";
</script>