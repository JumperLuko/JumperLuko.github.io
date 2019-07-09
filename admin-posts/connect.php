<?php
    //Abrir a conexão com o banco
    @$conexao = mysqli_connect("localhost", "root", "bobamanga", "JumperLuko");
    if ($conexao == false) {
        echo mysqli_connect_error.'<br>';
    }
?>
