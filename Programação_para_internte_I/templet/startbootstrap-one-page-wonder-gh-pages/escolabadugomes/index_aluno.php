<?php
require_once 'init_aluno.php';
 
// abre a conexão
$PDO = db_connect();
 
// SQL para contar o total de registros
// A biblioteca PDO possui o método rowCount(), mas ele pode ser impreciso.
// É recomendável usar a função COUNT da SQL
// Veja o Exemplo 2 deste link: http://php.net/manual/pt_BR/pdostatement.rowcount.php
$sql_count = "SELECT COUNT(*) AS total FROM aluno ORDER BY name ASC";
 
// SQL para selecionar os registros
$sql = "SELECT id, name, pai, mae, endereco, genero, dta_nasc, nat FROM aluno ORDER BY name ASC";
 
// conta o toal de registros
$stmt_count = $PDO->prepare($sql_count);
$stmt_count->execute();
$total = $stmt_count->fetchColumn();
 
// seleciona os registros
$stmt = $PDO->prepare($sql);
$stmt->execute();
?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
 
        <title>Sistema de Cadastro de Aluno</title>
    </head>
 
    <body>
         
        <h1>Cadastrar Aluno</h1>
         
        <p><a href="form-add_aluno.php">Adicionar um novo Aluno</a></p>
 
        <h2>Lista de Alunos cadastrados</h2>
 
        <p>Total de alunos cadastrado no : <?php echo $total ?></p>
 
        <?php if ($total > 0): ?>
 
        <table width="100%" border="1">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Pai</th>
                    <th>Mãe</th>
                    <th>Endereço</th>
                    <th>Naturalidade</th>
                    <th>Gênero</th>
                    <th>Data de Nascimento</th>
                    <th>Idade</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($user = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
                <tr>
                    <td><?php echo $user['name'] ?></td>
                    <td><?php echo $user['pai'] ?></td>
                    <td><?php echo $user['mae'] ?></td>
                    <td><?php echo $user['endereco'] ?></td>
                    <td><?php echo $user['nat'] ?></td>
                    <td><?php echo ($user['genero'] == 'm') ? 'Masculino' : 'Feminino' ?></td>
                    <td><?php echo dateConvert($user['dta_nasc']) ?></td>
                    <td><?php echo calculateAge($user['dta_nasc']) ?> anos</td>
                    <td>
                        <a href="form-edit_aluno.php?id=<?php echo $user['id'] ?>">Editar</a>
                        <a href="delete_aluno.php?id=<?php echo $user['id'] ?>" onclick="return confirm('Tem certeza de que deseja remover?');">Remover</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
 
        <?php else: ?>
 
       <!-- <p>Nenhum aluno cadastrado</p> -->
 
        <?php endif; ?>
    </body>
</html>