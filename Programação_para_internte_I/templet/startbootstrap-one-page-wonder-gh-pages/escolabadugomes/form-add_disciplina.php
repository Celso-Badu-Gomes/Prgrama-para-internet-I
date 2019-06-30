<?php
require 'init_disciplina.php';
?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
 
        <title></title>
    </head>
 
    <body>
 
        <h1>Cadastro de Disciplina</h1>
 
        <h2>Cadastro de Disciplina</h2>
         
        <form action="add_disciplina.php" method="post">
<!------------------------------------------------------------------------------->
            <label for="descricao">Descrição: </label>
            <br>
            <input type="text" name="descricao" id="descricao">
 
            <br><br>
<!------------------------------------------------------------------------------->
            <label for="ch">Carga Horária: </label>
            <br>
            <input type="text" name="ch" id="ch">
 
            <br><br>

            <input type="submit" value="Cadastrar">
        </form>
 
    </body>
</html>