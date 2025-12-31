<?php
session_start();

// Handle language selection
if (isset($_GET['lang']) && in_array($_GET['lang'], ['en', 'de', 'fr'])) {
    $_SESSION['lang'] = $_GET['lang'];
}

require_once 'includes/auth.php';

// Redirect to login if not authenticated
if (!isLoggedIn()) {
    header('Location: login.php');
    exit;
}

$user = getCurrentUser();
$page_title = 'Profile';
require_once 'includes/header.php';
?>

<div class="user-section">
    <h1><?php echo $lang_array['profile_title']; ?></h1>
    
    <div class="profile-info">
        <div class="profile-item">
            <label><?php echo $lang_array['profile_username']; ?>:</label>
            <span><?php echo htmlspecialchars($user['username']); ?></span>
        </div>
        
        <div class="profile-item">
            <label><?php echo $lang_array['profile_email']; ?>:</label>
            <span><?php echo htmlspecialchars($user['email']); ?></span>
        </div>
        
        <div class="profile-item">
            <label><?php echo $lang_array['profile_member_since']; ?>:</label>
            <span><?php echo date('F j, Y', strtotime($user['created_at'])); ?></span>
        </div>
    </div>
    
    <div class="profile-actions">
        <a href="logout.php" class="btn btn-secondary"><?php echo $lang_array['profile_logout']; ?></a>
    </div>
</div>

<?php require_once 'includes/footer.php'; ?>

