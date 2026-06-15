<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Каталог товаров</title>
</head>
<body>

<header>
    <div class="logo">🛍️ ShopLy</div>
    <div class="search">
        <input type="text" placeholder="Поиск товаров...">
    </div>
    <a href="/profile">Мой профиль</a>
    <a href="/cart">Корзина</a>

</header>

<div class="container">
    <h1 class="page-title">Корзина</h1>

    <div class="grid">

        <?php foreach ($dataProducts as $product):?>
            <div class="card">

                <div class="card-image">
                    <div class="badge">Новинка</div>
                    <img src="<?php echo $product['image_url']?>">
                </div>
                <div class="card-body">
                    <h6 class="card-title">Название: <?php echo $product['name']?></h6>
                    <h3 class="card-category">Описание: <?php echo $product['description']?></h3>
                    <div class="card-rating">★★★★★ <span>(128)</span></div>
                    <div class="card-footer">
                        <div class="price">Цена: <?php echo $product['price']?></div>
                        <div class="amount">Колл: <?php echo $product['amount']?></div>

                    </div>
                </div>
            </div>
<!--            <form action="/add-product" method="POST">-->
<!---->
<!--                <input type="hidden" name="product_id" placeholder="Ваше product_id" value="--><?php //echo $product['id']  ?><!--">-->
<!---->
<!--                <label for="amount">amount </label>-->
<!--                --><?php //if (isset($errors['amount'])):?>
<!--                    <label style="color: red">--><?php //echo $errors['amount']?><!--</label>-->
<!--                --><?php //endif; ?>
<!--                <input type="text" name="amount" placeholder="amount" >-->
<!---->
<!--                <button type="submit">add product</button>-->
<!--            </form>-->
        <?php endforeach;?>
        <!--        <div class="card">-->
        <!---->
        <!--            <div class="card-image">-->
        <!--                <div class="badge">Новинка</div>-->
        <!--🎧-->
        <!--            </div>-->
        <!--            <div class="card-body">-->
        <!--                <div class="card-category">Электроника</div>-->
        <!--                <h3 class="card-title">Беспроводные наушники Pro</h3>-->
        <!--                <div class="card-rating">★★★★★ <span>(128)</span></div>-->
        <!--                <div class="card-footer">-->
        <!--                    <div class="price">4 990 ₽</div>-->
        <!--                    <button class="add-btn">В корзину</button>-->
        <!--                </div>-->
        <!--            </div>-->
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
        max-width: 1100px;
        margin: 0 auto;
        padding: 30px 40px 60px;
    }

    .page-title {
        font-size: 24px;
        margin: 0 0 4px;
    }
    .page-subtitle {
        font-size: 13px;
        color: #888;
        margin: 0 0 24px;
    }

    .categories {
        display: flex;
        gap: 10px;
        margin-bottom: 28px;
        flex-wrap: wrap;
    }
    .categories button {
        border: 1px solid #ddd;
        background: #fff;
        border-radius: 20px;
        padding: 8px 18px;
        font-size: 13px;
        color: #555;
        cursor: pointer;
        transition: all 0.2s;
    }
    .categories button.active {
        background: #6366f1;
        color: #fff;
        border-color: #6366f1;
    }
    .categories button:hover:not(.active) {
        border-color: #6366f1;
        color: #6366f1;
    }

    .grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
        gap: 20px;
    }

    .card {
        background: #ffffff;
        border-radius: 16px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.05);
        overflow: hidden;
        display: flex;
        flex-direction: column;
        transition: transform 0.2s, box-shadow 0.2s;
    }
    .card:hover {
        transform: translateY(-4px);
        box-shadow: 0 14px 34px rgba(0,0,0,0.09);
    }

    .card-image {
        height: 160px;
        background: #eef2ff;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 48px;
        position: relative;
    }

    .badge {
        position: absolute;
        top: 12px;
        left: 12px;
        background: #6366f1;
        color: #fff;
        font-size: 11px;
        font-weight: 600;
        padding: 4px 10px;
        border-radius: 12px;
    }

    .card-body {
        padding: 16px 18px 18px;
        display: flex;
        flex-direction: column;
        gap: 8px;
        flex: 1;
    }

    .card-category {
        font-size: 12px;
        color: #6366f1;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.04em;
    }

    .card-title {
        font-size: 25px;
        font-weight: 600;
        margin: 0;
        color: #1a1a1a;
    }

    .card-rating {
        font-size: 12px;
        color: #f5a623;
        display: flex;
        align-items: center;
        gap: 4px;
    }
    .card-rating span { color: #888; }

    .card-footer {
        margin-top: auto;
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding-top: 8px;
    }

    .price {
        font-size: 17px;
        font-weight: 700;
        color: #1a1a1a;
    }
    .old-price {
        font-size: 13px;
        color: #aaa;
        text-decoration: line-through;
        margin-left: 6px;
        font-weight: 400;
    }

    .add-btn {
        border: none;
        background: #eef2ff;
        color: #6366f1;
        border-radius: 8px;
        padding: 8px 14px;
        font-size: 13px;
        font-weight: 600;
        cursor: pointer;
        transition: background 0.2s, color 0.2s;
    }
    .add-btn:hover {
        background: #6366f1;
        color: #fff;
    }

    @media (max-width: 600px) {
        header { padding: 16px 20px; }
        .search { display: none; }
        .container { padding: 20px 20px 40px; }
    }
</style>













<!--<!DOCTYPE html>-->
<!--<html lang="ru">-->
<!--<head>-->
<!--<meta charset="UTF-8">-->
<!--<meta name="viewport" content="width=device-width, initial-scale=1.0">-->
<!--<title>Корзина — ShopLy</title>-->
<!--<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">-->
<!---->
<!--</head>-->
<!--<body>-->
<!---->
<!--<nav>-->
<!-- <a class="logo" href="#">Shop<span>Ly</span></a>-->
<!-- <div class="nav-right">-->
<!--     <a href="/profile">Мой профиль</a>-->
<!--   <a href="/catalog">Каталог</a>-->
<!-- </div>-->
<!--</nav>-->
<!---->
<!--<div class="page">-->
<!-- <div class="page-title">-->
<!--   <h1>Корзина</h1>-->
<!--   <span class="count" id="count">3 товара</span>-->
<!-- </div>-->
<!---->
<!-- <div>-->
<!--   <div class="items" id="items"></div>-->
<!--   <div class="empty" id="empty">-->
<!--     <div class="ico">🛒</div>-->
<!--     <h3>Корзина пуста</h3>-->
<!--     <p>Добавьте что-нибудь из каталога</p>-->
<!--   </div>-->
<!---->
<!--   <div class="history" id="history-sec" style="margin-top:1.5rem">-->
<!--     <div class="sec-label">Смотрели ранее</div>-->
<!--     <div class="history-grid" id="history-grid"></div>-->
<!--   </div>-->
<!-- </div>-->
<!---->
<!-- <div class="sidebar">-->
<!--   <div class="summary">-->
<!--     <h2>Итого</h2>-->
<!--     <div class="s-row"><span>Товары</span><span class="v" id="s-sub">—</span></div>-->
<!--     <div class="s-row" id="s-disc-row" style="display:none"><span>Скидка</span><span class="v" style="color:#5B6CF5" id="s-disc">—</span></div>-->
<!--     <div class="s-row"><span>Доставка</span><span class="v" id="s-del">—</span></div>-->
<!--     <div class="s-total">-->
<!--       <span class="lbl">К оплате</span>-->
<!--       <span class="amt" id="s-total">—</span>-->
<!--     </div>-->
<!--     <div class="promo">-->
<!--       <input type="text" id="promo-inp" placeholder="Промокод">-->
<!--       <button onclick="applyPromo()">Применить</button>-->
<!--     </div>-->
<!--     <button class="checkout" onclick="go()">Оформить заказ</button>-->
<!--   </div>-->
<!-- </div>-->
<!--</div>-->
<!---->
<!--<div class="toast" id="toast"></div>-->
<!---->
<!--<style>-->
<!--    *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }-->
<!---->
<!--    body {-->
<!--        font-family: 'Inter', sans-serif;-->
<!--        background: #F7F8FA;-->
<!--        color: #1A1A1A;-->
<!--        min-height: 100vh;-->
<!--        -webkit-font-smoothing: antialiased;-->
<!--    }-->
<!---->
<!--    nav {-->
<!--        background: #fff;-->
<!--        border-bottom: 1px solid #EBEBEB;-->
<!--        display: flex;-->
<!--        align-items: center;-->
<!--        justify-content: space-between;-->
<!--        padding: 0 2.5rem;-->
<!--        height: 58px;-->
<!--    }-->
<!---->
<!--    .logo {-->
<!--        font-size: 20px;-->
<!--        font-weight: 600;-->
<!--        color: #1A1A1A;-->
<!--        text-decoration: none;-->
<!--        letter-spacing: -0.4px;-->
<!--    }-->
<!---->
<!--    .logo span { color: #5B6CF5; }-->
<!---->
<!--    .nav-right {-->
<!--        display: flex;-->
<!--        align-items: center;-->
<!--        gap: 1.5rem;-->
<!--        font-size: 14px;-->
<!--        color: #888;-->
<!--    }-->
<!---->
<!--    .nav-right a { text-decoration: none; color: #888; }-->
<!--    .nav-right a:hover { color: #1A1A1A; }-->
<!---->
<!--    .page {-->
<!--        max-width: 980px;-->
<!--        margin: 0 auto;-->
<!--        padding: 2.5rem 1.5rem 4rem;-->
<!--        display: grid;-->
<!--        grid-template-columns: 1fr 300px;-->
<!--        gap: 2rem;-->
<!--        align-items: start;-->
<!--    }-->
<!---->
<!--    .page-title {-->
<!--        grid-column: 1 / -1;-->
<!--        display: flex;-->
<!--        align-items: baseline;-->
<!--        gap: 10px;-->
<!--        margin-bottom: 0.25rem;-->
<!--    }-->
<!---->
<!--    .page-title h1 {-->
<!--        font-size: 24px;-->
<!--        font-weight: 600;-->
<!--        letter-spacing: -0.4px;-->
<!--    }-->
<!---->
<!--    .page-title .count {-->
<!--        font-size: 14px;-->
<!--        color: #999;-->
<!--        font-weight: 400;-->
<!--    }-->
<!---->
<!--    /* ITEMS */-->
<!--    .items { display: flex; flex-direction: column; gap: 10px; }-->
<!---->
<!--    .item {-->
<!--        background: #fff;-->
<!--        border: 1px solid #EBEBEB;-->
<!--        border-radius: 12px;-->
<!--        padding: 1.1rem 1.25rem;-->
<!--        display: flex;-->
<!--        align-items: center;-->
<!--        gap: 1rem;-->
<!--        transition: box-shadow 0.15s;-->
<!--    }-->
<!---->
<!--    .item:hover { box-shadow: 0 2px 12px rgba(0,0,0,0.06); }-->
<!---->
<!--    .item-img {-->
<!--        width: 60px;-->
<!--        height: 60px;-->
<!--        border-radius: 8px;-->
<!--        background: #F0F1FF;-->
<!--        display: flex;-->
<!--        align-items: center;-->
<!--        justify-content: center;-->
<!--        flex-shrink: 0;-->
<!--        font-size: 26px;-->
<!--    }-->
<!---->
<!--    .item-info { flex: 1; min-width: 0; }-->
<!---->
<!--    .item-name {-->
<!--        font-size: 15px;-->
<!--        font-weight: 500;-->
<!--        color: #1A1A1A;-->
<!--        margin-bottom: 3px;-->
<!--        white-space: nowrap;-->
<!--        overflow: hidden;-->
<!--        text-overflow: ellipsis;-->
<!--    }-->
<!---->
<!--    .item-sub { font-size: 13px; color: #999; }-->
<!---->
<!--    .item-price {-->
<!--        font-size: 16px;-->
<!--        font-weight: 600;-->
<!--        color: #1A1A1A;-->
<!--        white-space: nowrap;-->
<!--        margin: 0 1.25rem;-->
<!--    }-->
<!---->
<!--    .qty {-->
<!--        display: flex;-->
<!--        align-items: center;-->
<!--        gap: 8px;-->
<!--        background: #F7F8FA;-->
<!--        border: 1px solid #EBEBEB;-->
<!--        border-radius: 8px;-->
<!--        padding: 5px 10px;-->
<!--    }-->
<!---->
<!--    .qty button {-->
<!--        background: none;-->
<!--        border: none;-->
<!--        font-size: 16px;-->
<!--        color: #999;-->
<!--        cursor: pointer;-->
<!--        width: 20px;-->
<!--        height: 20px;-->
<!--        display: flex;-->
<!--        align-items: center;-->
<!--        justify-content: center;-->
<!--        border-radius: 4px;-->
<!--        transition: color 0.15s, background 0.15s;-->
<!--        font-family: 'Inter', sans-serif;-->
<!--        line-height: 1;-->
<!--    }-->
<!---->
<!--    .qty button:hover { color: #1A1A1A; background: #EBEBEB; }-->
<!---->
<!--    .qty span {-->
<!--        font-size: 14px;-->
<!--        font-weight: 500;-->
<!--        min-width: 18px;-->
<!--        text-align: center;-->
<!--    }-->
<!---->
<!--    .del-btn {-->
<!--        background: none;-->
<!--        border: none;-->
<!--        cursor: pointer;-->
<!--        color: #CCC;-->
<!--        padding: 6px;-->
<!--        border-radius: 6px;-->
<!--        display: flex;-->
<!--        align-items: center;-->
<!--        transition: color 0.15s, background 0.15s;-->
<!--    }-->
<!---->
<!--    .del-btn:hover { color: #E05C4A; background: #FFF0EE; }-->
<!---->
<!--    /* HISTORY */-->
<!--    .history { margin-top: 0.5rem; }-->
<!---->
<!--    .sec-label {-->
<!--        font-size: 13px;-->
<!--        font-weight: 500;-->
<!--        color: #BBB;-->
<!--        margin-bottom: 10px;-->
<!--        letter-spacing: 0.3px;-->
<!--    }-->
<!---->
<!--    .history-grid {-->
<!--        display: grid;-->
<!--        grid-template-columns: repeat(4, 1fr);-->
<!--        gap: 8px;-->
<!--    }-->
<!---->
<!--    .h-card {-->
<!--        background: #fff;-->
<!--        border: 1px solid #EBEBEB;-->
<!--        border-radius: 10px;-->
<!--        padding: 12px;-->
<!--        cursor: pointer;-->
<!--        transition: border-color 0.15s;-->
<!--        display: flex;-->
<!--        flex-direction: column;-->
<!--        gap: 6px;-->
<!--    }-->
<!---->
<!--    .h-card:hover { border-color: #5B6CF5; }-->
<!---->
<!--    .h-emoji { font-size: 22px; }-->
<!--    .h-name { font-size: 12px; font-weight: 500; color: #1A1A1A; line-height: 1.3; }-->
<!--    .h-price { font-size: 12px; color: #999; }-->
<!--    .h-add { font-size: 11px; color: #5B6CF5; opacity: 0; transition: opacity 0.15s; }-->
<!--    .h-card:hover .h-add { opacity: 1; }-->
<!---->
<!--    /* SIDEBAR */-->
<!--    .sidebar { position: sticky; top: 76px; }-->
<!---->
<!--    .summary {-->
<!--        background: #fff;-->
<!--        border: 1px solid #EBEBEB;-->
<!--        border-radius: 12px;-->
<!--        padding: 1.25rem;-->
<!--    }-->
<!---->
<!--    .summary h2 {-->
<!--        font-size: 16px;-->
<!--        font-weight: 600;-->
<!--        margin-bottom: 1rem;-->
<!--        color: #1A1A1A;-->
<!--    }-->
<!---->
<!--    .s-row {-->
<!--        display: flex;-->
<!--        justify-content: space-between;-->
<!--        font-size: 14px;-->
<!--        color: #999;-->
<!--        padding: 7px 0;-->
<!--        border-bottom: 1px solid #F2F2F2;-->
<!--    }-->
<!---->
<!--    .s-row:last-of-type { border: none; }-->
<!--    .s-row .v { color: #1A1A1A; font-weight: 500; }-->
<!---->
<!--    .s-total {-->
<!--        display: flex;-->
<!--        justify-content: space-between;-->
<!--        align-items: baseline;-->
<!--        margin-top: 1rem;-->
<!--        padding-top: 1rem;-->
<!--        border-top: 1px solid #EBEBEB;-->
<!--    }-->
<!---->
<!--    .s-total .lbl { font-size: 15px; font-weight: 500; }-->
<!--    .s-total .amt { font-size: 22px; font-weight: 600; color: #5B6CF5; letter-spacing: -0.5px; }-->
<!---->
<!--    .promo {-->
<!--        display: flex;-->
<!--        gap: 8px;-->
<!--        margin: 1.25rem 0 0;-->
<!--    }-->
<!---->
<!--    .promo input {-->
<!--        flex: 1;-->
<!--        border: 1px solid #EBEBEB;-->
<!--        border-radius: 8px;-->
<!--        padding: 9px 12px;-->
<!--        font-family: 'Inter', sans-serif;-->
<!--        font-size: 13px;-->
<!--        outline: none;-->
<!--        background: #F7F8FA;-->
<!--        color: #1A1A1A;-->
<!--        transition: border-color 0.15s;-->
<!--    }-->
<!---->
<!--    .promo input:focus { border-color: #5B6CF5; background: #fff; }-->
<!--    .promo input::placeholder { color: #BBB; }-->
<!---->
<!--    .promo button {-->
<!--        padding: 9px 14px;-->
<!--        background: #F0F1FF;-->
<!--        color: #5B6CF5;-->
<!--        border: none;-->
<!--        border-radius: 8px;-->
<!--        font-family: 'Inter', sans-serif;-->
<!--        font-size: 13px;-->
<!--        font-weight: 500;-->
<!--        cursor: pointer;-->
<!--        transition: background 0.15s;-->
<!--        white-space: nowrap;-->
<!--    }-->
<!---->
<!--    .promo button:hover { background: #E3E5FD; }-->
<!---->
<!--    .checkout {-->
<!--        display: block;-->
<!--        width: 100%;-->
<!--        margin-top: 12px;-->
<!--        padding: 14px;-->
<!--        background: #5B6CF5;-->
<!--        color: #fff;-->
<!--        border: none;-->
<!--        border-radius: 10px;-->
<!--        font-family: 'Inter', sans-serif;-->
<!--        font-size: 15px;-->
<!--        font-weight: 600;-->
<!--        cursor: pointer;-->
<!--        transition: background 0.15s, transform 0.1s;-->
<!--    }-->
<!---->
<!--    .checkout:hover { background: #4A5AE0; }-->
<!--    .checkout:active { transform: scale(0.99); }-->
<!---->
<!--    .empty {-->
<!--        background: #fff;-->
<!--        border: 1px solid #EBEBEB;-->
<!--        border-radius: 12px;-->
<!--        padding: 3rem 2rem;-->
<!--        text-align: center;-->
<!--        display: none;-->
<!--    }-->
<!---->
<!--    .empty.on { display: block; }-->
<!--    .empty .ico { font-size: 40px; margin-bottom: 12px; }-->
<!--    .empty p { font-size: 14px; color: #999; margin-top: 6px; }-->
<!--    .empty h3 { font-size: 17px; font-weight: 600; }-->
<!---->
<!--    .toast {-->
<!--        position: fixed;-->
<!--        bottom: 1.5rem;-->
<!--        left: 50%;-->
<!--        transform: translateX(-50%) translateY(10px);-->
<!--        background: #1A1A1A;-->
<!--        color: #fff;-->
<!--        padding: 10px 18px;-->
<!--        border-radius: 100px;-->
<!--        font-size: 13px;-->
<!--        font-weight: 500;-->
<!--        opacity: 0;-->
<!--        pointer-events: none;-->
<!--        transition: opacity 0.2s, transform 0.2s;-->
<!--        white-space: nowrap;-->
<!--        z-index: 999;-->
<!--    }-->
<!---->
<!--    .toast.on { opacity: 1; transform: translateX(-50%) translateY(0); }-->
<!--</style>-->
<!--<script>-->
<!--                                                                let cart = [-->
<!-- { id:1, emoji:'👟', name:'Nike Air Max 270', sub:'Белый · 42', price:12900, qty:1 },-->
<!-- { id:2, emoji:'🎧', name:'Sony WH-1000XM5', sub:'Чёрный',     price:28500, qty:1 },-->
<!-- { id:3, emoji:'⌚', name:'Apple Watch SE 2', sub:'44мм · GPS', price:19990, qty:2 },-->
<!--];-->
<!-- -->
<!--const hist = [-->
<!-- { id:101, emoji:'💻', name:'MacBook Air M3', price:109990 },-->
<!-- { id:102, emoji:'📱', name:'iPhone 15 Pro',  price:89990  },-->
<!-- { id:103, emoji:'🎮', name:'PS5 Slim',       price:54990  },-->
<!-- { id:104, emoji:'📷', name:'Sony ZV-E10 II', price:62000  },-->
<!--];-->
<!-- -->
<!--let promo = false;-->
<!-- -->
<!--const fmt = n => n.toLocaleString('ru-RU') + ' ₽';-->
<!-- -->
<!--function toast(msg) {-->
<!--    const t = document.getElementById('toast');-->
<!--    t.textContent = msg;-->
<!--    t.classList.add('on');-->
<!--    setTimeout(() => t.classList.remove('on'), 2000);-->
<!--}-->
<!-- -->
<!--function render() {-->
<!--    const el = document.getElementById('items');-->
<!--    const empty = document.getElementById('empty');-->
<!-- const cnt = cart.reduce((s,i) => s+i.qty, 0);-->
<!-- const endings = n => n===1?'товар':n<5?'товара':'товаров';-->
<!-- document.getElementById('count').textContent = cnt ? `${cnt} ${endings(cnt)}` : '';-->
<!-- -->
<!-- if (!cart.length) {-->
<!--     el.innerHTML = '';-->
<!--     empty.classList.add('on');-->
<!-- } else {-->
<!--     empty.classList.remove('on');-->
<!--     el.innerHTML = cart.map(it => `-->
<!--     <div class="item" id="it-${it.id}">-->
<!--       <div class="item-img">${it.emoji}</div>-->
<!--       <div class="item-info">-->
<!--         <div class="item-name">${it.name}</div>-->
<!--         <div class="item-sub">${it.sub}</div>-->
<!--       </div>-->
<!--       <div class="item-price">${fmt(it.price * it.qty)}</div>-->
<!--       <div class="qty">-->
<!--         <button onclick="chg(${it.id},-1)">−</button>-->
<!--         <span>${it.qty}</span>-->
<!--         <button onclick="chg(${it.id},1)">+</button>-->
<!--       </div>-->
<!--       <button class="del-btn" onclick="del(${it.id})" aria-label="Удалить">-->
<!--         <svg width="14" height="14" viewBox="0 0 14 14" fill="none">-->
<!--           <path d="M2 2l10 10M12 2L2 12" stroke="currentColor" stroke-width="1.7" stroke-linecap="round"/>-->
<!--         </svg>-->
<!--       </button>-->
<!--     </div>-->
<!--   `).join('');-->
<!-- }-->
<!-- -->
<!-- const sub = cart.reduce((s,i) => s+i.price*i.qty, 0);-->
<!-- const disc = promo ? Math.round(sub * 0.1) : 0;-->
<!-- const del = cart.length ? 290 : 0;-->
<!-- document.getElementById('s-sub').textContent = fmt(sub);-->
<!-- document.getElementById('s-del').textContent = del ? fmt(del) : '—';-->
<!-- document.getElementById('s-total').textContent = fmt(sub - disc + del);-->
<!-- const dr = document.getElementById('s-disc-row');-->
<!-- dr.style.display = disc ? 'flex' : 'none';-->
<!-- if (disc) document.getElementById('s-disc').textContent = '−' + fmt(disc);-->
<!--}-->
<!-- -->
<!--function renderHist() {-->
<!--    document.getElementById('history-grid').innerHTML = hist.map(h => `-->
<!--   <div class="h-card" onclick="addHist(${h.id})">-->
<!--     <div class="h-emoji">${h.emoji}</div>-->
<!--     <div class="h-name">${h.name}</div>-->
<!--     <div class="h-price">${fmt(h.price)}</div>-->
<!--     <div class="h-add">+ В корзину</div>-->
<!--   </div>-->
<!-- `).join('');-->
<!--}-->
<!-- -->
<!--function chg(id, d) {-->
<!--    const it = cart.find(i=>i.id===id);-->
<!-- if (it) { it.qty = Math.max(1, it.qty+d); render(); }-->
<!--}-->
<!-- -->
<!--function del(id) {-->
<!--    const el = document.getElementById('it-'+id);-->
<!--    if (el) {-->
<!--        el.style.transition = 'opacity .18s, transform .18s';-->
<!--        el.style.opacity = '0'; el.style.transform = 'translateX(6px)';-->
<!--        setTimeout(() => { cart = cart.filter(i=>i.id!==id); render(); }, 180);-->
<!-- }-->
<!--}-->
<!-- -->
<!--function addHist(hid) {-->
<!--    const h = hist.find(x=>x.id===hid);-->
<!-- if (!h) return;-->
<!-- const ex = cart.find(i=>i.id===h.id);-->
<!-- if (ex) { ex.qty++; toast('Ещё одна штука добавлена'); }-->
<!-- else { cart.push({id:h.id, emoji:h.emoji, name:h.name, sub:'Из просмотренных', price:h.price, qty:1}); toast('Добавлено в корзину'); }-->
<!-- render();-->
<!--}-->
<!-- -->
<!--function applyPromo() {-->
<!--    const v = document.getElementById('promo-inp').value.trim().toUpperCase();-->
<!--    if (v === 'SHOP10') { promo = true; toast('Скидка 10% применена ✓'); render(); }-->
<!--    else toast('Промокод не найден');-->
<!--}-->
<!-- -->
<!--function go() {-->
<!--    if (!cart.length) { toast('Корзина пуста'); return; }-->
<!--    toast('Переход к оформлению...');-->
<!--}-->
<!-- -->
<!--renderHist();-->
<!--render();-->
<!--</script>-->
</body>
</html>