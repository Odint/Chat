<!DOCTYPE html>
<html>

    <head>
            <title>Chat 1.0</title>
            <meta charset="utf-8">
            <link rel="stylesheet" href="styles/style.css" />
             <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
             <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    </head>
    <body>
        <div id="chat">
            <label for="user" id="lusr">User :
            <input type="text" name="user" id="user" ></label>
            <div id="affichage">
                <p></p>
            </div>

            <textarea name="message" id="message" ></textarea>
            <input type="button" id="button" value="Envoie !"
        </div>
        <script>
            var id = 0;
            function test(){
                $.post('server.php',{id:id},function(res){
                    var resultat = JSON.parse(res);
                    if(resultat.length >= 1){
                        for(var i=0;i<resultat.length;i++){
                            $('#affichage').append('<p><span>'+resultat[i]['user']+' : </span>'+resultat[i]['message']+' <span>'+'['+resultat[i]['date']+']'+'</span></p>');
                            if(parseInt(resultat[i]['id']) > id){
                                id = resultat[i]['id'];
                            }
                        }
                    }
                     setTimeout(test, 0);
                });
            }
            
            test();
            
            $(document).on('click','#button',function(){
                if($('#user').val()==''){
                    alert('Veuillez entrer un pseudo');
                }else{
                $.post('server.php',{user:$('#user').val(),message:$('#message').val()},function(res){
                });
                $('#message').val('');
                }
            });
            
            
            
            
            
            
            
            
            
        </script>
    </body>
   

</html>
