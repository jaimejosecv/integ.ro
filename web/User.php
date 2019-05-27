<?php
class User {
		
	private $dbHost     = "localhost";
    private $dbUsername = "teziocom_pdt";
    private $dbPassword = "Tezio159Pdt*";
    private $dbName     = "teziocom_pdt";
    private $userTbl    = 'users';
    private $userTb2    = 'participante';

	function __construct(){
        if(!isset($this->db)){
				
            // Connect to the database
            $conn = new mysqli($this->dbHost, $this->dbUsername, $this->dbPassword, $this->dbName);
            if($conn->connect_error){

                die("Error al conectar con MySQL: " . $conn->connect_error);
            }else{
                $this->db = $conn;
            }
        }
    }
	
	function checkUser($userData = array()){
        if(!empty($userData)){

            $prevQuery = "SELECT * FROM ".$this->userTbl." WHERE oauth_provider = '".$userData['oauth_provider']."' AND oauth_uid = '".$userData['oauth_uid']."'";
            $prevResult = $this->db->query($prevQuery);
            if($prevResult->num_rows > 0){

                $query = "UPDATE ".$this->userTbl." SET first_name = '".$userData['first_name']."', last_name = '".$userData['last_name']."', email = '".$userData['email']."', locale = '".$userData['locale']."', picture = '".$userData['picture']."', modified = '".date("Y-m-d H:i:s")."' WHERE oauth_provider = '".$userData['oauth_provider']."' AND oauth_uid = '".$userData['oauth_uid']."'";
                $update = $this->db->query($query);
				
                $query2 = "UPDATE ".$this->userTb2." SET nom_participante = '".$userData['first_name']."', ape_participante = '".$userData['last_name']."', ema_participante = '".$userData['email']."', ava_participante = '".$userData['picture']."' WHERE oauth_provider = '".$userData['oauth_provider']."' AND oauth_uid = '".$userData['oauth_uid']."'";
                $update = $this->db->query($query2);				
            }else{

                $query = "INSERT INTO ".$this->userTbl." SET oauth_provider = '".$userData['oauth_provider']."', oauth_uid = '".$userData['oauth_uid']."', first_name = '".$userData['first_name']."', last_name = '".$userData['last_name']."', email = '".$userData['email']."', locale = '".$userData['locale']."', picture = '".$userData['picture']."', created = '".date("Y-m-d H:i:s")."', modified = '".date("Y-m-d H:i:s")."'";
                $insert = $this->db->query($query);
				
				$query2 = "INSERT INTO ".$this->userTb2." SET cc_participante = '0', nom_participante = '".$userData['first_name']."', ape_participante = '".$userData['last_name']."', dir_participante = ' ', ema_participante = '".$userData['email']."', ava_participante = '".$userData['picture']."', ima_participante = 'fondo.jpg', cla_participante = '".$userData['oauth_uid']."', fec_participante = '$fecha', hor_participante = '$hora', est_participante = '1', sob_participante = ' ', nac_participante = '$fecha', pos_participante = ' ', car_participante = ' ', mov_participante = '0', oauth_provider = '".$userData['oauth_provider']."', oauth_uid = '".$userData['oauth_uid']."'";
				$insert = $this->db->query($query2);
            }
            
            $result = $this->db->query($prevQuery);
            $userData = $result->fetch_assoc();
        }

        return $userData;
    }
}
?>