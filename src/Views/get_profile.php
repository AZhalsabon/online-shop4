<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Профиль</title>

</head>
<body>

<header>
    <div class="logo">🛍️ ShopLy</div>

    <a href="/cart">коризина</a>
    <a href="/orders">Мои заказы</a>
    <a href="/catalog">Каталог</a>
</header>

<div class="container">

    <!-- Sidebar -->
    <div class="sidebar">
        <div class="avatar">🙂</div>
        <h3 class="user-name"><?php echo $dataUser['name']?></h3>
        <p class="user-email"><?php echo $dataUser['email']?></p>

        <nav class="nav">
            <a href="#" class="active"><span class="icon">👤</span> Профиль</a>
            <a href="#"><span class="icon">📦</span> Мои заказы</a>
<!--            <a href="#"><span class="icon">❤️</span> Избранное</a>-->
<!--            <a href="#"><span class="icon">📍</span> Адреса доставки</a>-->
<!--            <a href="#"><span class="icon">⚙️</span> Настройки</a>-->
            <div class="nav-divider"></div>
            <a href="#" class="logout"><span class="icon">🚪</span> Выйти</a>
        </nav>
    </div>

    <!-- Main -->
    <div class="main">

<!--        <div class="section">-->
<!--            <h2>Статистика</h2>-->
<!--            <div class="stats">-->
<!--                <div class="stat">-->
<!--                    <div class="value">12</div>-->
<!--                    <div class="label">Заказов</div>-->
<!--                </div>-->
<!--                <div class="stat">-->
<!--                    <div class="value">5</div>-->
<!--                    <div class="label">В избранном</div>-->
<!--                </div>-->
<!--                <div class="stat">-->
<!--                    <div class="value">38 200 ₽</div>-->
<!--                    <div class="label">Всего потрачено</div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->

        <div class="section">
            <h2>Личные данные</h2>
<!--            <div class="form-grid">-->
<!--                <div>-->
<!--                    <label for="fname">Имя</label>-->
<!--                    <input type="text" id="fname" value="Анна">-->
<!--                </div>-->
<!--                <div>-->
<!--                    <label for="email">Email</label>-->
<!--                    <input type="email" id="email" value="anna.smirnova@example.com">-->
<!--                </div>-->
<!--                <div>-->
<!--                    <label for="phone">Телефон</label>-->
<!--                    <input type="tel" id="phone" value="+7 999 123-45-67">-->
<!--                </div>-->
<!--                <div class="full">-->
<!--                    <label for="address">Адрес доставки</label>-->
<!--                    <input type="text" id="address" value="г. Москва, ул. Пушкина, д. 10, кв. 5">-->
<!--                </div>-->
            </div>
            <a class="save-btn" href="/edit-profile">Редактировать профиль</a>
        </div>

<!--        <div class="section">-->
<!--            <h2>Последние заказы</h2>-->
<!---->
<!--            <div class="order">-->
<!--                <div class="order-icon">🎧</div>-->
<!--                <div class="order-info">-->
<!--                    <div class="order-title">Беспроводные наушники Pro</div>-->
<!--                    <div class="order-date">12 июня 2026 · Заказ #10456</div>-->
<!--                </div>-->
<!--                <div class="order-price">4 990 ₽</div>-->
<!--                <div class="order-status status-done">Доставлен</div>-->
<!--            </div>-->
<!---->
<!--            <div class="order">-->
<!--                <div class="order-icon">👟</div>-->
<!--                <div class="order-info">-->
<!--                    <div class="order-title">Кроссовки Air Runner</div>-->
<!--                    <div class="order-date">3 июня 2026 · Заказ #10421</div>-->
<!--                </div>-->
<!--                <div class="order-price">3 290 ₽</div>-->
<!--                <div class="order-status status-progress">В пути</div>-->
<!--            </div>-->
<!---->
<!--            <div class="order">-->
<!--                <div class="order-icon">⌚</div>-->
<!--                <div class="order-info">-->
<!--                    <div class="order-title">Умные часы Series 5</div>-->
<!--                    <div class="order-date">28 мая 2026 · Заказ #10387</div>-->
<!--                </div>-->
<!--                <div class="order-price">8 490 ₽</div>-->
<!--                <div class="order-status status-cancel">Отменён</div>-->
<!--            </div>-->
<!---->
<!--        </div>-->

    </div>

</div>

