<?php
 
require_once 'init_disciplina.php';
 
// resgata os valores do formulário
$descricao = isset($_POST['descricao']) ? $_POST['descricao'] : null;
$ch = isset($_POST['ch']) ? $_POST['ch'] : null;
$id = isset($_POST['id']) ? $_POST['id'] : null;
 
// validação (bem simples, mais uma vez)
if (empty($descricao) || empty($ch))
{
    echo "Volte e preencha o campo solicitado";
    exit;
}
 
// atualiza o banco
$PDO = db_connect();
$sql = "UPDATE disciplina SET descricao = :descricao, ch = :ch WHERE id = :id";
$stmt = $PDO->prepare($sql);
$stmt->bindParam(':descricao', $descricao);
$stmt->bindParam(':ch', $ch);
$stmt->bindParam(':id', $id, PDO::PARAM_INT);
 
if ($stmt->execute())
{
    header('Location: index_disciplina.php');
}
else
{
    echo "Erro ao alterar";
    print_r($stmt->errorInfo());
}