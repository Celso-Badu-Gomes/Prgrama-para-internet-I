<?php
 
require_once 'init_aluno.php';
 
// pega os dados do formuário
$name = isset($_POST['name']) ? $_POST['name'] : null;
$pai = isset($_POST['pai']) ? $_POST['pai'] : null;
$mae = isset($_POST['mae']) ? $_POST['mae'] : null;
$endereco = isset($_POST['endereco']) ? $_POST['endereco'] : null;
$nat = isset($_POST['nat']) ? $_POST['nat'] : null;
$genero = isset($_POST['genero']) ? $_POST['genero'] : null;
$dta_nasc = isset($_POST['dta_nasc']) ? $_POST['dta_nasc'] : null;
$id = isset($_POST['id']) ? $_POST['id'] : null;
 
 
// validação (bem simples, só pra evitar dados vazios)
if (empty($name) || empty($pai) || empty($mae) || empty($endereco)|| empty($nat) || empty($genero) || empty($dta_nasc))
{
    echo "Volte e preencha todos os campos";
    exit;
}
 
// a data vem no formato dd/mm/YYYY
// então precisamos converter para YYYY-mm-dd
$isoDate = dateConvert($dta_nasc);
 
// insere no banco
$PDO = db_connect();
$sql = "INSERT INTO aluno (name, pai, mae, endereco, nat, genero, dta_nasc) VALUES(:name, :pai, :mae, :endereco, :nat, :genero, :dta_nasc)";
$stmt = $PDO->prepare($sql);
$stmt->bindParam(':name', $name);
$stmt->bindParam(':pai', $pai);
$stmt->bindParam(':mae', $mae);
$stmt->bindParam(':endereco', $endereco);
$stmt->bindParam(':nat', $nat);
$stmt->bindParam(':genero', $genero);
$stmt->bindParam(':dta_nasc', $isoDate);
 
 
if ($stmt->execute())
{
    header('Location: index_aluno.php');
}
else
{
    echo "Erro ao cadastrar";
    print_r($stmt->errorInfo());
}