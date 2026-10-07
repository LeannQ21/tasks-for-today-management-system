<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Tasks for Today</title>
    <style>
        * { box-sizing: border-box; }

        body {
            margin: 0;
            min-height: 100vh;
            display: grid;
            place-items: center;
            font-family: "Segoe UI", Arial, sans-serif;
            background: #f4f7fb;
            color: #1d2939;
        }

        .login-card {
            width: min(420px, calc(100% - 32px));
            padding: 40px;
            background: white;
            border: 1px solid #e4e7ec;
            border-radius: 14px;
            box-shadow: 0 12px 30px rgba(16, 24, 40, 0.08);
        }

        h1 {
            margin: 0 0 8px;
            color: #1f3a5f;
            font-size: 28px;
        }

        .subtitle {
            margin: 0 0 28px;
            color: #667085;
        }

        label {
            display: block;
            margin: 18px 0 7px;
            font-weight: 600;
            font-size: 14px;
        }

        input {
            width: 100%;
            padding: 12px;
            border: 1px solid #d0d5dd;
            border-radius: 8px;
            font: inherit;
        }

        input:focus {
            outline: 2px solid #cfe0ff;
            border-color: #2e6fd8;
        }

        button {
            width: 100%;
            margin-top: 24px;
            padding: 12px;
            border: 0;
            border-radius: 8px;
            background: #1f3a5f;
            color: white;
            font: inherit;
            font-weight: 700;
            cursor: pointer;
        }

        button:hover { background: #162d4b; }

        .message {
            margin-bottom: 18px;
            padding: 12px;
            border-radius: 8px;
            font-size: 14px;
        }

        .error {
            color: #b42318;
            background: #fef3f2;
        }

        .back {
            display: block;
            margin-top: 20px;
            text-align: center;
            color: #1f3a5f;
            text-decoration: none;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <main class="login-card">
        <h1>Welcome back</h1>
        <p class="subtitle">Log in to manage your writing tasks.</p>

        <?php if (session()->getFlashdata('error')): ?>
            <div class="message error">
                <?= esc(session()->getFlashdata('error')) ?>
            </div>
        <?php endif; ?>

        <form action="<?= site_url('login') ?>" method="post">
            <label for="username">Username</label>
            <input type="text" id="username" name="username" required autofocus>

            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>

            <button type="submit">Log in</button>
        </form>

        <a class="back" href="<?= site_url('/') ?>">← Back to Tasks for Today</a>
    </main>
</body>
</html>