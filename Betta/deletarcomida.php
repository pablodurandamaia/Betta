<?php

//include 'menu.php';
include 'admin/inc/MySql.php';


    if(isset($_GET['id'])){
        $codigo = $_GET['id'];

        $sql = $pdo->prepare("DELETE FROM comidas WHERE cod = ?");

        if($sql->execute(array($codigo))){
            if ($sql->rowCount() > 0){
                echo 'Aluno excluído com sucesso!';
                header('location:admcomida.php');
            } else {
                echo 'Código não localizado';
            } 
        }           
    }   
?>