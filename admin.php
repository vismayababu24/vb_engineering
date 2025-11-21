<?php
session_start();
require_once 'includes/config.php';

// Simple admin authentication
if (!isset($_SESSION['admin_logged_in'])) {
    if ($_POST['password'] ?? '' === 'admin123') {
        $_SESSION['admin_logged_in'] = true;
    } else {
        ?>
        <!DOCTYPE html>
        <html>
        <head>
            <title>Admin Login - VB Engineering</title>
            <link rel="stylesheet" href="css/style.css">
        </head>
        <body>
            <div class="container">
                <div class="form-container">
                    <h2>Admin Login</h2>
                    <form method="POST">
                        <div class="form-group">
                            <label>Password:</label>
                            <input type="password" name="password" required>
                        </div>
                        <button type="submit" class="btn">Login</button>
                    </form>
                </div>
            </div>
        </body>
        </html>
        <?php
        exit;
    }
}

// Handle logout
if ($_GET['logout'] ?? '' === '1') {
    session_destroy();
    header('Location: admin.php');
    exit;
}

// Handle actions
if ($_POST['action'] ?? '' === 'delete_contact') {
    $stmt = $pdo->prepare("DELETE FROM contacts WHERE id = ?");
    $stmt->execute([$_POST['id']]);
}

if ($_POST['action'] ?? '' === 'delete_application') {
    $stmt = $pdo->prepare("DELETE FROM job_applications WHERE id = ?");
    $stmt->execute([$_POST['id']]);
}

// Fetch data
$contacts = $pdo->query("SELECT * FROM contacts ORDER BY created_at DESC")->fetchAll();
$applications = $pdo->query("SELECT * FROM job_applications ORDER BY created_at DESC")->fetchAll();

$page_title = "Admin Dashboard";
include 'includes/header.php';
?>

<div class="container">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 2rem;">
        <h1>Dashboard</h1>
        <div style="display: flex; gap: 1rem;">
            <a href="index.php" class="btn" style="background: #28a745;">← Back to Site</a>
            <a href="?logout=1" class="btn">Logout</a>
        </div>
    </div>

    <div class="admin-section">
        <h2>Contact Messages (<?php echo count($contacts); ?>)</h2>
        <div class="admin-table">
            <?php foreach ($contacts as $contact): ?>
            <div class="admin-card">
                <div class="admin-card-header">
                    <strong><?php echo htmlspecialchars($contact['name']); ?></strong>
                    <span><?php echo $contact['created_at']; ?></span>
                </div>
                <p><strong>Email:</strong> <?php echo htmlspecialchars($contact['email']); ?></p>
                <p><strong>Phone:</strong> <?php echo htmlspecialchars($contact['phone']); ?></p>
                <p><strong>Message:</strong> <?php echo htmlspecialchars($contact['message']); ?></p>
                <form method="POST" style="margin-top: 1rem;">
                    <input type="hidden" name="action" value="delete_contact">
                    <input type="hidden" name="id" value="<?php echo $contact['id']; ?>">
                    <button type="submit" class="btn-delete" onclick="return confirm('Delete this message?')">Delete</button>
                </form>
            </div>
            <?php endforeach; ?>
        </div>
    </div>

    <div class="admin-section">
        <h2>Job Applications (<?php echo count($applications); ?>)</h2>
        <div class="admin-table">
            <?php foreach ($applications as $app): ?>
            <div class="admin-card">
                <div class="admin-card-header">
                    <strong><?php echo htmlspecialchars($app['name']); ?></strong>
                    <span><?php echo $app['created_at']; ?></span>
                </div>
                <p><strong>Email:</strong> <?php echo htmlspecialchars($app['email']); ?></p>
                <p><strong>Phone:</strong> <?php echo htmlspecialchars($app['phone']); ?></p>
                <p><strong>Position:</strong> <?php echo htmlspecialchars($app['position']); ?></p>
                <p><strong>Experience:</strong> <?php echo $app['experience']; ?> years</p>
                <?php if ($app['resume_path']): ?>
                <p><strong>Resume:</strong> <a href="<?php echo $app['resume_path']; ?>" target="_blank">View Resume</a></p>
                <?php endif; ?>
                <form method="POST" style="margin-top: 1rem;">
                    <input type="hidden" name="action" value="delete_application">
                    <input type="hidden" name="id" value="<?php echo $app['id']; ?>">
                    <button type="submit" class="btn-delete" onclick="return confirm('Delete this application?')">Delete</button>
                </form>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>