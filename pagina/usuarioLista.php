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
    <h2>Listagem clientes</h2>
    <br>
    <a href="./usuarioForm.php">Cadastrar</a><br>
    <?php
    $objBD = new BD();
    $objBD->conn(); //abre a conexão,
    $result = $objBD->select(); // retorna um array com os dados do bd
    echo "<table>
    <tr>
      <th>ID</th>
      <th>Nome</th>
      <th>Telefone</th>
      <th>CPF</th>

    </tr>";
    foreach ($result as $item) {
        echo "
        <tr>
          <td>".$item['id']."</td>
          <td>".$item['nome']."</td>
          <td>".$item['telefone']."</td>
          <td>".$item['cpf']."</td>
          <td> <a href='./usuarioForm.php?id=".$item['id']."'>Editar</a></td>
        </tr>";
    }
    echo "</table>"
    ?>
        <a href="../index.php">Voltar</a>
</body>
</html>