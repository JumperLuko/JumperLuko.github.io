<html>
    <?php require('./rdd/head.php'); ?>
    <head>
        <title>Login</title>
        <style>
            body{
                margin: 0;
                padding: 0;
                background: #000000;
                color: #ffffff;
                font-family: Arial;
            }
            input[type="text"],input[type="password"]{
                background-color: #404552;
                border-radius: 5px;
                border: none;
                padding: 8px;
            }
            .login{
                height: calc(100vh - 50px);
            }
        </style>
    </head>
    <body>
        <?php require('./rdd/nav.php'); ?>
        <div class="login col-12 flex wrap center">
            <h1 class="col-12 centerText">Login</h1>
            <table class="col-12 flex center centerText">
                <form action="login_proc.php" method="post">
                    <tr>
                        <th>User</th>
                        <td><input type="text" name="user"></td>
                    </tr>
                    <tr>
                        <th>Password</th>
                        <td><input type="password" name="pass"/></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><input type="submit" value="Entrar"/></td>
                    </tr>
                </form>
            </table>
        </div>
    </body>
</html>
<?php
?>
