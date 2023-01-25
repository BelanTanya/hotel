<?php

namespace core;

use PDO;
use PDOException;


class Model
{
    private $db;

    public $errMsg;
    public $routes;
    public $view;
    public $arr;

    public function __construct($routes)
    {   
        $this->connect();
        $this->routes = $routes;
        $this->view = new View($this->routes);

    }

    private function connect(){
        $config = require 'settings/db.php';
        try{
            $this->db = new PDO('mysql:host='.$config['host'].';dbname='.$config['dbname'].'',$config['user'], $config['password'], $config['options']);
            return $this;
            
        }catch (PDOException $i){
            die("Ошибка подключения к базе данных");
        }
    }

    public function listAction(){
        if($_GET['E'] === '1'){
            $text = 'Спасибо!';
        }
        $arr = [
            'text' => $text
        ];
        $this->arr = $arr;
        $this->view->render('',$this->arr);
    }

    public function orderAction(){
        $id_user = ip2long($_SERVER['REMOTE_ADDR']);
        if($_POST && isset($_POST['stonks'])){
            tte($_POST);
        }
        if($_POST && isset($_POST['id'])){
            $del = $_POST;
            $this->del('basket', $del['id']);
            $sum = $this->sumPrice('basket', ['id_user' => $id_user]);
        }else{
            $sum = $this->sumPrice('basket', ['id_user' => $id_user]);
        }
        $basket = $this->selectAll('basket', ['id_user' => $id_user]);

        $arr = [
            'tab1' => $basket,
            'sum' => $sum,
        ];
        $this->arr = $arr;
        $this->view->render('',$this->arr);
    }

    public function restaurantAction(){
        $id_user = ip2long($_SERVER['REMOTE_ADDR']);
        if($_POST){
            $num = $_POST;
            foreach($num as $key => $value){
                $key = trim($key, '"');
            }
            $food = $this->select('food', ['id' => $key]);
            $params = [
                'id' => $food['id'],
                'price' => $food['gr'],
                'id_user' => $id_user,
                'name' => $food['name'],
                'img' => $food['img'],
            ];
            $this->insert('basket', $params);
        }else{
        if($_GET){
            $tab1 = $this->select('rest', ['id' => $_GET['id']]); 
            $tab2 = $this->selectAll('category'); 
            $tab3 = $this->selectAll('food', ['id_rest' => $_GET['id']]); 
            $arr = [
                'tab1' => $tab1,
                'tab2' => $tab2,
                'tab3' => $tab3,
            ];
            $this->arr = $arr;
            $this->view->render('',$this->arr);
        }else{
            echo 'error';
        }
    }
    }

    public function ajaAction(){
        $num = $_POST;
        foreach($num as $key => $value){
            $key = trim($key, '"');
        }
        $like = $this->selectAll('likes', ['id_rest' => $key]);
        foreach($like as $value){
            $k_like = $value;
        }
        if(long2ip($k_like['id_user']) == $_SERVER['REMOTE_ADDR']){
            $this->delete('likes', $k_like['id']);
        }else{
        $id_user = ip2long($_SERVER['REMOTE_ADDR']);
        $params = [
            'id_rest' => $key,
            'id_articles' => '9',
            'id_user' => $id_user
        ];
        $this->insert('likes', $params);
    }
    }


    public function indexAction(){
        $id_user = ip2long($_SERVER['REMOTE_ADDR']);
        $like_tab = $this->selectAll('likes', ['id_user' => $id_user], 'id_rest');
        if($_POST){
            $class = $_POST['btn'];
            $like = '';
            $tab1[] = '';
            $tab3 = $this->selectAll('rest', ['id_topic' => $_POST['btn']]);
        }else{
            $class = '';
            if($like_tab){
                foreach($like_tab as $like){
                    $arr[] = $this->selectAll('rest', ['id' => $like['id_rest']]);
                }
                foreach($arr as $value){
                    foreach($value as $val){
                        $tab1[] = $val; 
                    }
                }
                $like = 'active_h';
            }else{
                $tab1[] = '';
                $like = '';
            }
            $tab3 = $this->selectAll('rest'); 
        }
        $tab2 = $this->selectAll('articles');
        $arr = [
            'tab1' => $tab1,
            'tab2' => $tab2,
            'tab3' => $tab3,
            'class' => $class,
            'like' => $like,
        ]; 
        $this->arr = $arr;
        $this->view->render('',$this->arr);
        
    }

    public function loginAction(){
        if($_POST){
            $login = trim($_POST['login']);
            $pass = trim($_POST['pass']);
    
            if($login === '' || $pass === ''){
                $this->errMsg = 'Не все поля заполнены!';
            }else{
                $exlogin = $this->select('users', ['login' => $login]);
                if(!$exlogin){
                    $this->errMsg = 'Вы не зарегистрированы!';
                }elseif($exlogin['login'] === $login && password_verify($pass, $exlogin['pass'])){
                    $_SESSION['id'] = $exlogin['id'];
                    $_SESSION['login'] = $exlogin['login'];
                    $_SESSION['admin'] = $exlogin['admin'];
                    if($_SESSION['admin'] === '1'){
                        header('location: http://hotel/admin');
                    }else{
                        header('location: http://hotel/');
                    }
            }else{
                $this->errMsg = 'Неверный пароль!';
            }
        }
    }else{
            $login = '';
            $pass = '';
            $this->errMsg = '';
    
    }
        $this->view->render($this->errMsg);
    
    }

