<?php

include('pdo.php');
/*include(__DIR__.'\pdo.php');*/

if (isset($_REQUEST['message']) && isset($_REQUEST['user'])) {

    insert_message($_REQUEST['user'],$_REQUEST['message']);
}

$id=5;
$test ='';

if (isset($_REQUEST['id'])) {
    $test = select_message ($_REQUEST['id']);
}

echo '<br>';
echo $test;

?>