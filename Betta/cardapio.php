<?php
include "menu.php";
include_once(dirname(__FILE__) . '/admin/inc/MySql.php');
?>

<section class="baixo meio">
  <div>
       <!-- titulo -->
    <h1 class="ti">Cardápio</h1>
  </div>
  <hr>
</section>

<?php

// seleciona as informaçoes da tabela comidas
$filtro = 'SELECT * FROM comidas';

foreach ($pdo->query($filtro) as $row) {
  $nome = ($row['nome']);
  $descricao = ($row['descricao']);
  $peso = ($row['peso']);
  $preco = ($row['preco']);
  $pais = ($row['pais']);
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
           <p class="card-text ca"><?php echo $descricao ?></p>
          </div>
          <p class="card-text"><?php echo $peso . '(g)' ?></p>
          <p class="card-text"><?php echo 'R$' . $preco ?></p>
        </div>
        <div class="card-footer">
          <small class="text-muted"><?php echo $pais ?></small>
          <small class="text-muted lho"><a href="comprar.php">Comprar</a></small>
        </div>
      </div>
    </div>
  </div>

<?php } ?>

</body>

</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>