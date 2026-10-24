<?php
@include 'config.php';
session_start();

if (!isset($_SESSION['user_name'])) {
    header('location:login_form.php');
    exit;
}

$depth = '..';
?>
<!DOCTYPE html>
<html lang="en" data-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FITNESS FREEK | Member Portal</title>
    <link rel="icon" href="..\home\women.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Anton&family=Oswald:wght@400;500;600;700&family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../includes/global.css">
</head>
<body style="background:var(--bg-primary); min-height:100vh;">

    <!-- Minimal Header -->
    <nav class="navbar navbar-expand-lg" id="proNavbar">
        <div class="container-fluid px-lg-5">
            <a class="navbar-brand nav-brand-logo" href="../index.php">
                <div class="brand-badge"><i class="fa-solid fa-dumbbell"></i></div>
                <div>FITNESS <span>FREEK</span></div>
            </a>
            <div class="d-flex align-items-center gap-3">
                <a href="../index.php" class="btn btn-sm btn-outline-danger"><i class="fa-solid fa-house"></i> Public Website</a>
                <a href="logout.php" class="btn btn-sm btn-danger"><i class="fa-solid fa-right-from-bracket"></i> Logout</a>
            </div>
        </div>
    </nav>

    <div class="container py-5">
        <div class="p-5 rounded-4 mb-4" style="background:linear-gradient(135deg, rgba(229,9,20,0.18), var(--bg-card)); border:1.5px solid var(--border-color);">
            <span class="section-badge"><i class="fa-solid fa-user-check"></i> Member Active Pass</span>
            <h1 class="display-5 fw-bold text-white my-2" style="font-family:'Oswald',sans-serif;">
                Welcome, <span style="color:var(--brand-primary);"><?php echo htmlspecialchars($_SESSION['user_name']); ?></span>!
            </h1>
            <p class="text-secondary lead mb-4">Your 24/7 fitness journey is live. Explore programs, personal coaching, and official gym gear.</p>
            <div class="d-flex gap-3 flex-wrap">
                <a href="../index.php#activities" class="btn-brand-red"><i class="fa-solid fa-dumbbell"></i> View Workouts</a>
                <a href="../index.php#store" class="btn-outline-red"><i class="fa-solid fa-bag-shopping"></i> Visit Store</a>
                <a href="../index.php#coaches" class="btn-outline-red"><i class="fa-solid fa-person-running"></i> Find Coach</a>
            </div>
        </div>

        <div class="row g-4">
            <div class="col-md-4">
                <div class="p-4 rounded-4 h-100" style="background:var(--bg-card); border:1px solid var(--border-color);">
                    <div class="fs-2 text-danger mb-2"><i class="fa-solid fa-calendar-check"></i></div>
                    <h5 class="fw-bold text-white">Upcoming Classes</h5>
                    <p class="text-secondary small">Book spots in Zumba, Yoga, and Indoor Sprint sessions.</p>
                    <a href="../index.php#activities" class="text-danger small fw-semibold">Browse Schedule &rarr;</a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="p-4 rounded-4 h-100" style="background:var(--bg-card); border:1px solid var(--border-color);">
                    <div class="fs-2 text-danger mb-2"><i class="fa-solid fa-chart-line"></i></div>
                    <h5 class="fw-bold text-white">Body Progression</h5>
                    <p class="text-secondary small">Log lifting PRs, track weight loss, and monitor stamina.</p>
                    <a href="../index.php#pricing" class="text-danger small fw-semibold">View Metrics &rarr;</a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="p-4 rounded-4 h-100" style="background:var(--bg-card); border:1px solid var(--border-color);">
                    <div class="fs-2 text-danger mb-2"><i class="fa-solid fa-bag-shopping"></i></div>
                    <h5 class="fw-bold text-white">Member Fuel Store</h5>
                    <p class="text-secondary small">Exclusive member discounts on pure whey isolates and lifting gear.</p>
                    <a href="../index.php#store" class="text-danger small fw-semibold">Shop Discounts &rarr;</a>
                </div>
            </div>
        </div>
    </div>



</body>
</html>
