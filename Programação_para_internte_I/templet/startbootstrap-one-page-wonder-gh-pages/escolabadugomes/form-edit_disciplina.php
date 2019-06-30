<?php
require 'init_disciplina.php';
 
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
$sql = "SELECT descricao, ch FROM disciplina WHERE id = :id";
$stmt = $PDO->prepare($sql);
$stmt->bindParam(':id', $id, PDO::PARAM_INT);
 
$stmt->execute();
 
$user = $stmt->fetch(PDO::FETCH_ASSOC);
 
// se o método fetch() não retornar um array, significa que o ID não corresponde a um usuário válido
if (!is_array($user))
{
    echo "Nenhuma disciplina cadastrada";
    exit;
}
?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
 
        <title>Edição de disciplina</title>
    </head>
 
    <body>
 
        <h1>Cadastro de Disciplina</h1>
 
        <h2>Edição de Disciplina</h2>
         
        <form action="edit_disciplina.php" method="post">
            <label for="descricao">Descrição: </label>
            <br>
            <input type="text" name="descricao" id="descricao" value="<?php echo $user['descricao'] ?>">
 
            <br><br>

            <label for="ch">Carga Horária: </label>
            <br>
            <input type="text" name="ch" id="ch" value="<?php echo $user['ch'] ?>">
 
            <br><br>
 
            <input type="hidden" name="id" value="<?php echo $id ?>">
 
            <input type="submit" value="Alterar">
        </form>
 
    </body>
</html>