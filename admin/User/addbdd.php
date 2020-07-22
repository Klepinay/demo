<?php
    	$serveur ="localhost";
        $dbname = "demo";
        $user = "root";
        $pass = "";
        
        $username = $_GET['username'];
        $name = $_POST['name'];
        $firstname = $_POST['firstname'];
        $societe = $_POST['societe'];
        $identifiant = $_POST['identifiant'];
        $password = $_POST['password'];
        $role = $_POST['role'];

        try {
        $dbco = new PDO("mysql:host=$serveur;dbname=$dbname",$user,$pass);
        $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sth = $dbco->prepare("
        INSERT INTO `t_user`(`name`, `firstname`, `societe`, `identifiant`, `password`, `role`) 
        VALUES(:name, :firstname, :societe, :identifiant, :password, :role)");
        $sth->bindParam(':name',$name);
        $sth->bindParam(':firstname',$firstname);
        $sth->bindParam(':societe',$societe);
        $sth->bindParam(':identifiant',$identifiant);
        $sth->bindParam(':password',$password);
        $sth->bindParam(':role',$role);

        $sth->execute();

        header("Location: user.php?username=".$username);
        exit;
        }
        catch(PDOException $e){
            echo 'Impossible de traiter les données Erreur : '.$e->getMessage();
        }

