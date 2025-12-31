# Platform - Static PHP Website

A modular static PHP website with multi-language support.

## Structure

```
Platform/
├── assets/
│   ├── css/
│   │   └── style.css          # Main stylesheet
│   ├── js/
│   │   └── main.js            # Main JavaScript file
│   └── images/                # Image assets
├── includes/
│   ├── header.php             # Reusable header component
│   ├── footer.php             # Reusable footer component
│   ├── config.php              # Database configuration
│   └── auth.php                # Authentication functions
├── lang/
│   ├── en.php                 # English language file
│   ├── de.php                 # Swiss German language file
│   └── fr.php                 # French language file
├── users/                     # Placeholder for user-related templates and data
├── index.php                  # Home page
├── products.php               # Products page
├── development.php            # Development page
├── pricing.php                # Pricing page
├── contact.php                # Contact page
├── login.php                  # Login page
├── register.php               # Registration page
├── logout.php                 # Logout handler
├── user.php                   # User profile page
├── setup_database.php         # Database setup script
└── test_db.php                # Database connection test
```

## Features

- **Modular Structure**: Reusable header and footer components
- **Multi-language Support**: English, Swiss German, and French
- **User Authentication**: Login, registration, and profile management
- **Database Integration**: MySQL database for user storage
- **Responsive Design**: Mobile-friendly layout
- **Clean Architecture**: Organized folder structure for easy maintenance
- **Secure**: Password hashing and prepared statements for SQL injection prevention

## Language Support

The website supports three languages:
- English (en)
- Swiss German (de)
- French (fr)

Language can be switched using the language selector in the header.

## Setup

### Prerequisites
- PHP 7.4 or higher
- XAMPP (or similar) with MySQL running
- Web server (Apache via XAMPP or PHP built-in server)

### Installation Steps

1. **Start XAMPP Services**
   - Open XAMPP Control Panel
   - Start Apache and MySQL services

2. **Setup Database**
   - Run the database setup script:
     ```
     php setup_database.php
     ```
   - Or visit: `http://localhost:8000/setup_database.php`
   - This creates the `new_site` database and `users` table

3. **Test Database Connection**
   - Run: `php test_db.php`
   - Should show successful connection message

4. **Start Development Server**
   ```bash
   php -S localhost:8000
   ```

5. **Access the Website**
   - Open browser: `http://localhost:8000`

## Pages

- **Home** (`index.php`): Main landing page
- **Products** (`products.php`): Products and services
- **Development** (`development.php`): Development information
- **Pricing** (`pricing.php`): Pricing plans
- **Contact** (`contact.php`): Contact information
- **Login** (`login.php`): User login page
- **Register** (`register.php`): User registration page
- **User Profile** (`user.php`): User profile (requires login)
- **Logout** (`logout.php`): Logout functionality

## Database

The website uses MySQL database for user authentication:
- **Database**: `new_site`
- **Table**: `users`
- **Configuration**: `includes/config.php`

Default XAMPP credentials:
- Host: localhost
- Username: root
- Password: (empty)

See `DATABASE_SETUP.md` for detailed setup instructions.

