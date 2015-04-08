<?php 
session_start();
include ('include/header.html'); 
unset($_SESSION['login']);
unset($_SESSION['idUser']);
unset($_SESSION['connected']);
?>
<div id="loginF" class="form">
    <form method="POST" action="backoffice.php">
        <label for="login">Login : </label><input required="required" type="text" name="login" id="login" value="">
        <label for="pass">Password : </label><input required="required" type="password" name="pass" id="pass" value='' >
        <input name="logon" type="submit" value="Login">
    </form>
    <a href="#" id="inscription">Pas encore de compte ?</a>
</div>
<div id="inscriptionF" class="form">
    <form method="POST" action="backoffice.php">
        <label for="nom">Nom : </label><input required="required" type="text" name="nom" id="nom"><br>
        <label for="prenom">Prenom : </label><input required="required" type="text" name="prenom" id="prenom"><br>
        <label for="motpasse">Password : </label><input required="required" type="password" name="motpasse" id="motpasse" value='' ><br>
        <label for="verifpasse">Password : </label><input required="required" type="password" name="verifpasse" id="verifpasse" value='' ><br>
        <!-- <label for="emailI">Email : </label><input required="required" type="email" name="mail" id="mail"> -->
        <input name="register" type="submit" value="Inscription">
    </form>
    <a href="#" id="login">Deja inscrit ?</a>
</div>


<script>

$('#inscriptionF').hide();

$(document).on('click','#inscription',function(){
    $('#loginF').hide();
    $('#inscriptionF').show('fast');
});

$(document).on('click','#login',function(){
    $('#inscriptionF').hide();
    $('#loginF').show('fast');
});
</script>
<?php include ('include/footer.html'); ?>