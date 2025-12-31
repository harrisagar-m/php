<?php
session_start();

// Handle language selection
if (isset($_GET['lang']) && in_array($_GET['lang'], ['en', 'de', 'fr'])) {
    $_SESSION['lang'] = $_GET['lang'];
}

$page_title = 'Contact';
require_once 'includes/header.php';
?>

<h1><?php echo $lang_array['contact_title']; ?></h1>
<p><?php echo $lang_array['contact_content']; ?></p>

<?php require_once 'includes/footer.php'; ?>

