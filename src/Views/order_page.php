<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Оформление заказа — Lumière</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&family=Playfair+Display:wght@500&display=swap" rel="stylesheet">
</head>
<body>

<!-- ─ Header ─ -->
<header>
    <div class="logo">Lumi<span>è</span>re</div>
    <div class="sec-label">
        <svg width="14" height="14" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
        Защищённая оплата
    </div>
</header>

<!-- ─ Main ─ -->
<main>

    <!-- LEFT -->
    <div>

    <form action="/create-order" method="post">    <!-- контактная информация -->
        <div class="card">
            <div class="card-head">
                <div class="icon-box">
                    <svg width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="#4a3f8f" stroke-width="2"><path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                </div>
                <h2>Контактная информация</h2>
            </div>
            <div class="card-body">
                <div class="row">
                    <label class="lbl" for="email">Имя</label>
                    <div class="ico-wrap">
           <span class="ico">
             <svg width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
           </span>
                        <input type="text" id="contact_name" name="contact_name" placeholder="Ваше имя" >
                    </div>
                </div>
                <div class="row">
                    <label class="lbl" for="phone">Телефон</label>
                    <div class="ico-wrap">
           <span class="ico">
             <svg width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07A19.5 19.5 0 013.07 9.81a19.79 19.79 0 01-3.07-8.68A2 2 0 012 .15h3a2 2 0 012 1.72c.127.96.361 1.903.7 2.81a2 2 0 01-.45 2.11L6.91 7.91a16 16 0 006.18 6.18l1.27-1.27a2 2 0 012.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0122 14.92z"/></svg>
           </span>
                        <input type="text" id="contact_number" name="contact_number" placeholder="+7 (___) ___-__-__" >
                    </div>
                </div>

            </div>
        </div>

        <!-- адрес доставки  -->
        <div class="card">
            <div class="card-head">
                <div class="icon-box">
                    <svg width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="#4a3f8f" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0118 0z"/><circle cx="12" cy="10" r="3"/></svg>
                </div>
                <h2>Адрес доставки</h2>
            </div>
            <div class="card-body">

                <div class="row">
                    <label class="lbl" for="street">Улица и дом</label>
                    <input type="text" id="street" name="street" placeholder="ул. Садовая, д. 12" autocomplete="address-line1">
                </div>
                <div class="row">
                    <label class="lbl" for="apt">Квартира / офис (необязательно)</label>
                    <input type="text" id="apt" name="apt" placeholder="кв. 45" autocomplete="address-line2">
                </div>
                <div class="row g2">
                    <div>
                        <label class="lbl" for="city">Город</label>
                        <input type="text" id="city" name="city" placeholder="Москва" autocomplete="address-level2">
                    </div>
                    <div>
                        <label class="lbl" for="region">Регион</label>
                        <div class="sel-wrap">
                            <select id="region" name="region" autocomplete="address-level1">
                                <option>Москва</option>
                                <option>Санкт-Петербург</option>
                                <option>Новосибирск</option>
                                <option>Екатеринбург</option>
                                <option>Казань</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <label class="lbl" for="comment">Комментарии</label>
                    <input type="text" id="comment" name="comment" placeholder="Комментарии" autocomplete="comment">
                </div>
            </div>
            <button type="submit" class = "orderbtn" >Оформить заказ</button>
        </div>
    </form>
    </div>

    <!-- товары в заказе -->
    <aside class="summary">
        <div class="card">
            <div class="card-head">
                <div class="icon-box">
                    <svg width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="#4a3f8f" stroke-width="2"><path d="M6 2L3 6v14a2 2 0 002 2h14a2 2 0 002-2V6l-3-4z"/><line x1="3" y1="6" x2="21" y2="6"/><path d="M16 10a4 4 0 01-8 0"/></svg>
                </div>
                <h2>Ваш заказ</h2>
            </div>
            <div class="card-body">

                <div class="product-list">
                    <div class="product-item">
                        <div class="p-img">🕯️<span class="qty">2</span></div>
                        <div class="p-info">
                            <div class="p-name">Свеча «Лес»</div>
                            <div class="p-var">240 мл · Кедр & пачули</div>
                        </div>
                        <div class="p-price">3 180 ₽</div>
                    </div>
                    <div class="product-item">
                        <div class="p-img">🧴<span class="qty">1</span></div>
                        <div class="p-info">
                            <div class="p-name">Крем «Розмарин»</div>
                            <div class="p-var">75 мл · Лимитированный</div>
                        </div>
                        <div class="p-price">2 490 ₽</div>
                    </div>
                    <div class="product-item">
                        <div class="p-img">🌿<span class="qty">1</span></div>
                        <div class="p-info">
                            <div class="p-name">Диффузор «Белый чай»</div>
                            <div class="p-var">100 мл · 12 палочек</div>
                        </div>
                        <div class="p-price">3 800 ₽</div>
                    </div>
                </div>

                <div class="totals">
                    <div class="total-row">
                        <span>Товары (4 шт.)</span>
                        <span>9 470 ₽</span>
                    </div>
                    <div class="total-row">
                        <span>Доставка</span>
                        <span>420 ₽</span>
                    </div>
                    <div class="total-row grand">
                        <span>Итого</span>
                        <span>11 890 ₽</span>
                    </div>
                </div>

            </div>
            <div class="trust-row">
                <div class="stars">★★★★★</div>
                <div class="trust-txt">4.9 · более 2 400 покупателей</div>
            </div>
        </div>
    </aside>

