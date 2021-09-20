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

    //seleciona todas as informaçoes da tabela usuarios para o campo Id_u "chave primaria" 
    $sql = $pdo->prepare("SELECT * FROM usuarios WHERE Id_u = ?");
    if ($sql->execute(array($codigo))) {
        $info = $sql->fetchALL(PDO::FETCH_ASSOC);
        foreach ($info as $key => $values) {
            $nome = $values['nome'];
            $email = $values['email'];
            $senha = $values['senha'];
            $bairro = $values['bairro'];
            $rua = $values['rua'];
            $num = $values['numero'];
            $cep = $values['cep'];
            $tel = $values['telefone'];
            $cpf = $values['cpf'];
            
        }
    }
}



//funçao que recolhe as novas informaçoes pelo metodo POST e atualiza em  todos os campos do banco de dados 
if (isset($_POST['atualizar'])) {
    $codigo = $_POST['Id_u'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $bairro = $_POST['bairro'];
    $rua = $_POST['rua'];
    $num = $_POST['numero'];
    $cep = $_POST['cep'];
    $tel = $_POST['telefone'];
    $cpf = $_POST['cpf'];

    $sql = $pdo->prepare("UPDATE usuarios SET Id_u=?,nome=?,email=?,senha=?,bairro=?,rua=?,numero=?,cep=?,telefone=?,cpf=? WHERE Id_u=?");
    if ($sql->execute(array($codigo, $nome, $email, $senha, $bairro, $rua, $num, $cep, $tel, $cpf, $codigo))) {
        if ($sql->rowCount() > 0) {
            echo 'você alterou seu cadastro';
            header('location:admin.php');
        } 
    } else {
        echo 'Dados não alterados';
    }
}
?>

  <div style=padding-top:200px;padding-left:2%;>
<form method="POST" action="">
<!-- lugares onde as informaçoes sao inseridas, "para a funçao" -->
<p><input type="text" name="Id_u" vaLue="<?php echo $codigo ?>" required hidden> Nome: <input type="text" name="nome" vaLue="<?php echo $nome ?>" required> CPF: <input type="text" name="cpf" vaLue="<?php echo $cpf ?>">
    <br /></p>
<p>Email: <input type="text" name="email" vaLue="<?php echo $email ?>" required> Senha: <input type="password" name="senha" vaLue="<?php echo $senha ?>" required>
<br /></p>
<p><label>Bairro</label>
                        <select name="bairro" id="bairro" class="form-control" required>
                            <option selected>Escolher...</option>
                            <option value="Adhemar Garcia">Adhemar Garcia</option>
                            <option value="América">América</option>
                            <option value="Anita Garibaldi">Anita Garibaldi</option>
                            <option value="Atiradores">Atiradores</option>
                            <option value="Aventureiro">Aventureiro</option>
                            <option value="Boa Vista">Boa Vista</option>
                            <option value="Boehmerwald">Boehmerwald</option>
                            <option value="Bom Retiro">Bom Retiro</option>
                            <option value="Bucarein">Bucarein</option>
                            <option value="Centro">Centro</option>
                            <option value="Comasa">Comasa</option>
                            <option value="Costa e Silva">Costa e Silva</option>
                            <option value="Espinheiros">Espinheiros</option>
                            <option value="Fátima">Fátima</option>
                            <option value="Floresta">Floresta</option>
                            <option value="Glória">Glória</option>
                            <option value="Guanabara">Guanabara</option>
                            <option value="Iririú">Iririú</option>
                            <option value="Itaum">Itaum</option>
                            <option value="Itinga">Itinga</option>
                            <option value="Parque Guarani">Parque Guarani</option>
                            <option value="Jardim Iririú">Jardim Iririú</option>
                            <option value="Jardim Paraíso">Jardim Paraíso</option>
                            <option value="Jardim Sophia">Jardim Sophia</option>
                            <option value="Jarivatuba">Jarivatuba</option>
                            <option value="Jativoca">Jativoca</option>
                            <option value="João Costa">João Costa</option>
                            <option value="Morro do Meio">Morro do Meio</option>
                            <option value="Nova Brasília">Nova Brasília</option>
                            <option value="Paranaguamirim">Paranaguamirim</option>
                            <option value="Petrópolis">Petrópolis</option>
                            <option value="Pirabeiraba">Pirabeiraba</option>
                            <option value="Profipo">Profipo</option>
                            <option value="Saguaçu">Saguaçu</option>
                            <option value="Santa Catarina">Santa Catarina</option>
                            <option value="Santo Antônio">Santo Antônio</option>
                            <option value="São Marcos">São Marcos</option>
                            <option value="Ulysses Guimarães">Ulysses Guimarães</option>
                            <option value="Vila Cubatão">Vila Cubatão</option>
                            <option value="Vila Nova">Vila Nova</option>
                            <option value="Zona Industrial Norte">Zona Industrial Norte</option>
                            <option value="Zona Industrial Tupy">Zona Industrial Tupy</option>
                        </select>
Rua: <input type="text" id="rua" name="rua" vaLue="<?php echo $rua ?>" >
    <br /></p>
<p>Número: <input type="number" id="numero" name="numero" vaLue="<?php echo $num ?>" required> CEP: <input type="text" id="cep" name="cep" vaLue="<?php echo $cep ?>" >
<br /></p>    
<p>Telefone: <input type="tel" id="telefone" name="telefone" vaLue="<?php echo $tel ?>" required> 
<br /></p>    
<input type="submit" class="btn btn-warning" name="atualizar" vaLue="Atualizar">

</form>
  </div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
<!-- cria uma "mascara" que força o usuario a inserir as informaçoes de maneira correta -->
<script type="text/javascript">
$("#telefone").mask("(00) 0 0000-0000");
$("#cep").mask("00000-000");
$("#cpf").mask("000.000.000-00");
</script>


</body>

</html>