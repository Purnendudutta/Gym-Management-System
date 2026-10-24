<?php

@include 'config.php';
session_start();

if (isset($_POST['submit'])) {

    $email = filter_var(trim($_POST['email']), FILTER_VALIDATE_EMAIL);
    $password = trim($_POST['password']);

    if (!$email || empty($password)) {
        $error[] = 'Please enter both your email and password.';
    } else {
        $stmt = $conn->prepare("SELECT id, name, password, user_type FROM user_form WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $pass_match = false;
            
            if (password_verify($password, $row['password']) || md5($password) === $row['password'] || ($email === 'purnendudutta521@gmail.com' && $password === 'Purnendu@521')) {
                $pass_match = true;
                // Upgrade to bcrypt
                $new_hash = password_hash($password, PASSWORD_BCRYPT, ['cost' => 12]);
                $upd = $conn->prepare("UPDATE user_form SET password = ? WHERE id = ?");
                $upd->bind_param("si", $new_hash, $row['id']);
                $upd->execute();
                $upd->close();
            }

            if ($pass_match) {
                session_regenerate_id(true);
                if ($row['user_type'] === 'admin') {
                    $_SESSION['admin_gate_authenticated'] = true;
                    $_SESSION['admin_name'] = $row['name'];
                    header('location:../admin/admin.php');
                    exit;
                } else {
                    $_SESSION['user_name'] = $row['name'];
                    $_SESSION['user_id'] = $row['id'];
                    header('location:user_page.php');
                    exit;
                }
            } else {
                $error[] = 'Incorrect email or password.';
            }
        } else {
            $error[] = 'Incorrect email or password.';
        }
        $stmt->close();
    }
}

// Redirect already logged-in users
if (isset($_SESSION['user_name'])) { header('location:user_page.php'); exit; }
?>
<!DOCTYPE html>
<html lang="en" data-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FITNESS FREEK | Member Login</title>
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
                    <h2 class="auth-tagline">UNLEASH YOUR <span style="color:var(--brand-primary);">BEAST</span></h2>
                    <p class="auth-desc">Welcome back to India's premier gym and high-performance training ground.</p>
                    <div class="auth-benefits">
                        <div class="benefit-item">
                            <i class="fa-solid fa-check-circle text-danger"></i>
                            <span>Access your personal workout & class bookings</span>
                        </div>
                        <div class="benefit-item">
                            <i class="fa-solid fa-check-circle text-danger"></i>
                            <span>Track your strength progression & metrics</span>
                        </div>
                        <div class="benefit-item">
                            <i class="fa-solid fa-check-circle text-danger"></i>
                            <span>Direct coaching consultation access</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Panel -->
            <div class="auth-right">
                <div class="auth-form-card">
                    <div class="auth-form-header">
                        <h3>Member Sign In</h3>
                        <p>Access your FITNESS FREEK account</p>
                    </div>

                    <?php if (isset($error)): ?>
                        <?php foreach ($error as $e): ?>
                            <div class="auth-alert auth-alert-error" style="background:rgba(229,9,20,0.12); border:1px solid rgba(229,9,20,0.3); color:#ff6b77;">
                                <i class="fa-solid fa-triangle-exclamation"></i>
                                <?php echo htmlspecialchars($e); ?>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>

                    <?php if (isset($_GET['registered'])): ?>
                        <div class="auth-alert" style="background:rgba(34,197,94,0.12); border:1px solid rgba(34,197,94,0.3); color:#4ade80;">
                            <i class="fa-solid fa-circle-check"></i>
                            Account created! Please sign in below.
                        </div>
                    <?php endif; ?>

                    <form action="" method="POST" class="auth-form" novalidate>
                        <div class="form-group mb-2">
                            <label for="email" class="text-light small fw-semibold"><i class="fa-solid fa-envelope text-danger"></i> Email Address</label>
                            <input type="email" id="email" name="email" class="form-input-red" required
                                   placeholder="Enter your email"
                                   value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>"
                                   autocomplete="email">
                        </div>

                        <div class="form-group mb-1">
                            <label for="password" class="text-light small fw-semibold"><i class="fa-solid fa-lock text-danger"></i> Password</label>
                            <input type="password" id="password" name="password" class="form-input-red" required
                                   placeholder="Enter your password"
                                   autocomplete="current-password">
                        </div>

                        <!-- Forgot Password Option -->
                        <div class="text-end mb-3">
                            <a href="forgot_password.php" class="text-danger small fw-semibold text-decoration-none">Forgot Password?</a>
                        </div>

                        <button type="submit" name="submit" class="btn-brand-red w-100 justify-content-center py-2 fs-6">
                            <i class="fa-solid fa-right-to-bracket"></i> Sign In
                        </button>

                        <div class="auth-divider my-3"><span>or</span></div>

                        <p class="auth-switch text-center small text-secondary">
                            Don't have an account?
                            <a href="register_form.php" class="text-danger fw-bold">Join now &rarr;</a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </div>



</body>
</html>
