<?php

session_start();

if(isset($_GET['logout'])){
    session_destroy();
}

if(isset($_SESSION['logado']) && $_SESSION['logado'] == true){
    @$titulo .= "Delivery Betta: Logado";
} else {
    @$titulo .= "Delivery Betta: Não Logado";
}
