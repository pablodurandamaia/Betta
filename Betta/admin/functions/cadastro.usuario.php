<?php


    include_once(dirname(__FILE__) . "./../inc/MySql.php");

    if(isset($_POST['cadastrar'])){
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $bairro = $_POST['bairro'];
        $rua = $_POST['rua'];
        $num = $_POST['numero'];
        $cep = $_POST['cep'];
        $tel = $_POST['telefone'];
        
        $sql = $pdo->prepare("SELECT * FROM usuarios WHERE email = ?");
        if ($sql->execute(array($email))){
            if ($sql->rowCount() > 0){
                echo'<script type="text/javascript">
                    window.alert("Usuário já existe!!!")
                    </script>';
            } else {    
                $sql = $pdo->prepare("INSERT INTO usuarios (id_u,nome,email,senha,telefone,bairro,rua,numero,cep)
                                    values (null,?,?,?,?,?,?,?,?)");
                if ($sql->execute(array($nome, $email, $senha, $tel, $bairro, $rua, $num, $cep))){
                    echo 'Dados cadastrados com sucesso.';
                    header('location:login.php');
                } else {
                    echo 'Dados não encontrados!!';
                }                       
            }
        }
    }                    
