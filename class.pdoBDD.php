<?php
function newPDO() {
    try {
        $oPDO = new PDO('mysql:host=localhost;dbname=chat','root','');
    } catch (PDOException $ex) {
        echo '<br/>';
        echo "Echec lors de la connexion à MySQL : (" . $ex->getCode() . ") "; 
        echo $ex->getMessage();
        exit();
    }
    
    return $oPDO;
}
        
        function insertMessage($user,$message){
            $monpdo = newPDO();
            $req = "INSERT INTO message (user,message,ip) VALUES(:user,:message,:ip);";
            $insertM = $monpdo->prepare($req);
            $insertM->execute(array('user'=>$user , 'message'=>$message , 'ip'=>$_SERVER['REMOTE_ADDR']));
        }
        
        function selectMessage($id){
            $monpdo = newPDO();
            $req = "SELECT * FROM message WHERE id > :id";
            $selectM = $monpdo->prepare($req);
            $selectM->execute(array('id' => $id));   
            $resultat = $selectM->fetchAll(PDO::FETCH_ASSOC);
            return $resultat;
        }
        
        function lastID(){
            $monpdo = newPDO();
            $req = "SELECT MAX(id) as id FROM message";
            $lastI = $monpdo->prepare($req);
            $lastI->execute(); 
            $resultat = $lastI->fetch(PDO::FETCH_ASSOC);
            return $resultat;
        }

        function lastcon () {

            $monpdo2 = newPDO();
            $req2 = "UPDATE users SET last_con = now() WHERE idUser= :iduser";
            $selectM2 = $monpdo2->prepare($req2);
            $idutilisateur = $_SESSION['idUser'];
            $selectM2->execute(array('iduser' => $idutilisateur));
            $resultat2 = $selectM2->fetch(PDO::FETCH_ASSOC);   

            }

        function utilisateurs_connectes () {
            $monpdo = newPDO();
            /*$req = "SELECT * FROM users WHERE last_con > now() - INTERVAL 1 MINUTE";*/
            $req = "SELECT * FROM users WHERE last_con > now() - INTERVAL 20 SECOND";
            $selectM = $monpdo->prepare($req);
            $selectM->execute();   
            $resultat = $selectM->fetchAll(PDO::FETCH_ASSOC);
            return $resultat;
        }        

?>