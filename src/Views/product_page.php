<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Бельгийские вафли с жемчужным сахаром — Shoply</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fraunces:opsz,wght@9..144,400;9..144,600;9..144,700&family=Inter:wght@400;500;600&family=JetBrains+Mono:wght@400;500;600&display=swap" rel="stylesheet">

</head>
<body>

<header class="site" id="top">
    <div class="container nav-row">
        <a href="#top" class="brand"><span class="brand-mark">S</span> Shoply</a>

    </div>
</header>

<main>

    <!-- ===== product: photo, name, description, price, rating ===== -->
    <section class="product container" id="product">
        <div class="product-photo">
            <img src="<?php echo $product->getImageUrl() ?>">
        </div>
        <div>
            <h1><?php echo $product->getName() ?></h1>
            <p class="description"><?php echo $product->getDescription() ?></p>

            <div class="rating-row">
                <span class="stars-display lg" style="--rating:4.7">★★★★★</span>
<!--                тоже сделать среднюю оценку и количество отзывов-->
                <span class="rating-num">4.7</span>
                <a href="#reviews" class="rating-count">Отзывы · <?php echo count($reviews)?></a>
            </div>

            <div class="buy-row">
                <span class="price"><?php echo $product->getPrice() ?> ₽ </span>
<!--                <button class="btn btn-primary" type="button">Добавить в корзину</button>-->
                <a href="#add-review" class="btn btn-ghost">Оставить отзыв</a>
            </div>
        </div>
    </section>

    <!-- ===== сделать количество отзывов и количство оценок  ===== -->
    <section class="section container" id="reviews">
        <div class="section-head">
            <p class="eyebrow">Покупатели</p>
            <h2>Отзывы · <?php echo count($reviews)?></h2>
        </div>
<!--доделать этот блок!!!!!!!!!!!!!!!!!!!!!!!!!-->
        <div class="review-summary">
            <div class="score-block">
                <div class="big">4.7</div>
                <span class="stars-display lg" style="--rating:4.7">★★★★★</span>
                <div class="rating-count"><?php  ?></div>
            </div>
            <div class="dist-list">
                <div class="dist-row"><span class="mono">5★</span><span class="bar"><span style="width:67%"></span></span><span class="count">86</span></div>
                <div class="dist-row"><span class="mono">4★</span><span class="bar"><span style="width:22%"></span></span><span class="count">28</span></div>
                <div class="dist-row"><span class="mono">3★</span><span class="bar"><span style="width:7%"></span></span><span class="count">9</span></div>
                <div class="dist-row"><span class="mono">2★</span><span class="bar"><span style="width:2%"></span></span><span class="count">3</span></div>
                <div class="dist-row"><span class="mono">1★</span><span class="bar"><span style="width:2%"></span></span><span class="count">2</span></div>
            </div>
        </div>
<!-- все отзывы товара      -->
        <?php foreach ($reviews as $review) : ?>
        <div class="review-list">
            <article class="review-card">
<!--                вывод первой буквы пользователя-->
                <span class="avatar"></span>
                <div>
                    <div class="review-top">
                        <span class="review-name"><?php $userName = $this->userModel->getBySessionId($review->getUserId());echo $userName->getName(); ?></span>
<!--                       доделать вывод времени создания отзыва -->
                        <time class="review-date" ><?php echo (DateTime::createFromFormat('Y-m-d H:i:s.u', $review->getCreatedAt()))->format('d-m-Y')?></time>
                    </div>
                    <span class="stars-display" style="--rating:5">★★★★★</span>
                    <p class="review-text"><?php echo $review->getReview()?></p>
                </div>
            </article>


        </div>
        <?php endforeach;?>
    </section>

    <!-- ===== add review ===== -->
    <section class="section container" id="add-review">
        <div class="section-head">
            <p class="eyebrow">Ваше мнение</p>
            <h2>Оставить отзыв</h2>
        </div>
<!--отправка отзыва-->
        <form class="form-wrap" action="/product" method="post">
            <div class="field">
                <input type="hidden" id="rv-name" name="user_id" value="<?php echo $user->getId() ?>">
                <input type="hidden" id="rv-product" name="product_id" value="<?php echo $product->getId() ?>">

            </div>

            <fieldset class="field">
                <legend>Оценка</legend>
                <div class="star-input">
                    <input type="radio" id="star5" name="rating" value="5" required><label for="star5" title="5 звёзд">★</label>
                    <input type="radio" id="star4" name="rating" value="4"><label for="star4" title="4 звезды">★</label>
                    <input type="radio" id="star3" name="rating" value="3"><label for="star3" title="3 звезды">★</label>
                    <input type="radio" id="star2" name="rating" value="2"><label for="star2" title="2 звезды">★</label>
                    <input type="radio" id="star1" name="rating" value="1"><label for="star1" title="1 звезда">★</label>
                </div>
            </fieldset>

            <div class="field">
                <label for="rv-text">Текст отзыва</label>
                <textarea id="rv-text" name="review" placeholder="Отзывы пишите сюда" required></textarea>
            </div>

            <button class="btn btn-primary" type="submit">Опубликовать отзыв</button>
        </form>
    </section>

