<?php
require 'init_turma.php';
 
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
$sql = "SELECT descricao FROM turma WHERE id = :id";
$stmt = $PDO->prepare($sql);
$stmt->bindParam(':id', $id, PDO::PARAM_INT);
 
$stmt->execute();
 
$user = $stmt->fetch(PDO::FETCH_ASSOC);
 
// se o método fetch() não retornar um array, significa que o ID não corresponde a um usuário válido
if (!is_array($user))
{
    echo "Nenhuma turma cadastrada";
    exit;
}
?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
 
        <title>Edição de turma</title>
    </head>
 
    <body>
 
        <h1>Cadastro de Turma</h1>
 
        <h2>Edição de Turma</h2>
         
        <form action="edit_turma.php" method="post">
            <label for="descricao">Descrição: </label>
            <br>
            <input type="text" name="descricao" id="descricao" value="<?php echo $user['descricao'] ?>">
 
            <br><br>
 
            <input type="hidden" name="id" value="<?php echo $id ?>">
 
            <input type="submit" value="Alterar">
        </form>
 
    </body>
</html>