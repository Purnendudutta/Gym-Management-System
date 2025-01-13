<?php
//require_once('..\Log in\config.php');
require_once('..\admin\function.php');
$result=display_data();
//$query="select * from user_form";
//$result = mysqli_query($con,$query);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style1.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
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

    <!-- ADMIN PANEL START -->

    <div class="container-fluid" id="main-container">
        <div class="container-fluid" id="dashboard_container"> 
            <div class="container-fluid" id="NavItems">
                <p class="active sideBarItems"><span><i class="fa-solid fa-gauge-high"></i></span>Dashboard</p>
                <p class="sideBarItems"><span><i class="fa-solid fa-person-military-pointing"></i></span>Customer</p>
                <p class="sideBarItems"><span><i class="fa-solid fa-bars-progress"></i></span>Projects</p>
                <p class="sideBarItems"><span><i class="fa-solid fa-warehouse"></i></span>Inventory</p>
                <p class="sideBarItems"><span><i class="fa-solid fa-user"></i></span>Accounts</p>
                <p class="sideBarItems"><span><i class="fa-solid fa-message"></i></span>Task</p>
            </div>
        </div>
        <div class="container-fluid" id="body_container">
            <!-- navbar start -->
            <div class="container-fluid" id="navbar_container">
                <p class="dashboard_heading"><span><i class="fa-solid fa-gauge-high"></i></span>Dashboard</p>
            
                <input type="text" placeholder="Search here" class="searchBar">           
            <div class="profileContainer">
                <i class="fa-solid fa-user"></i>
                <p><a class="nav-link" href="..\Log in\login_form.php">Log in</a></p>
            </div>
            </div>
            <!-- navbar end -->  
            <div class="container-fluid" id="main_body">
                <div class="container-fluid" id="card_container">
                    <div class="box ">
                        <div class="textContainer">
                            <p class="numberText">54k</p>
                            <p class="sloganText">accounts</p>
                        </div>
                        <i class="fa-solid fa-person  itags"></i>                        
                    </div>
                    <div class="box">
                        <div class="textContainer">
                            <p class="numberText">62.4k</p>
                            <p class="sloganText">Viewing</p>
                        </div>
                        <i class="fa-solid fa-eye itags"></i>
                    </div>
                    <div class="box">
                        <div class="textContainer">
                            <p class="numberText">780</p>
                            <p class="sloganText">Projects</p>
                        </div>
                        <i class="fa-solid fa-tarp itags"></i>
                    </div>
                    <div class="box activeBox">
                        <div class="textContainer">
                            <p class="numberText">180.8k</p>
                            <p class="sloganText">Reach In Month</p>
                        </div>
                        <i class="fa-solid fa-arrow-trend-up activeBoxi itags"></i>
                    </div>
                </div>
                <div class="container-fluid" id="desc_container">
                    <div class="descBox1">
                        <div class="descHeader">
                            <p class="RecentText">Recent Projects</p>
                            <button type="button" class="btn btn-success">See All ></button>
                        </div>
                        <div class="projectsTable">
                            <table class="table">
                                <thead>
                                  <tr>
                                    <th scope="col">Id</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Action</th>
                                  </tr>
                                </thead>
                                    <?php
                                    while($row=mysqli_fetch_assoc($result))
                                    {
                                    ?>
                                    <tr>
                                    <td><?php echo$row['id'];?></td>
                                    <td><?php echo$row['name'];?></td>
                                    <td><?php echo$row['email'];?></td>
                <td>
              <a href="..\admin\edit.php?id=<?php echo $row["id"] ?>" class="link-dark"><i class="fa-solid fa-pen-to-square fs-5 me-3"></i></a>
              <a href="..\admin\delete.php?id=<?php echo $row["id"] ?>" class="link-dark"><i class="fa-solid fa-trash fs-5"></i></a>
            </td>
                                    </tr>
                                    <?php    
                                    }
                                    ?>
                              </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- script tags start -->
    <script src="script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>