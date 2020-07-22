<?php
    $username = $_GET['username'];
    $id = $_GET['id'];
    $update = $_GET['update'];
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Back - Office</title>
        <link rel="stylesheet" href="\Demo\Commercial\style.css" type="text/css">
        <link rel="stylesheet" href="\Demo\css\bootstrap.css" type="text/css">
    </head>
    <body>

        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">            
                <ul  class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="\Demo\Commercial\backOffice.php?username=<?php echo $username ?>">Tableau de Bord</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="\Demo\Commercial\Customer\client.php?username=<?php echo $username ?>">Clients</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Catalogue</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="\Demo\Commercial\Devis\Devis.php">Devis</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Commande</a>
                    </li>
                </ul>            
            </div>
        </nav>
        <div class="container" style="height: 80%;background-color: #86cfda; margin-top: 3%; text-align:center; padding-top: 2%">
            <?php 
                if($update !== '0') {
                    echo "
                    <div class=\"badge-success\" style=\"margin-left: 35%; width: 30%\">
                        Modification Réussie
                    </div>
                    ";
                }
            ?>
            <?php 
					$bdd = new PDO('mysql:host=localhost;dbname=demo;charset=utf8', 'root', '');
					$customers = $bdd->query("SELECT * FROM `t_client` WHERE id=$id");
					foreach ($customers as $customer): 
            ?>
            <a class="btn btn-info" style="float:left" href="\Demo\Commercial\Customer\client.php?username=<?php echo $username ?>"><- Retour</a>
            <h2 style="text-align:center">Client <?php echo $customer['name'] ?>&nbsp;<?php echo $customer['firstname'] ?></h2>            
            <form method="POST" action="update.php?username=<?php echo $username ?>&id=<?php echo $id ?>" style="text-align: center">
                <label  class="control-label" for="name">Nom</label><br />
                <input type="text" name="name" id="name" value="<?php echo $customer['name'] ?>"><br />

                <label for="firstname">Prénom</label><br />
                <input type="text" name="firstname" id="firestname" value="<?php echo $customer['firstname'] ?>"><br />

                <label for="adress">Adresse</label><br />
                <textarea name="adress" id="adress" value=""><?php echo $customer['adresse'] ?></textarea> <br />

                <label for="mail">Email</label><br />
                <input type="mail" name="mail" id="mail" value="<?php echo $customer['mail'] ?>"><br />

                <label for="tel">Téléphone</label><br />
                <input type="tel" name="tel" id="tel" value="<?php echo $customer['tel'] ?>"><br /> <br /> 
                
                <input type="submit" value="Modifier" >
            </form>
            <?php endforeach ?>
    </div>
    <div class="container">
    <table class="table table-info border="1" style="width: 100%; margin-top: 3%; ">
        <thead class="thead-dark">
            <th>Numéro de Commande</th>
            <th>Date</th>
            <th>Edition</th>
        </thead>
        <tr>
            <td>CMD00001</td>
            <td>22/07/2020</td>
            <td>
                <a class="btn btn-info" href="read.php?username=<?php echo $username ?>&id=<?php echo $customer['id'] ?>">Voir</a>
                <a class="btn btn-success" href="update.php?id=<?php echo $customer['id'] ?>">Modifier</a>
                <a class="btn btn-danger" href="delete.php?id=<?php echo $customer['id'] ?>">Supprimer</a>
            </td>                
        </tr>
    </table>
    </div>
    </body>
</html>