function charger(){
 
   $.ajax({
    type:"POST",
    url:'#messages',function(data){
    $('#messages').html(data); 
        }
    
   });
}

$(document).ready(function(){

    setInterval(charger,5000);
});

function messagers(){    
    $.post('php/function.php',{            //recuperer les champs
        users:$('#users').val(),            //
        message:$('#messages').val()  
        },function(){
            
            
            document.querySelector('#messages').value='';  
            charger()
        })
    }