<!DOCTYPE html>
<html lang="pt-br">
	<?php require_once('../rdd/head-upTree.html'); ?>
	</head>
	<body>
		<?php require_once('../rdd/nav-upTree.html'); ?>
		<main class="h6 flex center">
        <?php
            //Abrir a conexão com o banco
            require_once('../admin-posts/connect.php');
            $consulta = "select post.name_post,post.post_post from post WHERE fk_categoryPost_post=2 ORDER BY post.id_post;";
            $query = mysqli_query($conexao,$consulta);
            while($line  =  mysqli_fetch_array($query)){
               echo '<section style="width:900px;max-width;100%;"><h2 class="h3 centerText" style="font-weight:bold;">'.$line['name_post'].'</h2><div>'.$line['post_post'].'</a></div></section>';
            }
        ?>
		</main>
		<?php require_once('../rdd/footer-upTree.html'); ?>
	</body>
</html>