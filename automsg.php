<?php  
require_once(__DIR__."/pdo.php");
$selectStatement=  $pdo->prepare(
  'SELECT users.*, messages.message, messages.created_at
   FROM users JOIN messages ON messages.id_users=users.id  ');
$selectStatement->execute(); 
$usersList = $selectStatement->fetchAll();
?>

<?php
  foreach ( $usersList as $user){ ?> 
 <div class=tab>
     
     <div class="tablo"><?=$user['created_at']?></div>
     <div class="tablo"><?=$user['user']?></div>
     <div class="tablo"><?=$user['message']?></div>
  
     </div>
        
<?php  } ?>
  