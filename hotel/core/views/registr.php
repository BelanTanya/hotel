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
        <div class="adress_sreet">
            <p>Пароль</p>
            <input type="password" name="pass2">
        </div>
        <p class="error"><?php echo $errMsg;?></p>
        <div class="check_wrapper">
            <button type="submit" name="in">Регистрация</button>
        </div>
        </form>
    </div>
</section>