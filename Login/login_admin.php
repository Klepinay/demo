<!Doctype html>
<html>

	<head>
		<meta charset="utf-8">
		<title>Connexion - Fraicheur de Bourbon</title>
		<link rel="stylesheet" href="style.css" media="screen" type="text/css">
		<link href="css/bootstrap.min.css" rel="stylesheet">
	</head>

	<body>
		<div id="container">
		
			<!-- Zone de connexion -->
			<form action="verif_admin.php" method="POST" align="center">
				<h1>Connexion</h1>
				
				<label><b>Nom d'utilisateur</b></label>
				<input type="text" placeholder="Entrer le nom d'utilisateur" name="username" required>
				
				<label><b>Mot de passe</b></label>
				<input type="password" placeholder="Entrer le mot de passe" name="password" required>
				
				<input type="submit" id="submit" class="bg-primary" value="LOGIN">
				<?php
				if(isset($_GET['erreur'])) {
					$err = $_GET['erreur'];
					if($err==1 || $err==2)
						echo"<p style='color:red'>Utilisateur ou mot de passe incorrrect</p>";
				}
				?>
		</div>
	</body>
</html>