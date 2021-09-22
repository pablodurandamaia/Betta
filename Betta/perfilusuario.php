<?php
include "menu.php";
include_once(dirname(__FILE__) . '/admin/inc/MySql.php');




// Checa se a imagem é real ou um arquivo qualquer
//echo UPLOAD_FOLDER;

if (isset($_POST["arquivo"])) {

  $nomeDoArquivo =  uniqid() . basename($_FILES["fileToUpload"]["name"]);
  // 7523875285098.asuna.jpg


  $target_file = UPLOAD_FOLDER . $nomeDoArquivo;
  // c:\xammp\htdocs\pa\upload\$nomeDoAqruivo

  $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if ($check !== false) {
    // echo "Arquivo é uma imagem:  - " . $check["mime"] . ".";
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
      // echo "O arquivo " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " foi enviado para o servidor.";

      // /assets/uploads/aa.png              
      $img_src = "assets/uploads/" . $nomeDoArquivo;

      $sql = $pdo->prepare("UPDATE usuarios SET img_src=? WHERE Id_u=?");
      $id_usu = $_SESSION['Id_u'];
      if ($sql->execute(array($img_src, $id_usu))) {
        if ($sql->rowCount() > 0) {
          echo 'você alterou a imagem do seu cadastro';
        } else {
          echo 'Não achei ninguem';
        }
      } else {
        echo 'Dados não alterados';
      }
    } else {
      echo "Desculpe não fomos hard o suficiente para enviar seu arquivo. =(";
    }
  } else {
    echo "Arquivo não é uma imagem.";
  }
}




?>



<link rel="stylesheet" href="perfil.css">


<section>
  <hr />
  <div class="baixo meio">
    <h1>Seu perfil</h1>
  </div>

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
    $img_src = ($row['img_src']);
    //$imagem = '<img style="width:150px;height:150px;" src="data:image/png;base64,' . base64_encode($row['img_src']) . '">';



  ?>
    <hr>
    <div class="card-deck" style="margin: 0 450px 0 450px;">
      <div class="card">
        <div style="margin: 0 auto; border-radius: 100%;">
<<<<<<< HEAD
          <?php if (strlen($img_src) > 0) : ?>
            <img src="<?php echo HOME . $img_src; ?>" class="img-fluid">
          <?php else : ?>
            <img src="<?php echo HOME ?>/assets/imgs/profile.png" class="img-fluid">
          <?php endif; ?>
        </div>
        <form action="" method="post" enctype="multipart/form-data">
          <p> Selecione uma imagem:
            <input type="file" name="fileToUpload" id="fileToUpload">
          <p>
            <input class="btn btn-warning" type="submit" value="Salvar" name="arquivo">
        </form>

=======
        <?php echo $imagem  ?>
      </div>
       <!--  <form action="">
           <input type="file" name="fields_upload[multi_edit][0][bf19122987928493131d5bf846637fbc]" class="textfield noDragDrop" id="field_11_3" size="10" onchange="return verificationsAfterFieldChange('bf19122987928493131d5bf846637fbc', '0','blob')">
          <input type="submit" name="salvar" id="salvar" class="btn btn-warning" value="Salvar">
        </form>-->
>>>>>>> 898307c43faba039c02f3963bcb26851bf967abf
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