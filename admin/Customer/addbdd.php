<?php
    	$serveur ="localhost";
        $dbname = "demo";
        $user = "root";
        $pass = "";
        
        $username = $_GET['username'];
        $name = $_POST['name'];
        $firstname = $_POST['firstname'];
        $adresse = $_POST['adress'];
        $mail = $_POST['mail'];
        $tel = $_POST['tel'];

        try {
        $dbco = new PDO("mysql:host=$serveur;dbname=$dbname",$user,$pass);
        $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sth = $dbco->prepare("
        INSERT INTO `t_client`(`name`, `firstname`, `adresse`, `tel`, `mail`) 
        VALUES(:name, :firstname, :adresse, :tel, :mail)");
        $sth->bindParam(':name',$name);
        $sth->bindParam(':firstname',$firstname);
        $sth->bindParam(':adresse',$adresse);
        $sth->bindParam(':tel',$tel);
        $sth->bindParam(':mail',$mail);

        $sth->execute();

        header("Location: client.php?username=".$username);
        exit;
        }
        catch(PDOException $e){
            echo 'Impossible de traiter les données Erreur : '.$e->getMessage();
        }

