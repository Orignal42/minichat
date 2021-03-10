function charger(){

   $.ajax({
    url:'automsg.php',
    sucsess:function(data){
    $('message').html(data)
   }
   });
}
$(document).ready(function(){

    setInterval(charger,5000);
});

function messagers(){    
    $.post('#messages').val,
  

function(){

    document.querySelector('#messages').value='';

    charger()
} 
}
