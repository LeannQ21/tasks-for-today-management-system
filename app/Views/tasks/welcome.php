<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tasks for Today</title>
    <style>
        * {
            box-sizing: border-box;
        }

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
            align-items: center;
            justify-content: space-between;
        }

        .brand {
            color: #ffffff;
            font-size: 19px;
            font-weight: 700;
            text-decoration: none;
        }

        .nav-links a {
            color: #d8e2f0;
            text-decoration: none;
            margin-left: 24px;
            font-size: 14px;
        }

        .nav-links a:hover {
            color: #ffffff;
        }

        main {
            max-width: 1000px;
            margin: 48px auto;
            padding: 0 24px;
        }

        .heading {
            display: flex;
            justify-content: space-between;
            align-items: end;
            margin-bottom: 24px;
        }

        h1 {
            margin: 0 0 8px;
            font-size: 32px;
            color: #1f3a5f;
        }

        .subtitle {
            margin: 0;
            color: #667085;
        }

        .date {
            color: #667085;
            font-size: 14px;
        }

        .summary {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 16px;
            margin-bottom: 28px;
        }

        .summary-card {
            background: #ffffff;
            border: 1px solid #e4e7ec;
            border-radius: 10px;
            padding: 18px;
        }

        .summary-card span {
            color: #667085;
            font-size: 13px;
        }

        .summary-card strong {
            display: block;
            color: #1f3a5f;
            font-size: 26px;
            margin-top: 6px;
        }

        .section-title {
            font-size: 17px;
            color: #1f3a5f;
            margin-bottom: 14px;
        }

        .task-list {
            background: #ffffff;
            border: 1px solid #e4e7ec;
            border-radius: 10px;
            overflow: hidden;
        }

        .task {
            padding: 18px 20px;
            border-bottom: 1px solid #e4e7ec;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .task:last-child {
            border-bottom: none;
        }

        .task-title {
            font-weight: 600;
            color: #344054;
        }

        .task-status {
            border-radius: 20px;
            padding: 6px 11px;
            font-size: 12px;
            font-weight: 600;
        }

        .pending {
            background: #fff4e5;
            color: #b54708;
        }

        .in_progress {
            background: #e0efff;
            color: #175cd3;
        }

        .completed {
            background: #e7f8ef;
            color: #027a48;
        }

        .empty {
            background: #ffffff;
            border: 1px solid #e4e7ec;
            border-radius: 10px;
            color: #667085;
            padding: 28px;
            text-align: center;
        }

        @media (max-width: 650px) {
            nav, .heading {
                display: block;
            }

            .nav-links {
                margin-top: 12px;
            }

            .nav-links a {
                margin: 0 14px 0 0;
            }

            .date {
                display: block;
                margin-top: 12px;
            }

            .summary {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <?php
        $totalTasks = count($tasks);
        $completedTasks = count(array_filter($tasks, fn($task) => $task['status'] === 'completed'));
        $activeTasks = $totalTasks - $completedTasks;
    ?>

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
        <div class="heading">
            <div>
                <h1>Today’s Tasks</h1>
                <p class="subtitle">Stay focused on your writing project.</p>
            </div>
            <span class="date"><?= date('F j, Y') ?></span>
        </div>

        <div class="summary">
            <div class="summary-card">
                <span>Tasks today</span>
                <strong><?= $totalTasks ?></strong>
            </div>

            <div class="summary-card">
                <span>In progress or pending</span>
                <strong><?= $activeTasks ?></strong>
            </div>

            <div class="summary-card">
                <span>Completed</span>
                <strong><?= $completedTasks ?></strong>
            </div>
        </div>

        <h2 class="section-title">Scheduled for today</h2>

        <?php if (empty($tasks)): ?>
            <div class="empty">No tasks are scheduled for today.</div>
        <?php else: ?>
            <div class="task-list">
                <?php foreach ($tasks as $task): ?>
                    <div class="task">
                        <span class="task-title"><?= esc($task['title']) ?></span>
                        <span class="task-status <?= esc($task['status']) ?>">
                            <?= esc(ucwords(str_replace('_', ' ', $task['status']))) ?>
                        </span>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </main>
</body>
</html>