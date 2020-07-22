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
                        <a class="nav-link" href="#">Devis</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Commande</a>
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
            <a href="add.php?username=<?php echo $username ?>" class="btn btn-success" style="margin-top : 3%"> + Ajouter un client</a>
        <table class="table table-info border="1" style="width: 100%; margin-top: 3%; ">
        <thead class="thead-dark">
            <th>
                Nom
            </th>
            <th>
                Prénom
            </th>
            <th>
                Adresse
            </th>
            <th>
                Email
            </th>
            <th>
                Tel
            </th>            
            <th>
                Edition
            </th>
        </thead>
            <?php 
					$bdd = new PDO('mysql:host=localhost;dbname=demo;charset=utf8', 'root', '');
					$customers = $bdd->query("SELECT * FROM `t_client` ORDER BY id");
					foreach ($customers as $customer): 
			?>
            <tr>
                <td class="table-info">
                    <?php echo $customer['name'] ?>
                </td>
                <td>
                    <?php echo $customer['firstname'] ?>
                </td>
                <td>
                    <?php echo $customer['adresse'] ?>
                </td>
                <td>
                    <?php echo $customer['mail'] ?>
                </td>
                <td>
                    <?php echo $customer['tel'] ?>
                </td>
                <td>
                    <a class="btn btn-info" href="read.php?username=<?php echo $username ?>&id=<?php echo $customer['id'] ?>&update=0">Voir</a>
                    <a class="btn btn-danger" href="delete.php?username=<?php echo $username ?>&id=<?php echo $customer['id'] ?>">Supprimer</a>
                </td>
            </tr>
            <?php endforeach ?>
        </table>
    </div>
    </body>
</html>