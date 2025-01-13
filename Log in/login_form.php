<?php

@include 'config.php';

session_start();

if(isset($_POST['submit'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = md5($_POST['password']);
   $cpass = md5($_POST['cpassword']);
   $user_type = $_POST['user_type'];

   $select = " SELECT * FROM user_form WHERE email = '$email' && password = '$pass' ";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){

      $row = mysqli_fetch_array($result);

      if($row['user_type'] == 'admin'){

         $_SESSION['admin_name'] = $row['name'];
         header('location:admin_page.php');

      }elseif($row['user_type'] == 'user'){

         $_SESSION['user_name'] = $row['name'];
         header('location:user_page.php');

      }
     
   }else{
      $error[] = 'incorrect email or password!';
   }

};
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style1.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <title>FITNESS FREEK</title>
    <link rel="icon" href="..\home\women.png">
</head>

<body>
    <!-- topbar start -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-12" id="topnavbar">
                <div class="row d-flex justify-content-evenly align-items-center" id="topnavitems">
                    <div class="col-3" id="topnavitems1">
                        <p> +91 8172032283 | fitnessfreek@gmail.com</p>
                    </div>
                    <div class="col-3" id="topnavitems2">
                        Welcome to Fiteness Freek India
                    </div>
                    <div class="col-3" id="topnavitems3">
                    <a href="https://www.facebook.com/purnendu.dutta.9275"><i class="fa-brands fa-facebook"></i></a>
                    <a href="https://www.instagram.com/purnendudutta07/"><i class="fa-brands fa-instagram"></i></a>
                    <a href="https://x.com/purnendu521"><i class="fa-brands fa-twitter"></i></a>
                    <a href="https://www.linkedin.com/in/purnendu-dutta-723b58245/"><i class="fa-brands fa-linkedin"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- nav bar start -->
    <nav class="navbar navbar-expand-lg bg-body-tertiary" id="navbar">
        <div class="container-fluid" background="black">
            <a class="navbar-brand" id="navlogo" href="..\home\index.php">FITNESS <span>FREEK</span></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0" id="navitems">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="..\home\index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="..\Log in\login_form.php">Log in</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="..\activity\activity.php">Activites</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="..\Trainers\trainers.php">Coaches</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="..\admin\admin.php">Admin</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
   
<div class="form-container">

   <form action="" method="post">
      <h3>login now</h3>
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
      <input type="email" name="email" required placeholder="enter your email">
      <input type="password" name="password" required placeholder="enter your password">
      <input type="submit" name="submit" value="login now" class="form-btn">
      <p>don't have an account? <a href="register_form.php">register now</a></p>
   </form>

</div>

</body>
</html>