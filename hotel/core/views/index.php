
    <section class="restaurants">
            <div class="restaurants_h">
                <h1>Все рестораны </h1>
            </div>
            <div class="restaurants_filter">
                <div class="restaurants_item"><a href="http://hotel/"><button class="filter_btn">Все рестораны</button></a></div>
                <?php foreach($arr['tab2'] as $param):?>
                <form method="post">
                <?php ($arr['class'] === $param['id']) ? $class = 'activeBtn': $class = '';?>
                <div class="restaurants_item"><button class="filter_btn <?=$class;?>" name="btn" value="<?=$param['id'];?>"><?=$param['topic'];?></button></div>
                </form>
                <?php endforeach;?>
            </div>
            <div class="restaurants_shop">
                <?php if($arr['tab1'][0]):?>
                <?php foreach($arr['tab1'] as $param):?>
                <div class="shop">
                    <div class="shop_img">
                        <a href="http://hotel/restaurant/?id=<?=$param['id'];?>"><img src="core/views/img/img_prod/<?=$param['img'];?>" alt="shop1"></a>
                        <div class="heart">
                            <svg class="like <?=$arr['like'];?>" value="<?=$param['id'];?>" xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="none"><path stroke="#FFFFFF" stroke-linecap="round" stroke-width="2" d="M14.833 8.878a1 1 0 0 0 1.43 0l1.636-1.674a6.528 6.528 0 1 1 9.335 9.128L15.548 28.284 3.86 16.332a6.528 6.528 0 0 1 9.335-9.128l1.637 1.674Z"/></svg>
                        </div>
                    </div>
                    <div class="shop_name">
                        <div class="name">
                            <h2><?=$param['title'];?></h2>
                        </div>
                        <div class="info">
                            <div class="tag">
                                <?php foreach($arr['tab2'] as $val):?>
                                <?php if($val['id'] === $param['id_topic']):?>
                                <p><?=$val['topic'];?></p>
                                <?php endif;?>
                                <?php endforeach;?>
                            </div>
                            <div class="time">
                                <img src="core/views/img/clock.svg" alt="clock">
                                <p>30-40 мин</p>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach;?>
                <?php endif;?>
            </div>
            <div class="restaurants_shop">
                <?php foreach($arr['tab3'] as $param):?>
                <div class="shop">
                    <div class="shop_img">
                        <a href="http://hotel/restaurant/?id=<?=$param['id'];?>"><img src="core/views/img/img_prod/<?=$param['img'];?>" alt="shop1"></a>
                        <div class="heart">
                            <svg class="like" value="<?=$param['id'];?>" xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="none"><path stroke="#FFFFFF" stroke-linecap="round" stroke-width="2" d="M14.833 8.878a1 1 0 0 0 1.43 0l1.636-1.674a6.528 6.528 0 1 1 9.335 9.128L15.548 28.284 3.86 16.332a6.528 6.528 0 0 1 9.335-9.128l1.637 1.674Z"/></svg>
                        </div>
                    </div>
                    <div class="shop_name">
                        <div class="name">
                            <h2><?=$param['title'];?></h2>
                        </div>
                        <div class="info">
                            <div class="tag">
                                <?php foreach($arr['tab2'] as $val):?>
                                <?php if($val['id'] === $param['id_topic']):?>
                                <p><?=$val['topic'];?></p>
                                <?php endif;?>
                                <?php endforeach;?>
                            </div>
                            <div class="time">
                                <img src="core/views/img/clock.svg" alt="clock">
                                <p>30-40 мин</p>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach;?>
            </div>
            <div class="restaurants_page">
                <button>1</button>
                <button>2</button>
                <button>3</button>
                <button>4</button>
                <button>5</button>
                <button>далее</button>
            </div>
    </section>