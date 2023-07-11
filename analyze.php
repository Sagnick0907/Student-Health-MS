<div class="container">
    
    <form action="" method="post">
        <table class="my-3">
            <tr>
                <td><input type="submit" name="not_well" value="Display list of Students Not Well"></td>
            </tr>
            <tr>
                <td><input type="submit" name="not_well_attended" value="Display list of Students Not Well and have Attended College"></td>
            </tr>
            <tr>
                <td><input type="submit" name="exit" value="EXIT"></td>
            </tr>
        </table>
        
        
        
    </form>
</div>

<?php
    if(isset($_POST['exit'])){
        header("Location:admin_dashboard.php");
    }
?>

<!--Not well-->
<?php
    if(isset($_POST['not_well'])){
        session_start();
        require "partials/_dbconnect.php";
        //$sql="select Enrollment_no from `s_health` where current_status='Not Well'";
        //$result=mysqli_query($conn,$sql);
        $sql2="select * from `students` where Enrollment_no in (select Enrollment_no from `s_health` where (current_status='Not Well' and DATE(`timestamp`) = CURDATE()))";
        $result2=mysqli_query($conn,$sql2);
        $num_rows=mysqli_num_rows($result2);
        if($num_rows==0){
            echo "All students are well.";
        }
        else{
?>
        <div class="container">
            <h3>Total number of students unwell today : <?php echo $num_rows; ?></h3>
            <table>
                <tr>
                    <td>Enrollment number</td>
                    <td>Student name</td>
                    <td>Department</td>
                    <td>Year</td>
                    <td>Contact number</td>
                </tr>
            </table>
                
<?php
            while($row=mysqli_fetch_assoc($result2)){
?>

             <table>  
                <tr>
                    <td><?php echo $row['Enrollment_no']; ?></td>
                    <td><?php echo $row['s_name'] ?></td>
                    <td><?php echo $row['Dept'] ?></td>
                    <td><?php echo $row['Year'] ?></td>
                    <td><?php echo $row['Contact_no'] ?></td>
                </tr>
            </table>
        </div>

<?php
            }
        }
        
    }
?>

<!--Not well and attended college-->
<?php
    if(isset($_POST['not_well_attended'])){
        session_start();
        require "partials/_dbconnect.php";
        $sql3="select * from `students` where Enrollment_no in (select Enrollment_no from `s_health` where ( current_status='Not Well' and attended_college='Yes' and DATE(`timestamp`) = CURDATE()))";
        $result3=mysqli_query($conn,$sql3);
        $num_rows3=mysqli_num_rows($result3);
        if($num_rows3==0){
            echo "All students who have attended college are well.";
        }
        else{
?>
        <div class="container">
            <h3>Total number of unwell students  who have attended college : <?php echo $num_rows3; ?></h3>
            <table>
                <tr>
                    <td>Enrollment number</td>
                    <td>Student name</td>
                    <td>Department</td>
                    <td>Year</td>
                    <td>Contact number</td>
                </tr>
            </table>
                
<?php
            while($row=mysqli_fetch_assoc($result3)){
?>

             <table>  
                <tr>
                    <td><?php echo $row['Enrollment_no']; ?></td>
                    <td><?php echo $row['s_name'] ?></td>
                    <td><?php echo $row['Dept'] ?></td>
                    <td><?php echo $row['Year'] ?></td>
                    <td><?php echo $row['Contact_no'] ?></td>
                </tr>
            </table>
        </div>

<?php
            }
        }
        
    }
?>