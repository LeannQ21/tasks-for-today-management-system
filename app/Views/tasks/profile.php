<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
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
            max-width: 760px;
            margin: 48px auto;
            padding: 0 24px;
        }

        h1 {
            color: #1f3a5f;
            margin-bottom: 8px;
        }

        .profile-card {
            background: white;
            border: 1px solid #e4e7ec;
            border-radius: 12px;
            padding: 32px;
            margin-top: 28px;
        }

        .avatar {
            width: 64px;
            height: 64px;
            border-radius: 50%;
            background: #dbeafe;
            color: #1d4ed8;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            font-weight: 700;
            margin-bottom: 18px;
        }

        .name {
            font-size: 24px;
            color: #1f3a5f;
            margin: 0 0 6px;
        }

        .username {
            color: #667085;
            margin-bottom: 28px;
        }

        .details {
            border-top: 1px solid #e4e7ec;
            padding-top: 20px;
        }

        .label {
            display: block;
            color: #667085;
            font-size: 13px;
            margin-bottom: 4px;
        }

        .value {
            color: #344054;
            margin-bottom: 18px;
            font-weight: 600;
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
        <h1>Profile</h1>
        <p>Your demo user account for this system.</p>

        <?php if ($user): ?>
            <div class="profile-card">
                <div class="avatar">
                    <?= esc(strtoupper(substr($user['full_name'], 0, 1))) ?>
                </div>

                <h2 class="name"><?= esc($user['full_name']) ?></h2>
                <div class="username">@<?= esc($user['username']) ?></div>

                <div class="details">
                    <span class="label">Email address</span>
                    <div class="value"><?= esc($user['email']) ?></div>

                    <span class="label">Account created</span>
                    <div class="value">
                        <?= date('F j, Y', strtotime($user['created_at'])) ?>
                    </div>
                </div>
            </div>
        <?php else: ?>
            <p>No user profile found.</p>
        <?php endif; ?>
    </main>
</body>
</html>