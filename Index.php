<?php 
include ('include/header.html'); 
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: login.php"); 
}
?>
        <div id="tchat">
            <div id="affichage" class="ombre">
                <p></p>
            </div>
            <div id="contact"><h1>Contacts</h1></div>
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
            var emoji=[];
            $.get('js/insult.json',function(r){
                for(var i=0;i<r['insulte'].length;i++){
                    insult[i] = r['insulte'][i];
                }
                emoji = r['emoticon'];
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
            function verifEmoticon(string){
                var test = string.split(/[ ,-]/g);
                for(var j=0;j<test.length;j++){
                        if(typeof emoji[test[j]] != 'undefined'){
                           string =  string.replace(test[j],"<img src='"+emoji[test[j]]+"' alt='emoji' >");
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
                            $('#affichage').append('<p><span>'+'['+day+'/'+month+'/'+year+' '+hour+'] '+'</span><span>'+resultat[i]['user']+' : </span>'+verifEmoticon(verifInsult(resultat[i]['message']))+' <span>'+resultat[i]['ip']+'</span></p>');
                            $('#affichage').scrollTop($('#affichage').scrollTop()+40);
                            if(parseInt(resultat[i]['id']) > id){
                                id = resultat[i]['id'];
                            }
                        }
                    }

                     setTimeout(test, 500);
                });
            }
            function affiche_utilisateurs_connectes(){
                $.post('connected_users.php',{who:'everybody'},function(r){
                    var recup = $("h1").get();
                    $('#contact').empty();
                    if(r.length >= 1){
                            $('#contact').append(recup);
                            $('#contact').append(r);
                    }                
                     setTimeout(affiche_utilisateurs_connectes, 5000);
                });
            }                       
            test();
            affiche_utilisateurs_connectes();
            
            
            function envoi(){
                    var message = $('#message').val();
                        $.post('server.php',{user:$('#user').val(),message:message},function(res){
                        });
                        $('#message').val('');    
            }
            
            
            $(document).on('click','#button',envoi);
            
            $('#message').keydown(function(event){
                if ( event.which == 13 && event.shiftKey == true ) {
                    envoi();
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
            $(document).on('click','.utilisateurs',function(){
                var ancien_message = $("#message").val();
                $("#message").val(ancien_message+'@'+$(this).attr('valeur')+' ');
                $("#message").focus();
            });
        </script>
<?php include ('include/footer.html'); ?>