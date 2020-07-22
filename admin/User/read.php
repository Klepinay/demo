<?php
    $username = $_GET['username'];
    $id = $_GET['id'];
    $update = $_GET['update'];
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Back - Office</title>
        <link rel="stylesheet" href="\Demo\admin\style.css" type="text/css">
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
                        <a class="nav-link" href="\Demo\admin\User\user.php?username=<?php echo $username ?>"">Utilisateurs</a>
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
					$users = $bdd->query("SELECT * FROM `t_user` WHERE id=$id");
					foreach ($users as $user): 
            ?>
            <a class="btn btn-info" style="float:left" href="\Demo\admin\User\user.php?username=<?php echo $username ?>"><- Retour</a>
            <h2 style="text-align:center">Client <?php echo $user['name'] ?>&nbsp;<?php echo $user['firstname'] ?></h2>            
            <form method="POST" action="update.php?username=<?php echo $username ?>&id=<?php echo $id ?>" style="text-align: center">
                <label  class="control-label" for="name">Nom</label><br />
                <input type="text" name="name" id="name" value="<?php echo $user['name'] ?>"><br />

                <label for="firstname">Prénom</label><br />
                <input type="text" name="firstname" id="firstname" value="<?php echo $user['firstname'] ?>"><br />

                <label for="societe">societe</label><br />
                <textarea name="societe" id="societe" value=""><?php echo $user['societe'] ?></textarea> <br />

                <label for="identifiant">Identifiant</label><br />
                <input type="identifiant" name="identifiant" id="identifiant" value="<?php echo $user['identifiant'] ?>"><br />

                <label for="password">Mot de Passe</label><br />
                <input type="password" name="password" id="password" value="<?php echo $user['password'] ?>"><br /> 

                <label for="role">Role</label><br />
                <select name="role" id="role" style="width: 25%">
                    <option value="<?php echo $user['role'] ?>"><?php echo $user['role'] ?></option>
                    <option value="Commercial">Commercial</option>
                    <option value="Assistant">Assistant</option>
                    <option value="Magasin">Magasin</option>
                    <option value="Admin">Admin</option>
                </select><br /><br />
                 
                
                <input type="submit" value="Modifier" >
            </form>
            <?php endforeach ?>
    </div>

    </body>
</html>