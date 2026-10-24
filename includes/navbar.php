<?php
// Determine the relative path prefix based on current folder
$depth = isset($depth) ? $depth : '..';
$currentPage = basename($_SERVER['PHP_SELF'], '.php');
?>
<!-- Top Bar -->
<div class="top-bar" id="topBar">
    <div class="top-bar-inner">
        <div class="top-bar-contact">
            <i class="fa-solid fa-phone"></i>&nbsp;+91 8172032283 &nbsp;|&nbsp;
            <i class="fa-solid fa-envelope"></i>&nbsp;fitnessfreek@gmail.com
        </div>
        <div class="top-bar-brand">Welcome to FITNESS FREEK India</div>
        <div class="top-bar-social">
            <a href="https://www.facebook.com/purnendu.dutta.9275" target="_blank" aria-label="Facebook"><i class="fa-brands fa-facebook"></i></a>
            <a href="https://www.instagram.com/purnendudutta07/" target="_blank" aria-label="Instagram"><i class="fa-brands fa-instagram"></i></a>
            <a href="https://x.com/purnendu521" target="_blank" aria-label="Twitter"><i class="fa-brands fa-twitter"></i></a>
            <a href="https://www.linkedin.com/in/purnendu-dutta-723b58245/" target="_blank" aria-label="LinkedIn"><i class="fa-brands fa-linkedin"></i></a>
        </div>
    </div>
</div>
<!-- Main Navbar -->
<nav class="navbar navbar-expand-lg" id="mainNavbar">
    <div class="container-fluid navbar-inner">
        <a class="navbar-brand nav-logo" href="<?php echo $depth; ?>/home/index.php">
            FITNESS <span>FREEK</span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarContent">
            <ul class="navbar-nav mx-auto mb-2 mb-lg-0 nav-links-list">
                <li class="nav-item">
                    <a class="nav-link <?php echo ($currentPage=='index')?'active':''; ?>" href="<?php echo $depth; ?>/home/index.php">
                        <i class="fa-solid fa-house"></i> Home
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo ($currentPage=='activity')?'active':''; ?>" href="<?php echo $depth; ?>/activity/activity.php">
                        <i class="fa-solid fa-dumbbell"></i> Activities
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo ($currentPage=='trainers')?'active':''; ?>" href="<?php echo $depth; ?>/Trainers/trainers.php">
                        <i class="fa-solid fa-person-running"></i> Coaches
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo ($currentPage=='admin')?'active':''; ?>" href="<?php echo $depth; ?>/admin/admin.php">
                        <i class="fa-solid fa-gauge-high"></i> Admin
                    </a>
                </li>
                <?php if(isset($_SESSION['user_name'])): ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo $depth; ?>/Log in/user_page.php">
                        <i class="fa-solid fa-user"></i> <?php echo htmlspecialchars($_SESSION['user_name']); ?>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav-logout" href="<?php echo $depth; ?>/Log in/logout.php">
                        <i class="fa-solid fa-right-from-bracket"></i> Logout
                    </a>
                </li>
                <?php elseif(isset($_SESSION['admin_name'])): ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo $depth; ?>/Log in/admin_page.php">
                        <i class="fa-solid fa-shield-halved"></i> <?php echo htmlspecialchars($_SESSION['admin_name']); ?>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav-logout" href="<?php echo $depth; ?>/Log in/logout.php">
                        <i class="fa-solid fa-right-from-bracket"></i> Logout
                    </a>
                </li>
                <?php else: ?>
                <li class="nav-item">
                    <a class="nav-link nav-cta <?php echo ($currentPage=='login_form'||$currentPage=='register_form')?'active':''; ?>" href="<?php echo $depth; ?>/Log in/login_form.php">
                        <i class="fa-solid fa-right-to-bracket"></i> Login
                    </a>
                </li>
                <?php endif; ?>
            </ul>
            <div class="nav-right-controls">
                <!-- Theme Toggle -->
                <div class="theme-toggle-wrapper" title="Toggle Dark/Light Mode">
                    <input type="checkbox" id="themeToggle" class="theme-toggle-input">
                    <label for="themeToggle" class="theme-toggle-label">
                        <i class="fa-solid fa-sun sun-icon"></i>
                        <i class="fa-solid fa-moon moon-icon"></i>
                        <span class="toggle-ball"></span>
                    </label>
                </div>
            </div>
        </div>
    </div>
</nav>
