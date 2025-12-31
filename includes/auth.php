<?php
// Authentication functions using MySQL database

require_once __DIR__ . '/config.php';

/**
 * Get database connection
 */
function getDB() {
    return getDBConnection();
}

/**
 * Register a new user
 */
function registerUser($username, $email, $password) {
    $conn = getDB();
    
    // Check if username or email already exists
    $stmt = $conn->prepare("SELECT id FROM users WHERE username = ? OR email = ?");
    $stmt->bind_param("ss", $username, $email);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $stmt->close();
        return false; // User already exists
    }
    $stmt->close();
    
    // Insert new user
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $username, $email, $hashed_password);
    
    if ($stmt->execute()) {
        $stmt->close();
        return true;
    } else {
        $stmt->close();
        return false;
    }
}

/**
 * Authenticate user
 */
function authenticateUser($username, $password) {
    $conn = getDB();
    
    // Try to find user by username or email
    $stmt = $conn->prepare("SELECT id, username, email, password FROM users WHERE username = ? OR email = ?");
    $stmt->bind_param("ss", $username, $username);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();
        $stmt->close();
        
        // Verify password
        if (password_verify($password, $user['password'])) {
            // Remove password from returned user array
            unset($user['password']);
            return $user;
        }
    }
    
    $stmt->close();
    return false;
}

/**
 * Check if user is logged in
 */
function isLoggedIn() {
    return isset($_SESSION['user_id']);
}

/**
 * Get current user
 */
function getCurrentUser() {
    if (!isLoggedIn()) {
        return null;
    }
    
    $conn = getDB();
    $user_id = $_SESSION['user_id'];
    
    $stmt = $conn->prepare("SELECT id, username, email, created_at FROM users WHERE id = ?");
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();
        $stmt->close();
        return $user;
    }
    
    $stmt->close();
    return null;
}

/**
 * Logout user
 */
function logout() {
    session_destroy();
    session_start();
}

/**
 * Get user by ID (helper function)
 */
function getUserById($user_id) {
    $conn = getDB();
    
    $stmt = $conn->prepare("SELECT id, username, email, created_at FROM users WHERE id = ?");
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();
        $stmt->close();
        return $user;
    }
    
    $stmt->close();
    return null;
}
