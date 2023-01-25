
    <section class="photo">
        <div class="photo_albom">
            <div class="photo_item item1">
                <img src="../core/views/img/<?=$arr['tab1']['img'];?>" alt="item1">
                <div class="name name_rest">
                    <h2><?=$arr['tab1']['title'];?></h2>
                </div>
            </div>
            <div class="photo_item item2"><img src="../core/views/img/item2.webp" alt="item1"></div>
            <div class="photo_item item3"><img src="../core/views/img/item3.webp" alt="item1"></div>
            <div class="photo_item item2"><img src="../core/views/img/item4.webp" alt="item1"></div>
            <div class="photo_item item5"><img src="../core/views/img/item5.webp" alt="item1"></div>
        </div>
        <div class="photo_text">
            <p>Публичность данных отношений предполагает, что доверенность установлена договором. Наследование вознаграждает авторский обычай делового оборота, учитывая недостаточную теоретическую проработанность этой отрасли права. Предпринимательский риск добросовестно использует конфиденциальный Указ. Безвозмездное изъятие, в отличие от классического случая, лицензирует суд. Нежилое помещение своевременно исполняет международный обычай делового оборота.
            </p>
        </div>
        <div class="photo_tags">
            <div class="time">
                <img src="../core/views/img/clock.svg" alt="clock">
                <p>30-40 мин</p>
            </div>
            <div class="price">
                <p>Бесплатная доставка от 2000 р.</p>
            </div>
        </div>
    </section>
    <section class="food">
        <div class="food_menu">
            <?php foreach($arr['tab2'] as $param):?>
            <div class="food_soup">
                <div class="restaurants_h">
                    <h1 class="<?=$param['class'];?>"><?=$param['name'];?></h1>
                </div>
                <div class="food_wrapper">
                    <?php foreach($arr['tab3'] as $food):?>
                    <?php if($param['id'] === $food['id_category']):?>
                    <div class="shop">
                            <div class="shop_img">
                                <img src="../core/views/img/<?=$food['img'];?>" alt="shop1">
                            </div>
                            <div class="shop_name">
                                <div class="name soup">
                                    <h2><?=$food['name'];?></h2>
                                </div>
                                <div class="info">
                                    <div class="tag">
                                        <p>300гр</p>
                                    </div>
                                    <div class="time">
                                        <p>30-40 мин</p>
                                    </div>
                                </div>
                                <div class="info">
                                    <div class="price_t">
                                        <p name="price"><?=$food['gr'];?> ₽ </p>
                                    </div>
                                    <button type="submit" name="id" value="<?=$food['id'];?>" class="basket">
                                        <img src="../core/views/img/shopping-cart.svg" alt="shopping-cart">
                                    </button>
                                </div>
                            </div>
                    </div>
                    <?php endif;?>
                    <?php endforeach;?>
                </div>
            </div>
            <?php endforeach;?>
        </div>
        <div class="food_category">
            <div class="category_name">
                <p>Категории</p>
            </div>
            <ul class="category_menu">
                <?php foreach($arr['tab2'] as $param):?>
                <li><a class="<?=$param['class'];?>btn"><?=$param['name'];?></a></li>
                <?php endforeach;?>
                <li><a href="http://hotel/order">Корзина</a></li>
            </ul>
        </div>
    </section>