<?php
include "../database/db.php" ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Database</title>
</head>

<body>

    <?php
    $objBD = new BD();
    $objBD->conn(); //abre a conexão,
    if (!empty($_GET ['id'])){
        $result=$objBD->find($_GET['id']);
        
        //var_dump($result);
        //exit;
    }
    if (!empty($_POST)) {
        if (!empty($_POST['id'])) {
            $objBD->update($_POST);
            echo "Salvar<br>";
            }
            var_dump($_POST);
            $objBD->insert($_POST);
            header("Location: index.php");
    }
    ?>
        <h2>Formulário Cliente</h2>
    
    <form action="index.php" method="post">
        <input type="hidden" name="id" value="<?php echo !empty($result->id)?$result->id:"" ?>"/>
        <label> Nome </label>
        <input type="text" id="nome " name="nome" value="<?php echo !empty($result->id->nome)?$result->nome:"" ?>"/>
        <label> Telefone </label>
        <input type="text" id="telefone" name="telefone" value="<?php echo !empty($result->id->telefone)?$result->telefone:"" ?>" />
        <label> CPF </label>
        <input type="text" id="cpf" name="cpf" value="<?php echo !empty($result->id->cpf)?$result->cpf:"" ?>"/>
        <input type="submit" name="Enviar" />
    </form>
    <br>
    <a href="./usuarioLista.php">Voltar</a>
</body>
</html>