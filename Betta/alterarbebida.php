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

    $sql = $pdo->prepare("SELECT * FROM bebidas WHERE cod_bebi = ?");
    if ($sql->execute(array($codigo))) {
        $info = $sql->fetchALL(PDO::FETCH_ASSOC);
        foreach ($info as $key => $values) {
            $nome = $values['nome'];
            $preco = $values['preco'];
            $peso = $values['peso'];
            $marca = $values['marca'];
  
      
            
        }
    }
}




if (isset($_POST['atualizar'])) {
    $codigo = $_POST['cod_bebi'];
    $nome = $_POST['nome'];
    $preco = $_POST['preco'];
    $peso = $_POST['peso'];
    $marca = $_POST['marca'];
   
    $sql = $pdo->prepare("UPDATE bebidas SET cod_bebi=?,nome=?,preco=?,peso=?,marca=? WHERE cod_bebi=?");
    if ($sql->execute(array($codigo, $nome, $preco, $peso, $marca, $codigo))) {
        if ($sql->rowCount() > 0) {
            echo 'você alterou seu cadastro';
            header('location:admbebida.php');
        } 
    } else {
        echo 'Dados não alterados';
    }
}
?>


<div style=padding-top:200px;padding-left:2%;>
     
     <h2> altere os dados da bebida aqui:</h2>
     <form action="" method="POST">
     <input type="text" name="cod_bebi" vaLue="<?php echo $codigo ?>" required hidden>
         <input type="text" name="nome" vaLue="<?php echo $nome ?>" required>
         <br>
         <input type="number" name="preco" vaLue="<?php echo $preco ?>" required>
         <br>
         <input type="number" name="peso" vaLue="<?php echo $peso ?>" required>
         <br>
         <input type="text" name="marca" vaLue="<?php echo $marca ?>" required>
         <br>
         <p style="padding-top:10px;"> <input type="submit" class="btn btn-warning" name="atualizar" value="Alterar">
         </p>
     </form>
 </div>
</body>

</html>