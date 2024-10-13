# Laravel + Vue.js Todo Application

This is a simple Todo application built with Laravel (backend) and Vue.js (frontend). The application includes authentication and task management functionality via an API, using resourceful routing and a Vue.js-powered UI.

## Features
- Authentication (Register/Login/Reset Password)
- Create, Update, and Delete tasks
- API-driven with proper status and success messages
- Vue.js components for task management
- Notifications for task operations

## Setup Instructions

### Prerequisites

- PHP >= 7.4
- Composer
- Node.js and NPM
- MySQL or SQLite

### Installation

1. **Clone the repository:**
2. git clone https://github.com/Danishkc/todo-application.git
3. cd todo-application
4. composer install
5. npm install
6. setup .env file (cp .env.example .env)
7. Set up the database:
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=your_database
    DB_USERNAME=your_username
    DB_PASSWORD=your_password
8. php artisan key:generate
9. php artisan migrate
10. npm run dev
11. php artisan serve

