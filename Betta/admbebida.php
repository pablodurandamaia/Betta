<?php
//inclui o menu
include 'menu.php';
//inclui o banco de dados
include 'admin/inc/MySql.php';

//verifica se a conta é adm
$administrador = $_SESSION['administrador'];

if(empty($_SESSION)){
    header('location: index.php');
}

if($administrador != 1){
    header('location: index.php');
}

?>

<!-- titulo -->
    <h2 style=padding-top:200px;padding-bottom:50px;> Confira os dados: </h2>
    <div>
        <!-- botao direcionando para cadastrar novas bebidas-->
        <input type="submit" name="cadastrar" id="cadastrar" class="btn btn-warning" onclick="parent.location='cadbebida.php'" value="Cadastrar">
    </div>
    <br>
    <br>
</body>


<?php

//seleciona todos os campos e informaçoes da tabela bebidas e exibe na tela
$sql = $pdo->prepare('SELECT * FROM bebidas');
if ($sql->execute()){
    $info = $sql->fetchALL(PDO::FETCH_ASSOC);

    foreach($info as $key => $values){
        echo 'Id:'.$values['cod_bebi'].'<br>';
        echo 'Nome:'.$values['nome'].'<br>';
        echo 'Preço(R$):'.$values['preco'].'<br>';
        echo 'Peso(ml):'.$values['peso'].'<br>';
        echo 'Marca:'.$values['marca'].'<br>';

        echo "<a class='btn btn-warning' href='alterarbebida.php?id=".$values['cod_bebi']."'>Alterar</a>";
        echo "    ";                                        
        echo "<a class='btn btn-warning' href='deletarbebida.php?id=".$values['cod_bebi']."'>Excluir</a>";
      


        echo '<hr>';
    }
}

?>


</body>
</html>