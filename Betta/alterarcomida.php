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

if (isset($_GET['id'])) {
    $codigo = $_GET['id'];

    $sql = $pdo->prepare("SELECT * FROM comidas WHERE cod = ?");
    if ($sql->execute(array($codigo))) {
        $info = $sql->fetchALL(PDO::FETCH_ASSOC);
        foreach ($info as $key => $values) {
            $nome = $values['nome'];
            $descricao = $values['descricao'];
            $quantidade = $values['quantidade'];
            $peso = $values['peso'];
            $preco = $values['preco'];
            $pais = $values['pais'];
      
            
        }
    }
}




if (isset($_POST['atualizar'])) {
    $codigo = $_POST['cod'];
    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
    $quantidade = $_POST['quantidade'];
    $peso = $_POST['peso'];
    $preco = $_POST['preco'];
    $pais = $_POST['pais'];

    $sql = $pdo->prepare("UPDATE comidas SET cod=?,nome=?,descricao=?,quantidade=?,peso=?,preco=?,pais=? WHERE cod=?");
    if ($sql->execute(array($codigo, $nome, $descricao, $quantidade, $peso, $preco, $pais, $codigo))) {
        if ($sql->rowCount() > 0) {
            echo 'você alterou seu cadastro';
            header('location:admcomida.php');
        } 
    } else {
        echo 'Dados não alterados';
    }
}
?>


<div style=padding-top:200px;padding-left:2%;>
     
     <h2> altere os dados do prato aqui:</h2>
     <form action="" method="POST">
     <input type="text" name="cod" vaLue="<?php echo $codigo ?>" required hidden>
         <input type="text" name="nome" vaLue="<?php echo $nome ?>" required>
         <br>
         <input type="text" name="descricao" vaLue="<?php echo $descricao ?>" required>
         <br>
         <input type="number" name="quantidade" vaLue="<?php echo $quantidade ?>" required>
         <br>
         <input type="number" name="peso" vaLue="<?php echo $peso ?>" required>
         <br>
         <input type="number" name="preco" vaLue="<?php echo $preco ?>" required>
         <br>
         <input type="text" name="pais" vaLue="<?php echo $pais ?>" required>
         <br>
         <p style="padding-top:10px;"> <input type="submit" class="btn btn-warning" name="atualizar" value="Alterar">
         </p>
     </form>
 </div>
</body>

</html>