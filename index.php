<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "stark32";

  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $stmt = $conn->prepare("CALL PR_LISTAR_NAVES(0);");
  $stmt->execute();
  $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
  $registros = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="bootstrap.min.css" rel="stylesheet">
</head>
<body class="container">
  <h1>STARK INDUSTRIES</h1>

  <h2>NAVES DISPONIBLES en la empresa</h2>

  <table class="table">
    <thead>
      <tr>
        <th>Id</th>
        <th>Nombre</th>
        <th>Modelo</th>
        <th>Capacidad</th>
        <th>Estatus</th>
        <th>Acciones</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($registros as $registro) { ?>
          <tr>
            <td><?php echo $registro['idnaves']; ?></td>
            <td><?php echo $registro['nombre']; ?></td>
            <td><?php echo $registro['modelo']; ?></td>
            <td><?php echo $registro['capacidad']; ?></td>
            <td><?php echo $registro['estatus']; ?></td>
            <td><a href="#">Editar</a<</td>
          </tr>
      <?php } ?>
    </tbody>
  </table>

</body>
</html>