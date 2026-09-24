<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task List</title>
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
            max-width: 1000px;
            margin: 48px auto;
            padding: 0 24px;
        }

        h1 {
            margin-bottom: 8px;
            color: #1f3a5f;
        }

        p { color: #667085; }

        .table-card {
            margin-top: 28px;
            overflow-x: auto;
            background: white;
            border: 1px solid #e4e7ec;
            border-radius: 10px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 16px 20px;
            border-bottom: 1px solid #e4e7ec;
            text-align: left;
        }

        th {
            background: #f8fafc;
            color: #475467;
            font-size: 12px;
            text-transform: uppercase;
        }

        td { color: #344054; }

        tr:last-child td { border-bottom: none; }

        .status {
            padding: 6px 11px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
        }

        .pending { background: #fff4e5; color: #b54708; }
        .in_progress { background: #e0efff; color: #175cd3; }
        .completed { background: #e7f8ef; color: #027a48; }
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
        <h1>All Tasks</h1>
        <p>Complete book-writing task schedule, ordered by date.</p>

        <div class="table-card">
            <table>
                <thead>
                    <tr>
                        <th>Task</th>
                        <th>Date</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($tasks as $task): ?>
                        <tr>
                            <td><?= esc($task['title']) ?></td>
                            <td><?= date('F j, Y', strtotime($task['task_date'])) ?></td>
                            <td>
                                <span class="status <?= esc($task['status']) ?>">
                                    <?= esc(ucwords(str_replace('_', ' ', $task['status']))) ?>
                                </span>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </main>
</body>
</html>