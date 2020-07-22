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
        $requete1 = "SELECT count(*) FROM t_user where user_name = '".$username."' and user_password = '".$password."' and user_role = 'Commercial'";
        $exec_requete = mysqli_query($db,$requete1);
        $reponse      = mysqli_fetch_array($exec_requete);
        $count = $reponse['count(*)'];
		if($count !=0)
        {
			$_SESSION['username'] = $username;
			header('Location: back_office_commercial.php?username='.$username);           
        }
		else
        {
           header('Location: login_commercial.php?erreur=1'); // utilisateur ou mot de passe incorrect
        }
    }
    else
    {
       header('Location: login_commercial.php?erreur=2'); // utilisateur ou mot de passe vide
    }
}
else
{
   header('Location: login_commercial.php');
}
mysqli_close($db); // fermer la connexion
?>