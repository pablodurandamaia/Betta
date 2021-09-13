<?php
session_start();

// $administrador = $_SESSION['administrador'];

// if (isset($_SESSION['nome'])) {
//     $nome = $_SESSION['nome'];
// } else {

//     $nome = "";
// }

$nome = isset($_SESSION['nome']) ? $_SESSION['nome'] : "";
$administrador = isset($_SESSION['administrador']) ? $_SESSION['administrador'] : "";


?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="assets/css/inicio.css">
    <link rel="stylesheet" href="assets/css/dropdown.css">
    <link rel="shortcut icon" href="assets/imgs/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title><?php echo @$titulo; ?></title>
</head>

<body class="bege">
    <section>
        <div class="header" style=position:fixed;top:0;>
            <div class="logo">
                <img class="p" src="assets/imgs/logo.png" width="110px" height="110px">
                <div class="dropdown lado">
                    <button type="button" class="btn btn-warning">Menu</button>
                    <div class="dropdown-content">
                        <a href="index.php">Inicio</a>
                        <a href="cardapio.php">Cardápio</a>
                        <a href="cardapiobebida.php">Bebidas</a>
                        <!-- PHP -->
                        <?php if (!isset($_SESSION['nome'])) : ?>
                            <a href="login.php">Login</a>
                        <?php endif; ?>
                        <?php if (isset($_SESSION['nome'])) : ?>
                            <a href="perfil.php">Perfil</a>
                        <?php endif; ?>

                        <?php if (isset($_SESSION['nome'])) : ?>
                            <a href="admin/inc/logout.php">Sair</a>
                        <?php endif; ?>
                    </div>
                </div>

                <?php
                if ($administrador == 1) :
                ?>
                    <div class="dropdown lado">
                        <button type="button" class="btn btn-warning">Administrador</button>
                        <div class="dropdown-content">
                            <a href="admin.php">Usuários</a>
                            <a href="admcomida.php">Comidas</a>
                            <a href="admbebida.php">Bebidas</a>
                        </div>
                    </div>
                <?php endif; ?>
                <?php
                echo "<h3 class='lado'>$nome</h3>"
                ?>
            </div>
        </div>
    </section>