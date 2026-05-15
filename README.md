# Task Management System

## Description

The Task Management System is a web-based application developed using Laravel.  
The system allows users to create, manage, update, and track tasks efficiently.

The application includes authentication, role-based access control, task assignment, and task status tracking functionalities. The project is developed for the ICE360 Web Frameworks module.

---

## Features

- User Registration and Login
- Authentication using Laravel Breeze
- Create, Edit, Update, and Delete Tasks
- Assign Tasks to Users
- Task Status Management
- Task Categories and Priorities
- Role-Based Access Control
- Responsive User Interface
- Secure Form Handling with CSRF Protection

---

## Technologies Used

- Laravel 12
- PHP 8
- MySQL
- XAMPP
- Blade Template Engine
- Tailwind CSS
- Laravel Breeze
- Node.js
- npm

---

## Installation Guide

### 1. Clone the Repository

```bash
git clone https://github.com/tebogomakgato26/task-manager.git
```

---

### 2. Navigate into the Project Folder

```bash
cd task-manager
```

---

### 3. Install PHP Dependencies

```bash
composer install
```

---

### 4. Install Frontend Dependencies

```bash
npm install
```

---

### 5. Create the Environment File

```bash
cp .env.example .env
```

---

### 6. Generate Application Key

```bash
php artisan key:generate
```

---

## Database Configuration

Update the following database details inside the `.env` file:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=root
DB_PASSWORD=
```

---

## Run Database Migrations

```bash
php artisan migrate
```

---

## Run Database Seeders (Optional)

```bash
php artisan db:seed
```

---

## Start the Application

### Run Laravel Server

```bash
php artisan serve
```

---

### Run Frontend Development Server

```bash
npm run dev
```

---

## How to Use the System

1. Register a new user account
2. Login using your credentials
3. Create new tasks
4. Edit or delete tasks
5. Assign tasks to users
6. Update task status
7. Manage task priorities and categories

---

## Authentication & Authorization

The application uses Laravel Breeze for authentication.

Features include:
- Login and Registration
- Protected Routes using Middleware
- Role-Based Access Control
- Session Management

---

## Database

The system uses MySQL as the database.

Database features include:
- Laravel Migrations
- Eloquent ORM Relationships
- Foreign Key Constraints
- Seeders and Factories

---

## Security Features

- CSRF Protection
- Form Validation
- Password Hashing
- Route Protection using Middleware
- Secure Data Handling using Eloquent ORM

---

## Screenshots

### Login Page
_Add screenshot here_

---

### Dashboard
_Add screenshot here_

---

### Task Management Page
_Add screenshot here_

---

### Create Task Page
_Add screenshot here_

---

### User Roles and Permissions
_Add screenshot here_

---

## Test Login Details

### Admin Account

Email:
```
Add admin email here
```

Password:
```
Add admin password here
```

---

### User Account

Email:
```
Add user email here
```

Password:
```
Add user password here
```

---

## Project Structure

The project follows the MVC (Model-View-Controller) architecture provided by Laravel.

- Models handle database interactions
- Views are created using Blade Templates
- Controllers manage application logic

---

## Authors

- Tebogo Makgato
- Oratilwe Komane

---

## GitHub Repository

Repository Link:

```text
https://github.com/tebogomakgato26/task-manager
```

---

## Notes

This project is developed for the ICE360 Web Frameworks module.

Laravel Breeze was used to implement authentication and improve security.

The application demonstrates the use of:
- Laravel Routing
- Middleware
- Blade Templating
- Eloquent ORM
- Authentication and Authorization
- Database Migrations and Seeders

---
````

