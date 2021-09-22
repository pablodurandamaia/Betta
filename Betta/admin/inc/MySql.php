<?php

define('HOME',"http://localhost/betta-PI/betta/Betta/");
define('UPLOAD_FOLDER',realpath(dirname(__DIR__."/../../assets/uploads/")) . "/uploads/");



define('HOST', '10.10.134.157:3308');
define('DB', 'betta-db');
define('USER', 'root');
define('PASS','');
try{
    $pdo = new PDO('mysql:host='.HOST.';dbname='.DB,
    USER,
    PASS,
    array(PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES utf8"));
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (Exception $e){
        echo '<h1>Erro ao conectar banco: '.DB.' </h1>';
        echo'<h6>Mensagem: '.$e->getMessage().'</h6>';
        echo'<br>';
        return false;
    }
