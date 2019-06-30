<?php
 
require_once 'init_turma.php';
 
// pega os dados do formuário
$descricao = isset($_POST['descricao']) ? $_POST['descricao'] : null;
$id = isset($_POST['id']) ? $_POST['id'] : null;
 
 
// validação (bem simples, só pra evitar dados vazios)
if (empty ($descricao))
{
    echo "Volte e preencha o campo solicitado";
    exit;
}
 
// insere no banco
$PDO = db_connect();
$sql = "INSERT INTO turma (descricao) VALUES(:descricao)";
$stmt = $PDO->prepare($sql);
$stmt->bindParam(':descricao', $descricao);
 
 
if ($stmt->execute())
{
    header('Location: index_turma.php');
}
else
{
    echo "Erro ao cadastrar";
    print_r($stmt->errorInfo());
}