<?php
	$serveur ="localhost";
	$dbname = "demo";
	$user = "root";
	$pass = "";
	
    $id = $_GET["id"];
    $username = $_GET["username"];
	
	try{
        //On se connecte à la BDD
        $dbco = new PDO("mysql:host=$serveur;dbname=$dbname",$user,$pass);
        $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		$del = $dbco->prepare("
			DELETE FROM t_client WHERE id=".$id);
		$del->execute();
        header("Location: client.php?username=".$username);
        exit;
	}
	catch(PDOException $e) {
		echo 'Une erreur est arrivées. Erreur : '.$e->getMessage();
	}
?>