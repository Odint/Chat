<?php include ('include/header.html'); ?>

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
<?php include ('include/footer.html'); ?>
