<?php

 function select_message ($id) {
try {
$oPDO = new PDO('mysql:host=localhost;dbname=chat','root','');
    } catch (PDOException $ex) {
    echo '<br/>';
    echo "Echec lors de la connexion à MySQL : (" . $ex->getCode() . ") ";
    echo $ex->getMessage();
    exit ();
}

/*$limite_haute = $limite * 5 ;
$limite_basse = $limite_haute - 4 ;*/

$query = 'SELECT * FROM message WHERE id > :id '; 
$data = $oPDO->prepare($query);
$data->bindParam(':id', $id, PDO::PARAM_INT);
$data->execute();

$resultat = $data->fetchAll(PDO::FETCH_ASSOC); //constante FETCH_ASSOC ou FETCH_ARRAY
 return json_encode($resultat);
}

 function insert_message ($user, $message) {
try {
$oPDO = new PDO('mysql:host=localhost;dbname=chat','root','');
    } catch (PDOException $ex) {
    echo '<br/>';
    echo "Echec lors de la connexion à MySQL : (" . $ex->getCode() . ") ";
    echo $ex->getMessage();
    exit ();
}

/*$limite_haute = $limite * 5 ;
$limite_basse = $limite_haute - 4 ;*/

$query = 'INSERT INTO message (user,message) VALUES (:user, :mess) ';
$data = $oPDO->prepare($query);
$data->bindParam(':user', $user, PDO::PARAM_STR);
$data->bindParam(':mess', $message, PDO::PARAM_STR);
$data->execute();

$resultat = $data->fetchAll(PDO::FETCH_ASSOC); //constante FETCH_ASSOC ou FETCH_ARRAY

}



function page_max ($user=null,$view=null) {
try {
    $oPDO = new PDO('mysql:host=localhost;dbname=twitr','root','');
        } catch (PDOException $ex) {
        echo '<br/>';
        echo "Echec lors de la connexion à MySQL : (" . $ex->getCode() . ") ";
        echo $ex->getMessage();
        exit ();
    } 
if (isset($view)) {
    if ($view=='public') {
        $user = null;        
    }
}


if (is_null($user)) {
    $query = 'SELECT count(*) as \'tot\' from twits JOIN reftwitusers ON twits.idtwit = reftwitusers.idtwit JOIN users ON reftwitusers.iduser = users.iduser order by twits.created_on DESC' ;   
} elseif ($view=='fav') {
    $query = 'SELECT count(*) as \'tot\' from twits JOIN reftwitusers ON twits.idtwit = reftwitusers.idtwit JOIN users ON reftwitusers.iduser = users.iduser WHERE login = \''.$user.'\' and reftwitusers.type = \''.$view.'\'order by twits.created_on DESC' ;
} else {
    $query = 'SELECT count(*) as \'tot\' from twits JOIN reftwitusers ON twits.idtwit = reftwitusers.idtwit JOIN users ON reftwitusers.iduser = users.iduser WHERE login = \''.$user.'\' order by twits.created_on DESC' ;       
}

    $data = $oPDO->prepare($query);
    $data->execute();
    $resultat = $data->fetchAll(PDO::FETCH_ASSOC); //constante FETCH_ASSOC ou FETCH_ARRAY    
    
    return floor($resultat[0]['tot']/5);
}

function dessine_a_article ($tab,$view=null) {
if (isset($view)) {
    if ($view=='public') {
        $article = '';
        foreach ($tab as $key => $value) {
                $h1 ='<h1 class="h1">'.$value['created_on'].'</h1>';
                $p1 ='<p class="message">'.$value['message'].'</p>';
                $p2 ='<p class="log">@'.$value['login'].'</p>';    

                $article .= '<article>'.$h1.$p1.'<form method="post" ';
                $article .= 'action="backoffice.php?id='.$value['idtwit'].'&origin_log='.$value['login'].'&type=RT"><input type="submit" class="rt" value="RT"></form><form method="post" action="backoffice.php?id='.$value['idtwit'].'&origin_log='.$value['login'].'&type=FAV"><input type="submit" class="rt" value="FAV"></form>'.$p2.'</article>';

                }
    } elseif ($view=='fav') {
                    $article = '';
            foreach ($tab as $key => $value) {
                    $h1 ='<h1 class="h1">'.$value['created_on'].'</h1>';
                    $p1 ='<p class="message">'.$value['message'].'</p>';

                if (!is_null($value['origin'])) {
                    $login_author = get_his_login($value['origin']);
                    /*$p2 ='<span>FAV (author : '.$login_author.')</span><p class="log">@'.$value['login'].'</p>';                        */
                    $p2 ='<form method="post" action="backoffice.php?id='.$value['idtwit'].'&origin_log='.$value['login'].'&type=RT"><input type="submit" class="rt" value="RT"></form><span>FAV (author : '.$login_author.')</span><form method="post" action="backoffice.php?id='.$value['idtwit'].'&origin_log='.$value['login'].'&type=erase_fav"><input type="submit" class="sp" value="X"></form><p class="log">@'.$value['login'].'</p>';
                    /*<form method="post" action="backoffice.php?id='.$value['idtwit'].'&origin_log='.$value['login'].'&type=RT"><input type="submit" class="sp" value="X"></form>*/
                    
                } else {
                    $p2 ='<span>'.$value['origin'].'</span><p class="log">@'.$value['login'].'</p>';    
                }

                if (!is_null($value['origin'])) {
                    $article .= '<article id="fv">'.$h1.$p1.$p2.'</article>';    
                } else {
                    $article .= '<article>'.$h1.$p1.$p2.'</article>';    
                }
            } 
    } else {
            $article = '';
            foreach ($tab as $key => $value) {
                    $h1 ='<h1 class="h1">'.$value['created_on'].'</h1>';
                    $p1 ='<p class="message">'.$value['message'].'</p>';

                if (!is_null($value['origin'])) {
                    $login_author = get_his_login($value['origin']);
                    $p2 ='<span>RT (author : '.$login_author.')</span><p class="log">@'.$value['login'].'</p>';                        
                } else {
                    $p2 ='<span>'.$value['origin'].'</span><p class="log">@'.$value['login'].'</p>';    
                }

                if (!is_null($value['origin'])) {
                    $article .= '<article id="rt">'.$h1.$p1.$p2.'</article>';    
                } else {
                    $article .= '<article>'.$h1.$p1.$p2.'</article>';    
                }

            } 
    }     
} else {
        $article = '';
        foreach ($tab as $key => $value) {
                $h1 ='<h1 class="h1">'.$value['created_on'].'</h1>';
                $p1 ='<p class="message">'.$value['message'].'</p>';
                $p2 ='<p class="log">@'.$value['login'].'</p>';    
                //$article .= '<form action="backoffice.php"><article>'.$h1.$p1.'<input class="rt" type="submit" value="RT">'.$p2.'</article><form>';    
                $article .= '<article>'.$h1.$p1.$p2.'</article>';
        }
}
return $article;
}

