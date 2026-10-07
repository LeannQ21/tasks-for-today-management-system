<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($pageTitle) ?> | Tasks for Today</title>
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
            width: min(680px, calc(100% - 32px));
            margin: 52px auto;
        }

        .card {
            padding: 32px;
            background: white;
            border: 1px solid #e4e7ec;
            border-radius: 14px;
            box-shadow: 0 10px 24px rgba(16, 24, 40, 0.06);
        }

        h1 {
            margin-top: 0;
            color: #1f3a5f;
        }

        label {
            display: block;
            margin: 20px 0 7px;
            font-size: 14px;
            font-weight: 600;
        }

        input, select {
            width: 100%;
            padding: 12px;
            border: 1px solid #d0d5dd;
            border-radius: 8px;
            font: inherit;
        }

        input:focus, select:focus {
            outline: 2px solid #cfe0ff;
            border-color: #2e6fd8;
        }

        .actions {
            display: flex;
            gap: 12px;
            margin-top: 28px;
        }

        button, .cancel {
            padding: 12px 18px;
            border-radius: 8px;
            font: inherit;
            font-weight: 700;
            text-decoration: none;
            cursor: pointer;
        }

        button {
            border: 0;
            background: #1f3a5f;
            color: white;
        }

        .cancel {
            border: 1px solid #d0d5dd;
            color: #344054;
            background: white;
        }

        .errors {
            margin-bottom: 20px;
            padding: 14px 18px;
            border-radius: 8px;
            background: #fef3f2;
            color: #b42318;
        }

        .errors ul { margin: 0; padding-left: 20px; }
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
            <a href="<?= site_url('logout') ?>">Logout</a>
        </div>
    </nav>

    <main>
        <section class="card">
            <h1><?= esc($pageTitle) ?></h1>

            <?php if (session()->getFlashdata('errors')): ?>
                <div class="errors">
                    <ul>
                        <?php foreach (session()->getFlashdata('errors') as $error): ?>
                            <li><?= esc($error) ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>

            <form method="post"
                action="<?= $task ? site_url('tasks/' . $task['id'] . '/update') : site_url('tasks') ?>">

                <label for="title">Task title</label>
                <input
                    type="text"
                    id="title"
                    name="title"
                    maxlength="150"
                    required
                    value="<?= esc(old('title') ?? ($task['title'] ?? '')) ?>"
                >

                <label for="task_date">Task date</label>
                <input
                    type="date"
                    id="task_date"
                    name="task_date"
                    required
                    value="<?= esc(old('task_date') ?? ($task['task_date'] ?? '')) ?>"
                >

                <?php $selectedStatus = old('status') ?? ($task['status'] ?? 'pending'); ?>

                <label for="status">Status</label>
                <select id="status" name="status" required>
                    <option value="pending" <?= $selectedStatus === 'pending' ? 'selected' : '' ?>>
                        Pending
                    </option>
                    <option value="in_progress" <?= $selectedStatus === 'in_progress' ? 'selected' : '' ?>>
                        In Progress
                    </option>
                    <option value="completed" <?= $selectedStatus === 'completed' ? 'selected' : '' ?>>
                        Completed
                    </option>
                </select>

                <div class="actions">
                    <button type="submit">
                        <?= $task ? 'Save Changes' : 'Create Task' ?>
                    </button>
                    <a class="cancel" href="<?= site_url('tasks') ?>">Cancel</a>
                </div>
            </form>
        </section>
    </main>
</body>
</html>