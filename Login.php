<?php include ('include/header.html'); ?>
<div id="loginF" class="form">
    <form method="POST" action="">
        <label for="login">Login : </label><input type="text" name="login" id="login" value="">
        <label for="pass">Password : </label><input type="password" name="pass" id="pass" value='' >
        <input type="submit" value="Login">
    </form>
    <a href="#" id="inscription">Pas encore de compte ?</a>
</div>
<div id="inscriptionF" class="form">
    <form method="POST" action="">
        <label for="loginI">Login : </label><input type="text" name="loginI" id="loginI" value="">
        <label for="passI">Password : </label><input type="password" name="passI" id="passI" value='' >
        <label for="emailI">Email : </label><input type="email" name="mail" id="mail">
        <input type="submit" value="Inscription">
    </form>
    <a href="#" id="login">Deja inscrit ?</a>
</div>


<script>

$('#inscriptionF').hide();

$(document).on('click','#inscription',function(){
    $('#loginF').hide();
    $('#inscriptionF').show('fas');
});

$(document).on('click','#login',function(){
    $('#inscriptionF').hide();
    $('#loginF').show('fast');
});
</script>
<?php include ('include/footer.html'); ?>