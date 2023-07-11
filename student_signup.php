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
  </head>
  <body>
    
    <h1 class="text-center">Student Health Management System</h1>
    <h3 class="text-center">Admin Signup Page</h3>

   <form action="" method="post">       <!--  posting to the same page -->
        <div class="mb-3">
            <label for="s_name" class="form-label">Student Name</label>
            <input type="text" class="form-control" name="s_name" id="s_name">
        </div>
        <div class="mb-3">
            <label for="Enrollment_no" class="form-label">Enrollment Number</label>
            <input type="text" class="form-control" name="Enrollment_no" id="Enrollment_no">
        </div>
        <div class="mb-3">
            <label for="Dept" class="form-label">Department</label>
            <input type="text" class="form-control" name="Dept" id="Dept">
        </div>
        <div class="mb-3">
            <label for="Year" class="form-label">Current Year</label>
            <input type="text" class="form-control" name="Current_Year" id="Year">
        </div>
        
        <div class="mb-3">
            <label for="Contact_no" class="form-label">Contact number</label>
            <input type="text" class="form-control" name="Contact_no" id="Contact_no">
        </div>
        <div class="mb-3">
            <label for="s_username" class="form-label">Username</label>
            <input type="text" class="form-control" name="s_username" id="s_username" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" name="password" id="password">
        </div>
        <div class="mb-3">
            <label for="c_password" class="form-label">Confirm Password</label>
            <input type="password" class="form-control" name="c_password" id="c_password">
        </div>

        <button type="submit" name="submit" class="btn btn-primary">Signup</button>
    </form>


    <?php
    $showError="false";
    if($_SERVER['REQUEST_METHOD']=="POST"){
        require "partials/_dbconnect.php";
        $s_username=$_POST['s_username'];
        $password=$_POST['password'];
        $c_password=$_POST['c_password'];
    
        //check whether this email exists or not
        $existsql="select * from `students` where s_username='$s_username'";
        $result=mysqli_query($conn,$existsql);
        $num_rows=mysqli_num_rows($result);
        if($num_rows>0){
            $showError="Username already in use";
        }
        else{
            if($password==$c_password){
                $hash=password_hash($password,PASSWORD_DEFAULT);
                
                // echo $password;
                // echo $hash;
                $s_name=$_POST['s_name'];
                $Enrollment_no= $_POST['Enrollment_no'];
                $Dept=$_POST['Dept'];
                $Current_Year=$_POST['Current_Year'];
                $Contact_no=$_POST['Contact_no'];
                $sql="INSERT INTO `students` (`s_name`, `Enrollment_no`, `Dept`, `Year`, `Contact_no`, `s_username`, `password`, `timestamp`) VALUES ('$s_name', '$Enrollment_no', '$Dept', '$Current_Year', '$Contact_no', '$s_username', '$password', current_timestamp())";
                $myresult=mysqli_query($conn,$sql);
                if($myresult){
                    //If signup is successful

                    //entering the Enrollment_no into s_health table
                    $sql2="INSERT INTO `s_health` (`Enrollment_no`) VALUES ('$Enrollment_no')";
                    $myresult2=mysqli_query($conn,$sql2);
                    if($myresult){
                        header("Location:/shms/index.php?signupsuccess=true");
                        exit();
                    }
                    else{
                        echo "Signup done but s_health not updated";
                    }
                }
            }
            else{  
                $showError="Passwords do not match";
            }
        }
        if($showError!="false"){
            header("Location:/shms/index.php?signupsuccess=false&error=$showError");
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