    public function logoutAction(){
        unset($_SESSION['id']);
        unset($_SESSION['login']);
        unset($_SESSION['admin']);
        header('location: http://hotel/');
    }

    public function adminAction(){
        if($_POST){
            if (!empty($_FILES['img']['name'])){
                $imgName = $_FILES['img']['name'];
                $fileTmpName = $_FILES['img']['tmp_name'];
                $destination = "core\\views\img\img_prod\\" . $imgName;
        
                $result = move_uploaded_file($fileTmpName, $destination);
        
                    if ($result){
                        $_POST['img'] = $imgName;
                    }else{
                        $this->errMsg = "Ошибка загрузки изображения на сервер";
                    }
                
            }else{
                $this->errMsg = "Ошибка получения картинки";
            }
            $title = trim($_POST['title']);
            
            if($title === '' ){
                $this->errMsg = 'Не все поля заполнены!';
            }else{
                $params = [
                    'title' => $title,
                    'img' => $_POST['img'],
                    'id_topic' => $_POST['topic'],
                ];
                $this->insert('rest', $params);
            }
        }else{
            $title = '';
            $this->errMsg = '';
        }
        $arr = $this->selectAll('articles');
        $this->arr = $arr;
        $this->view->render($this->errMsg, $this->arr);
    }

    public function registrAction(){
        if($_POST){
        $login = trim($_POST['login']);
        $pass = trim($_POST['pass']);
        $pass2 = trim($_POST['pass2']);

        if($login === '' || $pass === '' || $pass2 === ''){
            $this->errMsg = 'Не все поля заполнены!';
        }elseif($pass !== $pass2){
                $this->errMsg = 'Пароли не совпадают!';
        }else{
            $exlogin = $this->select('users', ['login' => $login]);
            if($exlogin){

            $this->errMsg = 'Пользователь с такой почтой уже зарегистрирован!';
        }else{
            $pass2 = password_hash($pass, PASSWORD_DEFAULT);
        
            $params = [
                'login' => $login,
                'pass' => $pass2,
            ];
            $this->insert('users', $params);
        }
    }
    }else{
        $login = '';
        $pass = '';
        $pass2 = '';
        $this->errMsg = '';

    }
    $this->view->render($this->errMsg);
        
    }

    public function insert($table, $params){
        $i = 0;
        $coll = '';
        $mask = '';

        foreach ($params as $key => $value) {
            if($i === 0){
                $coll = $coll . "$key";
                $mask = $mask ."'". $value."'";
            }else{
                $coll = $coll . ", $key";
                $mask = $mask .", '". $value."'";
            }
            $i++;
        }
        $sql = "INSERT INTO $table($coll) VALUES ($mask)";
        $sth = $this->db->prepare($sql);
        return $sth->execute();
        
    }


    public function select($table, $params = []){
        
        $sql = "SELECT * FROM $table";

    if(!empty($params)){
        $i = 0;
        foreach ($params as $key => $value){
            if (!is_numeric($value)){
                $value = "'".$value."'";
            }
            if ($i === 0){
                $sql = $sql . " WHERE $key=$value";
            }else{
                $sql = $sql . " AND $key=$value";
            }
            $i++;
        }
    }
        $sth = $this->db->prepare($sql);
        $sth->execute();
        return $sth->fetch();
    }

    public function selectAll($table, $params = [], $val = '*'){
        
        $sql = "SELECT $val FROM $table";

    if(!empty($params)){
        $i = 0;
        foreach ($params as $key => $value){
            if (!is_numeric($value)){
                $value = "'".$value."'";
            }
            if ($i === 0){
                $sql = $sql . " WHERE $key=$value";
            }else{
                $sql = $sql . " AND $key=$value";
            }
            $i++;
        }
    }
        $sth = $this->db->prepare($sql);
        $sth->execute();
        return $sth->fetchAll();
    }

    public function delete($table, $id){
        $sql = "DELETE FROM $table WHERE id = $id";
        $sth = $this->db->prepare($sql);
        $sth->execute();
    }

    public function del($table, $id){
        $sql = "DELETE FROM $table WHERE id_prod = $id";
        $sth = $this->db->prepare($sql);
        $sth->execute();
    }

    function sumPrice($table, $params = []){
        $i =0;
    $str = '';
    foreach ($params as $key => $value) {
        if($i === 0){
            $str = $str . " WHERE $key=$value";
        }else{
            $str = $str . " AND $key=$value";
        }
        $i++;
        
    }
    
    $sql = "SELECT sum(price) AS summ FROM $table $str";
    $sth = $this->db->prepare($sql);
        $sth->execute();
        return $sth->fetch();
    }
}