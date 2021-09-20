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

// funçao que recebe informaçoes do formulario pelo metodo POST e insere na tabela bebidas. 
if (isset($_POST['cadastrar'])) {
    $nome = $_POST['nome'];
    $preco = $_POST['preco'];
    $peso = $_POST['peso'];
    $marca = $_POST['marca'];

    $sql = $pdo->prepare("INSERT INTO bebidas (cod_bebi,nome,preco,peso,marca)
                            values (null,?,?,?,?)");
    if ($sql->execute(array($nome, $preco, $peso, $marca))) {
        echo 'Dados cadastrados com sucesso.';
        header('location:admbebida.php');
    } else {
        echo 'Dados não cadastrados!';
    }
}

?>
   
    <div style=padding-top:200px;padding-left:2%;>
     <!-- titulo -->
        <h2> Cadastre aqui novas bebidas:</h2>
        <!-- formulario onde sao inseridas informaçoes "e onde sao cadastradas as bebidas". -->
        <form action="" method="POST">
            <input type="text" name="nome" placeholder="Nome" required>
            <br>
            <input type="text" name="preco" placeholder="Preco(R$)" required>
            <br>
            <input type="number" name="peso" placeholder="Peso(ml)" required>
            <br>
            <input type="text" name="marca" placeholder="Marca" >
            <br>
            <p style="padding-top:10px;"> <input type="submit" class="btn btn-warning" name="cadastrar" value="Cadastrar">
            </p>
        </form>
    </div>
</body>

</html>