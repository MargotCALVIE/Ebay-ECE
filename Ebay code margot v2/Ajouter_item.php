<!DOCTYPE html>
<html>
    
<head>
    <meta charset="utf-8"/>
    <title> Vendre Ebay ECE </title>
    <link href="vendre.css" rel="stylesheet" type="text/css"/>
</head>

<body>    
    <div id="main_wrapper">
<!-- Balise qui englobe tout le contenu permettant de fixer les dimensions de la page -->
        <header>
            <div id="titre_principal">
                <h1> EBAY ECE</h1>
                <div id="logo">
                 <img src="logoEbayECE.jpg" alt="Ebay ECE"  />
                </div>
            </div>
            <nav>
                <ul class="menu">
                <li> <a href="categories.html"> Catégories </a></li>
                <li> <a href="achat.html"> Achat </a></li>
                <li> <a href="vendre.html" class="Vendre"> Vendre </a></li>
                <li> <a href="votrecompte.html"> Votre Compte </a></li>
                <li> <a href="panier.html"> Panier </a></li>
                <li> <a href="admin.html"> Admin </a></li>
                </ul>
            </nav>      
        </header>
        
        <section>
            
            <h1 class="TitreVendre"> Ajouter un item a vendre </h1>
            
<form action="cree_article0.php" method="post" enctype="multipart/form-data">
<table class="AjouterItemForm">
	<tr>
		<td>Nom :</td>
		<td><input type="text" name="nom" id="nom" required></td>
	</tr>
	<tr>
		<td>description :</td>
		<td><input type="text" name="description" id="description" required></td>
	</tr>
	<tr>
		<td>prix:</td>
		<td><input type="text" name="prix" id="prix" required></td>
	</tr>
	<tr>
		<td>Categorie :</td>
		<td>
			<input type="radio" value="FetT" name="cat">
			<label for="FetT">Ferraille & trésor</label><br>
			<input type="radio" value="BpM" name="cat">
			<label for="BpM">Bon pour le marché</label><br>
			<input type="radio" value="VIP" name="cat">
			<label for="VIP">Accessoir VIP</label>
		</td>
	</tr>
	<tr>
		<td>Methode de payement :</td>
		<td>
			<input type="radio" value="En" name="pay">
			<label for="En">Enchères</label><br>
			<input type="radio" value="Mo" name="pay">
			<label for="Mo">meilleur offre</label><br>
			<input type="radio" value="Ad" name="pay">
			<label for="Ad">Achat direct</label><br>
			<input type="radio" value="Ad_En" name="pay">
			<label for="Ad_En">Achat direct et enchères</label><br>
			<input type="radio" value="Ad_Mo" name="pay">
			<label for="Ad_Mo">Achat direct et meilleur offre</label>
		</td>
	</tr>
	<tr>
		<td>Photo :</td>
		<td>
			<input type="file" name="PhotoUpload[]" id="PhotoUpload" multiple  accept=".png, .jpeg , .jpg, .gif"><br>
		</td>
	</tr>
	<tr>
		<td>Video :</td>
		<td>
			<input type="file" name="VideoUpload" id="VideoUpload" accept=".mp4">
		</td>
	</tr>
</table>
	<button type="submit" name="submit" id="Creer2">Creer</button>
</form>
            </div>
        
        <footer>
            <p> Copyright &copy; 2020 EbayECE. All rights reserved </p>
        </footer>   
    </div>  
</body>
</html>











