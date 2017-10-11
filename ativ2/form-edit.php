<?php
require 'init.php';
// pega o ID da URL
$id = isset($_GET['id']) ? (int) $_GET['id'] : null;
// valida o ID
if (empty($id)) {
    echo "ID para alteração não definido";
    exit;
}
// busca os dados do usuário a ser editado
$PDO = db_connect();
$sql = "SELECT name, color, price, startdate, quantity FROM products WHERE id = :id";
$stmt = $PDO->prepare($sql);
$stmt->bindParam(':id', $id, PDO::PARAM_INT);
$stmt->execute();
$products = $stmt->fetch(PDO::FETCH_ASSOC);
// se o método fetch() não retornar um array, significa que o ID não corresponde 
// a um usuário válido
if (!is_array($products)) {
    echo "Nenhum usuário encontrado";
    exit;
}
?>
<!doctype html>
<html>
    <link href="css/bootstrap.min.css" rel="stylesheet">
 <link href="css/style.css" rel="stylesheet">
    <head>
        <meta charset="utf-8">
        <title>Edição de Usuário</title>
    </head>
    <body>
        <div id="top" class="row">
		<div class="col-sm-3">
			<h2>Sistema de Cadastros</h2> 
                        <h2>Edição de Usuário</h2>
		</div>
           
                
            </div>
        <form style="padding-left: 20px;" action="edit.php" method="post">
            <div class="row">
            <label for="name">Nome: </label>
            <br>
            <input style="width: 326px;" type="text" class="form-control" name="name" id="name" value="<?php echo $products['name'] ?>">
            <br><br>
            <label for="color">Cor: </label>
            <br>
            <input style="width: 326px;" type="text" class="form-control" name="color" id="color" value="<?php echo $products['color'] ?>">
            <br><br>
            <label for="price">Preço: </label>
            <br>
            <input style="width: 326px;" type="text" class="form-control" name="price" id="price" value="<?php echo $products['price'] ?>">
            <br><br>
            <label for="startdate">Início das vendas: </label>
            <br>
            <input style="width: 326px;" type="text" class="form-control" name="startdate" id="startdate" placeholder="dd/mm/yyyy" 
                   value="<?php echo dateConvert($products['startdate']) ?>">
            <br><br>
            <label for="quantity">Quantidade em estoque: </label>
            <br>
            <input style="width: 326px;" type="quantity" class="form-control" name="quantity" id="quantity" value="<?php echo $products['quantity'] ?>">
            <br><br>
            <input type="hidden" name="id" value="<?php echo $id ?>">
            <div class="row">
                <input class="btn btn-primary" type="submit" value="Alterar" style=" margin-left: 20px;">
        </form>
</div>
</div>
            <script src="js/jquery.min.js"></script>
 <script src="js/bootstrap.min.js"></script>
    </body>
</html>

