<?php
  require_once(__DIR__."/pdo.php");

  include 'RandomColor.php';
use \Colors\RandomColor;
$color = RandomColor::one(array('format'=>'hex'));

$user=$_POST["users"];

setcookie("useres",$user,time()+3600,"/");
if (empty($_POST["message"])){
    die("parametres manquants");
    
}  


$message=$_POST["message"];
$user=$_POST["users"];

$insertStatement= $pdo-> prepare('SELECT* FROM users WHERE user=? ');
$insertStatement->execute([$user]);
$verifpseudo=$insertStatement->fetch(PDO::FETCH_ASSOC);

 if($verifpseudo){
   

    $insertMessage = $pdo->prepare(
      "INSERT INTO messages
      (message,created_at,id_users)
      VALUES (?,?,?)
    ");
     date_default_timezone_set('Europe/Paris');
     $datetime=date('Y-m-d H:i:s');
    $insertMessage-> execute([
        $message,
        $datetime,
        $verifpseudo['id']
     ]); 

}

    else{


        $insertUsersStatement = $pdo->prepare("
INSERT INTO users
(user,ip, color)
VALUES
(?,?,?)"
);


$insertUsersStatement-> execute([

  $_POST["users"],
  $_SERVER['REMOTE_ADDR'],
  $color

]);


$user_id = $pdo->lastInsertId();

$insertMessagesStatement = $pdo->prepare(
  "INSERT INTO messages (message, created_at, id_users)
  VALUES (?,?,?)
");
date_default_timezone_set('Europe/Paris');
$datetime=date('Y-m-d H:i:s');

$insertMessagesStatement-> execute([
  $_POST["message"], 
  $datetime,
  $user_id
]);
}



