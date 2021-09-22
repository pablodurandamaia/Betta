<?php
include "menu.php";
include_once(dirname(__FILE__) . '/admin/inc/MySql.php');
?>


<section>
  <div class="baixo meio">
    <h1>As melhores bebidas para você</h1>
  </div>
  <hr>
</section>


<?php

// seleciona as informaçoes da tabela bebidas.
$filtro = 'SELECT * FROM bebidas';

foreach ($pdo->query($filtro) as $row) {
  $nome = ($row['nome']);
  $preco = ($row['preco']);
  $peso = ($row['peso']);
  $marca = ($row['marca']);
  $imagem = '<img class="" width="500px" height="500px" src="data:image/png;base64,' . base64_encode($row['imagem']) . '">';
?>
 
 <!-- exibe na tela as informaçoes selecionadas, "incluindo imagens".  -->
 <div class="grid-container">
    <div class="card-deck">
      <div class="card">
        <?php echo $imagem ?>
        <div class="card-body">
          <h5 class="card-title"><?php echo $nome ?></h5>
          <div>
           <p class="card-text ca"><?php echo 'R$' . $preco ?></p>
          </div>
          <p class="card-text"><?php echo $peso . '(ml)' ?></p>
          <p class="card-text"><?php echo $marca ?></p>
        </div>
        <div class="card-footer">
          <small class="text-muted"><a href="comprar.php">Comprar</a></small>
        </div>
      </div>
    </div>
  </div>

<?php } ?>
</body>

</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>