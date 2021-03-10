
<?php
require_once(__DIR__."/pdo.php");




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
   
  <section id="chat">
      <div class="messages"id="messages()">
    <?php include "./automsg.php";  ?>

      </div>


      <div class="utilisateur">  
         <?php
         
         foreach ( $usersList as $user){ ?>
                       
                <h2><?= $user['user']?></h2>          
                <?php }  ?>
                <p>Dernier connecté</p>
                    <?= $_COOKIE["useres"]; ?>

         </div>
       
    
    
      

  </section>
<!--   <form action="./php/insert.php" method="post">-->
  <form action="./php/function.php" method="post">
           <div class="send">     
      <p><label>User:<input type="text" name="users" required placeholder="users" id="users"></label></p>
      <p><label> Message:<input type="text" name="message" required placeholder="messages"id="messages" >   </label></p>                 

      <button onclick="messagers()" >Envoyer message</button>
      </div>
 </form>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="rafraichir.js"></script>
</body>
</html>
