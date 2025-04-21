# Appointments Management System

A Laravel-based appointment management system with comprehensive features for scheduling and managing appointments.

## Features

- **Appointment Management**
  - Create, view, edit, and delete appointments
  - Filter appointments by date, category, and status
  - View upcoming and past appointments
  - Real-time status tracking

- **Categories**
  - Work
  - Personal
  - Meeting

- **Status Types**
  - Scheduled
  - Completed
  - Cancelled

- **Dashboard Features**
  - Today's appointments view
  - Full appointment calendar
  - Status color coding
  - Responsive design

- **Advanced Features**
  - RTL support
  - Pagination
  - Date and time validation
  - Filter system
  - Form validation
  - Success/Error notifications

## Technical Requirements

- PHP >= 8.1
- Laravel 10.x
- MySQL/MariaDB
- Composer
- Node.js & NPM

## Installation

1. Clone the repository:
```bash
git clone https://github.com/stp-internship/KaramAppointments.git
# KaramAppointments Setup Guide

## One-Time Setup Commands

```bash
# Clone the repository
git clone https://github.com/stp-internship/KaramAppointments.git
cd KaramAppointments

# Install dependencies
composer install

# Setup environment
copy .env.example .env
php artisan key:generate

# Setup database
php artisan migrate:fresh --seed

# Create storage link
php artisan storage:link

# Clear all caches
php artisan cache:clear
php artisan config:clear
php artisan view:clear
php artisan route:clear
php artisan config:cache
php artisan route:cache

# Start the server
php artisan serve

# Composer issues
composer dump-autoload

# Database issues
php artisan migrate:reset
php artisan migrate --seed

# Permission issues
php artisan cache:clear
php artisan view:clear
