<?php
include "menu.php";
include_once(dirname(__FILE__) . '/admin/inc/MySql.php');
?>


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

    $imagem = '<img class="" src="data:image/png;base64,' . base64_encode($row['imagem']) . '">';
  ?>
    <hr>
    <div class="card-deck menor">
      <div class="card">
        <?php echo $imagem  ?>
        <div class="card-footer">
          <p class="card-text"><?php echo $nome ?></p>
        </div>
        <div class="card-body">
          <p class="card-text"><?php echo $email ?></p>
          <!--<p class="card-text"><?php //echo $senha 
                                    ?></p>-->
        </div>
        <div class="card-footer">
          <p class="card-text"><?php echo $bairro ?></p>
        </div>
        <div class="card-body">
          <p class="card-text"><?php echo $rua ?></p>
        </div>
        <div class="card-footer">
          <p class="card-text"><?php echo $numero ?></p>
        </div>
        <div class="card-body">
          <p class="card-text"><?php echo $cep ?></p>
        </div>
        <div class="card-footer">
          <p class="card-text"><?php echo $telefone ?></p>
        </div>

      </div>
      <hr>
    </div>
</section>
<?php } ?>
</body>

</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>