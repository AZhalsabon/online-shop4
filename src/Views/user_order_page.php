<!DOCTYPE html>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Мои заказы</title>
</head>
<body>
<div class="container">

    <a href="/profile">Мой профиль</a>
    <a href="/orders">Мои заказы</a>
    <a href="/cart">Корзина</a>
    <a href="/catalog">Каталог</a>

    <div class="header">
        <h1>Мои заказы</h1>
        <span><?= count($allOrders) ?> заказов</span>
    </div>



    <div class="orders">

        <?php foreach ($allOrders as $order): ?>

            <!-- Заказ -->
            <div class="order">
                <div class="order-top">
                    <div>
                        <div class="order-title">
                            <span>Заказ <?= $order['id'] ?></span>
                        </div>
                    </div>
                </div>

                <?php foreach ($order['order_products'] as $product): ?>
                    <div class="items">
                        <div class="item">
                            <div class="item-img">👟</div>
                            <div class="item-info">
                                <div class="item-name"><?= htmlspecialchars($product['product_name']) ?></div>
                                <div class="item-qty"><?= htmlspecialchars($product['description']) ?></div>
                            </div>
                            <div class="item-price">кол:<?php echo $product['amount']?> * <?= htmlspecialchars($product['price']) ?> ₽</div>
                        </div>
                    </div>
                    <hr class="divider" />

                <?php endforeach; ?>

                <div class="order-footer">
                    <span class="label">Итого</span>
                    <span class="order-total"><?= htmlspecialchars($order['total_price']) ?> ₽</span>
                </div>
            </div>

        <?php endforeach; ?>

    </div>
</div>
</body>
</html>
<!--<html lang="ru">-->
<!--<head>-->
<!--    <meta charset="UTF-8">-->
<!--    <meta name="viewport" content="width=device-width, initial-scale=1.0">-->
<!--    <title>Мои заказы</title>-->
<!---->
<!--</head>-->
<!--<body>-->
<!--<div class="container">-->
<!---->
<!--    <div class="header">-->
<!--        <h1>Мои заказы</h1>-->
<!--        <span>4 заказа</span>-->
<!--    </div>-->
<!---->
<!--    <div class="filters">-->
<!--        <div class="filter-btn active">Все</div>-->
<!--        <div class="filter-btn">В доставке</div>-->
<!--        <div class="filter-btn">Доставлено</div>-->
<!--        <div class="filter-btn">Отменено</div>-->
<!--    </div>-->
<!---->
<!--    <div class="orders">-->
<!---->
<!--        --><?php // foreach ($allOrders as $orderProduct):?>
<!---->
<!--        <!-- Заказ 1: В доставке -->-->
<!--        < class="order">-->
<!--            <div class="order-top">-->
<!--                <div>-->
<!--                    <div class="order-title">-->
<!--                        <span>Заказ --><?php //echo$orderProduct['order_id']?><!--</span>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--            --><?php //foreach ($orderProduct['order_products'] as $product): ?>
<!--            <div class="items">-->
<!--                <div class="item">-->
<!--                    <div class="item-img">👟</div>-->
<!--                    <div class="item-info">-->
<!--                        <div class="item-name">--><?php //$product['name']?><!--</div>-->
<!--                        <div class="item-qty">--><?php //$product['description']?><!--</div>-->
<!--                    </div>-->
<!--                    <div class="item-price">--><?php //$product['price']?><!--</div>-->
<!--                </div>-->
<!--            </div>-->
<!--            <hr class="divider">-->
<!--            <div class="order-footer">-->
<!--                <span class="label">Итого</span>-->
<!--                <span class="order-total">--><?php //$product['total_price']?><!--</span>-->
<!--            </div>-->
<!--        --><?php //endforeach; ?>
<!--        </div>-->
<!--        --><?php //endforeach;?>
<!--    </div>-->
<!--</div>-->
<!--</body>-->
<!--</html>-->

<style>
    *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

    body {
        font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
        background: #f5f5f3;
        color: #1a1a18;
        min-height: 100vh;
        padding: 2rem 1rem;
    }

    .container {
        max-width: 680px;
        margin: 0 auto;
    }

    .header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 1.5rem;
    }

    .header h1 {
        font-size: 22px;
        font-weight: 500;
    }

    .header span {
        font-size: 13px;
        color: #888780;
    }

    .filters {
        display: flex;
        gap: 8px;
        margin-bottom: 1.25rem;
        flex-wrap: wrap;
    }

    .filter-btn {
        font-size: 13px;
        padding: 5px 14px;
        border-radius: 999px;
        border: 0.5px solid #b4b2a9;
        background: #fff;
        color: #888780;
        cursor: pointer;
    }

    .filter-btn.active {
        background: #E6F1FB;
        color: #185FA5;
        border-color: #185FA5;
    }

    .orders {
        display: flex;
        flex-direction: column;
        gap: 10px;
    }

    .order {
        background: #fff;
        border: 0.5px solid #d3d1c7;
        border-radius: 12px;
        padding: 1rem 1.25rem;
    }

    .order-top {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        margin-bottom: 10px;
    }

    .order-title {
        display: flex;
        align-items: center;
        gap: 10px;
        margin-bottom: 2px;
    }

    .order-title span {
        font-size: 15px;
        font-weight: 500;
    }

    .order-date {
        font-size: 12px;
        color: #888780;
    }

    .badge {
        font-size: 11px;
        font-weight: 500;
        padding: 3px 10px;
        border-radius: 999px;
    }

    .badge.delivered  { background: #EAF3DE; color: #3B6D11; }
    .badge.shipping   { background: #E6F1FB; color: #185FA5; }
    .badge.processing { background: #FAEEDA; color: #854F0B; }
    .badge.cancelled  { background: #FCEBEB; color: #A32D2D; }

    .action-link {
        font-size: 13px;
        color: #185FA5;
        display: flex;
        align-items: center;
        gap: 4px;
        text-decoration: none;
        white-space: nowrap;
    }

    .action-link.muted { color: #888780; }

    .items {
        display: flex;
        flex-direction: column;
        gap: 8px;
        margin-bottom: 12px;
    }

    .item {
        display: flex;
        gap: 12px;
        align-items: center;
    }

    .item-img {
        width: 44px;
        height: 44px;
        border-radius: 8px;
        background: #f5f5f3;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
        font-size: 20px;
    }

    .item-info {
        flex: 1;
        min-width: 0;
    }

    .item-name {
        font-size: 14px;
        font-weight: 500;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .item-qty {
        font-size: 12px;
        color: #888780;
    }

    .item-price {
        font-size: 14px;
        font-weight: 500;
        flex-shrink: 0;
    }

    .item-price.cancelled {
        color: #888780;
        text-decoration: line-through;
    }

    .divider {
        border: none;
        border-top: 0.5px solid #d3d1c7;
        margin: 10px 0;
    }

    .order-footer {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .order-footer .label {
        font-size: 13px;
        color: #888780;
    }

    .order-total {
        font-size: 16px;
        font-weight: 500;
    }

    .order-total.cancelled {
        color: #888780;
    }

    @media (prefers-color-scheme: dark) {
        body { background: #1a1a18; color: #f1efe8; }
        .order { background: #2c2c2a; border-color: #444441; }
        .item-img { background: #444441; }
        .filter-btn { background: #2c2c2a; color: #b4b2a9; border-color: #5f5e5a; }
        .filter-btn.active { background: #0C447C; color: #B5D4F4; border-color: #378ADD; }
        .divider { border-color: #444441; }
    }
</style>