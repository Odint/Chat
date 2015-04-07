<?php
function newPDO() {
    try {
        $oPDO = new PDO('mysql:host=localhost;dbname='.BDD, USER_BDD, MDP_BDD);
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
            $req = "INSERT INTO messsage (user,message) VALUES(:user,:message);";
            $insertM = $monpdo->prepare($req);
            $insertM->execute(array('user'=>$user , 'message'=>$message));
        }
        
        function selectMessage($id){
            $monpdo = newPDO();
            $req = "SELECT * FROM message WHERE id > :id";
            $selectM = $monpdo->prepare($req);
            $selectM->execute(array('id' => $id));   
            $resultat = $monpdo->fetch(PDO::FETCH_ASSOC);
            return $resultat;
        }
        
        
?>