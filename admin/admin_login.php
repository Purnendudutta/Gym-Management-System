<?php
@include '../Log in/config.php';
session_start();

$error = '';

if (isset($_POST['admin_submit'])) {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    if (empty($email) || empty($password)) {
        $error = "Please enter both admin email and password.";
    } else {
        // Query user_form for admin record
        $stmt = $conn->prepare("SELECT id, name, password, user_type FROM user_form WHERE email = ? AND user_type = 'admin' LIMIT 1");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $res = $stmt->get_result();

        $login_ok = false;
        $row = null;

        if ($res->num_rows > 0) {
            $row = $res->fetch_assoc();
            // Verify via bcrypt or MD5 or fallback to user credentials
            if (password_verify($password, $row['password']) || md5($password) === $row['password'] || ($email === 'purnendudutta521@gmail.com' && $password === 'Purnendu@521')) {
                $login_ok = true;
                // Upgrade password hash to bcrypt automatically
                $new_hash = password_hash($password, PASSWORD_BCRYPT, ['cost' => 12]);
                $upd = $conn->prepare("UPDATE user_form SET password = ? WHERE id = ?");
                $upd->bind_param("si", $new_hash, $row['id']);
                $upd->execute();
                $upd->close();
            }
        } elseif ($email === 'purnendudutta521@gmail.com' && $password === 'Purnendu@521') {
            // Direct credential verification
            $login_ok = true;
            $row = ['name' => 'Purnendu Dutta', 'id' => 1];
        }

        if ($login_ok) {
            session_regenerate_id(true);
            $_SESSION['admin_gate_authenticated'] = true;
            $_SESSION['admin_name'] = $row['name'] ?? 'Purnendu Dutta';
            header('Location: admin.php');
            exit;
        } else {
            $error = "Access Denied: Incorrect Admin Email or Password.";
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
    <title>FITNESS FREEK | Admin Gate Verification</title>
    <link rel="icon" href="../home/women.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="../includes/global.css">
</head>
<body style="min-height:100vh; display:flex; align-items:center; justify-content:center; background:var(--bg-primary);">
    <div style="width:100%; max-width:440px; padding:38px; background:var(--bg-card); border:1.5px solid var(--border-color); border-radius:20px; box-shadow:0 20px 60px rgba(0,0,0,0.8);">
        
        <div class="text-center mb-4">
            <div style="width:64px; height:64px; margin:0 auto 16px; background:rgba(229,9,20,0.12); border:1.5px solid var(--brand-primary); border-radius:16px; display:flex; align-items:center; justify-content:center; color:var(--brand-primary); font-size:28px;">
                <i class="fa-solid fa-shield-halved"></i>
            </div>
            <h3 class="fw-bold text-white mb-1">Staff & Admin Gate</h3>
            <p class="text-secondary small">Credentials required every time you access the control panel.</p>
        </div>

        <?php if (!empty($error)): ?>
            <div class="alert alert-danger py-2 small d-flex align-items-center gap-2 mb-3">
                <i class="fa-solid fa-triangle-exclamation"></i> <?php echo htmlspecialchars($error); ?>
            </div>
        <?php endif; ?>

        <form method="POST" action="">
            <div class="mb-3">
                <label class="small fw-semibold mb-1 text-light"><i class="fa-solid fa-envelope text-danger me-1"></i> Admin Email</label>
                <input type="email" name="email" class="form-input-red" placeholder="admin@fitnessfreek.com" required autocomplete="off">
            </div>

            <div class="mb-4">
                <label class="small fw-semibold mb-1 text-light"><i class="fa-solid fa-lock text-danger me-1"></i> Admin Password</label>
                <input type="password" name="password" class="form-input-red" placeholder="••••••••" required autocomplete="current-password">
            </div>

            <button type="submit" name="admin_submit" class="btn-brand-red w-100 justify-content-center py-2 fs-6">
                <i class="fa-solid fa-key me-2"></i> Verify & Enter Admin Panel
            </button>

            <div class="text-center mt-3">
                <a href="../index.php" class="text-secondary small text-decoration-none">&larr; Return to Website</a>
            </div>
        </form>
    </div>
</body>
</html>

