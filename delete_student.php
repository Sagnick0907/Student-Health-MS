<script type="text/javascript">
    //confirm message
    if(confirm("Do you want to delete surely?")){
        //we cannot write php directly in java script so we use document.write
        document.write("<?php
            session_start();
            require "partials/_dbconnect.php";
            $Enroll_no=$_GET['enroll_no'];

            //on delete cascade i.e. deleting from s_health the record of that student first
            $query2="delete from `s_health` where Enrollment_no='$Enroll_no'";
            $result2=mysqli_query($conn,$query2);
            //then deleting record of that student from students table
            $query="delete from `students` where Enrollment_no='$Enroll_no'";
            $result=mysqli_query($conn,$query);

            //making Enrollment no. foreign key
            //query-->
            //ALTER TABLE `s_health` ADD CONSTRAINT `Foreign key` FOREIGN KEY (`Enrollment_no`) REFERENCES `students`(`Enrollment_no`) ON DELETE NO ACTION ON UPDATE NO ACTION;
        
        ?>");
        //alert("Deleted successfully");
    }
    //redirecting to admin_dashboard.php
    window.location.href="admin_dashboard.php";
</script>


