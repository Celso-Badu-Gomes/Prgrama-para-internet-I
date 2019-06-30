<?php
 
require_once 'init_professor.php';
 
// resgata os valores do formulário
$nome = isset($_POST['nome']) ? $_POST['nome'] : null;
$id = isset($_POST['id']) ? $_POST['id'] : null;
 
// validação (bem simples, mais uma vez)
if (empty($nome))
{
    echo "Volte e preencha o campo solicitado";
    exit;
}
 
// atualiza o banco
$PDO = db_connect();
$sql = "UPDATE professor SET nome = :nome WHERE id = :id";
$stmt = $PDO->prepare($sql);
$stmt->bindParam(':nome', $nome);
$stmt->bindParam(':id', $id, PDO::PARAM_INT);
 
if ($stmt->execute())
{
    header('Location: index_professor.php');
}
else
{
    echo "Erro ao alterar";
    print_r($stmt->errorInfo());
}