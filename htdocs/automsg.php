<?php  
require_once(__DIR__."/pdo.php");

$selectStatement=  $pdo->prepare(
  'SELECT users.*, messages.message, messages.created_at
   FROM users JOIN messages ON messages.id_users=users.id ORDER BY created_at ASC ');
$selectStatement->execute(); 
$usersList = $selectStatement->fetchAll();
?>

<?php
  foreach ( $usersList as $user){ ?> 
 <div class=tab>
     
     <div class="tablo"><?=$user['created_at']?></div>
     <div class="tablo" ><span style="color:<?= $user['color']?>;"><?=$user['user']?></span></div>
     <div class="tablo"><?=$user['message']?></div>
  
     </div>
        
<?php  } 


?>
  