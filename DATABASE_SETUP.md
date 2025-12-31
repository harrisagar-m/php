# Database Setup Instructions

## Prerequisites
- XAMPP installed and running
- MySQL service started in XAMPP Control Panel

## Setup Steps

### 1. Start XAMPP Services
- Open XAMPP Control Panel
- Start **Apache** service
- Start **MySQL** service

### 2. Run Database Setup Script
Open your browser and navigate to:
```
http://localhost:8000/setup_database.php
```

Or run from command line:
```bash
php setup_database.php
```

This will:
- Create the `new_site` database
- Create the `users` table with proper structure

### 3. Verify Database
You can verify the database was created by:
- Opening phpMyAdmin: http://localhost/phpmyadmin
- You should see `new_site` database with `users` table

## Database Configuration

The database configuration is in `includes/config.php`:
- **Host**: localhost
- **Username**: root
- **Password**: (empty)
- **Database**: new_site

## Database Structure

### users Table
- `id` - Primary key, auto-increment
- `username` - Unique username (VARCHAR 50)
- `email` - Unique email (VARCHAR 100)
- `password` - Hashed password (VARCHAR 255)
- `created_at` - Timestamp of account creation

## Security Notes

For production:
1. Change the database password from empty to a strong password
2. Update `includes/config.php` with production credentials
3. Consider using environment variables for sensitive data
4. Use prepared statements (already implemented)