</main>

<footer>
    <div class="container footer-row">
        <span>© 2026 Shoply</span>
        <span>Бесплатная доставка от 1500 ₽ · возврат в течение 14 дней</span>
    </div>
</footer>

</body>
</html>

<style>
    :root{
        --paper:#FFFFFF;
        --card:#FAF8F4;
        --ink:#1C1A17;
        --muted:#6E6457;
        --line:#E8E2D8;
        --accent:#C98A2B;
        --radius:14px;
    }

    *{ box-sizing:border-box; }
    html{ scroll-behavior:smooth; }
    body{
        margin:0; background:var(--paper); color:var(--ink);
        font-family:'Inter',system-ui,sans-serif; line-height:1.6;
        -webkit-font-smoothing:antialiased;
    }
    a{ color:inherit; }
    img{ max-width:100%; display:block; }
    .container{ max-width:980px; margin-inline:auto; padding-inline:24px; }
    .eyebrow{
        font-family:'JetBrains Mono',monospace; text-transform:uppercase;
        letter-spacing:.14em; font-size:.72rem; color:var(--accent); margin:0;
    }
    h1,h2{ font-family:'Fraunces',serif; font-weight:600; margin:0; letter-spacing:-.01em; color:var(--ink); }
    .mono{ font-family:'JetBrains Mono',monospace; }

    /* ---------- header ---------- */
    header.site{
        position:sticky; top:0; z-index:10;
        background:rgba(255,255,255,.92); backdrop-filter:blur(8px);
        border-bottom:1px solid var(--line);
    }
    .nav-row{ display:flex; align-items:center; justify-content:space-between; padding-block:18px; gap:16px; flex-wrap:wrap; }
    .brand{ display:flex; align-items:center; gap:10px; font-family:'Fraunces',serif; font-weight:700; font-size:1.15rem; text-decoration:none; color:var(--ink); }
    .brand-mark{
        width:30px; height:30px; border-radius:9px; flex:none; background:var(--ink);
        display:flex; align-items:center; justify-content:center;
        font-family:'Fraunces',serif; font-size:.9rem; color:var(--paper); font-weight:700;
    }
    nav.links{ display:flex; gap:26px; font-size:.88rem; flex-wrap:wrap; }
    nav.links a{ text-decoration:none; color:var(--muted); transition:color .15s ease; }
    nav.links a:hover, nav.links a:focus-visible{ color:var(--accent); }

    /* ---------- ratings (read-only, CSS-only gradient stars) ---------- */
    .stars-display{
        font-family:Georgia,'Times New Roman',serif; letter-spacing:.12em;
        background-image:linear-gradient(90deg, var(--accent) calc(var(--rating)/5*100%), var(--line) calc(var(--rating)/5*100%));
        -webkit-background-clip:text; background-clip:text; color:transparent;
    }
    .stars-display.lg{ font-size:1.25rem; }

    /* ---------- product ---------- */
    .product{ padding-block:56px 56px; display:grid; grid-template-columns:.9fr 1fr; gap:48px; align-items:center; }
    .product-photo{
        width:100%; aspect-ratio:4/3; border-radius:var(--radius); overflow:hidden;
        border:1px solid var(--line); background:var(--card);
    }
    .product-photo img{ width:100%; height:100%; object-fit:cover; }
    .product h1{ font-size:clamp(2rem,3.6vw,2.7rem); margin-block:10px 16px; line-height:1.08; }
    .description{ color:var(--muted); font-size:1.02rem; max-width:50ch; margin:0 0 24px; }
    .rating-row{ display:flex; align-items:center; gap:10px; margin-bottom:24px; flex-wrap:wrap; }
    .rating-num{ font-family:'JetBrains Mono',monospace; font-weight:600; }
    .rating-count{ color:var(--muted); font-size:.9rem; text-decoration:none; }
    .rating-count:hover{ color:var(--accent); }
    .buy-row{ display:flex; align-items:center; gap:16px; flex-wrap:wrap; }
    .price{ font-family:'JetBrains Mono',monospace; font-size:1.6rem; color:var(--ink); }
    .price small{ color:var(--muted); font-size:.8rem; font-weight:400; font-family:'Inter',sans-serif; }
    .btn{
        font-family:'Inter',sans-serif; font-weight:600; font-size:.95rem;
        padding:14px 28px; border-radius:999px; border:1px solid transparent;
        cursor:pointer; transition:transform .15s ease, border-color .15s ease, color .15s ease, background .15s ease;
        text-decoration:none; display:inline-block;
    }
    .btn-primary{ background:var(--ink); color:var(--paper); }
    .btn-primary:hover, .btn-primary:focus-visible{ transform:translateY(-2px); }
    .btn-ghost{ background:transparent; border-color:var(--line); color:var(--ink); }
    .btn-ghost:hover, .btn-ghost:focus-visible{ border-color:var(--accent); color:var(--accent); }

    /* ---------- generic sections ---------- */
    .section{ padding-block:56px; border-top:1px solid var(--line); }
    .section-head{ margin-bottom:32px; }
    .section-head h2{ font-size:1.7rem; margin-top:8px; }

    /* ---------- review summary ---------- */
    .review-summary{
        display:grid; grid-template-columns:auto 1fr; gap:48px; align-items:center;
        background:var(--card); border:1px solid var(--line); border-radius:var(--radius);
        padding:32px; margin-bottom:36px;
    }
    .score-block{ text-align:center; }
    .score-block .big{ font-family:'Fraunces',serif; font-size:3rem; line-height:1; }
    .dist-row{ display:grid; grid-template-columns:30px 1fr 34px; gap:12px; align-items:center; font-size:.85rem; margin-block:7px; }
    .dist-row .bar{ height:8px; border-radius:999px; background:var(--line); overflow:hidden; }
    .dist-row .bar > span{ display:block; height:100%; background:var(--accent); }
    .dist-row .count{ color:var(--muted); text-align:right; font-family:'JetBrains Mono',monospace; }

    /* ---------- review cards ---------- */
    .review-list{ display:grid; gap:16px; }
    .review-card{
        background:var(--card); border:1px solid var(--line); border-radius:var(--radius);
        padding:24px; display:grid; grid-template-columns:44px 1fr; gap:18px;
    }
    .avatar{
        width:44px; height:44px; border-radius:50%; flex:none;
        display:flex; align-items:center; justify-content:center;
        font-family:'JetBrains Mono',monospace; font-weight:600; font-size:.85rem; color:var(--paper);
    }
    .review-card:nth-of-type(3n+1) .avatar{ background:var(--accent); }
    .review-card:nth-of-type(3n+2) .avatar{ background:var(--ink); }
    .review-card:nth-of-type(3n)   .avatar{ background:var(--muted); }
    .review-top{ display:flex; flex-wrap:wrap; align-items:baseline; justify-content:space-between; gap:8px; margin-bottom:6px; }
    .review-name{ font-weight:600; }
    .review-date{ font-family:'JetBrains Mono',monospace; font-size:.78rem; color:var(--muted); }
    .review-card .stars-display{ font-size:.95rem; display:block; margin-bottom:8px; }
    .review-text{ margin:0; color:var(--ink); font-size:.95rem; }

    /* ---------- add review form ---------- */
    .form-wrap{
        background:var(--card); border:1px solid var(--line); border-radius:var(--radius);
        padding:36px; max-width:640px;
    }
    .field, fieldset.field{ margin:0 0 22px; border:0; padding:0; }
    .field > label, .field > legend{
        display:block; font-family:'JetBrains Mono',monospace; text-transform:uppercase;
        letter-spacing:.06em; font-size:.72rem; color:var(--muted); margin-bottom:10px; padding:0;
    }
    .field > input[type="text"], .field > textarea{
        width:100%; background:var(--paper); border:1px solid var(--line); border-radius:8px;
        padding:12px 14px; color:var(--ink); font-family:'Inter',sans-serif; font-size:.95rem;
    }
    .field > textarea{ resize:vertical; min-height:110px; }
    .field > input:focus-visible, .field > textarea:focus-visible{ outline:none; border-color:var(--accent); }

    .star-input{ display:flex; flex-direction:row-reverse; justify-content:flex-end; gap:4px; width:fit-content; }
    .star-input input{ position:absolute; opacity:0; width:0; height:0; }
    .star-input label{ font-size:1.9rem; color:var(--line); cursor:pointer; line-height:1; transition:color .12s ease; }
    .star-input label:hover,
    .star-input label:hover ~ label,
    .star-input input:checked ~ label{ color:var(--accent); }
    .star-input input:focus-visible + label{ outline:2px solid var(--accent); outline-offset:3px; border-radius:4px; }

    .form-note{ font-size:.82rem; color:var(--muted); margin:14px 0 0; }

    /* ---------- footer ---------- */
    footer{ border-top:1px solid var(--line); padding-block:32px; margin-top:8px; }
    .footer-row{ display:flex; justify-content:space-between; flex-wrap:wrap; gap:10px; color:var(--muted); font-size:.85rem; }

    /* ---------- responsive ---------- */
    @media (max-width:700px){
        .product{ grid-template-columns:1fr; }
        .review-summary{ grid-template-columns:1fr; text-align:center; }
        .review-summary .dist-row{ text-align:left; }
    }
</style>