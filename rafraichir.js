function charger(){

    setTimeout( function(){
        // on lance une requête AJAX
        $.ajax({
            url : "automsg.php",
             success : function(html){
                $('.messages').autoload(html); // on veut ajouter les nouveaux messages au début du bloc #messages
            }
        });

        charger(); // on relance la fonction

    }, 5000); // on exécute le chargement toutes les 5 secondes

}

charger();



