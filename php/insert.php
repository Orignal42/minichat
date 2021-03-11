<?php


require_once(__DIR__."/pdo.php");
$insertUsersStatement = $pdo->prepare("
INSERT INTO users
(user)
VALUES
(?)");


$insertUsersStatement-> execute([

  $_POST["users"],
  

]);


$user_id = $pdo->lastInsertId();

$insertMessagesStatement = $pdo->prepare(
  "INSERT INTO messages (message, created_at, user_id)
  VALUES (?,?,?)
");
date_default_timezone_set('Europe/Paris');
$datetime=date('Y-m-d H:i:s');

$insertMessagesStatement-> execute([
  $_POST["message"], 
  $datetime,
  $user_id
]);
   






?>

