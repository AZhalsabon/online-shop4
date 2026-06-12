<!DOCTYPE html>
<html lang="ru">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Регистрация</title>
</head>
<body>
  <div class="card">
    <div class="icon">🛍️</div>
    <h2>Создать аккаунт</h2>
    <p class="subtitle">Зарегистрируйтесь, чтобы начать покупки</p>

    <form action="handle_registration.php" method="POST">

        <?php require_once './handle_registration.php'; ?>
      <label for="name">Имя</label>
      <?php if (isset($errors['name'])):?>
          <label style="color: red"><?php echo $errors['name']?></label>
      <?php endif; ?>
      <input type="text" name="name" placeholder="Ваше имя" required>

      <label for="email">Email</label>
        <?php if (isset($errors['email'])):?>
            <label style="color: red"><?php echo $errors['email']?></label>
        <?php endif; ?>
        <input type="email" name="email" placeholder="you@example.com" required>

      <label for="password">Пароль</label>
        <?php if (isset($errors['password'])):?>
            <label style="color: red"><?php echo $errors['password']?></label>
        <?php endif; ?>
      <input type="password" name="password" placeholder="••••••••" required>

      <label for="confirm">Подтвердите пароль</label>
        <?php if (isset($errors['confirm'])):?>
            <label style="color: red"><?php echo $errors['confirm']?></label>
        <?php endif; ?>
        <input type="password" name="confirm" placeholder="••••••••" required>

      <div class="checkbox-row">
        <input type="checkbox" id="agree" required>
        <label for="agree" style="margin:0;">Я согласен с условиями использования</label>
      </div>

      <button type="submit">Зарегистрироваться</button>
    </form>

    <p class="login-link">Уже есть аккаунт? <a href="#">Войти</a></p>
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
    input[type="text"],
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
    .checkbox-row {
        display: flex;
        align-items: center;
        gap: 8px;
        margin-top: 16px;
        font-size: 13px;
        color: #666;
    }
    .checkbox-row input { width: auto; }
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
    .login-link {
        text-align: center;
        font-size: 13px;
        color: #888;
        margin-top: 18px;
    }
    .login-link a {
        color: #6366f1;
        text-decoration: none;
        font-weight: 500;
    }
</style>
