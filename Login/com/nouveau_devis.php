<!DOCTYPE html>
<html>
	<head>
		<title>Nouveau Devis</title>
		<link rel="stylesheet" href="style.css">
	</head>
    <script type="text/javascript">
        //<!--
                function change_onglet(name)
                {
                        document.getElementById('onglet_'+anc_onglet).className = 'onglet_0 onglet';
                        document.getElementById('onglet_'+name).className = 'onglet_1 onglet';
                        document.getElementById('contenu_onglet_'+anc_onglet).style.display = 'none';
                        document.getElementById('contenu_onglet_'+name).style.display = 'block';
                        anc_onglet = name;
                }
        //-->
    </script>

	<body>
	
		<div class="nav">
			<a href="#">Home</a>
			<a href="#" class="active">Devis</a>
			<a href="#">Client</a>
			<a href="#">Article</a>
			<a href="#">Bon de livraison</a>
			<a href="#">Commerciaux</a>
		</div>
		
		<!-- Information Generales -->
		<fieldset class="info" style="border: 1px solid blue">
			
			<legend><h3>Informations générales </h3></legend><br />
			
			<label for="numero">Numéro <label>
			<input type="number" name="numero"><br /><br />
			
			<label for="date_crea">Date </label>
			<input type="date" name="date_crea">
			
			<label for="date_val" style="margin-left: 25px">Validité </label>
			<input type="date" name="date_val"><br /><br />
			
			<label for="etat">Etat </label>
			<select name="etat">
				<option value=""> </option>
				<option value="En Cours">En cours</option>
				<option value="Terminé">Terminé</option>
				<option value="A réviser">A réviser</option>
				<option value="Accepté">Accepté</option>
				<option value="Refusé">Refusé</option>
				<option value="Appel d'offre">Appel d'offre</option>
				<option value="Envoyé">Envoyé</option>
			</select>
		</fieldset>

		<!-- Information Client -->
		<fieldset class="client" style="border: 1px solid blue">
		
			<legend><h3> Informations Client</h3></legend><br />
		
			<label for="tier_code" style="margin-left:12px;">Code tiers </label>
			<input type="text" name="tiers_code" />
			
			<label for="civ" style="margin-left:25px;">Civilité </label>
			<select name="civ">
				<option value=""> </option>
				<option value="docteur">Docteur</option>
				<option value="EI">EI</option>
				<option value="EIRL">EIRL</option>
				<option value="EURL">EURL</option>
				<option value="Madame">MAdame</option>
				<option value="Mademoiselle">Maedemoiselle</option>
				<option value="Maître">Maître</option>
				<option value="Monsieur">Monsieur</option>
				<option value="SA">SA</option>
				<option value="SARL">SARL</option>
				<option value="SAS">SAS</option>
				<option value="SASU">SASU</option>
				<option value="SCA">SCA</option>
				<option value="SCI">SCI</option>
				<option value="SCM">SCM</option>
				<option value="SCOP">SCOP</option>
				<option value="SCP">SCP</option>
				<option value="SCS">SCS</option>
				<option value="SEP">SEP</option>
				<option value="SNC">SNC</option>
			</select>
			
			<label for="n_client" style="margin-left:25px;">Nom </label>
			<input type="text" name="n_client" /><br /><br />
			
			<label for="adresse" style="margin-left:25px;">Adresse </label>
			<input type="text" name="adresse" id="adresse"><br /><br />
			
			<label for="postal">Code Postal </label>
			<input type="number" name="postal" id="postal">
			
			<label for="ville" style="margin-left:25px;">Ville </label>
			<input type="text" name="ville" id="ville">
			
		</fieldset>

		<div class="detail" style="border: 1px solid black">
			
			<div class="code_article" style="border: 1px solid black; float:left; padding: 5px;">
				<p>Code Article</p>
			</div>

			<div class="reference_client" style="border: 1px solid black; float:left; padding: 5px;">
				<p>Référence client</p>
			</div>

			<div class="description" style="border: 1px solid black; float:left; padding: 5px;">
				<p>Description</p>
			</div>

			<div class="quantite" style="border: 1px solid black; float:left; padding: 5px;">
				<p>Quantité</p>
			</div>

			<div class="code_unite" style="border: 1px solid black; float:left; padding: 5px;">
				<p>Code unité</p>
			</div>

			<div class="depot" style="border: 1px solid black; float:left; padding: 5px;">
				<p>Dépôts</p>
			</div>

			<div class="pv_ht" style="border: 1px solid black; float:left; padding: 5px;">
				<p>PV HT</p>
			</div>

			<div class="%_remise" style="border: 1px solid black; float:left; padding: 5px;">
				<p>% remise unitaire</p>
			</div>

			<div class="montant_net_ht" style="border: 1px solid black; float:left; padding: 5px;">
				<p>Montant Net HT</p>
			</div>

			<div class="tva" style="border: 1px solid black; float:left; padding: 5px;">
				<p>TVA</p>
			</div>

			
		</div>
        
		
		


	</body>
</html>

