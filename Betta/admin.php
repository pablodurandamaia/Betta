<?php
include 'menu.php';
include 'admin/inc/MySql.php';

$administrador = $_SESSION['administrador'];

if(empty($_SESSION)){
    header('location: index.php');
}

if($administrador != 1){
    header('location: index.php');
}
?>

    <h2 style=padding-top:200px;padding-bottom:50px;> Confira os dados: </h2>
    <div>
    <input type="button" class="btn btn-warning"  vaLue= "Cadastrar" onclick="parent.location='cadastro.php'">
    </div>
    <br>
    <br>
 

</body>


<?php

//seleciona todos os campos e informaçoes da tabela usuarios e exibe

$sql = $pdo->prepare('SELECT * FROM usuarios');
if ($sql->execute()){
    $info = $sql->fetchALL(PDO::FETCH_ASSOC);

    foreach($info as $key => $values){
        echo 'Id:'.$values['Id_u'].'<br>';
        echo 'Nome:'.$values['nome'].'<br>';
        echo 'Email:'.$values['email'].'<br>';
        echo 'Senha:'.$values['senha'].'<br>';
        echo 'Bairro:'.$values['bairro'].'<br>';
        echo 'Rua:'.$values['rua'].'<br>';
        echo 'Numero:'.$values['numero'].'<br>';
        echo 'CEP:'.$values['cep'].'<br>';
        echo 'Telefone:'.$values['telefone'].'<br>';
        echo 'CPF:'.$values['cpf'].'<br>';

        echo "<a class='btn btn-warning' href='alterarbebida.php?id=".$values['Id_u']."'>Alterar</a>";
        echo "    ";                                        
        echo "<a class='btn btn-warning' href='deletarbebida.php?id=".$values['Id_u']."'>Excluir</a>";
      


        echo '<hr>';
    }
}

?>

