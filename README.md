# Laravel Appointment Management System

This is a simple Laravel-based appointment management system. It includes a basic user system with roles and an appointment booking system.

## Features

- User authentication (registration, login, password reset)
- Role management (`customer`, `admin`, `doctor`)
- Appointment booking system
- Basic appointment details (name, email, address, services, and an optional message)

## Requirements

- PHP 8.x or higher
- Composer
- MySQL or any other compatible database
- Laravel 9.x or higher

## Installation

### 1. Clone the Repository

```bash
git clone https://github.com/your-username/your-repo.git
cd your-repo
```

# Install Dependencies
Run the following command to install the necessary packages via Composer:
```bash 
composer install
```

# Configure Environment Variables
Copy the .env.example file to .env and configure your database connection and other settings:
```bash 
cp .env.example .env
```
# Update the following in your .env file:

```bash 
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_username
DB_PASSWORD=your_password


```
# Generate Application Key

Run the following command to generate the application key:

```bash 
php artisan key:generate
```
# Run Migrations
To create the necessary database tables, run the migrations:

```bash 
php artisan migrate
```

# Running the Application

Start the local development server:

```bash  
php artisan serve
```
Visit http://localhost:8000 in your web browser to access the application.

# Author
Mentor Abdullah
websaazwebsolution@gmail.com
