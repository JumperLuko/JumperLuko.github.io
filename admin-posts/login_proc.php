<?php
    require('connect.php');

    $nick=$_POST['user'];
    $pass=$_POST['pass'];
    $pass=sha1($pass);
    // echo $nick.'<br/>'.$pass;

    $sql = mysqli_query($conexao, "SELECT user.id_user,user.name_user as name,user.nickname_user as nick FROM user WHERE nickname_user = '".$nick."' AND password_user = '".$pass."';");
    unset($nick,$pass,$conexao);
    $row = mysqli_num_rows($sql);
    $fetch = mysqli_fetch_array($sql);
    unset($sql);
    if($row == 1) {
        unset($row);
        session_start();
        $_SESSION['id_user']=$fetch['id_user'];
        $_SESSION['nick']=$fetch['nick'];
        $_SESSION['name']=$fetch['name'];
        unset($fetch);
        header('Location: .');
        echo '<center><h1>Você foi autenticado com sucesso!<br />Aguarde um instante.</h1><br /><a href=".">Ou Click aqui</a></center></center>';
    } else {
        header('Location: login.php');
        echo '<center><h1>Nome de usuário ou senha inválidos!<br />Aguarde um instante para tentar novamente</h1><br /><a href="login.php">Ou Click aqui</a></center>';
    }

?>
