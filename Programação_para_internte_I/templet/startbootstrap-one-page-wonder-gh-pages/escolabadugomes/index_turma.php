<?php
require_once 'init_turma.php';
 
// abre a conexão
$PDO = db_connect();
 
// SQL para contar o total de registros
// A biblioteca PDO possui o método rowCount(), mas ele pode ser impreciso.
// É recomendável usar a função COUNT da SQL
// Veja o Exemplo 2 deste link: http://php.net/manual/pt_BR/pdostatement.rowcount.php
$sql_count = "SELECT COUNT(*) AS total FROM turma ORDER BY descricao ASC";
 
// SQL para selecionar os registros
$sql = "SELECT id, descricao FROM turma ORDER BY descricao ASC";
 
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
 
        <title>Cadastro de Turma</title>
    </head>
 
    <body>
         
        <h1>Cadastrar Turma</h1>
         
        <p><a href="form-add_turma.php">Adicionar uma nova turma</a></p>
 
        <h2>Lista de turmas cadastrados</h2>
 
        <p>Total de turmas cadastradas: <?php echo $total ?></p>
 
        <?php if ($total > 0): ?>
 
        <table width="50%" border="1">
            <thead>
                <tr>
                    <th>Descrição</th>
                    <th>Ações</th>
                    
                </tr>
            </thead>
            <tbody>
                <?php while ($user = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
                <tr>
                    <td><?php echo $user['descricao'] ?></td>
                    
                    <td>
                        <a href="form-edit_turma.php?id=<?php echo $user['id'] ?>">Editar</a>
                        <a href="delete_turma.php?id=<?php echo $user['id'] ?>" onclick="return confirm('Tem certeza de que deseja remover?');">Remover</a>
                         <a href="listagem.html?id=<?php echo $user['id'] ?>">Opções de cadastro</a>
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