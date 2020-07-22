<?php
    $serveur = "localhost";
    $dbname = "demo";
    $user = "root";
    $pass = "";

    $name = $_POST['name'];
    $firstname = $_POST['firstname'];
    $adresse = $_POST['adress'];
    $tel = $_POST['tel'];
    $mail = $_POST['mail'];
    $id = $_GET['id'];
    $username= $_GET['username'];

    try{
        $dbco = new PDO("mysql:host=$serveur;dbname=$dbname",$user,$pass);
        $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sth = $dbco->prepare("UPDATE `t_client` SET `name`='$name',`firstname`='$firstname',`adresse`='$adresse',`tel`='$tel',`mail`='$mail' WHERE `id`='$id'");

        $sth->execute();

        header("Location: read.php?username=".$username."&id=".$id."&update='1'");
        exit;
    }
        catch(PDOException $e){
            echo 'Impossible de traiter les données. Erreur : '.$e->getMessage();
    }