<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <!-- Bootstrap 4 CSS -->
    
    <title>SHMS</title>
    <?php
        session_start();
        require "partials/_dbconnect.php";
    ?>
  </head>
  <body>
    
    <h1 class="text-center">Student Health Management System</h1>
    <h3 class="text-center">Student Dashboard- Student:<?php echo $_SESSION['username'];?> <span mx-3><a href="logout.php">Logout<a></span></h3>
    <h5>Please Keep your health details up to date.</h5>
    <div class="container">
        <form action="" method="post">
            
            <input type="submit" name="View_Student" value="View Details">
            
                
        </form>
        
    </div>
    
    <?php
        
        //If admin clicks on View_Student then student details will be shown
        //Also View Health Details and Update Details options will be shown
        if(isset($_POST['View_Student'])){
            $username=$_SESSION['username'];
            $sql="select * from `students` where s_username='$username'";
            $result=mysqli_query($conn,$sql);
            $num_rows=mysqli_num_rows($result);
            if($num_rows==1){
                $row=mysqli_fetch_assoc($result);
    ?>
                <div class="container my-3" >
                    <center>
                    <table>
                        <tr>
                            <td>Student Name:</td>
                            <td><?php echo $row['s_name']; ?></td>
                        </tr>
                        <tr>
                            <td>Enrollment No.:</td>
                            <td><?php echo $row['Enrollment_no']; ?></td>
                        </tr>
                        <tr>
                            <td>Department:</td>
                            <td><?php echo $row['Dept']; ?></td>
                        </tr>
                        <tr>
                            <td>Year:</td>
                            <td><?php echo $row['Year']; ?></td>
                        </tr>
                        <tr>
                            <td>Contact Number:</td>
                            <td><?php echo $row['Contact_no']; ?></td>
                        </tr>
                        
                    </table>
                    </center>
                </div>
                <!-- View Health Details and Update Details options will be shown-->
                <div class="container my-3">
                    <center>

                    <!--Posting to the same page-->
                    <form action="" method="post">
                        <table>
                            <tr>
                                <td>
                                    <input type="submit" name="View_Health_Details" value="View Health Details">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="submit" name="Update_Student_Details" value="Update Personal Details">
                                    
                                </td>
                            </tr>
                            
                        </table>
                    </form>
                    </center>
                </div>
    <?php
            }
        }
    ?>

    <!--Update personal details page-->
    <?php
        if(isset($_POST['Update_Student_Details'])){
            $username=$_SESSION['username'];
            $sql="select * from `students` where s_username='$username'";
            $result=mysqli_query($conn,$sql);
            $num_rows=mysqli_num_rows($result);
            if($num_rows==1){
                $row=mysqli_fetch_assoc($result);
    ?>

                <div class="container my-3" >
                    <center>
                    <!--Posting to update_by_student.php-->
                    <form  action="update_by_student.php" method="post">
                        <table>
                            
                            <tr>
                                <td>Student Name:</td>
                                <td>
                                    <input type="text"  name="s_name" value="<?php echo $row['s_name']; ?>">
                                </td>
                                
                            </tr>
                            <tr>
                                <td>Enrollment No.:</td>
                                <td>
                                    <input type="text"  name="Enrollment_no" value="<?php echo $row['Enrollment_no']; ?>">
                                </td>
                            </tr>
                            <tr>
                                <td>Department:</td>
                                <td>
                                    <input type="text"  name="Dept" value="<?php echo $row['Dept']; ?>">
                                </td>
                            </tr>
                            <tr>
                                <td>Year:</td>
                                <td>
                                    <input type="text"  name="Year" value="<?php echo $row['Year']; ?>">
                                </td>
                            </tr>
                            <tr>
                                <td>Contact Number:</td>
                                <td>
                                    <input type="text"  name="Contact_no" value="<?php echo $row['Contact_no']; ?>">
                                </td>
                            </tr>
                            
                        </table>
                        <br>
                        <br>
                        <center><input type="submit" name="update" value="Save"></center>
                    </form>
                    </center>
                </div>
    <?php
            }
        }      
    ?>


    <!-- View Health Details Page-->
    
    <?php
        if(isset($_POST['View_Health_Details'])){
            //$Enroll_no=$_GET['enroll_no'];   //Getting the value of the parameter enroll_no
            $username=$_SESSION['username'];
           
            $query="select Enrollment_no from `students` where s_username='$username'";
            $result2=mysqli_query($conn,$query);
            $row2=mysqli_fetch_assoc($result2);
            $Enroll_no=$row2['Enrollment_no'];

            $sql="select * from `s_health` where Enrollment_no='$Enroll_no'";
            $result=mysqli_query($conn,$sql);
            $num_rows=mysqli_num_rows($result);
            if($num_rows==1){
                $row=mysqli_fetch_assoc($result);
    ?>

                <div class="container my-3" >
                    <center>
                    <table>
                        <tr>
                            <td>Blood Group : </td>
                            <td><?php echo $row['blood_group']; ?></td>
                        </tr>
                        <tr>
                            <td>Major Disease(If Any) : </td>
                            <td><?php echo $row['major_disease']; ?></td>
                        </tr>
                        <tr>
                            <td>Minor Disease(If Any) : </td>
                            <td><?php echo $row['minor_disease']; ?></td>
                        </tr>
                        <tr>
                            <td>Vaccinated(1st Dose) : </td>
                            <td><?php echo $row['vaccinated_1']; ?></td>
                        </tr>
                        <tr>
                            <td>Vaccinated(2nd Dose) : </td>
                            <td><?php echo $row['vaccinated_2']; ?></td>
                        </tr>
                        
                        <tr>
                            <td>Current Status : </td>
                            <td><?php echo $row['current_status']; ?></td>
                        </tr>
                        <tr>
                            <td>Attended College : </td>
                            <td><?php echo $row['attended_college']; ?></td>
                        </tr>
                        <tr>
                            <td>Last updated on: </td>
                            <td><?php echo $row['timestamp']; ?></td>
                        </tr>
                    </table>
                    </center>
                </div>

                <!--  Update Health Details option will be shown-->
                <div class="container my-3">
                    <center>

                    <!--Posting to the same page-->
                    <form action="" method="post">
                        <input type="submit" name="Update_Health_Details" value="Update Health Details">
                    </form>
                    </center>
                </div>
    <?php
            }
        }      
    ?>

    <!-- update Health Details Page-->
    
    <?php
        if(isset($_POST['Update_Health_Details'])){
            //$Enroll_no=$_GET['enroll_no'];   //Getting the value of the parameter enroll_no
            $username=$_SESSION['username'];
           
            $query="select Enrollment_no from `students` where s_username='$username'";
            $result2=mysqli_query($conn,$query);
            $row2=mysqli_fetch_assoc($result2);
            $Enroll_no=$row2['Enrollment_no'];

            $sql="select * from `s_health` where Enrollment_no='$Enroll_no'";
            $result=mysqli_query($conn,$sql);
            $num_rows=mysqli_num_rows($result);
            if($num_rows==1){
                $row=mysqli_fetch_assoc($result);
    ?>
                <div class="container my-3" >
                    <center>
                    <!--Posting to update_health_by_student.php-->
                    <form  action="update_health_by_student.php" method="post">
                        <table>
                        
                            <tr>
                                <td>Blood Group : </td>
                                <td>
                                    <input type="text"  name="blood_group" value="<?php echo $row['blood_group']; ?>">
                                </td>
                                
                            </tr>
                            <tr>
                                <td>Major Disease(If Any) : </td>
                                <td>
                                    <input type="text"  name="major_disease" value="<?php echo $row['major_disease']; ?>">
                                </td>
                            </tr>
                            <tr>
                                <td>Minor Disease(If Any) : </td>
                                <td>
                                    <input type="text"  name="minor_disease" value="<?php echo $row['minor_disease']; ?>">
                                </td>
                            </tr>
                            <tr>
                                <td>Vaccinated(1st Dose) : </td>
                                <td>
                                    <input type="text"  name="vaccinated_1" value="<?php echo $row['vaccinated_1']; ?>">
                                </td>
                            </tr>
                            <tr>
                                <td>Vaccinated(2nd Dose) : </td>
                                <td>
                                    <input type="text"  name="vaccinated_2" value="<?php echo $row['vaccinated_2']; ?>">
                                </td>
                            </tr>
                            <tr>
                                <td>Current Status : </td>
                                <td>
                                    <input type="text"  name="current_status" value="<?php echo $row['current_status']; ?>">
                                </td>
                            </tr>
                            <tr>
                                <td>Attended College : </td>
                                <td>
                                    <input type="text"  name="attended_college" value="<?php echo $row['attended_college']; ?>">
                                </td>
                            </tr>
                            
                        </table>
                        <br>
                        <br>
                        <center><input type="submit" name="update" value="Save"></center>
                    </form>
                    </center>
                </div>
    <?php
            }
        }      
    ?>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    including bootstap 4 js 
    -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
  </body>
</html>