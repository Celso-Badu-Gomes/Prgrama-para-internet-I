<?php
require 'init_turma.php';
?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
 
        <title></title>
    </head>
 
    <body>
 
        <h1>Cadastro de Turma</h1>
 
        <h2>Cadastro de Turma</h2>
         
        <form action="add_turma.php" method="post">
<!------------------------------------------------------------------------------->
            <label for="descricao">Descrição: </label>
            <br>
            <input type="text" name="descricao" id="descricao">
 
            <br><br>
 
            <input type="submit" value="Cadastrar">
        </form>
 
    </body>
</html>