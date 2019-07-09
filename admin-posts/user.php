<?php require('require_authentication.php'); ?>
<html>
<?php require('./rdd/head.php'); ?>
    <body>
           <?php require('./rdd/nav.php');
                echo '<div style="width:100%;text-align:center;"><h1>'.$_SESSION['nick'].' - '.$_SESSION['name'].'<br /></h1>';
            ?>
            <h1><a href="logout.php">Logout</a></h1>
        </div>
    </body>
</html>
