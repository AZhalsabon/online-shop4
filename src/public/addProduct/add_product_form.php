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

    <form action="/add-product" method="POST">
        <label for="name">Product-id</label>
        <?php if (isset($errors['product_id'])):?>
            <label style="color: red"><?php echo $errors['product_id']?></label>
        <?php endif; ?>
        <input type="text" name="product_id" placeholder="Ваше product_id" required>

        <label for="amount">кол</label>
        <?php if (isset($errors['amount'])):?>
            <label style="color: red"><?php echo $errors['amount']?></label>
        <?php endif; ?>
        <input type="text" name="amount" placeholder="amount" required>




        <button type="submit">add product</button>
    </form>

</div>
</body>
</html>