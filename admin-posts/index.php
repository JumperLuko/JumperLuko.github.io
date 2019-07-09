<?php require('require_authentication.php'); ?>
<html>
	<?php require('./rdd/head.php'); ?>
	<body>
		<?php require('./rdd/nav.php'); ?>
		<nav class="col-12 flex start subMenu">
			<form method="get" action=".#post" class="col-4">
				<input type="hidden" name="post" value="visualize">
				<input type="submit" value="Visualizar Post" class="col-12 flex center">
			</form>
			<form method="get" action=".#post" class="col-4">
				<input type="hidden" name="post" value="edit">
				<input type="submit" value="Editar Post" class="col-12 flex center">
			</form>
			<form method="get" action=".#post" class="col-4">
				<input type="hidden" name="post" value="insert">
				<input type="submit" value="Inserir Post" class="col-12 flex center">
			</form>
		</nav>
		<main style="width:100%;" name="block-area">
		<?php
			if(isset($_GET['post'])){
				if($_GET['post']=='visualize'){
					require('connect.php');
					$consulta = "select post.id_post,post.name_post from post ORDER BY post.id_post DESC;";
					$query = mysqli_query($conexao,$consulta);
					echo '<form method="get" action=".#post"> <select name="query">';
					while($line  =  mysqli_fetch_array($query)){
						echo '<option value="'.$line['id_post'].'">'.$line['name_post'].'</option>';
					   	// echo '<div style="width:100%;">'.$line['post_post'].'</div>';
					}
					echo '</select><input type="hidden" name="post" value="visualize"><input type="submit" value="Visualizar"/></form>';
					if(isset($_GET['query'])){
						$consulta = "select post.name_post,post.imgCapa_post,post.post_post from post where post.id_post='".$_GET['query']."';";
						$query = mysqli_query($conexao,$consulta);
						while($line  =  mysqli_fetch_array($query)){
						   echo '<div class="flex center h1" style="width:100%;">'.$line['name_post'].'</div>';
						   echo '<div class="flex center h3" style="width:100%;">'.$line['imgCapa_post'].'</div>';
						   echo '<div style="width:100%;display:block;">'.$line['post_post'].'</div>';
						}
					}
				unset($consulta,$query,$line);
				}elseif($_GET['post']=='edit'){
					require('connect.php');
					$consulta = "select post.id_post,post.name_post from post ORDER BY post.id_post DESC;";
					$query = mysqli_query($conexao,$consulta);
					$query2 = $query;
					echo '<form method="get" action=".?post=edit#post"> <select name="query">';
					while($line  =  mysqli_fetch_array($query)){
						echo '<option value="'.$line['id_post'].'">'.$line['name_post'].'</option>';
					   	// echo '<div style="width:100%;">'.$line['post_post'].'</div>';
					}
					echo '</select><input type="hidden" name="post" value="edit"><input type="submit" value="Buscar"/></form>';
					if(isset($_GET['query'])){
						$consulta = "select post.name_post,post.imgCapa_post,post.post_post,post.id_post from post where post.id_post='".$_GET['query']."';";
						$query = mysqli_query($conexao,$consulta);
						while($line  =  mysqli_fetch_array($query)){
						   echo '<form method="post" action="post_proc.php" class="postEdit">
			   		                <input name="title" type="text" placeholder="Titulo" class="col-12 postTitle" value="'.$line['name_post'].'"/>
			   		                <input name="imgCapa" type="text" placeholder="Link da imagem de capa" class="col-12 postTitle" value="'.$line['imgCapa_post'].'"/>
									<script src="ckeditor4.9.2-full-personalized/ckeditor.js"></script>
									<textarea name="post_area" id="post_area" rows="10" cols="80" style="color:#000000;font-family:Arial,Calibri;resize: vertical;">'.$line['post_post'].'</textarea>
									<script>CKEDITOR.replace( post_area );</script>
									<input type="hidden" name="idpost" value="'.$line['id_post'].'">
									<input type="hidden" name="post" value="edit">
			   						<div class="col-12 flex center">
			   		                	<input type="submit" value="Atualizar" class="postTitle"/>
			   						</div>
			   		            </form>
								<iframe src="tryEditor/tryEditor.html" style="resize: vertical;overflow: auto;width:100%;height:500px;margin:300px 0 0 0;" noresize="resize"></iframe>
								';
						}
					}
					echo '<a href=".?post=delet#post"><button style="margin:300px 0 0 0;">Deletar Posts?</button></a>';
				}elseif($_GET['post']=='insert'){
					echo '
					<form method="post" action="post_proc.php" class="postEdit flex wrap">
		                <input name="title" type="text" placeholder="Titulo" class="col-12 postTitle"/>
		                <input name="imgCapa" type="text" placeholder="Link da imagem de capa" class="postTitle col-10"/>
						<script src="ckeditor4.9.2-full-personalized/ckeditor.js"></script>
						<select name="idCategoryPost" class="idCategoryPost col-2" title="Categoria do Post">';
						require('connect.php');
						$consulta = "select categoryPost.id_categoryPost,categoryPost.name_categoryPost from categoryPost ORDER BY categoryPost.id_categoryPost;";
						$query = mysqli_query($conexao,$consulta);
						while($line  =  mysqli_fetch_array($query)){
							echo '<option value="'.$line['id_categoryPost'].'">'.$line['name_categoryPost'].'</option>';
						}
						echo '
						</select>
						<div class="col-12"><textarea name="post_area" id="post_area" rows="20" cols="80" style="color:#000000;font-family:Arial,Calibri;resize: vertical;"></textarea></div>
						<script>CKEDITOR.replace( post_area );</script>
						<input type="hidden" name="post" value="insert">
						<div class="col-12 flex center">
		                	<input type="submit" value="Inserir" class="postTitle"/>
						</div>
		            </form>
					<iframe src="tryEditor/tryEditor.html" style="resize: vertical;overflow: auto;width:100%;height:500px;margin:300px 0 0 0" noresize="resize"></iframe>
					';

				}elseif($_GET['post']=='delet'){
					require('connect.php');
					$consulta = "select post.id_post,post.name_post from post ORDER BY post.name_post;";
					$query = mysqli_query($conexao,$consulta);
					echo '<form method="post" action="post_proc.php"> <select name="idpost">';
					while($line  =  mysqli_fetch_array($query)){
						echo '<option value="'.$line['id_post'].'">'.$line['name_post'].'</option>';
					}
					echo '</select><input type="hidden" name="post" value="delete"><input type="submit" value="Apagar"/></form>';
				}
			}
			unset($conexao);
		?>
		</main>
	</body>
</html>
