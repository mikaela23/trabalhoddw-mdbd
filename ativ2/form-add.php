<?php
require 'init.php';
?>
<!doctype html>
<html>
     <link href="css/bootstrap.min.css" rel="stylesheet">
 <link href="css/style.css" rel="stylesheet">
    <head>
        <meta charset="utf-8">
        <title>Cadastro de Usuário</title>
    </head>
    <body>
             <div id="top" class="row">
		<div class="col-sm-3">
			<h2>Sistema de Cadastros</h2> 
                        <h2>Cadastro de Usuário</h2>
		</div>
           
                
            </div>
        <form style="padding-left: 20px;" action="add.php" method="post">
            <div class="row">
            <label for="name">Nome: </label>
            <br>
            <input style="width: 326px;" type="text" class="form-control" name="name" id="name">
            <br><br>
            <label for="color">Cor: </label>
            <br>
            <input style="width: 326px;" type="text"  class="form-control" name="color" id="color">
            <br><br>
             <label for="price">Preço: </label>
            <br>
            <input style="width: 326px;" type="text"  class="form-control" name="price" id="price">
            <br><br>
            <label for="startdate">Início das vendas: </label>
            <br>
            <input style="width: 326px;" type="text"  class="form-control" name="startdate" id="startdate" placeholder="dd/mm/yyyy">
            <br><br>
             <label for="quantity">Quantidade em estoque: </label>
            <br>
            <input style="width: 326px;" type="number"  class="form-control" name="quantity" id="quantity">
            <br><br> 
            <div class="row">
                <input class="btn btn-primary" type="submit" value="Cadastrar" style=" margin-left: 20px;">
            
        </form>
        </div>
</div>
            <script src="js/jquery.min.js"></script>
 <script src="js/bootstrap.min.js"></script>
    </body>
</html>

