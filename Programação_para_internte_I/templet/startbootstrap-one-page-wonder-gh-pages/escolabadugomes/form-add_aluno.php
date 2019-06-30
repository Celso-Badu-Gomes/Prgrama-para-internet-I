<?php
require 'init_aluno.php';
?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
 
        <title></title>
    </head>
 
    <body>
 
        <h1>Cadastro de Aluno</h1>
 
        <h2>Cadastro de Aluno</h2>
         
        <form action="add_aluno.php" method="post">
<!------------------------------------------------------------------------------->
            <label for="name">Nome: </label>
            <br>
            <input type="text" name="name" id="name">
 
            <br><br>
<!------------------------------------------------------------------------------->
            <label for="pai">Nome do Pai: </label>
            <br>
            <input type="text" name="pai" id="pai">
 
            <br><br>
<!-------------------------------------------------------------------------------->
            <label for="mae">Nome da Mãe: </label>
            <br>
            <input type="text" name="mae" id="mae">
 
            <br><br>
<!------------------------------------------------------------------------------->
            <label for="endereco">Endereço: </label>
            <br>
            <input type="text" name="endereco" id="endereco">
 
            <br><br>
<!------------------------------------------------------------------------------->
            <label for="nat">Naturalidade: </label>
            <br>
            <input type="text" name="nat" id="nat">
 
            <br><br>

            Gênero:
            <br>
            <input type="radio" name="genero" id="genero_m" value="m">
            <label for="genero_m">Masculino </label>
            <input type="radio" name="genero" id="genero_f" value="f">
            <label for="genero_f">Feminino </label>
             
            <br><br>
 
            <label for="dta_nasc">Data de Nascimento: </label>
            <br>
            <input type="text" name="dta_nasc" id="dta_nasc" placeholder="dd/mm/YYYY">
 
            <br><br>
 
            <input type="submit" value="Cadastrar">
        </form>
 
    </body>
</html>