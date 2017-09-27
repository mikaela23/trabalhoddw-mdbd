<?php
require 'init.php';
?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Cadastro de Usuário</title>
    </head>
    <body>
        <h1>Sistema de Cadastro</h1>
        <h2>Cadastro de Usuário</h2>
        <form action="add.php" method="post">
            <label for="name">Nome: </label>
            <br>
            <input type="text" name="name" id="name">
            <br><br>
            <label for="color">Cor: </label>
            <br>
            <input type="text" name="color" id="color">
            <br><br>
             <label for="price">Preço: </label>
            <br>
            <input type="text" name="price" id="price">
            <br><br>
            <label for="startdate">Início das vendas: </label>
            <br>
            <input type="text" name="startdate" id="startdate" placeholder="dd/mm/yyyy">
            <br><br>
             <label for="quantity">Quantidade em estoque: </label>
            <br>
            <input type="number" name="quantity" id="quantity">
            <br><br>
            <input type="submit" value="Cadastrar">
        </form>
    </body>
</html>

