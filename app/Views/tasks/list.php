<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task List | Tasks for Today</title>
    <style>
        * { box-sizing: border-box; }

        body {
            margin: 0;
            font-family: "Segoe UI", Arial, sans-serif;
            background: #f4f7fb;
            color: #1d2939;
        }

        nav {
            padding: 18px 8%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: #1f3a5f;
            color: white;
        }

        .brand {
            color: white;
            font-size: 19px;
            font-weight: 700;
            text-decoration: none;
        }

        nav a:not(.brand) {
            margin-left: 24px;
            color: #d8e2f0;
            font-size: 14px;
            text-decoration: none;
        }

        main {
            width: min(1100px, calc(100% - 32px));
            margin: 48px auto;
        }

        .heading {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
            margin-bottom: 28px;
        }

        h1 {
            margin: 0 0 8px;
            color: #1f3a5f;
        }

        .heading p {
            margin: 0;
            color: #667085;
        }

        .new-task {
            padding: 11px 16px;
            border-radius: 8px;
            background: #1f3a5f;
            color: white;
            text-decoration: none;
            font-size: 14px;
            font-weight: 700;
            white-space: nowrap;
        }

        .message {
            margin-bottom: 20px;
            padding: 13px 16px;
            border-radius: 8px;
        }

        .success {
            background: #ecfdf3;
            color: #027a48;
        }

        .error {
            background: #fef3f2;
            color: #b42318;
        }

        .table-wrap {
            overflow-x: auto;
            background: white;
            border: 1px solid #e4e7ec;
            border-radius: 14px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 18px 28px;
            text-align: left;
            border-bottom: 1px solid #eaecf0;
        }

        th {
            color: #475467;
            background: #f9fafb;
            font-size: 13px;
            text-transform: uppercase;
        }

        tr:last-child td { border-bottom: 0; }

        .badge {
            display: inline-block;
            padding: 7px 12px;
            border-radius: 999px;
            font-size: 13px;
            font-weight: 600;
        }

        .pending {
            background: #fff4e5;
            color: #c4320a;
        }

        .in-progress {
            background: #e0efff;
            color: #175cd3;
        }

        .completed {
            background: #e8f8f0;
            color: #027a48;
        }

        .actions {
            display: flex;
            gap: 10px;
            align-items: center;
        }

        .edit {
            color: #175cd3;
            font-size: 14px;
            font-weight: 600;
            text-decoration: none;
        }

        .archive {
            padding: 0;
            border: 0;
            background: none;
            color: #b42318;
            font: inherit;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
        }

        .empty {
            padding: 28px;
            color: #667085;
            text-align: center;
        }
    </style>
</head>
<body>
    <nav>
        <a class="brand" href="<?= site_url('/') ?>">Tasks for Today</a>
        <div>
            <a href="<?= site_url('/') ?>">Today</a>
            <a href="<?= site_url('tasks') ?>">Task List</a>
            <a href="<?= site_url('profile') ?>">Profile</a>
            <a href="<?= site_url('about') ?>">About</a>

            <?php if (session()->get('logged_in')): ?>
                <a href="<?= site_url('logout') ?>">Logout</a>
            <?php else: ?>
                <a href="<?= site_url('login') ?>">Login</a>
            <?php endif; ?>
        </div>
    </nav>

    <main>
        <div class="heading">
            <div>
                <h1>All Tasks</h1>
                <p>Complete book-writing task schedule, ordered by date.</p>
            </div>

            <?php if (session()->get('logged_in')): ?>
                <a class="new-task" href="<?= site_url('tasks/new') ?>">+ New Task</a>
            <?php endif; ?>
        </div>

        <?php if (session()->getFlashdata('success')): ?>
            <div class="message success">
                <?= esc(session()->getFlashdata('success')) ?>
            </div>
        <?php endif; ?>

        <?php if (session()->getFlashdata('error')): ?>
            <div class="message error">
                <?= esc(session()->getFlashdata('error')) ?>
            </div>
        <?php endif; ?>

        <div class="table-wrap">
            <?php if (empty($tasks)): ?>
                <p class="empty">No active tasks found.</p>
            <?php else: ?>
                <table>
                    <thead>
                        <tr>
                            <th>Task</th>
                            <th>Date</th>
                            <th>Status</th>
                            <?php if (session()->get('logged_in')): ?>
                                <th>Actions</th>
                            <?php endif; ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($tasks as $task): ?>
                            <?php
                                $statusClass = str_replace('_', '-', $task['status']);
                                $statusLabel = ucwords(str_replace('_', ' ', $task['status']));
                            ?>
                            <tr>
                                <td><?= esc($task['title']) ?></td>
                                <td><?= date('F j, Y', strtotime($task['task_date'])) ?></td>
                                <td>
                                    <span class="badge <?= esc($statusClass) ?>">
                                        <?= esc($statusLabel) ?>
                                    </span>
                                </td>

                                <?php if (session()->get('logged_in')): ?>
                                    <td>
                                        <div class="actions">
                                            <a class="edit"
                                                href="<?= site_url('tasks/' . $task['id'] . '/edit') ?>">
                                                Edit
                                            </a>

                                            <form method="post"
                                                action="<?= site_url('tasks/' . $task['id'] . '/archive') ?>"
                                                onsubmit="return confirm('Archive this task?');">
                                                <button class="archive" type="submit">
                                                    Archive
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                <?php endif; ?>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php endif; ?>
        </div>
    </main>
</body>
</html>