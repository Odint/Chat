<?php 
include ('include/header.html'); 
session_start();
?>

        <div id="chat">
            <div id="minicontainer">
                <label for="user" id="lusr">User :
                <input type="text" name="user" id="user" value="<?php echo $_SESSION['login'] ?>" readonly></label><a id="deconn" href="Login.php">Se déconnecter</a>
            </div>
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
                            var year = resultat[i]['date'].substr(0,4);
                            var month = resultat[i]['date'].substr(5,2);
                            var day = resultat[i]['date'].substr(8,2);
                            var hour = resultat[i]['date'].substr(11);
                            /*resultat[i]['date']*/
                            $('#affichage').append('<p><span>'+'['+day+'/'+month+'/'+year+' '+hour+'] '+'</span><span>'+resultat[i]['user']+' : </span>'+resultat[i]['message']+' <span>'+resultat[i]['ip']+'</span></p>');
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
