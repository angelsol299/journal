<?php
header('Location: ../index.php');

require_once 'database.php';

$hashed = password_hash($_POST["password"], PASSWORD_DEFAULT);

$statement = $conn->prepare(
  "INSERT INTO users
  (username, password)
  VALUES (:username, :password)"
);
$statement->execute([
  ":username" => $_POST["username"],
  ":password" => $hashed
]);
