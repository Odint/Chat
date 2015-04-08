<?php
session_start();
include('class.pdoBDD.php');

if(isset($_REQUEST['user'])&&isset($_REQUEST['message'])){
    insertMessage($_REQUEST['user'], $_REQUEST['message']);
}

if(isset($_REQUEST['id'])){
    echo json_encode(selectMessage($_REQUEST['id']));
    if (isset($_SESSION['idUser'])) {
        lastcon ();   
    } else {
        header("Location: Login.php");          
    }    
}else{
    echo json_encode(lastID());
}
