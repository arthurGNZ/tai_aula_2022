<?php 
include "./database/db.php"?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php 
    $objBD = new BD();
    $objBD->conn();//abre a conexão
    $result = $objBD->select(); // retorna um array com os dados do bd
    foreach($result as $item){
        echo "ID:".$item['id']." Nome: ".$item['nome']." Telefone: ".$item['telefone']."<br>";
    }
?>
</body>
</html>
