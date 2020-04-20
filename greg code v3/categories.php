 <?phpsession_start();?>
<?php
$_SESSION['ID']="";
//identifier BDD
$database = "projet" ;
$cat=0;
if(isset($_GET['var_cat']))
{$var_cat=$_GET['var_cat'];}
//connexion BDD
$db_handle= mysqli_connect('localhost', 'root', '') ;
$db_found= mysqli_select_db($db_handle, $database);
if(!$db_found)
{die('Database not found');
}
if(isset($_POST['select_box_categories'])){
	$box_categorie=$_POST['select_box_categories'];
	
}else{
$box_categorie=$var_cat;
}
$cat=$box_categorie;
?>

<!DOCTYPE html>
<html>
    
<head>
    <meta charset="utf-8"/>
    <title> Categories Ebay ECE </title>
    <link href="http://localhost/categories.css" rel="stylesheet" type="text/css"/>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
</head>

<body>    
    <div id="main_wrapper">
<!-- Balise qui englobe tout le contenu permettant de fixer les dimensions de la page -->
        <header>
            <div id="titre_principal">
                <h1> EBAY ECE</h1>
                <div id="logo">
                 <img src="http://localhost/logoEbayECE.jpg" alt="Ebay ECE"  />
                </div>
            </div>
            <nav>
                <ul class="menu">
                <li> <a href="http://localhost/categories.html" class="Categorie"> Catégories </a></li>
                <li> <a href="http://localhost/achat.html"> Achat </a></li>
                <li> <a href="http://localhost/vendre.html"> Vendre </a></li>
                <li> <a href="http://localhost/login.html"> Votre Compte </a></li>
                <li> <a href="http://localhost/panier.php"> Panier </a></li>
                <li> <a href="http://localhost/admin.html"> Admin </a></li>
                </ul>
            </nav>      
        </header>
        
        <section>
<?php
//si le bouton est cliqué : categorie valider
$categorie="";
$typevente="";


        if($box_categorie=="Choix1")
        {
                echo '<p class="titreCategorie"> Catégorie : FERRAILLE OU TRESOR </p>';
                $categorie="SELECT * FROM marche WHERE categorie=0 ";
        }
        if($box_categorie=="Choix2")
        {
                echo '<p class="titreCategorie"> Catégorie : BON POUR LE MUSEE </p>';
				$categorie="SELECT * FROM marche WHERE categorie=1 ";				
        }
        if($box_categorie=="Choix3")
        {
                echo '<p class="titreCategorie"> Catégorie : ACCESSOIRE VIP  </p>';
				$categorie="SELECT * FROM marche WHERE categorie=2 ";
        }
   

if (isset($_POST["ValiderVente"]))
{
        if($_POST['select_box_vente']=="all")
        {
                echo '<p class="titreVente"> Touts les types de ventes </p>';
        }
		if($_POST['select_box_vente']=="directe")
        {
                echo '<p class="titreVente"> Ventes directe </p>';
               $typevente="AND (type_achat=0 OR type_achat=3 OR type_achat=4)"; 
        }
        if($_POST['select_box_vente']=="encheres")
        {
                echo '<p class="titreVente"> Ventes par encheres </p>'; 
				$typevente="AND (type_achat=2 OR type_achat=3)";
        }
        if($_POST['select_box_vente']=="negociation")
        {
                echo '<p class="titreVente"> Vente par negociation  </p>';
				$typevente="AND (type_achat=1 OR type_achat=4)";				
        }
   
}
$sql1=$categorie.$typevente;

$req1 = mysqli_query( $db_handle, $sql1);
$NbrLignecat0=0;
if (!$req1){      
    }
else{
	$NbrLignecat0=mysqli_num_rows($req1);}

?>
        
        <div class="ChoixVente">
                <form action=<?php  echo "http://localhost/categories.php?var_cat=$cat" ?> method="post">
                    <table>
                        <tr>
                            <td> Choisir votre type de vente : </td>
                            <td> <select name="select_box_vente">
                            <option> ...Choisir... </option>
							<option value="all"> Toutes </option>
                            <option value="directe"> Vente directe </option>
                            <option value="encheres"> Vente par encheres </option>
                            <option value="negociation"> Vente par negociation </option>
                            </select> </td>
                        </tr>
                        <tr>
                            <td><input type="submit" name="ValiderVente" value="Valider"></td>
                        </tr>
                    </table>
                </form>
        </div>
		<?php
	if (($NbrLignecat0!=0))
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
    { if($row = $req1->fetch_assoc()) {
	$id_c=$row['ID'];
	?>
		<tr class='clickable-row' data-href="<?php echo "http://localhost/article.php?var2=$id_c" ?>">
			<td>
			<?php
				
				//echo($row["photo"]. ".png");
				$_SESSION['ID']=$i;
				$res_photo=preg_split('/\%/',$row["photo"]);
			?>
			<img src= <?php echo("$res_photo[1]");?> height="400" >
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
				$name = mysqli_query( $db_handle, $find);
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
					echo "Achat direct";
					}
				if($row["type_achat"]==1){
					echo "Négociation";
					}
				if($row["type_achat"]==2){
					echo "Enchères";
					}
				if($row["type_achat"]==3){
					echo "Achat direct & enchères";
					}
				if($row["type_achat"]==4){
					echo "Achat direct &  negociation";
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
         </section>
        
        
        <footer>
            <p> Copyright &copy; 2020 EbayECE. All rights reserved </p>
        </footer>   
    </div>
<script>
	$(".clickable-row").click(function() {
    window.location = $(this).data("href");
    });
</script>	
</body>
</html>
