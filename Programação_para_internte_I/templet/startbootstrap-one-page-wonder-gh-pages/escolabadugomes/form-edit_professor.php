<?php
require 'init_professor.php';
 
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
$sql = "SELECT nome FROM professor WHERE id = :id";
$stmt = $PDO->prepare($sql);
$stmt->bindParam(':id', $id, PDO::PARAM_INT);
 
$stmt->execute();
 
$user = $stmt->fetch(PDO::FETCH_ASSOC);
 
// se o método fetch() não retornar um array, significa que o ID não corresponde a um usuário válido
if (!is_array($user))
{
    echo "Nenhuma Professor cadastrado";
    exit;
}
?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
 
        <title>Edição de Professor</title>
    </head>
 
    <body>
 
        <h1>Cadastro de Professor</h1>
 
        <h2>Edição de Professor</h2>
         
        <form action="edit_professor.php" method="post">
            <label for="nome">Nome do Professor: </label>
            <br>
            <input type="text" name="nome" id="nome" value="<?php echo $user['nome'] ?>">
 
            <br><br>

 
            <input type="hidden" name="id" value="<?php echo $id ?>">
 
            <input type="submit" value="Alterar">
        </form>
 
    </body>
</html>