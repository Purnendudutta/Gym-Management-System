<?php
require_once('..\admin\function.php');
session_start();

// Strict gate check: Must be authenticated via admin_login.php
if (!isset($_SESSION['admin_gate_authenticated']) || $_SESSION['admin_gate_authenticated'] !== true) {
    header('Location: admin_login.php');
    exit;
}

$result = display_data();
$depth = '..';
?>

<!DOCTYPE html>
<html lang="en" data-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FITNESS FREEK | Admin Dashboard</title>
    <link rel="icon" href="..\home\women.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Anton&family=Oswald:wght@400;500;600;700&family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../includes/global.css">
    <link rel="stylesheet" href="style1.css">
</head>

<body>

    <div class="admin-layout">

        <!-- Sidebar -->
        <aside class="admin-sidebar">
            <div class="sidebar-brand">FITNESS <span>FREEK</span></div>

            <span class="sidebar-section-label">Main Menu</span>
            <a class="sidebar-link active" href="admin.php">
                <i class="fa-solid fa-gauge-high"></i> Dashboard
            </a>
            <a class="sidebar-link" href="../index.php">
                <i class="fa-solid fa-house"></i> Public Website
            </a>
            <a class="sidebar-link" href="../index.php#store">
                <i class="fa-solid fa-bag-shopping"></i> Gym Store
            </a>

            <span class="sidebar-section-label" style="margin-top: 24px;">Security & Exit</span>
            <a class="sidebar-link" href="admin_logout.php" style="color:#f87171; margin-top: auto;">
                <i class="fa-solid fa-right-from-bracket"></i> Lock & Exit Admin
            </a>
        </aside>

        <!-- Main Content -->
        <div class="admin-main">

            <!-- Admin Topbar -->
            <div class="admin-topbar">
                <div class="admin-topbar-title">
                    <i class="fa-solid fa-gauge-high text-danger"></i> Admin Control Panel
                </div>
                <div class="admin-search">
                    <i class="fa-solid fa-search"></i>
                    <input type="text" placeholder="Search members..." id="tableSearch">
                </div>
                <div class="admin-topbar-user">
                    <div class="user-avatar" style="background:var(--brand-primary); color:#fff;">
                        P
                    </div>
                    <span>Purnendu Dutta (Admin)</span>
                    <a href="admin_logout.php" class="btn btn-sm btn-outline-danger ms-3"><i class="fa-solid fa-power-off"></i> Exit</a>
                </div>
            </div>

            <!-- Content Area -->
            <div class="admin-content">

                <!-- Stats Row -->
                <div class="stats-row">
                    <div class="admin-stat-box">
                        <div class="admin-stat-icon si-teal" style="background:rgba(229,9,20,0.15); color:var(--brand-primary);"><i class="fa-solid fa-users"></i></div>
                        <div class="admin-stat-info">
                            <div class="stat-val">10.4k</div>
                            <div class="stat-lbl">Active Members</div>
                        </div>
                    </div>
                    <div class="admin-stat-box">
                        <div class="admin-stat-icon si-orange"><i class="fa-solid fa-eye"></i></div>
                        <div class="admin-stat-info">
                            <div class="stat-val">62.4k</div>
                            <div class="stat-lbl">Page Views</div>
                        </div>
                    </div>
                    <div class="admin-stat-box">
                        <div class="admin-stat-icon si-yellow"><i class="fa-solid fa-dumbbell"></i></div>
                        <div class="admin-stat-info">
                            <div class="stat-val">6</div>
                            <div class="stat-lbl">Active Programs</div>
                        </div>
                    </div>
                    <div class="admin-stat-box">
                        <div class="admin-stat-icon si-purple"><i class="fa-solid fa-cart-shopping"></i></div>
                        <div class="admin-stat-info">
                            <div class="stat-val">1.2k</div>
                            <div class="stat-lbl">Store Orders</div>
                        </div>
                    </div>
                </div>

                <!-- Users Table -->
                <div class="table-card">
                    <div class="table-card-header">
                        <h4><i class="fa-solid fa-users text-danger"></i> Registered Members & Roles</h4>
                        <a href="..\Log in\register_form.php" class="btn-brand-red" style="font-size:12px; padding: 8px 18px;">
                            <i class="fa-solid fa-user-plus"></i> Add User
                        </a>
                    </div>
                    <div class="table-wrap">
                        <table class="admin-table" id="adminTable">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while ($row = mysqli_fetch_assoc($result)): ?>
                                <tr>
                                    <td>#<?php echo htmlspecialchars($row['id']); ?></td>
                                    <td><?php echo htmlspecialchars($row['name']); ?></td>
                                    <td><?php echo htmlspecialchars($row['email']); ?></td>
                                    <td>
                                        <span class="user-badge <?php echo $row['user_type'] === 'admin' ? 'badge-admin' : 'badge-user'; ?>" style="<?php echo $row['user_type']==='admin' ? 'background:rgba(229,9,20,0.18); color:#ff4d5a; border:1px solid rgba(229,9,20,0.3);' : ''; ?>">
                                            <i class="fa-solid <?php echo $row['user_type'] === 'admin' ? 'fa-shield-halved' : 'fa-user'; ?>"></i>
                                            <?php echo ucfirst(htmlspecialchars($row['user_type'])); ?>
                                        </span>
                                    </td>
                                    <td>
                                        <div class="action-btns">
                                            <a href="..\admin\edit.php?id=<?php echo $row['id']; ?>" class="btn-edit" title="Edit">
                                                <i class="fa-solid fa-pen-to-square"></i>
                                            </a>
                                            <a href="..\admin\delete.php?id=<?php echo $row['id']; ?>" class="btn-del" title="Delete"
                                               onclick="return confirm('Are you sure you want to delete this member?')">
                                                <i class="fa-solid fa-trash"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                <?php endwhile; ?>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>

    </div>



    <script src="script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
    // Live table search
    document.getElementById('tableSearch').addEventListener('input', function () {
        const q = this.value.toLowerCase();
        document.querySelectorAll('#adminTable tbody tr').forEach(function (row) {
            const text = row.textContent.toLowerCase();
            row.style.display = text.includes(q) ? '' : 'none';
        });
    });
    </script>
</body>
</html>
