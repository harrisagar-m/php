<?php
// Load language file
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$lang = isset($_SESSION['lang']) ? $_SESSION['lang'] : 'en';
require_once __DIR__ . '/../lang/' . $lang . '.php';

// Get current page filename for language links
$current_page = basename($_SERVER['PHP_SELF']);
?>
<!DOCTYPE html>
<html lang="<?php echo $lang; ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($page_title) ? $page_title : $lang_array['site_title']; ?> - Platform</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <header>
        <nav>
            <div class="logo">
                <a href="index.php">Platform</a>
            </div>
            <ul class="nav-menu">
                <li><a href="index.php"><?php echo $lang_array['nav_home']; ?></a></li>
                <li><a href="products.php"><?php echo $lang_array['nav_products']; ?></a></li>
                <li><a href="development.php"><?php echo $lang_array['nav_development']; ?></a></li>
                <li><a href="pricing.php"><?php echo $lang_array['nav_pricing']; ?></a></li>
                <li><a href="contact.php"><?php echo $lang_array['nav_contact']; ?></a></li>
                <?php if (isset($_SESSION['user_id'])): ?>
                    <li><a href="user.php"><?php echo $lang_array['nav_profile']; ?></a></li>
                    <li><a href="logout.php"><?php echo $lang_array['nav_logout']; ?></a></li>
                <?php else: ?>
                    <li><a href="login.php"><?php echo $lang_array['nav_login']; ?></a></li>
                    <li><a href="register.php"><?php echo $lang_array['nav_register']; ?></a></li>
                <?php endif; ?>
            </ul>
            <div class="lang-selector">
                <a href="<?php echo $current_page; ?>?lang=en">EN</a> | 
                <a href="<?php echo $current_page; ?>?lang=de">DE</a> | 
                <a href="<?php echo $current_page; ?>?lang=fr">FR</a>
            </div>
        </nav>
    </header>
    <main>

