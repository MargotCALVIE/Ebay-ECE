
<html>
<head>
    <meta charset="utf-8"/>
    <title> Ebay ECE </title>
    <link href="panier.css" rel="stylesheet" type="text/css"/>
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
                <ul>
                <li> <a href="categories.html"> Catégories </a></li>
                <li> <a href="achat.html"> Achat </a></li>
                <li> <a href="vendre.html"> Vendre </a></li>
                <li> <a href="login.html"> Votre Compte </a></li>
                <li> <a href="panier.php" class="panier"> Panier </a></li>
                <li> <a href="admin.html"> Admin </a></li>
                </ul>
            </nav>      
        </header>
<?php 
session_start();
$host = 'localhost';
    $user = 'root';
    $password = ''; //To be completed if you have set a password to root
    $database = 'projet'; //To be completed to connect to a database. The database must exist.

    $db_handle = mysqli_connect($host, $user, $password);
    $db_found = mysqli_select_db($db_handle, $database);
	
    if (!$db_found) { die('Database not found'); }
	$req="SELECT * FROM compte WHERE ID = " . $_SESSION['sID'] . ";";
	$result=mysqli_query($db_handle, $req);
	if (!$result)
	{
		echo 'Couldn\'t find table';
		return;
	}
	$info = $result->fetch_assoc();
	if( $info['item']!=NULL){
	$req_p="SELECT * FROM marche WHERE ID = " . $info['item'] . ";";
	$res_p=mysqli_query($db_handle, $req_p);
	if (!$res_p)
	{
		echo 'Couldn\'t find table 2';
		return;
	}
	$info_p = $res_p->fetch_assoc();
	$res_photo=preg_split('/\%/',$info_p["photo"]);
	}
?>
	<?php
	if( $info['item']!=NULL){
	?>
    <h1 class="TitrePanier"> Panier </h1>
    <table class="FormulairePanier">
    
	<tr>
		<?php
		$countphoto = count($res_photo);
		for($i=1;$i<$countphoto;$i++){
		?>
		<td><img src= <?php echo($res_photo[$i]);?> height="400"></td>
		<?php
		}
		?>
		
	</tr>
	<tr>
        
		<td><?php echo $info_p["description"]?></td>
		<td>
		<p class="prix" >Le prix est de:   <?php echo $info_p["prix"]?>euros </p>
		</td>
	</tr>
	</table>
    <table class="FormulairePanier">
		<form action="valider.php" method="post">
		<tr>
			<td> Numero de carte : </td>
			<td><input type="text" name="numero" id="numero" value="" required></td>	
		</tr>
		<tr>
			<td> Nom : </td>
			<td><input type="text" name="nom" id="nom" value="" required></td>
		</tr>
		<tr>
			<td> Code de securite : </td>
			<td><input type="password" name="secu" id="secu" value="" required></td>
		</tr>
		<tr>
			<td></td>
			<td><input type="submit" id="encherir" value="Acheter" /></td>
		</tr>
		</form>
	</table>
	<?php
	}else echo "votre panier est vide";
	?>
        
        <footer>
            <p> Copyright &copy; 2020 EbayECE. All rights reserved </p>
        </footer>   
    </div>  
</body>
</html>