</main>

</body>
</html>

<style>
    *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

    :root {
        --ink:         #1a1a2e;
        --ink-mid:     #3d3d5c;
        --ink-soft:    #7a7a9a;
        --ink-ghost:   #c8c8dc;
        --surface:     #f7f6f2;
        --card:        #ffffff;
        --accent:      #4a3f8f;
        --accent-h:    #3a2f7f;
        --accent-lt:   #eeecf9;
        --gold:        #c9a84c;
        --ok:          #2d8a5e;
        --ok-bg:       #edf7f2;
        --border:      #e4e4ef;
        --r:           12px;
        --rs:          8px;
    }

    .orderbtn {
        /* Внешний вид */
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        font-size: 16px;
        font-weight: 600;
        border: none;
        border-radius: 50px;
        padding: 15px 30px;
        cursor: pointer;

        /* Тени и эффекты */
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        transition: all 0.3s ease;
    }

    .beautiful-btn:hover {
        /* Эффект при наведении */
        transform: translateY(-3px);
        box-shadow: 0 8px 20px rgba(118, 75, 162, 0.4);
    }

    .beautiful-btn:active {
        /* Эффект при нажатии */
        transform: translateY(1px);
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
    }

    body {
        font-family: 'Inter', system-ui, sans-serif;
        background: var(--surface);
        color: var(--ink);
        font-size: 15px;
        line-height: 1.6;
        min-height: 100vh;
    }

    /* ── Header ── */
    header {
        background: var(--ink);
        padding: 0 2rem;
        display: flex;
        align-items: center;
        justify-content: space-between;
        height: 64px;
        position: sticky;
        top: 0;
        z-index: 50;
    }
    .logo {
        font-family: 'Playfair Display', serif;
        font-size: 22px;
        color: #fff;
        letter-spacing: .04em;
    }
    .logo span { color: var(--gold); }
    .sec-label {
        display: flex;
        align-items: center;
        gap: 6px;
        font-size: 12px;
        color: var(--ink-ghost);
    }

    /* ── Progress ── */
    .prog-bar {
        background: var(--card);
        border-bottom: 1px solid var(--border);
        padding: 0 2rem;
    }
    .prog-inner {
        max-width: 960px;
        margin: 0 auto;
        display: flex;
        align-items: center;
        padding: .9rem 0;
    }
    .step {
        display: flex;
        align-items: center;
        gap: 8px;
        font-size: 13px;
        color: var(--ink-soft);
        white-space: nowrap;
    }
    .step.done  { color: var(--ok); }
    .step.active{ color: var(--accent); }
    .step-num {
        width: 28px; height: 28px;
        border-radius: 50%;
        border: 1.5px solid var(--ink-ghost);
        display: flex; align-items: center; justify-content: center;
        font-size: 12px; font-weight: 500;
        flex-shrink: 0;
        background: var(--card);
    }
    .step.done .step-num {
        background: var(--ok);
        border-color: var(--ok);
        color: #fff;
    }
    .step.active .step-num {
        background: var(--accent);
        border-color: var(--accent);
        color: #fff;
    }
    .step-line {
        flex: 1;
        height: 1.5px;
        background: var(--border);
        margin: 0 8px;
    }
    .step-line.done { background: var(--ok); }

    /* ── Layout ── */
    main {
        max-width: 960px;
        margin: 2.5rem auto;
        padding: 0 1.5rem 4rem;
        display: grid;
        grid-template-columns: 1fr 360px;
        gap: 2rem;
        align-items: start;
    }

    /* ── Card ── */
    .card {
        background: var(--card);
        border-radius: var(--r);
        border: 1px solid var(--border);
        overflow: hidden;
        margin-bottom: 1.5rem;
    }
    .card:last-child { margin-bottom: 0; }
    .card-head {
        display: flex;
        align-items: center;
        gap: 10px;
        padding: 1.1rem 1.5rem;
        border-bottom: 1px solid var(--border);
    }
    .card-head h2 {
        font-family: 'Playfair Display', serif;
        font-size: 17px;
        font-weight: 500;
    }
    .icon-box {
        width: 32px; height: 32px;
        background: var(--accent-lt);
        border-radius: var(--rs);
        display: flex; align-items: center; justify-content: center;
        flex-shrink: 0;
    }
    .card-body { padding: 1.5rem; }

    /* ── Form elements ── */
    .row { margin-bottom: 1.1rem; }
    .row.g2 { display: grid; grid-template-columns: 1fr 1fr; gap: 1rem; }
    .row.g3 { display: grid; grid-template-columns: 2fr 1fr 1fr; gap: 1rem; }

    label.lbl {
        display: block;
        font-size: 11px;
        font-weight: 600;
        color: var(--ink-soft);
        letter-spacing: .06em;
        text-transform: uppercase;
        margin-bottom: 5px;
    }

    input[type="text"],
    input[type="email"],
    input[type="tel"],
    select {
        width: 100%;
        padding: 10px 14px;
        border: 1.5px solid var(--border);
        border-radius: var(--rs);
        font-family: inherit;
        font-size: 14px;
        color: var(--ink);
        background: var(--card);
        outline: none;
        appearance: none;
        transition: border-color .15s, box-shadow .15s;
    }
    input:focus, select:focus {
        border-color: var(--accent);
        box-shadow: 0 0 0 3px rgba(74,63,143,.1);
    }
    input::placeholder { color: var(--ink-ghost); }

    .sel-wrap { position: relative; }
    .sel-wrap::after {
        content: '';
        position: absolute;
        right: 14px; top: 50%;
        transform: translateY(-50%);
        border: 5px solid transparent;
        border-top-color: var(--ink-soft);
        border-bottom: none;
        margin-top: 3px;
        pointer-events: none;
    }

    .ico-wrap { position: relative; }
    .ico-wrap input { padding-left: 42px; }
    .ico-wrap .ico {
        position: absolute;
        left: 14px; top: 50%;
        transform: translateY(-50%);
        color: var(--ink-ghost);
        display: flex;
    }

    /* ── Checkbox ── */
    .chk-row {
        display: flex;
        align-items: flex-start;
        gap: 10px;
        margin-bottom: .9rem;
    }
    .chk-row input[type="checkbox"] {
        width: 16px; height: 16px;
        border-radius: 4px;
        border: 1.5px solid var(--border);
        margin-top: 3px;
        flex-shrink: 0;
        accent-color: var(--accent);
        cursor: pointer;
    }
    .chk-row span {
        font-size: 13px;
        color: var(--ink-mid);
        line-height: 1.5;
    }
    .chk-row a { color: var(--accent); text-decoration: none; }
    .chk-row a:hover { text-decoration: underline; }

    /* ── Payment tabs (CSS-only) ── */
    .pay-tabs { display: none; }
    .pay-tabs:checked + label { border-color: var(--accent); background: var(--accent-lt); color: var(--accent); }

    .pay-labels {
        display: grid;
        grid-template-columns: repeat(3,1fr);
        gap: 10px;
        margin-bottom: 1.4rem;
    }
    .pay-lbl {
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 6px;
        padding: 12px 8px;
        border: 1.5px solid var(--border);
        border-radius: var(--rs);
        font-size: 13px;
        color: var(--ink-mid);
        cursor: pointer;
        background: var(--card);
        transition: all .15s;
        user-select: none;
    }
    .pay-lbl:hover { border-color: var(--accent); }
    .pay-lbl svg { width: 30px; height: 20px; }

    /* Show/hide card fields based on selected tab */
    #pay-card:checked ~ .pay-body #fields-card   { display: block; }
    #pay-sbp:checked  ~ .pay-body #fields-sbp    { display: block; }
    #pay-cash:checked ~ .pay-body #fields-cash   { display: block; }

    .pay-field { display: none; }

    /* Card logos */
    .card-logos { display: flex; gap: 6px; }
    .card-logo {
        width: 36px; height: 22px;
        border-radius: 4px;
        background: var(--surface);
        border: 1px solid var(--border);
        display: flex; align-items: center; justify-content: center;
        font-size: 8px; font-weight: 700;
    }
    .card-logo.visa { color: #1a1f71; }
    .card-logo.mc   { color: #eb001b; }

    /* ── Divider ── */
    .divider {
        display: flex; align-items: center; gap: 12px;
        margin: 1.1rem 0;
        color: var(--ink-ghost);
        font-size: 12px;
    }
    .divider::before, .divider::after {
        content: ''; flex: 1; height: 1px; background: var(--border);
    }

    /* ── Submit ── */
    .btn-submit {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        width: 100%;
        padding: 15px;
        background: var(--accent);
        color: #fff;
        border: none;
        border-radius: var(--rs);
        font-family: inherit;
        font-size: 15px;
        font-weight: 500;
        cursor: pointer;
        letter-spacing: .01em;
        transition: background .15s;
        text-decoration: none;
        margin-top: 1.1rem;
    }
    .btn-submit:hover { background: var(--accent-h); }

    /* ── Security badges ── */
    .sec-badges {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 18px;
        margin-top: .9rem;
        padding-top: .9rem;
        border-top: 1px solid var(--border);
    }
    .sec-b {
        display: flex; align-items: center; gap: 5px;
        font-size: 11px; color: var(--ink-soft);
    }
    .sec-b svg { color: var(--ok); }

    /* ── Order summary ── */
    .summary { position: sticky; top: 88px; }

    .product-list { display: flex; flex-direction: column; gap: 14px; }
    .product-item { display: flex; gap: 12px; align-items: center; }
    .p-img {
        width: 52px; height: 52px;
        border-radius: var(--rs);
        background: var(--surface);
        border: 1px solid var(--border);
        display: flex; align-items: center; justify-content: center;
        font-size: 22px;
        flex-shrink: 0;
        position: relative;
    }
    .qty {
        position: absolute;
        top: -5px; right: -5px;
        width: 18px; height: 18px;
        background: var(--ink);
        color: #fff;
        border-radius: 50%;
        font-size: 10px; font-weight: 600;
        display: flex; align-items: center; justify-content: center;
    }
    .p-info { flex: 1; }
    .p-name { font-size: 13px; font-weight: 500; margin-bottom: 2px; }
    .p-var  { font-size: 12px; color: var(--ink-soft); }
    .p-price { font-size: 14px; font-weight: 500; white-space: nowrap; }

    /* Promo */
    .promo-row { display: flex; gap: 8px; margin: 1.2rem 0; }
    .promo-input {
        flex: 1;
        padding: 9px 14px;
        border: 1.5px solid var(--border);
        border-radius: var(--rs);
        font-family: inherit;
        font-size: 13px;
        color: var(--ink);
        outline: none;
        transition: border-color .15s;
    }
    .promo-input:focus { border-color: var(--accent); }
    .promo-input::placeholder { color: var(--ink-ghost); }
    .btn-promo {
        padding: 9px 16px;
        background: transparent;
        border: 1.5px solid var(--border);
        border-radius: var(--rs);
        font-family: inherit;
        font-size: 13px;
        color: var(--ink-mid);
        cursor: pointer;
        white-space: nowrap;
        transition: all .15s;
    }
    .btn-promo:hover { border-color: var(--accent); color: var(--accent); }

    /* Totals */
    .totals {
        border-top: 1px solid var(--border);
        padding-top: 1rem;
        margin-top: .5rem;
    }
    .total-row {
        display: flex;
        justify-content: space-between;
        font-size: 13px;
        color: var(--ink-mid);
        padding: 5px 0;
    }
    .total-row.grand {
        font-size: 16px;
        font-weight: 600;
        color: var(--ink);
        border-top: 1px solid var(--border);
        margin-top: 8px;
        padding-top: 12px;
    }
    .free-tag {
        font-size: 11px;
        background: var(--ok-bg);
        color: var(--ok);
        padding: 2px 7px;
        border-radius: 20px;
        font-weight: 500;
    }

    /* Trust row */
    .trust-row {
        display: flex;
        align-items: center;
        gap: 10px;
        padding: 12px 1.5rem;
        background: var(--surface);
        border-top: 1px solid var(--border);
    }
    .stars { color: var(--gold); font-size: 13px; letter-spacing: 1px; }
    .trust-txt { font-size: 12px; color: var(--ink-soft); }

    /* ── SBP info box ── */
    .info-box {
        background: var(--accent-lt);
        border: 1px solid #d4cff0;
        border-radius: var(--rs);
        padding: 1rem 1.1rem;
        font-size: 13px;
        color: var(--ink-mid);
        line-height: 1.6;
    }
    .info-box strong { color: var(--accent); }

    /* ── Cash info box ── */
    .info-box.cash {
        background: var(--ok-bg);
        border-color: #b5dccc;
    }
    .info-box.cash strong { color: var(--ok); }

    /* ── Delivery options (CSS radio) ── */
    .delivery-opts { display: flex; flex-direction: column; gap: 10px; margin-bottom: 1.3rem; }
    .d-radio { display: none; }
    .d-radio:checked + .d-lbl {
        border-color: var(--accent);
        background: var(--accent-lt);
    }
    .d-radio:checked + .d-lbl .d-bullet {
        background: var(--accent);
        border-color: var(--accent);
        box-shadow: inset 0 0 0 3px #fff;
    }
    .d-lbl {
        display: flex;
        align-items: center;
        gap: 12px;
        padding: 12px 14px;
        border: 1.5px solid var(--border);
        border-radius: var(--rs);
        cursor: pointer;
        transition: all .15s;
        background: var(--card);
    }
    .d-lbl:hover { border-color: var(--accent); }
    .d-bullet {
        width: 18px; height: 18px;
        border-radius: 50%;
        border: 2px solid var(--ink-ghost);
        flex-shrink: 0;
        transition: all .15s;
    }
    .d-lbl-text { flex: 1; }
    .d-name { font-size: 13px; font-weight: 500; color: var(--ink); }
    .d-desc { font-size: 12px; color: var(--ink-soft); }
    .d-price { font-size: 13px; font-weight: 500; color: var(--ink-mid); white-space: nowrap; }

    /* ── Responsive ── */
    @media (max-width: 720px) {
        main { grid-template-columns: 1fr; }
        .summary { position: static; order: -1; }
        .row.g2 { grid-template-columns: 1fr; }
        .row.g3 { grid-template-columns: 1fr 1fr; }
    }
</style>
