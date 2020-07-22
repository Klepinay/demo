<?php
	$serveur	="localhost";
	$dbname		="demo";
	$user		= "root";
	$pass 		= "";

	$commercial = ($_GET['username']);
	$article 	= ($_POST['produit']);
	$quantite 	= ($_POST['quantite']);
	$date 		= ($_POST['date']);
	$client 	= ($_POST['client']);
	$count 		= count($_POST['produit']);
	try{
        //On se connecte à la BDD
        $dbco = new PDO("mysql:host=$serveur;dbname=$dbname",$user,$pass);
        $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		for($i = 0; $i < $count; $i++) {
			 $sth = $dbco->prepare("
				INSERT INTO t_bonlivraison(bl_commercial, bl_client, bl_date, bl_produit, bl_quantite)
				VALUES(:commercial, :client, :date, :produit, :quantite)");
			$sth->bindParam(':commercial',$commercial);
			$sth->bindParam(':client',$client);
			$sth->bindParam(':date',$date);			
			$sth->bindParam(':produit',$produit[$i]);			
			$sth->bindParam(':quantite',$quantite[$i]);	
			
			$sth->execute();
			
			// On retourne l'utilisateur vers la page
			header('Location: /demo/Login/nouveau_devis.php');
			exit;
		}
	}
		
		catch(PDOException $e){
		echo $count;
        echo 'Impossible de traiter les données. Erreur : '.$e->getMessage();
		
	}
?>