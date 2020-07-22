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
        <div class="container" style="height: 80%;background-color: #86cfda; margin-top: 3%; text-align:center; padding-top: 2%">
        <a class="btn btn-info" style="float:left" href="\Demo\admin\User\user.php?username=<?php echo $username ?>"><- Retour</a>
                      
            <h2 style="text-align:center">Nouveau Client</h2>            
            <form method="POST" action="addbdd.php?username=<?php echo $username ?>" style="text-align: center">
                <label  class="control-label" for="name" >Nom</label><br />
                <input type="text" name="name" id="name" placeholder="Ex: CLOUTIER"><br />

                <label for="firstname">Prénom</label><br />
                <input type="text" name="firstname" id="firestname" placeholder="Ex: Grégoire"><br />

                <label for="adress">Adresse</label><br />
                <textarea name="adress" id="adress" placeholder="Ex: 71, boulevard de la Libération 13012 MARSEILLE"></textarea> <br />

                <label for="mail">Email</label><br />
                <input type="mail" name="mail" id="mail" placeholder="Ex: grégoire@cloutier.fr"><br />

                <label for="tel">Téléphone</label><br />
                <input type="tel" name="tel" id="tel" placeholder="Ex: 0603 125436"><br /> <br /> 
                
                <input class="btn btn-success" type="submit" value="Ajouter" >
            </form>
           
    </div>

    </body>
</html>