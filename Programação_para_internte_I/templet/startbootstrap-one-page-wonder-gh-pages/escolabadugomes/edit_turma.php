<?php
 
require_once 'init_turma.php';
 
// resgata os valores do formulário
$descricao = isset($_POST['descricao']) ? $_POST['descricao'] : null;
$id = isset($_POST['id']) ? $_POST['id'] : null;
 
// validação (bem simples, mais uma vez)
if (empty($descricao))
{
    echo "Volte e preencha o campo solicitado";
    exit;
}
 
// atualiza o banco
$PDO = db_connect();
$sql = "UPDATE turma SET descricao = :descricao WHERE id = :id";
$stmt = $PDO->prepare($sql);
$stmt->bindParam(':descricao', $descricao);
$stmt->bindParam(':id', $id, PDO::PARAM_INT);
 
if ($stmt->execute())
{
    header('Location: index_turma.php');
}
else
{
    echo "Erro ao alterar";
    print_r($stmt->errorInfo());
}