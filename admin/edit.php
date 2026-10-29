<?php
include "../Log in/config.php";
session_start();

// Validate ID
$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
if (!$id && isset($_POST['id'])) {
    $id = filter_var($_POST['id'], FILTER_VALIDATE_INT);
}

if (!$id || $id < 1) {
    header("Location: ..\admin\admin.php");
    exit;
}

$success_msg = '';
$error_msg = '';

if (isset($_POST['submit'])) {
    $name  = trim($_POST['name']);
    $email = filter_var(trim($_POST['email']), FILTER_VALIDATE_EMAIL);

    if (empty($name) || !$email) {
        $error_msg = 'Please enter a valid name and email address.';
    } else {
        $stmt = $conn->prepare("UPDATE user_form SET name=?, email=? WHERE id=?");
        $stmt->bind_param("ssi", $name, $email, $id);
        if ($stmt->execute()) {
            header("Location: ..\admin\admin.php?msg=User+updated+successfully");
            exit;
        } else {
            $error_msg = 'Update failed: ' . $conn->error;
        }
        $stmt->close();
    }
}

// Fetch user
$stmt = $conn->prepare("SELECT * FROM user_form WHERE id = ? LIMIT 1");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
$stmt->close();

if (!$row) {
    header("Location: ..\admin\admin.php");
    exit;
}

$depth = '..';
?>

<!DOCTYPE html>
<html lang="en" data-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FITNESS FREEK | Edit User</title>
    <link rel="icon" href="..\home\women.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Anton&family=Oswald:wght@400;500;600;700&family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../includes/global.css">
    <link rel="stylesheet" href="style1.css">
    <script src="../includes/theme.js"></script>
</head>

<body>
    <?php include '../includes/navbar.php'; ?>

    <div style="min-height: calc(100vh - 120px); display: flex; align-items: center; justify-content: center; padding: 60px 20px; background: var(--bg-primary);">
        <div style="width: 100%; max-width: 520px;">

            <div style="text-align: center; margin-bottom: 32px;">
                <span class="section-badge"><i class="fa-solid fa-pen-to-square"></i> Admin Panel</span>
                <h2 class="section-title" style="font-size: 32px; margin-top: 12px;">Edit <span>User</span></h2>
            </div>

            <?php if ($error_msg): ?>
                <div class="auth-alert auth-alert-error" style="margin-bottom: 16px;">
                    <i class="fa-solid fa-triangle-exclamation"></i> <?php echo htmlspecialchars($error_msg); ?>
                </div>
            <?php endif; ?>

            <div style="background: var(--bg-card); border: 1px solid var(--border-color); border-radius: 16px; padding: 36px 32px;">
                <form method="POST" action="">
                    <input type="hidden" name="id" value="<?php echo (int)$row['id']; ?>">

                    <div class="form-group" style="margin-bottom: 20px;">
                        <label style="font-size:13px; font-weight:600; color: var(--text-secondary); display:flex; align-items:center; gap:7px; margin-bottom:6px;">
                            <i class="fa-solid fa-hashtag" style="color: var(--brand-primary);"></i> User ID
                        </label>
                        <input type="text" value="#<?php echo (int)$row['id']; ?>" disabled
                            style="width:100%; padding:11px 16px; background: var(--form-input-bg); border: 1.5px solid var(--form-input-border); border-radius: 10px; color: var(--text-muted); font-size: 14px; font-family: 'Poppins', sans-serif; outline: none;">
                    </div>

                    <div class="form-group" style="margin-bottom: 20px;">
                        <label style="font-size:13px; font-weight:600; color: var(--text-secondary); display:flex; align-items:center; gap:7px; margin-bottom:6px;">
                            <i class="fa-solid fa-user" style="color: var(--brand-primary);"></i> Full Name
                        </label>
                        <input type="text" name="name" required
                            value="<?php echo htmlspecialchars($row['name']); ?>"
                            style="width:100%; padding:11px 16px; background: var(--form-input-bg); border: 1.5px solid var(--form-input-border); border-radius: 10px; color: var(--text-primary); font-size: 14px; font-family: 'Poppins', sans-serif; outline: none; transition: border-color 0.25s;"
                            onfocus="this.style.borderColor='#00d4c8'" onblur="this.style.borderColor='var(--form-input-border)'">
                    </div>

                    <div class="form-group" style="margin-bottom: 28px;">
                        <label style="font-size:13px; font-weight:600; color: var(--text-secondary); display:flex; align-items:center; gap:7px; margin-bottom:6px;">
                            <i class="fa-solid fa-envelope" style="color: var(--brand-primary);"></i> Email Address
                        </label>
                        <input type="email" name="email" required
                            value="<?php echo htmlspecialchars($row['email']); ?>"
                            style="width:100%; padding:11px 16px; background: var(--form-input-bg); border: 1.5px solid var(--form-input-border); border-radius: 10px; color: var(--text-primary); font-size: 14px; font-family: 'Poppins', sans-serif; outline: none; transition: border-color 0.25s;"
                            onfocus="this.style.borderColor='#00d4c8'" onblur="this.style.borderColor='var(--form-input-border)'">
                    </div>

                    <div style="display: flex; gap: 12px;">
                        <button type="submit" name="submit" class="btn-brand" style="flex:1; justify-content:center;">
                            <i class="fa-solid fa-floppy-disk"></i> Update User
                        </button>
                        <a href="..\admin\admin.php" class="btn-outline-brand" style="flex:1; justify-content:center;">
                            <i class="fa-solid fa-arrow-left"></i> Cancel
                        </a>
                    </div>
                </form>
            </div>

        </div>
    </div>

    <?php include '../includes/footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>
</body>
</html>
