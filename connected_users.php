<?php
session_start();
include('class.pdoBDD.php');


if (isset($_REQUEST['who'])) {
    $tab = utilisateurs_connectes ();
    $utilisateurs_connectes ='';

    for ($i=0; $i<count($tab) ; $i++) { 
         $utilisateurs_connectes .= '<span class="utilisateurs">'.$tab[$i]['login'].'</span><br>';
     } 
    echo ($utilisateurs_connectes);
}
