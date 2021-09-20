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

<!-- titulo -->
    <h2 style=padding-top:200px;padding-bottom:50px;> Confira os dados: </h2>
    <div>
        <!-- botao para cadastrar novas comidas-->
        <input type="submit" name="cadastrar" id="cadastrar" class="btn btn-warning" onclick="parent.location='cadcomida.php'" value="Cadastrar">
    </div>
    <br>
    <br>
</body>


<?php
//seleciona todos os campos e informaçoes da tabela comidas e exibe na tela 
$sql = $pdo->prepare('SELECT * FROM comidas');
if ($sql->execute()){
    $info = $sql->fetchALL(PDO::FETCH_ASSOC);

    foreach($info as $key => $values){
        echo 'Id:'.$values['cod'].'<br>';
        echo 'Nome:'.$values['nome'].'<br>';
        echo 'Descrição:'.$values['descricao'].'<br>';
        echo 'Quantidade:'.$values['quantidade'].'<br>';
        echo 'Peso(g):'.$values['peso'].'<br>';
        echo 'Preço(R$):'.$values['preco'].'<br>';
        echo 'País:'.$values['pais'].'<br>';

        echo "<a class='btn btn-warning' href='alterarcomida.php?id=".$values['cod']."'>Alterar</a>";
        echo "   ";
        echo "<a class='btn btn-warning' href='deletarcomida.php?id=".$values['cod']."'>Excluir</a>";
      


        echo '<hr>';
    }
}

?>



</body>
</html>

