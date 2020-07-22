
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Document sans titre</title>
<link rel="stylesheet" href="back_office_commercial.css">
<link href="css/bootstrap.min.css" rel="stylesheet">
<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
</head>

<header>
	<div id="nav" align="center">
		<nav>
			<ul>
				<li class="active"><a href="back_office_commercial.php?username=<?php echo $_GET['username'] ?>"">Mes Devis</a></li><!--
				--><li><a href="nouveau_devis.php?username=<?php echo $_GET['username'] ?>">Nouveau Devis</a></li>
			</ul>
		</nav><br />
		<a href='\Demo\Login\verif_commercial.php?deconnexion=true'><input type="button" name="déconnexion" id="déconnection" Value="Déconnexion" style="margin-bottom:25px;"></a>
            
            <!-- tester si l'utilisateur est connecté -->
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
</header>
<body>
<table width="100%" border="0">
<tr>
	<th>
		Client
	</th>
	<th>
		Date
	</th>
</tr>
<?php 
		$username = $_GET['username'];
		$bdd = new PDO('mysql:host=localhost;dbname=demo;charset=utf8', 'root', '');
		$articles = $bdd->query("select * from t_bonlivraison WHERE bl_commercial='$username'");
		foreach ($articles as $article): 
?>
<tr>

	<td align="center">

		<?php echo $article['bl_client']; ?>
	</td>
	<td align="center">
		<?php echo $article['bl_date']; ?>

	</td>
	<td>
		<a href="view_devis.php?id=<?php echo $article['bl_id'] ?>"><button value="Voir" alt="Voir">Voir le devis</button></a>
	</td>

</tr>
<?php endforeach ?>
	
</table>
</body>
</html>
