<?php
    $serveur = "localhost";
    $dbname = "demo";
    $user = "root";
    $pass = "";

    $name = $_POST['name'];
    $firstname = $_POST['firstname'];
    $societe = $_POST['societe'];
    $identifiant = $_POST['identifiant'];
    $password = $_POST['password'];
    $role = $_POST['role'];
    $id = $_GET['id'];
    $username= $_GET['username'];

    try{
        $dbco = new PDO("mysql:host=$serveur;dbname=$dbname",$user,$pass);
        $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sth = $dbco->prepare("UPDATE `t_user` SET `name`='$name',`firstname`='$firstname',`societe`='$societe',`identifiant`='$identifiant',`password`='$password', `role`='$role' WHERE `id`='$id'");

        $sth->execute();

        header("Location: read.php?username=".$username."&id=".$id."&update='1'");
        exit;
    }
        catch(PDOException $e){
            echo 'Impossible de traiter les données. Erreur : '.$e->getMessage();
    }