<?php
require_once 'init_professor.php';
 
// abre a conexão
$PDO = db_connect();
 
// SQL para contar o total de registros
// A biblioteca PDO possui o método rowCount(), mas ele pode ser impreciso.
// É recomendável usar a função COUNT da SQL
// Veja o Exemplo 2 deste link: http://php.net/manual/pt_BR/pdostatement.rowcount.php
$sql_count = "SELECT COUNT(*) AS total FROM professor ORDER BY nome ASC";
 
// SQL para selecionar os registros
$sql = "SELECT id, nome FROM professor ORDER BY nome ASC";
 
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
 
        <title>Cadastro de Professor</title>
    </head>
 
    <body>
         
        <h1>Cadastrar Professor</h1>
         
        <p><a href="form-add_professor.php">Adicionar um novo Professor</a></p>
 
        <h2>Lista de professores cadastradas</h2>
 
        <p>Total de professor cadastradas: <?php echo $total ?></p>
 
        <?php if ($total > 0): ?>
 
        <table width="50%" border="1">
            <thead>
                <tr>
                    <th>Nome do Professor</th>
                    <th>Ações</th>
                    
                </tr>
            </thead>
            <tbody>
                <?php while ($user = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
                <tr>
                    <td><?php echo $user['nome'] ?></td>
                    <td>
                        <a href="form-edit_professor.php?id=<?php echo $user['id'] ?>">Editar</a>
                        <a href="delete_professor.php?id=<?php echo $user['id'] ?>" onclick="return confirm('Tem certeza de que deseja remover?');">Remover</a>
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