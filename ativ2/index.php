<?php
require_once 'init.php';
// abre a conexão
$PDO = db_connect();
// SQL para contar o total de registros
// A biblioteca PDO possui o método rowCount(), 
// mas ele pode ser impreciso.
// É recomendável usar a função COUNT da SQL
$sql_count = "SELECT COUNT(*) AS total FROM products ORDER BY name ASC";
// SQL para selecionar os registros
$sql = "SELECT id, name, color, price, startdate, quantity "
        . "FROM products ORDER BY name ASC";
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
    <link href="css/bootstrap.min.css" rel="stylesheet">
 <link href="css/style.css" rel="stylesheet">
    <head>
        <meta charset="utf-8">
        <title>Sistema de Cadastro</title>
    </head>
    <body>
      
 
 	<div id="top" class="row">
		<div class="col-sm-3">
			<h2>Sistema de Cadastros</h2> 
                        <h2>Lista de Produtos</h2>
                        <p>Total de Produtos: <?php echo $total ?></p>
		</div>
            <div class="col-sm-6">
                
            </div>
        <div class="col-sm-3">
            <p><a style="margin-right: 50px;" class="btn btn-primary pull-right h2" href="form-add.php">Adicionar Produto</a></p>
        </div>
       
        
        <?php if ($total > 0): ?>
        <div id="list" class="row">
            <div style="padding-left: 25px;" class="table-responsive col-md-12">
		<table class="table table-striped" cellspacing="0" cellpadding="0">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Cor</th>
                        <th>Preço</th>
                        <th>Data de Compra</th>
                        <th>Quantidade</th>
                        <th class="actions">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($products = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
                        <tr>
                            <td><?php echo $products['name'] ?></td>
                            <td><?php echo $products['color'] ?></td>
                            <td><?php echo $products['price'] ?></td>
                            <td><?php echo dateConvert($products['startdate']) ?></td>
                            <td><?php echo $products['quantity'] ?></td>
                            <td>
                                <a class="btn btn-warning btn-xs" href="form-edit.php?id=<?php echo $products['id'] ?>">Editar</a>
                                <a class="btn btn-danger btn-xs" data-toggle="modal" data-target="#delete-modal"href="delete.php?id=<?php echo $products['id'] ?>" 
                                   onclick="return confirm('Tem certeza de que deseja remover?');">
                                    Remover
                                </a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>Nenhum produto registrado</p>
        <?php endif; ?>
    </body>
</html