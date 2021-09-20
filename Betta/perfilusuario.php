<?php
include "menu.php";
include_once(dirname(__FILE__) . '/admin/inc/MySql.php');
?>

<link rel="stylesheet" href="perfil.css">


<section>
  <hr />
  <div class="baixo meio">
    <h1>Seu perfil</h1>
  </div>

  <?php

  if (isset($_GET['Id_u'])) {
    $codigo = $_GET['Id_u'];

    $sql = $pdo->prepare("SELECT * FROM usuarios WHERE Id_u =" . $_SESSION['Id_u']);
    if ($sql->execute(array($codigo))) {
      $info = $sql->fetchALL(PDO::FETCH_ASSOC);
      foreach ($info as $key => $values) {
        $imagem = $values['imagem'];
      }
    }
  }




  if (isset($_POST['salvar'])) {
    $codigo = $_POST['Id_u'];
    $imagem = $_POST['imagem'];


    $sql = $pdo->prepare("UPDATE usuarios SET Id_u=?,imagem=? WHERE Id_u=?");
    if ($sql->execute(array($codigo, $imagem))) {
      if ($sql->rowCount() > 0) {
        echo 'você alterou sua imagem com sucesso';
        header('location:perfilusuario.php');
      }
    } else {
      echo 'Dados não alterados';
    }
  }


  ?>

  <?php
  $filtro = 'SELECT * FROM usuarios WHERE Id_u = ' . $_SESSION['Id_u'];

  foreach ($pdo->query($filtro) as $row) {
    $nome = ($row['nome']);
    $email = ($row['email']);
    $senha = ($row['senha']);
    $bairro = ($row['bairro']);
    $rua = ($row['rua']);
    $numero = ($row['numero']);
    $cep = ($row['cep']);
    $telefone = ($row['telefone']);
    $imagem = '<img style="width:150px;height:150px;" src="data:image/png;base64,' . base64_encode($row['imagem']) . '">';
  ?>
    <hr>
    <div class="card-deck" style="margin: 0 450px 0 450px;
">
      <div class="card">
        <div style="margin: 0 auto; border-radius: 100%;">
          <?php echo $imagem  ?>
        </div>
        <!--  <form action="">
           <input type="file" name="fields_upload[multi_edit][0][bf19122987928493131d5bf846637fbc]" class="textfield noDragDrop" id="field_11_3" size="10" onchange="return verificationsAfterFieldChange('bf19122987928493131d5bf846637fbc', '0','blob')">
          <input type="submit" name="salvar" id="salvar" class="btn btn-warning" value="Salvar">
        </form>-->
        <div class="card-footer">
          <p class="card-text"><?php echo 'Nome: ' . $nome ?></p>
        </div>
        <div class="card-body">
          <p class="card-text"><?php echo 'Email: ' . $email ?></p>
          <!--<p class="card-text"><?php //echo $senha 
                                    ?></p>-->
        </div>
        <div class="card-footer">
          <p class="card-text"><?php echo 'Bairro: ' . $bairro ?></p>
        </div>
        <div class="card-body">
          <p class="card-text"><?php echo 'Rua: ' . $rua ?></p>
        </div>
        <div class="card-footer">
          <p class="card-text"><?php echo 'Numero: ' . $numero ?></p>
        </div>
        <div class="card-body">
          <p class="card-text"><?php echo 'CEP: ' . $cep ?></p>
        </div>
        <div class="card-footer">
          <p class="card-text"><?php echo 'Telefone: ' . $telefone ?></p>
        </div>

      </div>
      <hr>
    </div>
</section>
<?php } ?>
</body>

</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>