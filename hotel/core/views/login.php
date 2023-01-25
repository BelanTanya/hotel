<section class="login">
    <div class="login_form">
        <form method="post">
        <div class="adress_sreet">
            <p>Логин</p>
            <input type="email" name="login" placeholder="E-mail">
        </div>
        <div class="adress_sreet">
            <p>Пароль</p>
            <input type="password" name="pass">
        </div>
        <p class="error"><?php echo $errMsg;?></p>
        <div class="check_wrapper">
            <button type="submit" name="in">Войти</button>
        </div>
            <a class="reg-btn" href="http://hotel/registr">Регистрация</a>
        </form>
    </div>
</section>