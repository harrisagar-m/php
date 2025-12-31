<?php
session_start();

// Handle language selection
if (isset($_GET['lang']) && in_array($_GET['lang'], ['en', 'de', 'fr'])) {
    $_SESSION['lang'] = $_GET['lang'];
}

require_once 'includes/auth.php';

$error = '';
$success = '';

// Handle registration form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['register'])) {
    $username = trim($_POST['username'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';
    $confirm_password = $_POST['confirm_password'] ?? '';
    
    // Validation
    if (empty($username) || empty($email) || empty($password) || empty($confirm_password)) {
        $error = 'Please fill in all fields.';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = 'Please enter a valid email address.';
    } elseif (strlen($password) < 6) {
        $error = 'Password must be at least 6 characters long.';
    } elseif ($password !== $confirm_password) {
        $error = 'Passwords do not match.';
    } else {
        if (registerUser($username, $email, $password)) {
            $success = 'Registration successful! You can now login.';
            // Auto-login after registration
            $user = authenticateUser($username, $password);
            if ($user) {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['username'] = $user['username'];
                $_SESSION['email'] = $user['email'];
                header('Location: user.php');
                exit;
            }
        } else {
            $error = 'Username or email already exists.';
        }
    }
}

$page_title = 'Register';
require_once 'includes/header.php';
?>

<div class="auth-container">
    <div class="auth-box">
        <h1><?php echo $lang_array['register_title']; ?></h1>
        
        <?php if ($error): ?>
            <div class="alert alert-error"><?php echo htmlspecialchars($error); ?></div>
        <?php endif; ?>
        
        <?php if ($success): ?>
            <div class="alert alert-success"><?php echo htmlspecialchars($success); ?></div>
        <?php endif; ?>
        
        <form method="POST" action="" class="auth-form">
            <input type="hidden" name="register" value="1">
            
            <div class="form-group">
                <label for="username"><?php echo $lang_array['register_username']; ?></label>
                <input type="text" id="username" name="username" required 
                       value="<?php echo htmlspecialchars($_POST['username'] ?? ''); ?>">
            </div>
            
            <div class="form-group">
                <label for="email"><?php echo $lang_array['register_email']; ?></label>
                <input type="email" id="email" name="email" required 
                       value="<?php echo htmlspecialchars($_POST['email'] ?? ''); ?>">
            </div>
            
            <div class="form-group">
                <label for="password"><?php echo $lang_array['register_password']; ?></label>
                <input type="password" id="password" name="password" required 
                       minlength="6">
                <small><?php echo $lang_array['register_password_hint']; ?></small>
            </div>
            
            <div class="form-group">
                <label for="confirm_password"><?php echo $lang_array['register_confirm_password']; ?></label>
                <input type="password" id="confirm_password" name="confirm_password" required>
            </div>
            
            <button type="submit" class="btn btn-primary"><?php echo $lang_array['register_submit']; ?></button>
        </form>
        
        <p class="auth-link">
            <?php echo $lang_array['register_have_account']; ?> 
            <a href="login.php"><?php echo $lang_array['register_login_link']; ?></a>
        </p>
    </div>
</div>

<?php require_once 'includes/footer.php'; ?>

