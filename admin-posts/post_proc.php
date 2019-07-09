<?php
    require('require_authentication.php');
    header('Content-Type: text/html; charset=utf-8');
    $post = array($_POST['post_area'],$_POST['title'],$_POST['imgCapa'],$_POST['idpost'],$_POST['idCategoryPost']);
    // echo '<br /><textarea>'.$post[1].$post[0].$post[2].'</textarea>';

    require('connect.php');
    if(isset($_POST['post'])){
        if($_POST['post']=='insert'){
            $sql = mysqli_query($conexao, "INSERT INTO post(name_post,post_post,fk_categoryPost_post,imgCapa_post) VALUES('$post[1]','$post[0]','$post[4]','$post[2]');");
        }elseif($_POST['post']=='edit'){
            $sql = mysqli_query($conexao, "UPDATE post SET post.name_post='".$post[1]."',post.post_post='".$post[0]."' WHERE id_post='".$post[3]."';");
        }elseif($_POST['post']=='delete'){
            $sql = mysqli_query($conexao, "DELETE FROM post WHERE id_post='".$post[3]."';");
        }
    }
    unset($post,$conexao);
    header('Location: .#post');
?>
