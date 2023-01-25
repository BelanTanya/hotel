<section class="login">
    <div class="admin_form">
        <form enctype="multipart/form-data" method="post">
        <div class="adress_sreet admin_form">
            <p>Название ресторана</p>
            <input type="text" name="title">
        </div>
        <div class="admin_form">
            <input type="file" name="img">
        </div>
        <div class="adress_sreet admin_form">
            <p>Вид кухни</p>
            <div class="adress_time">
                <select name="topic" aria-label="Default select example">
                    <?php foreach($arr as $param):?>
                    <option value="<?=$param['id'];?>"><?=$param['topic'];?></option>
                    <?php endforeach;?>
                </select> 
            </div>
        </div>
        <p class="error"><?php echo $errMsg;?></p>
        <div class="check_wrapper">
            <button type="submit">Опубликовать</button>
        </div>
        </form>
    </div>
</section>