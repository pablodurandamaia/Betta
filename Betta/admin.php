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
</body>


<?php

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

        echo "<a href='alterar.php?id=".$values['Id_u']."'>(Alterar)</a>";
        echo "<a href='deletar.php?id=".$values['Id_u']."'>(Excluir)</a>";
      


        echo '<hr>';
    }
}

?>

<input type="button" class="btn btn-warning"  vaLue= "Cadastrar" onclick="parent.location='cadastro.php'">