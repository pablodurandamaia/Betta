<?php
include "menu.php";
include_once(dirname(__FILE__). '/admin/inc/MySql.php');
?>


<section >
  <hr />
  <div class="baixo meio">
    <h1>As melhores bebidas para você</h1>
  </div>


      <?php
      $filtro = 'SELECT * FROM bebidas';

      foreach ($pdo->query($filtro) as $row) {
        $nome = ($row['nome']);
        $preco = ($row['preco']);
        $peso = ($row['peso']);
        $marca = ($row['marca']);
        $imagem = '<img class="" src="data:image/png;base64,' . base64_encode($row['imagem']) . '">';
      ?>
  <hr>
  <div class="card-deck menor">
    <div class="card">
      <?php echo $imagem ?>
      <div class="card-body">
          <h5 class="card-title"><?php echo $nome ?></h5>
          <p class="card-text"><?php echo $peso . '(ml)' ?></p>
          <p class="card-text"><?php echo 'R$'. $preco  ?></p>
      </div>
      <div class="card-footer">
          <small class="text-muted">Marca:<?php echo ' ' . $marca ?></small>
      </div>
    </div>
    <hr>
  </div>
</section>
<?php } ?>
</body>

</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>