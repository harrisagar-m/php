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
│   └── footer.php             # Reusable footer component
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
└── user.php                   # User login/profile page
```

## Features

- **Modular Structure**: Reusable header and footer components
- **Multi-language Support**: English, Swiss German, and French
- **Responsive Design**: Mobile-friendly layout
- **Clean Architecture**: Organized folder structure for easy maintenance

## Language Support

The website supports three languages:
- English (en)
- Swiss German (de)
- French (fr)

Language can be switched using the language selector in the header.

## Setup

1. Place the Platform folder in your web server's document root
2. Ensure PHP is installed and running
3. Access the website through your web browser

## Pages

- **Home** (`index.php`): Main landing page
- **Products** (`products.php`): Products and services
- **Development** (`development.php`): Development information
- **Pricing** (`pricing.php`): Pricing plans
- **Contact** (`contact.php`): Contact information
- **User** (`user.php`): User login/profile placeholder

