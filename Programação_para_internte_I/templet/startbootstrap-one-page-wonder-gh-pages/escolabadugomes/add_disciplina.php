<?php
 
require_once 'init_disciplina.php';
 
// pega os dados do formuário
$descricao = isset($_POST['descricao']) ? $_POST['descricao'] : null;
$ch = isset($_POST['ch']) ? $_POST['ch'] : null;
$id = isset($_POST['id']) ? $_POST['id'] : null;
 
 
// validação (bem simples, só pra evitar dados vazios)
if (empty ($descricao) || empty($ch))
{
    echo "Volte e preencha o campo solicitado";
    exit;
}
 
// insere no banco
$PDO = db_connect();
$sql = "INSERT INTO disciplina (descricao, ch) VALUES(:descricao, :ch)";
$stmt = $PDO->prepare($sql);
$stmt->bindParam(':descricao', $descricao);
$stmt->bindParam(':ch', $ch);
 
 
if ($stmt->execute())
{
    header('Location: index_disciplina.php');
}
else
{
    echo "Erro ao cadastrar";
    print_r($stmt->errorInfo());
}