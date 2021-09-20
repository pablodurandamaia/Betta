<?php
include_once(dirname(__FILE__) . '/menu.php');
include_once(dirname(__FILE__) . "/admin/functions/login.usuario.php");
?>

<div class="container">
    <div class="row">
        <div class="imagem-top">
            <img class="img-fluid" src="assets/imgs/desconto.png" alt="">
        </div>
    </div>
</div>
<form method="post" >
    <div class="form-row suco po">
        <div class="form-group col-6 meio">
            <label>Email</label>
            <input type="email" name="email" class="form-control" placeholder="Email">
        </div>
        <div class="form-group col-6 meio">
            <label>Senha</label>
            <input type="password" name="senha" class="form-control" placeholder="Senha">
        </div>
    </div>
    <div class="login meio">
        <input type="submit" class="btn btn-warning" name="login" value="Entrar"></button>
        <a class="btn btn-warning" href="cadastro.php">Cadastro</a>
    </div>
</form>


</body>

</html>