function insert_into_reftwitusers ($idt,$idu,$ido,$type) {
    try {
    $oPDO = new PDO('mysql:host=localhost;dbname=twitr','root','');
        } catch (PDOException $ex) {
        echo '<br/>';
        echo "Echec lors de la connexion à MySQL : (" . $ex->getCode() . ") ";
        echo $ex->getMessage();
        exit ();
    }  
    
    $query = 'INSERT INTO reftwitusers (idtwit, iduser, origin, type) VALUES (:idt, :idu, :ido, :typ) ';
    $data = $oPDO->prepare($query);

    
    $data->bindParam(':idt', $idt, PDO::PARAM_INT);
    $data->bindParam(':idu', $idu, PDO::PARAM_INT);
    $data->bindParam(':ido', $ido, PDO::PARAM_INT);
    $data->bindParam(':typ', $type, PDO::PARAM_INT);
    $data->execute();
}

function delete_into_reftwitusers ($idt,$idu,$type) {
    try {
    $oPDO = new PDO('mysql:host=localhost;dbname=twitr','root','');
        } catch (PDOException $ex) {
        echo '<br/>';
        echo "Echec lors de la connexion à MySQL : (" . $ex->getCode() . ") ";
        echo $ex->getMessage();
        exit ();
    }  
    
    $query = 'DELETE FROM reftwitusers WHERE iduser = :idu AND idtwit = :idt AND type =:typ';
    $data = $oPDO->prepare($query);

    
    $data->bindParam(':idt', $idt, PDO::PARAM_INT);
    $data->bindParam(':idu', $idu, PDO::PARAM_INT);
    $data->bindParam(':typ', $type, PDO::PARAM_INT);
    $data->execute();
  
}

function get_his_userid ($login) {
    try {
    $oPDO = new PDO('mysql:host=localhost;dbname=twitr','root','');
        } catch (PDOException $ex) {
        echo '<br/>';
        echo "Echec lors de la connexion à MySQL : (" . $ex->getCode() . ") ";
        echo $ex->getMessage();
        exit ();
    }   
    $query = 'SELECT iduser from users WHERE login=:log ';
    $data = $oPDO->prepare($query);
    $data->bindParam(':log', $login, PDO::PARAM_STR);
    $data->execute();
    /*$resultat = $data->fetchAll(PDO::FETCH_ASSOC); */
    $resultat = $data->fetch(PDO::FETCH_ASSOC); //constante FETCH_ASSOC ou FETCH_ARRAY
    $resultat = $resultat['iduser'];

    /*$resultat = $resultat[0]['iduser'];*/


 return $resultat;    

}

function get_his_login ($id) {
    try {
    $oPDO = new PDO('mysql:host=localhost;dbname=twitr','root','');
        } catch (PDOException $ex) {
        echo '<br/>';
        echo "Echec lors de la connexion à MySQL : (" . $ex->getCode() . ") ";
        echo $ex->getMessage();
        exit ();
    }   
    $query = 'SELECT login from users WHERE iduser=:id ';
    $data = $oPDO->prepare($query);
    $data->bindParam(':id', $id, PDO::PARAM_STR);
    $data->execute();
    $resultat = $data->fetchAll(PDO::FETCH_ASSOC); //constante FETCH_ASSOC ou FETCH_ARRAY
    $resultat = $resultat[0]['login'];

 return $resultat;    

}

//UPDATE retTwitUsers JOIN twits ON relTwitUsers.idTwit = twits.idTwit SET relTwitUsers.created_on = twits.created_on
?>