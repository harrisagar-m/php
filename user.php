<?php
session_start();

// Handle language selection
if (isset($_GET['lang']) && in_array($_GET['lang'], ['en', 'de', 'fr'])) {
    $_SESSION['lang'] = $_GET['lang'];
}

$page_title = 'User';
require_once 'includes/header.php';
?>

<h1><?php echo $lang_array['user_title']; ?></h1>
<p><?php echo $lang_array['user_placeholder']; ?></p>

<div class="user-section">
    <h2><?php echo $lang_array['user_login']; ?></h2>
    <p>Login form placeholder - to be implemented</p>
    
    <h2><?php echo $lang_array['user_profile']; ?></h2>
    <p>User profile placeholder - to be implemented</p>
</div>

<?php require_once 'includes/footer.php'; ?>

