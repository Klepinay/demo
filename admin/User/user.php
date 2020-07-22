<?php
    $username = $_GET['username'];
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Liste des Clients</title>
        <link rel="stylesheet" href="\Demo\style.css" type="text/css">
        <link rel="stylesheet" href="\Demo\css\bootstrap.css" type="text/css">
    </head>
    <body>

        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">            
                <ul  class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="\Demo\Admin\backOffice.php?username=<?php echo $username ?>">Tableau de Bord</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="\Demo\admin\Customer\client.php?username=<?php echo $username ?>">Clients</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Catalogue</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="\Demo\admin\User\user.php?username=<?php echo $username ?>">Utilisateurs</a>
                    </li>
                </ul> 
                <a href="\Demo\index.php?deconnection=true&username=<?php echo $username ?>" class="btn btn-danger"> Déconnection</a>  
                <div id="content">
                    <?php
                    session_start();
                    if(isset($_GET['deconnexion']))
                    { 
                    if($_GET['deconnexion']==true)
                    {  
                        session_unset();
                        header("location:index.php");
                    }
                    }
                    else if($_SESSION['username'] !== ""){
                        $user = $_SESSION['username'];
                    }
                    ?> 
                </div>        
            </div>
        </nav>
        <div class="container">
            <a href="add.php?username=<?php echo $username ?>" class="btn btn-success" style="margin-top : 3%"> + Ajouter un Utilisateur</a>
        <table class="table table-info border="1" style="width: 100%; margin-top: 3%; ">
        <thead class="thead-dark">
            <th>
                Nom
            </th>
            <th>
                Prénom
            </th>
            <th>
                Entreprise
            </th>
            <th>
                Identifiant
            </th>
            <th>
                Mot de Passe
            </th>
            <th>
                Role
            </th>
            <th>
                Edition
            </th>
        </thead>
            <?php 
					$bdd = new PDO('mysql:host=localhost;dbname=demo;charset=utf8', 'root', '');
					$users = $bdd->query("SELECT * FROM `t_user` ORDER BY id");
					foreach ($users as $user): 
			?>
            <tr>
                <td class="table-info">
                    <?php echo $user['name'] ?>
                </td>
                <td>
                    <?php echo $user['firstname'] ?>
                </td>
                <td>
                    <?php echo $user['societe'] ?>
                </td>
                <td>
                    <?php echo $user['identifiant'] ?>
                </td>
                <td>
                    <?php echo $user['password'] ?>
                </td>
                <td>
                    <?php echo $user['role'] ?>
                </td>
                <td>
                    <a class="btn btn-success" href="read.php?username=<?php echo $username ?>&id=<?php echo $user['id'] ?>&update=0">Modifier</a>
                    <a class="btn btn-danger" href="delete.php?username=<?php echo $username ?>&id=<?php echo $user['id'] ?>">Supprimer</a>
                </td>
            </tr>
            <?php endforeach ?>
        </table>
    </div>
    </body>
</html>