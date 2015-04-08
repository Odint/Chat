<?php 
include ('include/header.html'); 
session_start();
?>
        <div id="tchat">
            <div id="affichage" class="ombre">
                <p></p>
                <div id="contact"></div>
            </div>
            <label for="user" id="label"> User :
                <input type="text" name="user" id="user" value="<?php 
                if (isset($_SESSION['login'])) {
                    echo $_SESSION['login'];
                } else {
                    echo '';
                }
                
                ?>" readonly><a id="deconn" href="Login.php">Se déconnecter</a>
            </label>        
            <div id="interface" class="ombre">
                <textarea name="message" id="message" ></textarea>
                <input type="button" id="button" value="Envoyer">
            </div>       
        </div>
        <script>
            var id = 0;
            var insult=[];
            $.get('js/insult.json',function(r){
                for(var i=0;i<r['insulte'].length;i++){
                            insult[i] = r['insulte'][i];
                }
            });
            
            
                        
            function verifInsult(string){
                var test = string.split(/[ ,-]/g);
                for(var j=0;j<test.length;j++){
                    for(var i=0;i<insult.length;i++){
                        if(test[j] === insult[i]){
                           string =  string.replace(insult[i],"<span valeur='"+insult[i]+"' class='censure'>[Censuré]</span>");
                        }
                    }
                }
                    return string;
            }
            
            
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
                            $('#affichage').append('<p><span>'+'['+day+'/'+month+'/'+year+' '+hour+'] '+'</span><span>'+resultat[i]['user']+' : </span>'+verifInsult(resultat[i]['message'])+' <span>'+resultat[i]['ip']+'</span></p>');
                            if(parseInt(resultat[i]['id']) > id){
                                id = resultat[i]['id'];
                            }
                        }
                    }

                     setTimeout(test, 0);
                });
            }
            function affiche_utilisateurs_connectes(){
                $.post('connected_users.php',{who:id},function(r){
                    if(r.length >= 1){
                            $('#contact').append(r);
                    }                
                     setTimeout(test, 0);
                });
            }                       
            test();
            affiche_utilisateurs_connectes();
            
            $(document).on('click','#button',function(){
                if($('#user').val()==''){
                    alert('Veuillez entrer un pseudo');
                }else{
                    var message = $('#message').val();
                        $.post('server.php',{user:$('#user').val(),message:message},function(res){
                        });
                        $('#message').val('');    
                    }
                });
                
                
            $(document).on('click','.censure',function(){
                $(this).text($(this).attr('valeur'));
                $(this).attr('class','decensure');
            });
            
            $(document).on('click','.decensure',function(){
                $(this).text('[Censuré]');
                $(this).attr('class','censure');
            });
        </script>
<?php include ('include/footer.html'); ?>