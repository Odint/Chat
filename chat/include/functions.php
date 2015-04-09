<?php
function connectDB () {
    $link = mysqli_connect('localhost','root','','chat');  
    /* Vérification de la connexion */
    if (mysqli_connect_errno()) {
        printf("Échec de la connexion : %s\n", mysqli_connect_error());
        exit();
    }    
    return $link;
}
function closeBDD($link) {
    
    /* Fermeture de la connexion */
    mysqli_close($link);

}

function create_user_filtered_array ($array) { // //avec le filtered array
    //$nom,$prenom,$password
    $link = connectDB();
    $cryptedpass = password_hash($array['motpasse'], PASSWORD_BCRYPT);
    $query = 'INSERT INTO users (nom,prenom,password,created_on) VALUES (\''.$array['nom'].'\', \''.$array['prenom'].'\', \''.$cryptedpass.'\',now())';
    $result = mysqli_query($link, $query); 
    if(mysqli_errno($link) != 0) {
        echo '<h2>Problème insertion dans la base ...</h2>';
        exit();
    }
    $_SESSION['idUser'] = mysqli_insert_id($link) ;
    $login = $array['prenom'][0].'.'.substr($array['nom'], 0, 6). mysqli_insert_id($link);
    $query2 = 'UPDATE users SET login =\''.$login.'\' WHERE idUser='.mysqli_insert_id($link);
    $result = mysqli_query($link, $query2); 
    if(mysqli_errno($link) != 0) {
        echo '<h2>Problème insertion dans la base ...</h2>';
        exit();
    }  
    $_SESSION['login']=$login;
    $_SESSION['connected'] = TRUE ;
    closeBDD($link);
    header("Location: Index.php");  
}
function check_user_filtered_array ($array) { //avec le filtered array
    $link = connectDB();
    $query = 'SELECT * FROM users WHERE login=\''.$array['login'].'\'';
    $result = mysqli_query($link, $query); 
    while($row = mysqli_fetch_array($result)) {

    if (password_verify($array['pass'],$row['password'])) {
            echo 'pasword ok';
            $_SESSION['connected'] = TRUE ;
            $_SESSION['idUser'] = $row['idUser'] ;
            $_SESSION['login']=$row['login'] ;
            closeBDD($link);
            header("Location: Index.php");           
         } else {
            echo 'pasword not ok';
            $_SESSION['connected'] = FALSE ;
            closeBDD($link);               
         }
    } 

    
}
?>