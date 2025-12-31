<?php
/**
 * Database Connection Test
 * Run this to verify your database connection is working
 */

require_once 'includes/config.php';

echo "Testing database connection...\n\n";

try {
    $conn = getDBConnection();
    echo "✓ SUCCESS: Connected to database 'new_site'\n";
    
    // Test query
    $result = $conn->query("SHOW TABLES LIKE 'users'");
    if ($result && $result->num_rows > 0) {
        echo "✓ SUCCESS: 'users' table exists\n";
        
        // Count users
        $count_result = $conn->query("SELECT COUNT(*) as count FROM users");
        $count = $count_result->fetch_assoc()['count'];
        echo "✓ Users in database: $count\n";
    } else {
        echo "⚠ WARNING: 'users' table not found. Run setup_database.php first.\n";
    }
    
    $conn->close();
    echo "\n✓ Database connection test completed successfully!\n";
    
} catch (Exception $e) {
    echo "✗ ERROR: " . $e->getMessage() . "\n";
    echo "\nMake sure:\n";
    echo "1. XAMPP MySQL service is running\n";
    echo "2. You have run setup_database.php\n";
    echo "3. Database credentials in includes/config.php are correct\n";
}

