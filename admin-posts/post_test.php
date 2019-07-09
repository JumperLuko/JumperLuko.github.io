<html>
	<?php require('head.php'); ?>
	<body>
		<?php require('header.php'); ?>
        <script src="ckeditor4.9.2-full-personalized/ckeditor.js"></script>
		<div style="width:100%;" name="block-area">
            <form method="post" action="post_proc.php">
                <input name="title" type="text" placeholder="Title" value="titleeee"/>
                <textarea name="editor" id="editor" rows="10" cols="80">
                    This is my textarea to be replaced with CKEditor.
                </textarea>
                <input type="submit" />
            </form>
		</div>
        <script>
           CKEDITOR.replace( 'editor' );
       </script>
	</body>
</html>
