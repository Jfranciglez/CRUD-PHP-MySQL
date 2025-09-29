<?php
  $conection = mysqli_connect(hostname: "db", username: "root", password: "test", database: "almacen");

  $accion = $_POST["accion"] ?? "";
  $id = $_POST["id"] ?? "";
  $idAntiguo = $_POST["idAntiguo"] ?? "";
  $nombre = $_POST["nombre"] ?? "";
  $categoria = $_POST["categoria"] ?? "";
  $precio = $_POST["precio"] ?? "";
  $stock = $_POST["stock"] ?? "";