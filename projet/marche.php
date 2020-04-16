<?php 
session_start();

	$_SESSION['select']=$_GET["categorie-select"];
	
	$_SESSION['sPrix']=$_GET["prix-select"];
	$_SESSION['ID']="";
    $_SESSION['host'] = 'localhost';
    $_SESSION['user'] = 'root';
    $_SESSION['password'] = ''; //To be completed if you have set a password to root
    $_SESSION['database'] = 'projet'; //To be completed to connect to a database. The database must exist.

    $_SESSION['db_handle'] = mysqli_connect($_SESSION['host'], $_SESSION['user'], $_SESSION['password']);
    $_SESSION['db_found'] = mysqli_select_db($_SESSION['db_handle'], $_SESSION['database']);

    if (!$_SESSION['db_found']) { die('Database not found'); }
	$_SESSION['query1']="";
	$_SESSION['query']="";
	if ($_SESSION['select']=="ALL"){
	$_SESSION['query1'] = "SELECT * FROM marche WHERE 1 ";}
	if ($_SESSION['select']=="FetT"){
	$_SESSION['query1'] = "SELECT * FROM marche WHERE categorie=0 ";}
	if ($_SESSION['select']=="BpM"){
	$_SESSION['query1'] = "SELECT * FROM marche WHERE categorie=1 ";}
	if ($_SESSION['select']=="VIP"){
	$_SESSION['query1'] = "SELECT * FROM marche WHERE categorie=2 ";}
	
	if ($_SESSION['sPrix']=="none"){
	$_SESSION['query'] =$_SESSION['query1'];}
	if ($_SESSION['sPrix']=="Enc"){
	$_SESSION['query'] =$_SESSION['query1'] . "AND type_achat=0";}
	if ($_SESSION['sPrix']=="MO"){
	$_SESSION['query'] =$_SESSION['query1'] . "AND type_achat=1";}
	if ($_SESSION['sPrix']=="AM"){
	$_SESSION['query'] =$_SESSION['query1'] . "AND type_achat=2";}
	//echo $query;//debug
    $cat0 = mysqli_query( $_SESSION['db_handle'], $_SESSION['query']);
	$NbrLignecat0=0;
    if (!$cat0)
    {      
    }
	else{
	$NbrLignecat0=mysqli_num_rows($cat0);
    }


?>


<html>
<head>
	<title>Catégorie Ferraille & trésor</title>
	<meta charset="utf-8">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
</head>
<body>

<form method="post" action="http://localhost/marche.php" >  
<label for="categorie-select">Choisir une categorie:</label>

<select name="categorie-select" id="categorie-select" >
	<option value="ALL">Toutes</option>
    <option value="FetT">Ferraille & trésor</option>
    <option value="BpM">Bon pour le musée</option>
    <option value="VIP">Accessoire VIP</option>
	
</select>
<br>
<label for="prix-select">Choisir une méthode de payement:</label>

<select name="prix-select" id="prix-select" >
	<option value="none">Toutes</option>
    <option value="Enc">Enchères</option>
    <option value="MO">Meilleur offres</option>
    <option value="AM">Achat immédiat</option>
	
</select>
 
    <input type="submit" value="rechercher" />
</form>
<?php
	
	if (isset($_GET['categorie-select']))
	{
		if ($_SESSION['select'] == 'FetT'){		
?>
<h2>Ferraille & tresor</h2>
<?php
		
	}
	if ($_SESSION['select'] == 'BpM'){		
?>
<h2>Bon pour le musée</h2>
<?php
		
	}
	if ($_SESSION['select']== 'VIP'){		
?>
<h2>Accessoire VIP</h2>
<?php
		}
	}
?>

<br>
<?php
	
	if (isset($_GET['prix-select']))
	{
		if ($_SESSION['sPrix'] == 'Enc'){		
?>
<h3>Enchères</h3>
<?php
		
	}
	if ($_SESSION['sPrix'] == 'MO'){		
?>
<h3>Meilleur offres</h3>
<?php
		
	}
	if ($_SESSION['sPrix']== 'AM'){		
?>
<h3>Achat immédiat</h3>
<?php
		}
	}
?>

<?php
	if ((isset($_GET['categorie-select']))&&($NbrLignecat0!=0))
	{
?>
<table border="1">
	<thead>
	<tr>
		<td>photo</td>
		<td>nom</td>
		<td>prix</td>
		<td>vendeur</td>
		<td>methode de payement</td>
	</tr>
	</thead>
	<tbody>
	
	<?php
		for ($i=1; $i<=$NbrLignecat0; $i++) 
    { if($row = $cat0->fetch_assoc()) {
	$id_c=$row['ID'];
	?>
		<tr class='clickable-row' data-href="<?php echo "http://localhost/article.php?var2=$id_c" ?>">
			<td>
			<?php
				
				//echo($row["photo"]. ".png");
				$_SESSION['ID']=$i;
			?>
			<img src= <?php echo($row["photo"]);?> >
			</td>
			<td>
			<?php
				
				echo "nom: " . $row["nom"];}
			?>
			</td>
			<td>
			<?php
				echo "prix: " . $row["prix"] ."€";
			?>
			</td>
			<td>
			<?php
				$find = "SELECT * FROM compte WHERE ID=" . $row['vendeur'] . ";";
				//echo $find;
				$name = mysqli_query( $_SESSION['db_handle'], $find);
				if (!$name)
					{
						echo 'Couldn\'t find table';
						return;
					}
				$nom = $name->fetch_assoc();
				echo "vendeur: " . $nom["prenom"] ." " . $nom['nom'];
			?>
			</td>
			<td>
				<?php
				if($row["type_achat"]==0){
					echo "Enchères";
					}
				if($row["type_achat"]==1){
					echo "Meilleur offres";
					}
				if($row["type_achat"]==2){
					echo "Achat immédiat";
					}
	
				?>
			</td>
		</tr>
	<?php
	}
	?>
	
	</tbody>
</table>
<?php
	}else{
		echo "aucun aricles n'a été trouvé";}
?>

<script>
	$(".clickable-row").click(function() {
    window.location = $(this).data("href");
    });
</script>
</body>
</html>

