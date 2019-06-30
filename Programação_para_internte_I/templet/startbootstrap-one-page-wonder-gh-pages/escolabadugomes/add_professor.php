<?php
 
require_once 'init_professor.php';
 
// pega os dados do formuário
$nome = isset($_POST['nome']) ? $_POST['nome'] : null;
$id = isset($_POST['id']) ? $_POST['id'] : null;
 
 
// validação (bem simples, só pra evitar dados vazios)
if (empty ($nome))
{
    echo "Volte e preencha o campo solicitado";
    exit;
}
 
// insere no banco
$PDO = db_connect();
$sql = "INSERT INTO professor (nome) VALUES(:nome)";
$stmt = $PDO->prepare($sql);
$stmt->bindParam(':nome', $nome);
 
 
if ($stmt->execute())
{
    header('Location: index_professor.php');
}
else
{
    echo "Erro ao cadastrar";
    print_r($stmt->errorInfo());
}