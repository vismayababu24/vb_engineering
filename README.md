# VB Engineering Works Website

A complete PHP-based website for VB Engineering Works with MySQL database integration.

## Features

- **Home Page**: Company overview and services highlight
- **About Page**: Company history, mission, vision, and values
- **Services Page**: Detailed engineering services offered
- **Jobs Page**: Current job openings with application form
- **Contact Page**: Contact form and company information
- **Responsive Design**: Blue and white color scheme, mobile-friendly
- **Database Integration**: MySQL database for storing contacts and job applications

## Setup Instructions

### 1. Database Setup
1. Create a MySQL database named `vb_engineering`
2. Import the `database.sql` file to create tables and sample data
3. Update database credentials in `includes/config.php` if needed

### 2. Web Server Setup
1. Place all files in your web server directory (htdocs for XAMPP)
2. Ensure PHP and MySQL are running
3. Access the website through your web browser

### 3. File Structure
```
vb_engineering/
├── css/
│   └── style.css          # Main stylesheet
├── includes/
│   ├── config.php         # Database configuration
│   ├── header.php         # Header template
│   └── footer.php         # Footer template
├── pages/                 # Additional pages (if needed)
├── index.php             # Home page
├── about.php             # About page
├── services.php          # Services page
├── jobs.php              # Jobs page
├── contact.php           # Contact page
├── database.sql          # Database schema
└── README.md             # This file
```

## Database Tables

### contacts
- Stores contact form submissions
- Fields: id, name, email, phone, message, created_at

### job_applications
- Stores job application submissions
- Fields: id, name, email, phone, position, experience, resume_path, created_at

### job_offers
- Stores current job openings
- Fields: id, title, description, requirements, location, salary_range, created_at, is_active

## Technologies Used

- **Frontend**: HTML5, CSS3, JavaScript
- **Backend**: PHP 7.4+
- **Database**: MySQL 5.7+
- **Design**: Responsive design with blue (#1e3c72, #2a5298) and white color scheme

## Key Features

1. **Responsive Navigation**: Mobile-friendly navigation menu
2. **Contact Form**: Stores inquiries in database
3. **Job Application System**: Dynamic job listings with application form
4. **Professional Design**: Clean, corporate blue and white theme
5. **Database Integration**: All forms connected to MySQL database
6. **SEO Friendly**: Proper page titles and meta structure

## Customization

- Update company information in each PHP file
- Modify colors in `css/style.css`
- Add new job openings directly in the database
- Customize contact information in `contact.php` and `includes/footer.php`

## Requirements

- PHP 7.4 or higher
- MySQL 5.7 or higher
- Web server (Apache/Nginx)
- PDO PHP extension enabled