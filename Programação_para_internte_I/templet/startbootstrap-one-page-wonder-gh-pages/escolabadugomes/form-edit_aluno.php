<?php
require 'init_aluno.php';
 
// pega o ID da URL
$id = isset($_GET['id']) ? (int) $_GET['id'] : null;
 
// valida o ID
if (empty($id))
{
    echo "ID para alteração não definido";
    exit;
}
 
// busca os dados du usuário a ser editado
$PDO = db_connect();
$sql = "SELECT name, pai, mae, endereco, nat, genero, dta_nasc FROM aluno WHERE id = :id";
$stmt = $PDO->prepare($sql);
$stmt->bindParam(':id', $id, PDO::PARAM_INT);
 
$stmt->execute();
 
$user = $stmt->fetch(PDO::FETCH_ASSOC);
 
// se o método fetch() não retornar um array, significa que o ID não corresponde a um usuário válido
if (!is_array($user))
{
    echo "Nenhum usuário encontrado";
    exit;
}
?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
 
        <title>Edição de Aluno</title>
    </head>
 
    <body>
 
        <h1>Cadastro de Aluno</h1>
 
        <h2>Edição de Aluno</h2>
         
        <form action="edit_aluno.php" method="post">
            <label for="name">Nome: </label>
            <br>
            <input type="text" name="name" id="name" value="<?php echo $user['name'] ?>">
 
            <br><br>
<!--------------------------------------------------------------------------------------------------->
            <label for="pai">Nome do Pai: </label>
            <br>
            <input type="text" name="pai" id="pai" value="<?php echo $user['pai'] ?>">
 
            <br><br>
<!--------------------------------------------------------------------------------------------------->
            <label for="mae">Nome da Mãe: </label>
            <br>
            <input type="text" name="mae" id="pai" value="<?php echo $user['mae'] ?>">
 
            <br><br>
<!--------------------------------------------------------------------------------------------------->
            <label for="endereco">Endereço: </label>
            <br>
            <input type="text" name="endereco" id="endereco" value="<?php echo $user['endereco'] ?>">
 
            <br><br>
<!--------------------------------------------------------------------------------------------------->
            <label for="nat">Naturalidade: </label>
            <br>
            <input type="text" name="nat" id="nat" value="<?php echo $user['nat'] ?>">
 
            <br><br>
<!--------------------------------------------------------------------------------------------------->

            Gênero:
            <br>
            <input type="radio" name="gener" id="genero_m" value="m" <?php if ($user['genero'] == 'm'): ?> checked="checked" <?php endif; ?>>
            <label for="genero_m">Masculino </label>
            <input type="radio" name="genero" id="genero_f" value="f" <?php if ($user['genero'] == 'f'): ?> checked="checked" <?php endif; ?>>
            <label for="genero_f">Feminino </label>
             
            <br><br>
 
            <label for="dta_nasc">Data de Nascimento: </label>
            <br>
            <input type="text" name="dta_nasc" id="dta_nasc" placeholder="dd/mm/YYYY" value="<?php echo dateConvert($user['dta_nasc']) ?>">
 
            <br><br>
 
            <input type="hidden" name="id" value="<?php echo $id ?>">
 
            <input type="submit" value="Alterar">
        </form>
 
    </body>
</html>