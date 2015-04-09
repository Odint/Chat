<?php
session_start();
include (__DIR__.'/include/functions.php');
if (filter_has_var(INPUT_POST, 'logon')) {
    /*echo 'login';*/
    $filterPost = array(
        'login' => array(
            'filter' => FILTER_SANITIZE_STRING,
            'flags' => array(
                FILTER_FLAG_ENCODE_LOW,
                FILTER_FLAG_ENCODE_HIGH
                )
            ),
        'pass' => array(
            'filter' => FILTER_SANITIZE_SPECIAL_CHARS,
            'flags' => FILTER_FLAG_ENCODE_HIGH
            )
        );
    $tabPost = filter_input_array(INPUT_POST,$filterPost);
    /*var_dump($tabPost);*/
    check_user_filtered_array($tabPost);
}
elseif (filter_has_var(INPUT_POST, 'register')) {
    echo 'register';
    $filterPost = array(
        'nom' => array(
            'filter' => FILTER_SANITIZE_STRING,
            'flags' => array(
                FILTER_FLAG_ENCODE_LOW,
                FILTER_FLAG_ENCODE_HIGH
                )
            ),
        'prenom' => array(
            'filter' => FILTER_SANITIZE_STRING,
            'flags' => array(
                FILTER_FLAG_ENCODE_LOW,
                FILTER_FLAG_ENCODE_HIGH
                )
            ),
            'motpasse' => array(
                'filter' => FILTER_SANITIZE_SPECIAL_CHARS,
                'flags' => FILTER_FLAG_ENCODE_HIGH
            ),
            'verifpasse' => array(
                'filter' => FILTER_SANITIZE_SPECIAL_CHARS,
                'flags' => FILTER_FLAG_ENCODE_HIGH
                )
            );
    $tabPost = filter_input_array(INPUT_POST,$filterPost);
    if ($tabPost['motpasse'] !== $tabPost['verifpasse']) {
        $_SESSION['motpasse'] = $tabPost['motpasse'];
        $_SESSION['verifpasse'] = $tabPost['verifpasse'];
        header("Location: login.php"); 
    }
    header("Location: login.php"); 
    //insert into 
    create_user_filtered_array($tabPost);
  }
else
{
    header("Location: login.php");
}

//avant sans le filter_input
//old

if (isset($_POST['motpasse'])) {
        $_SESSION['motpasse'] = $_POST['motpasse'];
    }
if (isset($_POST['verifpasse'])) {
        $_SESSION['verifpasse'] = $_POST['verifpasse'];
    }
if (isset($_POST['nom'])) {
        $_SESSION['nom'] = $_POST['nom']; 
    }
if (isset($_POST['prenom'])) {
        $_SESSION['prenom'] = $_POST['prenom'];
    }


if (isset($_POST['motpasse'])|isset($_POST['verifpasse'])) {
    if ($_SESSION['motpasse'] != $_SESSION['verifpasse']) {
        header("Location: login.php");    
    }
}
if (isset($_POST['motpasse'])|isset($_POST['verifpasse'])|isset($_POST['nom'])|isset($_POST['prenom'])){
    //create_user($_SESSION['nom'], $_SESSION['prenom'], $_SESSION['motpasse']);    
}
if (isset($_POST['login'])|isset($_POST['motpasselog'])) {
    //check_user($_POST['login'],$_POST['motpasselog']);
}

?>