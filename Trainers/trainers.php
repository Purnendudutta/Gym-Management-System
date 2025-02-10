<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="traniers.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <title>FITNESS FREEK</title>
    <link rel="icon" href="..\home\women.png">
</head>

<body>
    
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

<div class="container-fluid" id="bodyBox">
    <div class="detailsBox">
        <div class="heading">
            <p>Elevate, Transform, Achieve: <span>Your Fitness Journey Begins</span></p>
        </div>
        <p class="ourTrainers ">Our Trainers</p>
        <div class="cards">
            <div class="card" style="width: 15rem; ">
                <img src="trainer3.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title" style="color: aqua;">Manoj Bajpai</h5>
                  <p class="card-text">A dedicated gym trainer passionate about optimizing your fitness journey. Offering  guidance support to help you.</p>
                </div>
                <ul class="list-group list-group-flush">
                  <li class="list-group-item"><i class="fa-solid fa-envelope"></i>   emily@gymfit.com</li>
                  <li class="list-group-item"><i class="fa-solid fa-phone"></i>  +1 (555) 123-4567</li>
                  <li class="list-group-item"><i class="fa-solid fa-language"></i>  Fluent in English and Hindi</li>
                </ul>
                <div class="card-body">
                  <a href="#" class="card-link">Contact</a>
                  <a href="#" class="card-link">Time Schedule</a>
                </div>
              </div>

              <div class="card" style="width: 15rem;">
                <img src="trainer4.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title" style="color: aqua;">Rahul Mishra</h5>
                  <p class="card-text">A dedicated gym trainer committed to your fitness journey. Offering fhvud ufi id personalized workouts tailored to your goals and needs. </p>
                </div>
                <ul class="list-group list-group-flush">
                  <li class="list-group-item"><i class="fa-solid fa-envelope"></i>   emily@gymfit.com</li>
                  <li class="list-group-item"><i class="fa-solid fa-phone"></i>  +1 (555) 123-4567</li>
                  <li class="list-group-item"><i class="fa-solid fa-language"></i>  Fluent in English and Hindi and Bengali</li>
                </ul>
                <div class="card-body">
                  <a href="#" class="card-link">Contact</a>
                  <a href="#" class="card-link">Time Schedule</a>
                </div>
              </div>

              <div class="card" style="width: 15rem; ">
                <img src="trainer2.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title" style="color: aqua;">Nikhil Das</h5>
                  <p class="card-text">Empowering transformations through expert guidance and personalized fitness strategies.</p>
                </div>
                <ul class="list-group list-group-flush">
                  <li class="list-group-item"><i class="fa-solid fa-envelope"></i>   emily@gymfit.com</li>
                  <li class="list-group-item"><i class="fa-solid fa-phone"></i>  +1 (555) 123-4567</li>
                  <li class="list-group-item"><i class="fa-solid fa-language"></i>  Fluent in English and Bengali</li>
                </ul>
                <div class="card-body">
                  <a href="#" class="card-link">Contact</a>
                  <a href="#" class="card-link">Time Schedule</a>
                </div>
              </div>
        </div>
    </div>
    <div class="animationBox">
        <dotlottie-player src="https://lottie.host/00191dc8-ee2c-4004-9393-48bc8afe9ebc/sRWLR6mAww.json" class="animationVdo" background="transparent" speed="1"  loop autoplay></dotlottie-player>
      
        <div class="subscription-module">
            <h2>Premium Subscription</h2>
            <p>Unlock exclusive features with our premium subscription plan.</p>
            <ul>
                <li>Access to advanced workout programs</li>
                <li>Personalized nutrition plans</li>
                <li>One-on-one coaching sessions</li>
                <li>24/7 customer support</li>
            </ul>
            <div class="price">$29.99<span>/month</span></div>
            <button class="subscribe-btn"><a href="..\Log in\login_form.php" style="text-decoration: none;">SUBSCRIBE NOW</a></button>
        </div>
    </div>
</div>
   


    <!-- script tag start --> 
 

    <script src="https://unpkg.com/@dotlottie/player-component@latest/dist/dotlottie-player.mjs" type="module"></script> 

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>