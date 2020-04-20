<?php
    echo "Trying to connect to the database <br>";

    $host = 'localhost';
    $user = 'root';
    $password = ''; //To be completed if you have set a password to root
    $database = 'projet'; //To be completed to connect to a database. The database must exist.

    $db_handle = mysqli_connect($host, $user, $password);
    $db_found = mysqli_select_db($db_handle, $database);

    if (!$db_found) { die('Database not found'); }

    echo 'Connected ! <br>';


	
    /////////////////////////////////////////////////////////////////
	if(isset($_POST['cree'])) // si il existe
{
	$nom = isset($_POST["nom"])? $_POST["nom"]:"";
	$prenom = isset($_POST["prenom"])? $_POST["prenom"]:"";
	$pseudo = isset($_POST["pseudo"])? $_POST["pseudo"]:"";
	$mail = isset($_POST["mail"])? $_POST["mail"]:"";
	$photoprofil = isset($_POST["photoprofil"])? $_POST["photoprofil"]:"";
	$imagefond = isset($_POST["imagefond"])? $_POST["imagefond"]:"";
	$item = isset($_POST["item"])? $_POST["item"]:"";
	$type = "";
	if (isset($_POST['bt']))
	{
		if ($_POST['bt'] == 'acheteur'){
			$type = 0;
		}
		else if ($_POST['bt'] == 'vendeur'){
			$type = 1;
		}
		else if ($_POST['bt'] == 'admin'){
			$type = 2;
		}
		
	}
	
	$req="INSERT INTO `compte`( `type`, `nom`, `prenom`, `pseudo`, `mail`,`photoprofil`,`imagefond`,`item`)VALUES( $type, '$nom', '$prenom', '$pseudo', '$mail', '$photoprofil', '$imagefond', $item)";
	if (mysqli_query($db_handle, $req)) {
               echo "New record created successfully";
            } else {
               echo "Error: " . $req . "" . mysqli_error($db_handle);
            }
	
	//////////////////////////////////////////////////////////////
	$query = "SELECT * FROM compte";
    $result = mysqli_query($db_handle, $query);

    if (!$result)
    {
       echo 'Couldn\'t find table';
       return;
    }

    echo 'Table found ! <br>';
	if (mysqli_num_rows($result) < 1)
	{
		echo "Empty";
	}

    echo mysqli_num_rows($result) . ' rows <br>';
    
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["ID"]. " - type: " . $row["type"]. " - nom: " . $row["nom"]. " - prenom: " . $row["prenom"] . " - pseudo: " . $row["pseudo"] . " - mail: " . $row["mail"] . " - photo de profil: " . $row["photoprofil"] . " -image de fond: " . $row["imagefond"] . " -item: " . $row["item"] . "<br>";
    }
}

if(isset($_POST['suppr'])) // si il existe
{	$ID = isset($_POST["ID"])? $_POST["ID"]:"";
	$req="DELETE FROM `compte` WHERE `compte`.`ID` = $ID";
	if (mysqli_query($db_handle, $req)) {
               echo "deleted successfully";
            } else {
               echo "Error: " . $req . "" . mysqli_error($db_handle);
            }
}
?>
