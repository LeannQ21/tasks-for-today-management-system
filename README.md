# Tasks for Today Management System

A CodeIgniter 4 web application for organizing book-writing tasks. It provides public task viewing and authenticated task management.

## Features

- View today’s scheduled tasks
- View all active tasks in date order
- User login and logout
- Create new tasks
- Edit task title, date, and status
- Soft archive tasks instead of permanently deleting them
- Validation for required task title and date fields
- Protected task-management pages for logged-in users only

## Technologies Used

- PHP 8.2
- CodeIgniter 4
- MySQL
- XAMPP
- HTML and CSS

## Demo Login

- Username: `leannquerubin`
- Password: `BookTask2026`

## Local Setup

1. Clone or download this repository.
2. Place the project inside `C:\xampp\htdocs`.
3. Import `tasks_for_today.sql` through phpMyAdmin.
4. Configure the database values in `.env`.
5. Run the application:

   ```bat
   php spark serve --port 8081