<?php 
session_start();
$host = 'localhost';
    $user = 'root';
    $password = ''; //To be completed if you have set a password to root
    $database = 'projet'; //To be completed to connect to a database. The database must exist.

    $db_handle = mysqli_connect($host, $user, $password);
    $db_found = mysqli_select_db($db_handle, $database);

    if (!$db_found) { die('Database not found'); }
	$aID=$_GET['id'];
	echo $aID .$_SESSION['sID'];
	$req="UPDATE compte SET item=".$aID. " WHERE ID =" . $_SESSION['sID'] . ";";
	
	$result=mysqli_query($db_handle, $req);
	if (!$result)
	{
		echo 'Couldn\'t find table';
		return;
	}
	header('Location: http://localhost/panier.php');
  exit();
?>