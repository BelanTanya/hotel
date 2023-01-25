<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Satisfy&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../core/views/css/style.css">
    <?php echo $style;?>
    <title>Document</title>
</head>
<body>
    <header>
        <div class="header_hed">
            <div class="header_container">
                <div class="header_logo">
                    <img src="../core/views/img/logo.webp" alt="logo">
                </div>
                <div class="header_nav">
                    <ul class="nav">
                        <li><a href="#">Новосибирск</a></li>
                        <li><a href="#">Мобильное приложение</a></li>
                        <li><a href="#">Помощь</a></li>
                    </ul>
                </div>
            </div>
            <div class="header_block">
                <div class="header_search">
                </div>
                <div class="header_login">
                    <a href="<?=$link;?>"><button><?=$name;?></button></a>
                </div>
            </div>
        </div>
        <div class="header_menu">
            <div class="header_burger">
                <div class="burger_line">
                    <span></span>
                </div>
                <div class="burger_menu">
                    <p class="btn">Меню</p>
                </div>
            </div>
            <ul class="menu">
                <li><a href="http://hotel/">Главная</a></li>
                <li><a href="http://hotel/order">Корзина</a></li>
                <li><a href="#">Обучение</a></li>
                <li><a href="#">Здоровье и медицина</a></li>
                <li><a href="#">Бытовые услуги</a></li>
                <li><a href="#">Досуг и отдых</a></li>
                <li><a href="#">Другой бизнес</a></li>
                <li><a href="#">Рестораны</a></li>
            </ul>
        </div>
    </header>