</body>
</html>
<style>
    * { box-sizing: border-box; font-family: 'Segoe UI', Arial, sans-serif; }
    body {
        margin: 0;
        background: #f2f4f7;
        color: #1a1a1a;
    }
    header {
        background: #ffffff;
        padding: 20px 40px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        box-shadow: 0 2px 10px rgba(0,0,0,0.04);
        position: sticky;
        top: 0;
        z-index: 10;
    }
    .logo {
        font-size: 20px;
        font-weight: 700;
        color: #6366f1;
        display: flex;
        align-items: center;
        gap: 8px;
    }
    .search {
        flex: 1;
        max-width: 400px;
        margin: 0 24px;
    }
    .search input {
        width: 100%;
        padding: 10px 14px;
        border: 1px solid #ddd;
        border-radius: 8px;
        font-size: 14px;
        outline: none;
        transition: border-color 0.2s;
    }
    .search input:focus {
        border-color: #6366f1;
        box-shadow: 0 0 0 3px rgba(99,102,241,0.15);
    }
    .cart-btn {
        background: #6366f1;
        color: #fff;
        border: none;
        border-radius: 8px;
        padding: 10px 18px;
        font-size: 14px;
        font-weight: 600;
        cursor: pointer;
        transition: background 0.2s;
    }
    .cart-btn:hover { background: #4f46e5; }

    .container {
        max-width: 1000px;
        margin: 0 auto;
        padding: 30px 40px 60px;
        display: grid;
        grid-template-columns: 280px 1fr;
        gap: 24px;
    }

    /* Sidebar */
    .sidebar {
        background: #fff;
        border-radius: 16px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.05);
        padding: 28px 24px;
        height: fit-content;
    }
    .avatar {
        width: 84px;
        height: 84px;
        border-radius: 50%;
        background: #eef2ff;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 38px;
        margin: 0 auto 14px;
    }
    .user-name {
        text-align: center;
        font-size: 17px;
        font-weight: 700;
        margin: 0 0 2px;
    }
    .user-email {
        text-align: center;
        font-size: 13px;
        color: #888;
        margin: 0 0 20px;
    }
    .nav {
        display: flex;
        flex-direction: column;
        gap: 4px;
    }
    .nav a {
        display: flex;
        align-items: center;
        gap: 10px;
        padding: 10px 12px;
        border-radius: 8px;
        color: #555;
        text-decoration: none;
        font-size: 14px;
        transition: background 0.2s, color 0.2s;
    }
    .nav a:hover {
        background: #f7f7f9;
        color: #6366f1;
    }
    .nav a.active {
        background: #eef2ff;
        color: #6366f1;
        font-weight: 600;
    }
    .nav .icon { width: 18px; text-align: center; }

    .nav-divider {
        border-top: 1px solid #eee;
        margin: 8px 0;
    }
    .nav a.logout { color: #dc2626; }
    .nav a.logout:hover { background: #fee2e2; }

    /* Main content */
    .main { display: flex; flex-direction: column; gap: 20px; }

    .section {
        background: #fff;
        border-radius: 16px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.05);
        padding: 24px 28px;
    }
    .section h2 {
        font-size: 17px;
        margin: 0 0 18px;
    }

    .stats {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 16px;
    }
    .stat {
        background: #f7f7f9;
        border-radius: 12px;
        padding: 16px;
        text-align: center;
    }
    .stat .value {
        font-size: 22px;
        font-weight: 700;
        color: #6366f1;
    }
    .stat .label {
        font-size: 12px;
        color: #888;
        margin-top: 4px;
    }

    .form-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 16px;
    }
    .form-grid .full { grid-column: 1 / -1; }

    label {
        display: block;
        font-size: 13px;
        color: #555;
        margin-bottom: 6px;
    }
    input[type="text"],
    input[type="email"],
    input[type="tel"] {
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

    .save-btn {
        margin-top: 20px;
        border: none;
        background: #6366f1;
        color: #fff;
        border-radius: 8px;
        padding: 12px 24px;
        font-size: 14px;
        font-weight: 600;
        cursor: pointer;
        transition: background 0.2s;
    }
    .save-btn:hover { background: #4f46e5; }

    /* Orders */
    .order {
        display: flex;
        align-items: center;
        gap: 16px;
        padding: 14px 0;
        border-bottom: 1px solid #eee;
    }
    .order:last-child { border-bottom: none; }
    .order-icon {
        width: 48px;
        height: 48px;
        border-radius: 12px;
        background: #eef2ff;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 22px;
        flex-shrink: 0;
    }
    .order-info { flex: 1; }
    .order-title {
        font-size: 14px;
        font-weight: 600;
        margin: 0 0 2px;
    }
    .order-date {
        font-size: 12px;
        color: #888;
    }
    .order-price {
        font-size: 14px;
        font-weight: 700;
    }
    .order-status {
        font-size: 11px;
        font-weight: 600;
        padding: 4px 10px;
        border-radius: 12px;
        margin-left: 12px;
    }
    .status-done { background: #dcfce7; color: #16a34a; }
    .status-progress { background: #fef9c3; color: #ca8a04; }
    .status-cancel { background: #fee2e2; color: #dc2626; }

    @media (max-width: 750px) {
        header { padding: 16px 20px; }
        .search { display: none; }
        .container { padding: 20px 20px 40px; grid-template-columns: 1fr; }
        .form-grid { grid-template-columns: 1fr; }
        .stats { grid-template-columns: 1fr; }
    }
</style>