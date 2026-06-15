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

<!-- ─ Progress ─ -->
<div class="prog-bar">
    <div class="prog-inner">
        <div class="step done">
            <div class="step-num">
                <svg width="12" height="12" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path d="M5 13l4 4L19 7"/></svg>
            </div>
            Корзина
        </div>
        <div class="step-line done"></div>
        <div class="step active">
            <div class="step-num">2</div>
            Доставка
        </div>
        <div class="step-line"></div>
        <div class="step">
            <div class="step-num">3</div>
            Оплата
        </div>
        <div class="step-line"></div>
        <div class="step">
            <div class="step-num">4</div>
            Готово
        </div>
    </div>
</div>

<!-- ─ Main ─ -->
<main>

    <!-- LEFT -->
    <div>

        <!-- Contact -->
        <div class="card">
            <div class="card-head">
                <div class="icon-box">
                    <svg width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="#4a3f8f" stroke-width="2"><path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                </div>
                <h2>Контактная информация</h2>
            </div>
            <div class="card-body">
                <div class="row">
                    <label class="lbl" for="email">Email</label>
                    <div class="ico-wrap">
           <span class="ico">
             <svg width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
           </span>
                        <input type="email" id="email" name="email" placeholder="you@example.com" autocomplete="email">
                    </div>
                </div>
                <div class="row">
                    <label class="lbl" for="phone">Телефон</label>
                    <div class="ico-wrap">
           <span class="ico">
             <svg width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07A19.5 19.5 0 013.07 9.81a19.79 19.79 0 01-3.07-8.68A2 2 0 012 .15h3a2 2 0 012 1.72c.127.96.361 1.903.7 2.81a2 2 0 01-.45 2.11L6.91 7.91a16 16 0 006.18 6.18l1.27-1.27a2 2 0 012.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0122 14.92z"/></svg>
           </span>
                        <input type="tel" id="phone" name="phone" placeholder="+7 (___) ___-__-__" autocomplete="tel">
                    </div>
                </div>
                <div class="chk-row">
                    <input type="checkbox" id="notify" name="notify" checked>
                    <label for="notify"><span>Отправлять статус заказа на email</span></label>
                </div>
            </div>
        </div>

        <!-- Delivery address -->
        <div class="card">
            <div class="card-head">
                <div class="icon-box">
                    <svg width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="#4a3f8f" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0118 0z"/><circle cx="12" cy="10" r="3"/></svg>
                </div>
                <h2>Адрес доставки</h2>
            </div>
            <div class="card-body">
                <div class="row g2">
                    <div>
                        <label class="lbl" for="fname">Имя</label>
                        <input type="text" id="fname" name="fname" placeholder="Александра" autocomplete="given-name">
                    </div>
                    <div>
                        <label class="lbl" for="lname">Фамилия</label>
                        <input type="text" id="lname" name="lname" placeholder="Соколова" autocomplete="family-name">
                    </div>
                </div>
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
                <div class="row g2">
                    <div>
                        <label class="lbl" for="zip">Индекс</label>
                        <input type="text" id="zip" name="zip" placeholder="123456" autocomplete="postal-code">
                    </div>
                    <div>
                        <label class="lbl" for="country">Страна</label>
                        <div class="sel-wrap">
                            <select id="country" name="country" autocomplete="country">
                                <option>Россия</option>
                                <option>Беларусь</option>
                                <option>Казахстан</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Delivery method (CSS radio) -->
        <div class="card">
            <div class="card-head">
                <div class="icon-box">
                    <svg width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="#4a3f8f" stroke-width="2"><rect x="1" y="3" width="15" height="13" rx="1"/><path d="M16 8h4l3 5v3h-7V8z"/><circle cx="5.5" cy="18.5" r="1.5"/><circle cx="18.5" cy="18.5" r="1.5"/></svg>
                </div>
                <h2>Способ доставки</h2>
            </div>
            <div class="card-body">
                <div class="delivery-opts">
                    <input class="d-radio" type="radio" name="delivery" id="d1" checked>
                    <label class="d-lbl" for="d1">
                        <span class="d-bullet"></span>
                        <span class="d-lbl-text">
             <span class="d-name">Курьером до двери</span>
             <span class="d-desc">3–5 рабочих дней · СДЭК</span>
           </span>
                        <span class="d-price">420 ₽</span>
                    </label>

                    <input class="d-radio" type="radio" name="delivery" id="d2">
                    <label class="d-lbl" for="d2">
                        <span class="d-bullet"></span>
                        <span class="d-lbl-text">
             <span class="d-name">Пункт самовывоза</span>
             <span class="d-desc">2–4 рабочих дня · Ближайший ПВЗ</span>
           </span>
                        <span class="d-price">190 ₽</span>
                    </label>

                    <input class="d-radio" type="radio" name="delivery" id="d3">
                    <label class="d-lbl" for="d3">
                        <span class="d-bullet"></span>
                        <span class="d-lbl-text">
             <span class="d-name">Экспресс-доставка</span>
             <span class="d-desc">Завтра до 14:00</span>
           </span>
                        <span class="d-price">890 ₽</span>
                    </label>
                </div>
            </div>
        </div>

        <!-- Payment (CSS-only tabs) -->
        <div class="card">
            <div class="card-head">
                <div class="icon-box">
                    <svg width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="#4a3f8f" stroke-width="2"><rect x="1" y="4" width="22" height="16" rx="2"/><line x1="1" y1="10" x2="23" y2="10"/></svg>
                </div>
                <h2>Способ оплаты</h2>
            </div>
            <div class="card-body">

                <!-- Hidden radio controls -->
                <input class="pay-tabs" type="radio" name="pay" id="pay-card" checked>
                <input class="pay-tabs" type="radio" name="pay" id="pay-sbp">
                <input class="pay-tabs" type="radio" name="pay" id="pay-cash">

                <!-- Tab labels -->
                <div class="pay-labels">
                    <label class="pay-lbl" for="pay-card">
                        <svg viewBox="0 0 38 24" fill="none"><rect width="38" height="24" rx="4" fill="#f0f0f0"/><rect x="4" y="9" width="30" height="3" rx="1" fill="#c8c8c8"/><rect x="4" y="14" width="8" height="2" rx="1" fill="#c8c8c8"/></svg>
                        Банковская карта
                    </label>
                    <label class="pay-lbl" for="pay-sbp">
                        <svg viewBox="0 0 38 24" fill="none"><rect width="38" height="24" rx="4" fill="#f0f0f0"/><text x="6" y="16" font-size="9" font-weight="700" fill="#7b2fff" font-family="Arial">СБП</text></svg>
                        СБП
                    </label>
                    <label class="pay-lbl" for="pay-cash">
                        <svg viewBox="0 0 38 24" fill="none"><rect width="38" height="24" rx="4" fill="#f0f0f0"/><rect x="6" y="7" width="26" height="10" rx="2" fill="#b5dccc"/><circle cx="19" cy="12" r="3" fill="#2d8a5e"/></svg>
                        При получении
                    </label>
                </div>

                <!-- Tab bodies -->
                <div class="pay-body">

                    <div class="pay-field" id="fields-card">
                        <div class="row">
                            <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:5px;">
                                <label class="lbl" style="margin:0">Номер карты</label>
                                <div class="card-logos">
                                    <div class="card-logo visa">VISA</div>
                                    <div class="card-logo mc">MC</div>
                                </div>
                            </div>
                            <div class="ico-wrap">
               <span class="ico">
                 <svg width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><rect x="1" y="4" width="22" height="16" rx="2"/><line x1="1" y1="10" x2="23" y2="10"/></svg>
               </span>
                                <input type="text" name="card-num" placeholder="0000  0000  0000  0000" autocomplete="cc-number">
                            </div>
                        </div>
                        <div class="row g3">
                            <div>
                                <label class="lbl" for="cc-name">Имя на карте</label>
                                <input type="text" id="cc-name" name="cc-name" placeholder="A SOKOLOVA" autocomplete="cc-name">
                            </div>
                            <div>
                                <label class="lbl" for="cc-exp">Срок</label>
                                <input type="text" id="cc-exp" name="cc-exp" placeholder="ММ / ГГ" autocomplete="cc-exp">
                            </div>
                            <div>
                                <label class="lbl" for="cc-cvc">CVV</label>
                                <input type="text" id="cc-cvc" name="cc-cvc" placeholder="•••" autocomplete="cc-csc">
                            </div>
                        </div>
                        <div class="chk-row">
                            <input type="checkbox" id="save-card" name="save-card">
                            <label for="save-card"><span>Сохранить карту для будущих покупок</span></label>
                        </div>
                    </div>

                    <div class="pay-field" id="fields-sbp">
                        <div class="info-box">
                            <strong>Оплата через Систему быстрых платежей</strong><br>
                            После подтверждения заказа вы получите QR-код или ссылку для оплаты. Деньги спишутся мгновенно.
                        </div>
                    </div>

                    <div class="pay-field" id="fields-cash">
                        <div class="info-box cash">
                            <strong>Оплата наличными или картой</strong><br>
                            Оплатите курьеру или на кассе пункта выдачи. Убедитесь, что у вас есть нужная сумма.
                        </div>
                    </div>

                </div>

                <div class="divider">безопасная оплата</div>

                <div class="chk-row">
                    <input type="checkbox" id="agree" name="agree" required>
                    <label for="agree"><span>Я согласен с <a href="#">условиями оферты</a> и <a href="#">политикой конфиденциальности</a></span></label>
                </div>

                <button type="submit" class="btn-submit">
                    <svg width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
                    Подтвердить заказ — 11 890 ₽
                </button>

                <div class="sec-badges">
                    <div class="sec-b">
                        <svg width="12" height="12" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
                        SSL 256-bit
                    </div>
                    <div class="sec-b">
                        <svg width="12" height="12" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path d="M5 13l4 4L19 7"/></svg>
                        PCI DSS
                    </div>
                    <div class="sec-b">
                        <svg width="12" height="12" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><rect x="3" y="11" width="18" height="11" rx="2"/><path d="M7 11V7a5 5 0 0110 0v4"/></svg>
                        3D Secure
                    </div>
                </div>

            </div>
        </div>

    </div>

    <!-- RIGHT: summary -->
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

                <div class="promo-row">
                    <input class="promo-input" type="text" name="promo" placeholder="Промокод">
                    <button class="btn-promo" type="button">Применить</button>
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
