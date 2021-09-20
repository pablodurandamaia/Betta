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

// funçao que recebe informaçoes do formulario pelo metodo POST e insere na tabela comidas. 
if (isset($_POST['cadastrar'])) {
    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
    $quantidade = $_POST['quantidade'];
    $peso = $_POST['peso'];
    $preco = $_POST['preco'];
    $pais = $_POST['pais'];

    $sql = $pdo->prepare("INSERT INTO comidas (cod,nome,descricao,quantidade,peso,preco,pais)
                            values (null,?,?,?,?,?,?)");
    if ($sql->execute(array($nome, $descricao, $quantidade, $peso, $preco, $pais))) {
        echo 'Dados cadastrados com sucesso.';
        header('location:admcomida.php');
    } else {
        echo 'Dados não cadastrados!';
    }
}

?>
 
    <div style=padding-top:200px;padding-left:2%;>
      <!-- titulo -->
        <h2> Cadastre aqui novas comidas:</h2>
           <!-- formulario onde sao inseridas informaçoes "e onde sao cadastradas as comidas". -->
        <form action="" method="POST">
            <input type="text" name="nome" placeholder="Nome" required>
            <br>
            <input type="text" name="descricao" placeholder="Descrição" required>
            <br>
            <input type="number" name="quantidade" placeholder="Quantidade" required>
            <br>
            <input type="number" name="peso" placeholder="Peso(g)" required>
            <br>
            <input type="number" name="preco" placeholder="Preço(R$)" required>
            <br>
            <input type="text" name="pais" placeholder="País" required>
            <br>
            <p style="padding-top:10px;"> <input type="submit" class="btn btn-warning" name="cadastrar" value="Cadastrar">
            </p>
        </form>
    </div>
</body>

</html>
