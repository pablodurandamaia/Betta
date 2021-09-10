<?php

if (isset($_POST['cadastrar'])) {
    $statusMsg = "";
 
    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
    $peso = $_POST['peso'];
    $preco = $_POST['preco'];
    $pais = $_POST['pais'];
    $imagem = $_POST['imagem'];
    
 
    if (!empty($_FILES["imagem"]["name"])) {
        // Get file info 
        $fileName = basename($_FILES["imagem"]["name"]);
        $fileType = pathinfo($fileName, PATHINFO_EXTENSION);
 
        // Allow certain file formats 
        $allowTypes = array('jpg', 'png', 'jpeg', 'gif');
        if (in_array($fileType, $allowTypes)) {
            $imagem = $_FILES['imagem']['tmp_name'];
            $imgContent = addslashes(file_get_contents($imagem));
            include_once('mysqlbd.php');
            $sql = "INSERT INTO comidas (nome,descricao,peso,preco,pais,imagem) VALUES ('$nome' , '$descricao', '$peso' , '$preco' , '$pais' '$imgContent')";
            $exe = $pdo->prepare($sql);
            $exe->execute();
 
            if( $exe->execute()){ 
                $status = 'success'; 
                $statusMsg = "File uploaded successfully."; 
            }else{ 
                $statusMsg = "File upload failed, please try again."; 
            }
        } else {
            $statusMsg = 'desculpe, insira uma imagem em JPG, JPEG, ou PNG.';
        }
    } else {
        $statusMsg = 'por favor, selecione outra imagem';
    }
    echo $statusMsg;
}


?>

<div class="form-row">
    <div class="form-group col-md-6">
        <label>Nome</label>
        <input type="text" name="nome" class="form-control" id="nome" placeholder="Nome">
    </div>
    <div class="form-group col-md-6">
        <label>Descricao</label>
        <input type="text" name="descricao" class="form-control" id="descricao" placeholder="Descrição">
    </div>
</div>
<div class="form-row">
    <div class="form-group col-md-6">
        <label>Peso</label>
        <input type="number" name="peso" class="form-control" id="peso" placeholder="peso(g)">
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label>Preco</label>
            <input type="number" name="preco" class="form-control" id="preco" placeholder="R$">
        </div>
        <div class="form-group col-md-6">
            <label>pais</label>
            <input type="text" name="pais" class="form-control" id="pais" placeholder="país">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label>Imagem</label>
            <input type="text" name="imagem" class="form-control" id="imagem" placeholder="Link da Imagem">
        </div>
    </div>
    <input type="submit" name="cadastrar" id="cadastrar" class="btn btn-warning" value="Cadastrar"></input>

    