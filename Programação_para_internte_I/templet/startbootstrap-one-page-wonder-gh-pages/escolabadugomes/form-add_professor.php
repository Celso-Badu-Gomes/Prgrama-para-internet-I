<?php
require 'init_professor.php';
?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
 
        <title></title>
    </head>
 
    <body>
 
        <h1>Cadastro de Professor</h1>
 
        <h2>Cadastro de Professor</h2>
         
        <form action="add_professor.php" method="post">
<!------------------------------------------------------------------------------->
            <label for="nome">Nome do Professor: </label>
            <br>
            <input type="text" name="nome" id="nome">
 
            <br><br>

            <input type="submit" value="Cadastrar">
        </form>
 
    </body>
</html>