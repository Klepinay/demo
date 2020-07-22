<?php
    $username = $_GET['username'];
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Back - Office</title>
        <link rel="stylesheet" href="\Demo\admin\style.css" type="text/css">
        <link rel="stylesheet" href="\Demo\css\bootstrap.css" type="text/css">
    </head>

        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">            
                <ul  class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="\Demo\Admin\backOffice.php?username=<?php echo $username ?>">Tableau de Bord</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Customer\client.php?username=<?php echo $username ?>">Clients</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Catalogue</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="\Demo\admin\User\user.php?username=<?php echo $username ?>"">Utilisateurs</a>
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
        <div class="container" style="height: 80%;background-color: #86cfda; margin-top: 3%; text-align:center">

            <h2 style="text-align:center">Nouveau Utilisateur</h2>            
            <form method="POST" action="addbdd.php?username=<?php echo $username ?>" style="text-align: center">
                <label  class="control-label" for="name" >Nom</label><br />
                <input type="text" name="name" id="name" placeholder="Ex: CLOUTIER"><br />

                <label for="firstname">Prénom</label><br />
                <input type="text" name="firstname" id="firestname" placeholder="Ex: Grégoire"><br />

                <label for="societe">Entreprise</label><br />
                <input type="text" name="societe" id="societe" placeholder="Ex: Societe 1"></textarea> <br />

                <label for="identifiant">Identifiant</label><br />
                <input type="text" name="identifiant" id="identifiant" placeholder="Ex: G.Cloutier"><br />

                <label for="password">Mot de Passe</label><br />
                <input type="password" name="password" id="password" placeholder="Ex: G.Clour@974!"><br />

                <label for="role">Role</label><br />
                <select name="role" id="role" style="width: 25%">
                    <option value="">--Choisissez un role--</option>
                    <option value="Commercial">Commercial</option>
                    <option value="Assistant">Assistant</option>
                    <option value="Magasin">Magasin</option>
                    <option value="Admin">Admin</option>
                </select><br /><br />
                
                <input type="submit" value="Ajouter" >
            </form>
           
    </div>

    </body>
</html>