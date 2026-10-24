<?php

@include 'config.php';
session_start();

if (isset($_POST['submit'])) {

    // CSRF validation
    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        $error[] = 'Invalid form submission. Please try again.';
    } else {
        $name      = trim(mysqli_real_escape_string($conn, $_POST['name']));
        $email     = filter_var(trim($_POST['email']), FILTER_VALIDATE_EMAIL);
        $password  = trim($_POST['password']);
        $cpassword = trim($_POST['cpassword']);
        
        // STRICT: Public registrations are ALWAYS normal users
        $user_type = 'user';

        if (empty($name)) {
            $error[] = 'Full name is required.';
        } elseif (!$email) {
            $error[] = 'Please enter a valid email address.';
        } elseif (strlen($password) < 8) {
            $error[] = 'Password must be at least 8 characters long.';
        } elseif ($password !== $cpassword) {
            $error[] = 'Passwords do not match.';
        } else {
            // Check if email already exists
            $stmt = $conn->prepare("SELECT id FROM user_form WHERE email = ?");
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $stmt->store_result();

            if ($stmt->num_rows > 0) {
                $error[] = 'An account with this email already exists.';
            } else {
                // Hash with bcrypt
                $hashed = password_hash($password, PASSWORD_BCRYPT, ['cost' => 12]);
                $ins = $conn->prepare("INSERT INTO user_form (name, email, password, user_type) VALUES (?, ?, ?, ?)");
                $ins->bind_param("ssss", $name, $email, $hashed, $user_type);
                $ins->execute();
                $ins->close();
                header('location:login_form.php?registered=1');
                exit;
            }
            $stmt->close();
        }
    }
}

// Redirect if already logged in
if (isset($_SESSION['user_name'])) { header('location:user_page.php'); exit; }

// CSRF token
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

$depth = '..';
?>
<!DOCTYPE html>
<html lang="en" data-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FITNESS FREEK | Member Registration</title>
    <link rel="icon" href="..\home\women.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Anton&family=Oswald:wght@400;500;600;700&family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../includes/global.css">
    <link rel="stylesheet" href="style1.css">
</head>
<body class="auth-body">

    <div class="auth-container">
        <div class="auth-wrapper">
            <!-- Left Panel -->
            <div class="auth-left" style="background:linear-gradient(145deg, #0f0406 0%, #1c080b 50%, #260a0f 100%);">
                <div class="auth-left-content">
                    <div class="auth-brand">FITNESS <span style="color:var(--brand-primary);">FREEK</span></div>
                    <h2 class="auth-tagline">JOIN THE <span style="color:var(--brand-primary);">MOVEMENT</span></h2>
                    <p class="auth-desc">Create your member account and take the first step toward a stronger, healthier you.</p>
                    <div class="auth-benefits">
                        <div class="benefit-item">
                            <i class="fa-solid fa-check-circle text-danger"></i>
                            <span>Free 7-day trial pass with coach assessment</span>
                        </div>
                        <div class="benefit-item">
                            <i class="fa-solid fa-check-circle text-danger"></i>
                            <span>Access to all workout programs & classes</span>
                        </div>
                        <div class="benefit-item">
                            <i class="fa-solid fa-check-circle text-danger"></i>
                            <span>24/7 access to state-of-the-art gym floor</span>
                        </div>
                        <div class="benefit-item">
                            <i class="fa-solid fa-check-circle text-danger"></i>
                            <span>Member discounts on official supplements & store</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Panel -->
            <div class="auth-right">
                <div class="auth-form-card">
                    <div class="auth-form-header">
                        <h3>Create Member Account</h3>
                        <p>Join the FITNESS FREEK family today</p>
                    </div>

                    <?php if (isset($error)): ?>
                        <?php foreach ($error as $e): ?>
                            <div class="auth-alert auth-alert-error" style="background:rgba(229,9,20,0.12); border:1px solid rgba(229,9,20,0.3); color:#ff6b77;">
                                <i class="fa-solid fa-triangle-exclamation"></i>
                                <?php echo htmlspecialchars($e); ?>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>

                    <form action="" method="POST" class="auth-form" novalidate>
                        <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">

                        <div class="form-group mb-2">
                            <label for="name" class="text-light small fw-semibold"><i class="fa-solid fa-user text-danger"></i> Full Name</label>
                            <input type="text" id="name" name="name" class="form-input-red" required
                                   placeholder="Enter your full name"
                                   value="<?php echo isset($_POST['name']) ? htmlspecialchars($_POST['name']) : ''; ?>"
                                   autocomplete="name">
                        </div>

                        <div class="form-group mb-2">
                            <label for="email" class="text-light small fw-semibold"><i class="fa-solid fa-envelope text-danger"></i> Email Address</label>
                            <input type="email" id="email" name="email" class="form-input-red" required
                                   placeholder="Enter your email"
                                   value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>"
                                   autocomplete="email">
                        </div>

                        <div class="form-group mb-2">
                            <label for="password" class="text-light small fw-semibold"><i class="fa-solid fa-lock text-danger"></i> Password</label>
                            <div class="input-password-wrap">
                                <input type="password" id="password" name="password" class="form-input-red" required
                                       placeholder="Minimum 8 characters"
                                       autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group mb-3">
                            <label for="cpassword" class="text-light small fw-semibold"><i class="fa-solid fa-lock text-danger"></i> Confirm Password</label>
                            <div class="input-password-wrap">
                                <input type="password" id="cpassword" name="cpassword" class="form-input-red" required
                                       placeholder="Repeat your password"
                                       autocomplete="new-password">
                            </div>
                        </div>

                        <!-- All new registrants are strictly regular users -->
                        <input type="hidden" name="user_type" value="user">

                        <button type="submit" name="submit" class="btn-brand-red w-100 justify-content-center py-2 fs-6">
                            <i class="fa-solid fa-user-plus"></i> Join as Member
                        </button>

                        <div class="auth-divider my-3"><span>or</span></div>

                        <p class="auth-switch text-center small text-secondary">
                            Already have an account?
                            <a href="login_form.php" class="text-danger fw-bold">Sign in &rarr;</a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </div>



</body>
</html>
