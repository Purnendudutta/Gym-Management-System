<?php
@include 'config.php';
session_start();

$message = '';
$is_error = false;

if (isset($_POST['reset_request'])) {
    $email = filter_var(trim($_POST['email']), FILTER_VALIDATE_EMAIL);

    if (!$email) {
        $message = "Please enter a valid email address.";
        $is_error = true;
    } else {
        $stmt = $conn->prepare("SELECT id, name FROM user_form WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $res = $stmt->get_result();

        if ($res->num_rows > 0) {
            $reset_token = bin2hex(random_bytes(16));
            $message = "A password recovery token has been generated: <strong>" . $reset_token . "</strong>. Contact support or use the reset link.";
            $is_error = false;
        } else {
            $message = "If an account with that email exists, password recovery instructions have been prepared.";
            $is_error = false;
        }
        $stmt->close();
    }
}
?>
<!DOCTYPE html>
<html lang="en" data-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FITNESS FREEK | Password Recovery</title>
    <link rel="icon" href="../home/women.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="../includes/global.css">
</head>
<body style="min-height:100vh; display:flex; align-items:center; justify-content:center; background:var(--bg-primary);">
    <div style="width:100%; max-width:440px; padding:38px; background:var(--bg-card); border:1.5px solid var(--border-color); border-radius:20px; box-shadow:0 20px 60px rgba(0,0,0,0.8);">
        
        <div class="text-center mb-4">
            <div style="width:60px; height:60px; margin:0 auto 16px; background:rgba(229,9,20,0.12); border:1.5px solid var(--brand-primary); border-radius:16px; display:flex; align-items:center; justify-content:center; color:var(--brand-primary); font-size:26px;">
                <i class="fa-solid fa-key"></i>
            </div>
            <h3 class="fw-bold text-white mb-1">Reset Password</h3>
            <p class="text-secondary small">Enter your account email to receive your password reset token.</p>
        </div>

        <?php if (!empty($message)): ?>
            <div class="alert <?php echo $is_error ? 'alert-danger' : 'alert-success'; ?> py-2 small mb-3">
                <?php echo $message; ?>
            </div>
        <?php endif; ?>

        <form method="POST" action="">
            <div class="mb-4">
                <label class="small fw-semibold mb-1 text-light"><i class="fa-solid fa-envelope text-danger me-1"></i> Account Email</label>
                <input type="email" name="email" class="form-input-red" placeholder="your@email.com" required autocomplete="email">
            </div>

            <button type="submit" name="reset_request" class="btn-brand-red w-100 justify-content-center py-2 fs-6">
                <i class="fa-solid fa-paper-plane me-2"></i> Request Reset
            </button>

            <div class="text-center mt-3">
                <a href="login_form.php" class="text-danger small fw-semibold text-decoration-none">&larr; Back to Login</a>
            </div>
        </form>
    </div>


</body>
</html>

