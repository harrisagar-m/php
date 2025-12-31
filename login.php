<?php
session_start();

// Handle language selection
if (isset($_GET['lang']) && in_array($_GET['lang'], ['en', 'de', 'fr'])) {
    $_SESSION['lang'] = $_GET['lang'];
}

require_once 'includes/auth.php';

$error = '';
$success = '';

// Handle login form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {
    $username = trim($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';
    
    if (empty($username) || empty($password)) {
        $error = 'Please fill in all fields.';
    } else {
        $user = authenticateUser($username, $password);
        if ($user) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['email'] = $user['email'];
            header('Location: user.php');
            exit;
        } else {
            $error = 'Invalid username or password.';
        }
    }
}

$page_title = 'Login';
require_once 'includes/header.php';
?>

<div class="auth-container">
    <div class="auth-box">
        <h1><?php echo $lang_array['login_title']; ?></h1>
        
        <?php if ($error): ?>
            <div class="alert alert-error"><?php echo htmlspecialchars($error); ?></div>
        <?php endif; ?>
        
        <?php if ($success): ?>
            <div class="alert alert-success"><?php echo htmlspecialchars($success); ?></div>
        <?php endif; ?>
        
        <form method="POST" action="" class="auth-form">
            <input type="hidden" name="login" value="1">
            
            <div class="form-group">
                <label for="username"><?php echo $lang_array['login_username']; ?></label>
                <input type="text" id="username" name="username" required 
                       value="<?php echo htmlspecialchars($_POST['username'] ?? ''); ?>">
            </div>
            
            <div class="form-group">
                <label for="password"><?php echo $lang_array['login_password']; ?></label>
                <input type="password" id="password" name="password" required>
            </div>
            
            <button type="submit" class="btn btn-primary"><?php echo $lang_array['login_submit']; ?></button>
        </form>
        
        <p class="auth-link">
            <?php echo $lang_array['login_no_account']; ?> 
            <a href="register.php"><?php echo $lang_array['login_register_link']; ?></a>
        </p>
    </div>
</div>

<?php require_once 'includes/footer.php'; ?>

