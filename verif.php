<?php
session_start();
if(isset($_POST['username']) && isset($_POST['password']))
{
    // connexion à la base de données
    $db_username = 'root';
    $db_password = '';
    $db_name     = 'demo';
    $db_host     = 'localhost';
    $db = mysqli_connect($db_host, $db_username, $db_password,$db_name)
           or die('could not connect to database');
    
    // on applique les deux fonctions mysqli_real_escape_string et htmlspecialchars
    // pour éliminer toute attaque de type injection SQL et XSS
    $username = mysqli_real_escape_string($db,htmlspecialchars($_POST['username'])); 
    $password = mysqli_real_escape_string($db,htmlspecialchars($_POST['password']));
    
    if($username !== "" && $password !== "")
    {
        $requete1 = "SELECT count(*) FROM t_user where user_identifiant = '".$username."' and user_password = '".$password."'";
        $requete2 = "SELECT * FROM t_user WHERE user_identifiant='".$username."'";
        $exec_requete = mysqli_query($db,$requete1);
        $reponse      = mysqli_fetch_array($exec_requete);
        $count = $reponse['count(*)'];
        $exec_requete2 = mysqli_query($db,$requete2);
        $reponse2 = mysqli_fetch_array($exec_requete2);
        $role = $reponse2['user_role'];
		if($count != 0 && $role == 'Admin')
        {
			$_SESSION['username'] = $username;
			header("Location: admin\Backoffice.php?username=".$username."&role=".$role);           
        }
        else if($count != 0 && $role ='Commercial')
        {
            $_SESSION['username'] = $username;
            header('Location: shop\home.php');
        }
        else
        {
           header('Location: index.php?erreur=1'); // utilisateur ou mot de passe incorrect
        }
    }
    else
    {
       header('Location: index.php?erreur=2'); // utilisateur ou mot de passe vide
    }
}
else
{
   header('Location: index.php');
}
mysqli_close($db); // fermer la connexion
?>