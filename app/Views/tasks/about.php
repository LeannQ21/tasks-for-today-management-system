<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About</title>
    <style>
        * { box-sizing: border-box; }

        body {
            margin: 0;
            font-family: "Segoe UI", Arial, sans-serif;
            background: #f4f7fb;
            color: #1d2939;
        }

        nav {
            background: #1f3a5f;
            padding: 18px 8%;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .brand, nav a {
            color: white;
            text-decoration: none;
        }

        .brand { font-size: 19px; font-weight: 700; }

        .nav-links a {
            color: #d8e2f0;
            margin-left: 24px;
            font-size: 14px;
        }

        main {
            max-width: 850px;
            margin: 48px auto;
            padding: 0 24px;
        }

        h1 {
            color: #1f3a5f;
            margin-bottom: 8px;
        }

        .about-card {
            margin-top: 28px;
            background: white;
            border: 1px solid #e4e7ec;
            border-radius: 12px;
            padding: 32px;
            line-height: 1.7;
            color: #475467;
        }

        h2 {
            color: #1f3a5f;
            font-size: 18px;
            margin-top: 28px;
        }

        ul {
            padding-left: 20px;
        }

        li {
            margin: 8px 0;
        }

        .developer {
            margin-top: 28px;
            padding-top: 20px;
            border-top: 1px solid #e4e7ec;
            color: #1f3a5f;
            font-weight: 700;
        }
    </style>
</head>
<body>
    <nav>
        <a class="brand" href="<?= base_url('/') ?>">Tasks for Today</a>

        <div class="nav-links">
            <a href="<?= base_url('/') ?>">Today</a>
            <a href="<?= base_url('tasks') ?>">Task List</a>
            <a href="<?= base_url('profile') ?>">Profile</a>
            <a href="<?= base_url('about') ?>">About</a>
        </div>
    </nav>

    <main>
        <h1>About the System</h1>
        <p>Tasks for Today Management System</p>

        <div class="about-card">
            <p>
                Tasks for Today is a simple task-management web application
                designed to help users organize and monitor daily tasks.
            </p>

            <h2>System features</h2>
            <ul>
                <li>Shows tasks scheduled for the current day.</li>
                <li>Displays a complete task list ordered by date.</li>
                <li>Shows a demo user profile from the database.</li>
                <li>Uses CodeIgniter 4 MVC and a MySQL database.</li>
            </ul>

            <p class="developer">
                Developed by Leann Marie Querubin
            </p>
        </div>
    </main>
</body>
</html>