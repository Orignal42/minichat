<?php


  require_once(__DIR__."/pdo.php");


  $selectStatement=  $pdo->prepare('SELECT users.*, messages.message, messages.created_at FROM users JOIN messages ON messages.user_id=users.id ');
  $selectStatement->execute(); 
  $usersList = $selectStatement->fetchAll();
 
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Minichat</title>
    <link href="./css/custom.css" rel="stylesheet">
</head>
<body>
<?php if(isset($_GET["message"])) : ?>
   <div style="padding:10px;background:green;color:#fff;">
   <?=$_GET["message"]?>
   </div>          
     <?php endif ;?>  
    <section id="messages">
    <div class="message"
  <?php   
    foreach ( $usersList as $user){ ?>
               <div class="message">
               <p><?= $user['created_at']?></p>
               <h1><?= $user['user']?></h1>
  
               <h6><?= $user['message']?></h6>

           </div>

  <?php  } ?>

      <div>
      <?php
      foreach ( $usersList as $user){ ?>
               <div class="utilisateur">
              
               <h1><?= $user['user']?></h1>
  
               <?php }  ?>
           </div>
         
      
      </div>

      
        

    </section>
 <!--   <form action="./php/insert.php" method="post">-->
    <form action="./php/function.php" method="post">
             <div class="send">     
        <p><label>User:<input type="text" name="users" required placeholder="users"></label></p>
        <p><label> Message:<input type="text" name="message" required placeholder="messages" >   </label></p>                 
 
        <button>Envoyer message</button>
        </div>
    </form>
    
</body>
</html>
