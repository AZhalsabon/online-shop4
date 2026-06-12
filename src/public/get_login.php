<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Вход</title>
</head>
<body>
<div class="card">
    <div class="icon">🛍️</div>
    <h2>Добро пожаловать</h2>
    <p class="subtitle">Войдите в свой аккаунт</p>

    <form action = "handle_login.php" method="POST">
        <label for="email">Email</label>
        <input type="email" name="useremail" placeholder="you@example.com" required>

        <label for="password">Пароль</label>
        <input type="password" name="password" placeholder="••••••••" required>

        <div class="row-between">
            <label for="remember">
                <input type="checkbox" id="remember">
                Запомнить меня
            </label>
            <a href="#">Забыли пароль?</a>
        </div>

        <button type="submit">Войти</button>
    </form>

    <p class="signup-link">Нет аккаунта? <a href="#">Зарегистрироваться</a></p>
</div>
</body>
</html>
<style>
    * { box-sizing: border-box; font-family: 'Segoe UI', Arial, sans-serif; }
    body {
        margin: 0;
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #f2f4f7;
    }
    .card {
        background: #ffffff;
        border-radius: 16px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.08);
        padding: 40px 36px;
        width: 100%;
        max-width: 380px;
    }
    .icon {
        width: 56px;
        height: 56px;
        border-radius: 50%;
        background: #eef2ff;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 16px;
        font-size: 26px;
    }
    h2 {
        text-align: center;
        margin: 0 0 4px;
        font-size: 22px;
        color: #1a1a1a;
    }
    .subtitle {
        text-align: center;
        font-size: 13px;
        color: #888;
        margin: 0 0 24px;
    }
    label {
        display: block;
        font-size: 13px;
        color: #555;
        margin-bottom: 6px;
        margin-top: 14px;
    }
    input[type="email"],
    input[type="password"] {
        width: 100%;
        padding: 10px 12px;
        border: 1px solid #ddd;
        border-radius: 8px;
        font-size: 14px;
        outline: none;
        transition: border-color 0.2s;
    }
    input:focus {
        border-color: #6366f1;
        box-shadow: 0 0 0 3px rgba(99,102,241,0.15);
    }
    .row-between {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-top: 16px;
        font-size: 13px;
        color: #666;
    }
    .row-between label {
        display: flex;
        align-items: center;
        gap: 8px;
        margin: 0;
    }
    .row-between input { width: auto; }
    .row-between a {
        color: #6366f1;
        text-decoration: none;
        font-weight: 500;
    }
    button {
        width: 100%;
        margin-top: 22px;
        padding: 12px;
        border: none;
        border-radius: 8px;
        background: #6366f1;
        color: #fff;
        font-size: 15px;
        font-weight: 600;
        cursor: pointer;
        transition: background 0.2s;
    }
    button:hover { background: #4f46e5; }
    .signup-link {
        text-align: center;
        font-size: 13px;
        color: #888;
        margin-top: 18px;
    }
    .signup-link a {
        color: #6366f1;
        text-decoration: none;
        font-weight: 500;
    }
</style>