<?php  
require_once(__DIR__."/pdo.php");
$selectStatement=  $pdo->prepare(
  'SELECT users.*, messages.message, messages.created_at
   FROM users JOIN messages ON messages.id_users=users.id  ');
$selectStatement->execute(); 
$usersList = $selectStatement->fetchAll();



  foreach ( $usersList as $user){ ?>
  <div class="each">
             <p>Date:<?=" ".$user['created_at']." "?></p>
             <h1>Pseudo:<?=" ".$user['user']." "?></h1>
             <h1>Dit:<?=" ".$user['message']." "?></h1>
  </div>
        
<?php  } ?>