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
    <h3 class="text-center">Student Login Page</h3>

   <form action="" method="post">       <!--  posting to the same page -->
        <div class="mb-3">
            <label for="loginemail" class="form-label">Username</label>
            <input type="text" class="form-control" name="login_student_username" id="loginemail" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="loginpassword" class="form-label">Password</label>
            <input type="password" class="form-control" name="login_student_password" id="loginpassword">
        </div>

        <button type="submit" name="submit" class="btn btn-primary">Login</button>
    </form>


    <?php
    $showError="false";
    if(isset($_POST["submit"])){
        require "partials/_dbconnect.php";
        $username=$_POST['login_student_username'];
        $pass=$_POST['login_student_password'];

        //check whether this email exists or not
        $existsql="select * from `students` where s_username='$username'";
        $result=mysqli_query($conn,$existsql);
        $num_rows=mysqli_num_rows($result);
        
        if($num_rows==1){
            $row=mysqli_fetch_assoc($result);
            // echo $row['s_username'];
            
            //$hash=$row['password'];
            //if(password_verify($pass,$hash)){
            if($pass==$row['password']){
                session_start();
                //loggedin and useremail are predefined keys of $_SESSION variable
                $_SESSION['loggedin']=true;
                $_SESSION['username']=$username;
                
                //header("Location:/shms/student_dashboard.php?loginsuccess=true");
                header("Location:/shms/student_dashboard.php");
                echo "Login Successful";
                exit();  //to stop here and exit if login is correct
            }
            else{
                $showError="Invalid password";
            }
        }
        else{
            $showError="Invalid username";
        }


        if($showError!="false"){
            //header("Location:/shms/index.php?loginsuccess=false&error=$showError");
            echo $showError;
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