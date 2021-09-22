<?php
include_once(dirname(__FILE__).'./../inc/MySql.php');

$_SESSION['nome'] = "";
$_SESSION['administrador'] = "";

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $senha = $_POST['senha'];
  
    
    $sql = $pdo->prepare("SELECT * FROM usuarios WHERE email = ? AND senha = ?");
    if ($sql->execute(array($email,$senha))) {
        $info = $sql->fetchALL(PDO::FETCH_ASSOC);
             if (count($info) > 0) {
                 foreach($info as $key => $values){
                    $_SESSION['Id_u']= $values['Id_u']; 
                     $_SESSION['nome']= $values['nome']; 
                     $_SESSION['email']= $values['email']; 
                     $_SESSION['img_src']= $values['img_src']; 
                     $_SESSION['administrador']= $values['administrador'];
                 }
            // echo 'você realizou seu login com sucesso';
            header('location: ../../betta/Betta/index.php');
        }else {
            echo'<script type="text/javascript">
                    window.alert("Usuário não existe ou Login incorreto!!!")
                    </script>';
        }  
    } 
}
