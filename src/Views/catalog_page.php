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
    <a href="/orders">Мои заказы</a>
    <a href="/cart">Корзина</a>

</header>

<div class="container">
    <h1 class="page-title">Каталог товаров</h1>
    <p class="page-subtitle">Найдите то, что вам нравится</p>


    <div class="grid">


        <?php foreach ($products as $product):?>
            <div class="card">

                <div class="card-image">
                    <div class="badge">Новинка</div>
                    <img src="<?php echo $product->getImageUrl();?>">
                </div>
                <div class="card-body">
                    <div class="card-category"><?php echo $product->getName()?></div>
                    <h3 class="card-title"><?php echo $product->getDescription()?></h3>
                    <div class="card-rating">★★★★★ <span>(128)</span></div>
                    <div class="card-footer">
                        <div class="price"><?php echo $product->getPrice()?></div>
                        <button class="add-btn">В корзину</button>
                    </div>
                </div>
            </div>


<!--            <div class="card">-->
<!---->
<!--                <div class="card-image">-->
<!--                    <div class="badge">Новинка</div>-->
<!--                    <img src="--><?php //echo $product->getImageUrl();?><!--">-->
<!--                </div>-->
<!--                <div class="card-body">-->
<!--                    <div class="card-category">--><?php //echo $product->getName()?><!--</div>-->
<!--                    <h3 class="card-title">--><?php //echo $product->getDescription()?><!--</h3>-->
<!--                    <div class="card-rating">★★★★★ <span>(128)</span></div>-->
<!--                    <div class="card-footer">-->
<!--                        <div class="price">--><?php //echo $product->getPrice()?><!--</div>-->
<!--                        <button class="add-btn">В корзину</button>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
            
        <div class="buttons-group">

                    <form action="/product" method="GET">
                        <input type="hidden" name="product_id" placeholder="Ваше product_id" value="<?php echo $product->getId()  ?>">

                        <button class="quantity-btn plus" type="submit">Подробнее про товар</button>

                    </form>

            <form action="/add-product" method="POST">

                <input type="hidden" name="product_id" placeholder="Ваше product_id" value="<?php echo $product->getId()  ?>">


                <input type="hidden" name="amount" placeholder="amount" value="1">

                <button class="quantity-btn plus" type="submit">+</button>

            </form>

            <form action="add-product" method="POST">

                <input type="hidden" name="product_id" placeholder="Ваше product_id" value="<?php echo $product->getId()  ?>">

<!--                <label for="amount">amount </label>-->

                <input type="hidden" name="amount" placeholder="amount" value="-1">


                <button class="quantity-btn minus" type="submit">-</button>

            </form>
        </div>
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
    .quantity-btn {
        padding: 6px 12px;          /* Размеры кнопки */
        background-color: #4CAF50;  /* Цвет фона */
        color: white;               /* Текст */
        border: none;               /* Без рамки */
        border-radius: 4px;         /* Скругление углов */
        cursor: pointer;            /* Курсор-указатель при наведении */
        font-size: 16px;            /* Размер шрифта */
        transition: background-color 0.3s; /* Плавное переключение цвета */
    }

    .quantity-btn:hover {
        background-color: #45a049; /* Более тёмный оттенок при наведении */
    }

    .buttons-group {
        display: flex;             /* Располагаем элементы в строку */
        gap: 8px;                  /* Расстояние между кнопками */
        align-items: center;       /* Выравнивание по вертикали */
    }

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
        font-size: 15px;
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