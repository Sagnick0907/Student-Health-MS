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
    <div class="container my-3">
        <form action="" method="post">
            <input type="submit" name="admin_login" value="Admin Login">
            <input type="submit" name="student_login" value="Student Login">
        </form>
    </div>
    <div class="container my-3">
        <form action="" method="post">
            <input type="submit" name="admin_signup" value="Admin Signup" disabled>
            <input type="submit" name="student_signup" value="Student Signup">
        </form>
    </div>
    
    <?php
    if(isset($_POST["admin_login"])){
        header("Location: admin_login.php");
    }
    if(isset($_POST["student_login"])){
        header("Location: student_login.php");
    }
    if(isset($_POST["admin_signup"])){
        header("Location: admin_signup.php");
    }
    if(isset($_POST["student_signup"])){
        header("Location: student_signup.php");
    }



    //if signup is done successfully
    if(isset($_GET['signupsuccess']) && $_GET['signupsuccess']=="true"){
        echo '<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
            <strong>Success!</strong> You can now login.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    </div>';
    }

    else if(isset($_GET['signupsuccess']) && $_GET['signupsuccess']=="false"){
        echo '<div class="alert alert-warning alert-dismissible fade show my-0" role="alert">
        <strong>Signup Failed! </strong> '.$_GET['error'].'
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
    </div>';
    }

    //if login is successful and we are currently logged in
    // if(isset($_GET['loginsuccess']) && $_GET['loginsuccess']=="true" && isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
    //     echo '<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
    //         <strong>Success!</strong> You have logged in successfully.
    //         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    //     <span aria-hidden="true">&times;</span>
    // </button>
    // </div>';
    // }
    // else if(isset($_GET['loginsuccess']) && $_GET['loginsuccess']=="false"){
    //     echo '<div class="alert alert-warning alert-dismissible fade show my-0" role="alert">
    //     <strong>Login Failed! </strong> '.$_GET['error'].'
    //     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    // <span aria-hidden="true">&times;</span>
    // </button>
    // </div>';
    // }

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