
    <section class="order">
        <div class="restaurants_h">
            <h1>Ваш заказ в «Аджикинежаль» </h1>
        </div>
        <form method="post" action="list/?E=1">
        <div class="order_container">
            <div class="order_adress">
                <div class="adress_box">
                    <div class="adress">
                        <h2>Адрес доставки</h2>
                    </div>
                    <div class="adress_sreet"><input type="text" name="street" placeholder="Улица"></div>
                    <div class="adress_home">
                        <input name="home" type="text" placeholder="Дом">
                        <input name="flat" type="text" placeholder="Кв">
                        <input name="floor" type="text" placeholder="Этаж">
                    </div>
                    <div class="adress">
                        <h2>Время доставки</h2>
                    </div>
                    <div class="adress_time">
                        <select name="topic" aria-label="Default select example">
                                <option>Сегодня</option>
                                <option>Завтра</option>
                        </select> 
                        <select name="time" aria-label="Default select example">
                            <option>13:00 — 14:00</option>
                            <option>16:00 — 18:00</option>
                            <option>20:00 — 21:00</option>
                        </select> 
                    </div>
                    <div class="adress">
                        <h2>Выберите способ оплаты</h2>
                    </div>
                    <div class="adress_pay">
                        <div class="adress_online">
                            <img src="core/views/img/cart.svg" alt="cart">
                            <label for="Choice1">Онлайн оплата</label>
                            <input type="radio" name="pay" id="Choice1" value="online">
                        </div>
                        <div class="adress_cash">
                            <img src="core/views/img/rubl.svg" alt="cart">
                            <label for="Choice2">Наличными</label>
                            <input id="Choice1" type="radio" name="pay" value="cash">
                        </div>
                    </div>
                </div>
            </div>
            <div class="order_check">
                <div class="check_wrapper">
                    <?php foreach($arr['tab1'] as $params):?>
                    <form  method="post">
                    <div class="check_box">
                        <div class="box_img"><img src="core/views/img/<?=$params['img'];?>" alt="s1"></div>
                        <div class="box_name">
                            <p><?=$params['name'];?></p>
                            <p><?=$params['price'];?>P.</p>
                        </div>
                        <div class="box_out">
                            <button class="krest" type="submit" name="id" value="<?=$params['id_prod'];?>"> <img src="core/views/img/clear.svg" alt="clear"></button>
                        </div>
                    </div>
                    </form>
                    <?php endforeach;?>
                    <div class="adress">
                        <h2>Итого к оплате <?=$arr['sum']['summ'];?> р.</h2>
                    </div>
                    <button name="stonks" class="order_btn">Оформить заказ</button>
                </div>
            </div>
        </div>
        </form>
    </section>