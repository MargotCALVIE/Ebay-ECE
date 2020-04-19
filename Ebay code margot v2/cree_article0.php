<?php
session_start();	
	$host = 'localhost';
    $user = 'root';
    $password = ''; //To be completed if you have set a password to root
    $database = 'projet'; //To be completed to connect to a database. The database must exist.

    $db_handle = mysqli_connect($host, $user, $password);
    $db_found = mysqli_select_db($db_handle, $database);

    if (!$db_found) { die('Database not found'); }
	$pseudo = isset($_GET["pseudo"])? $_GET["pseudo"]:"";
	$mail = isset($_GET["mail"])? $_GET["mail"]:"";
	$req="SELECT * FROM compte WHERE pseudo = '" . $pseudo . "' AND mail = '" . $mail . "';";
	echo $req;
	$result=mysqli_query($db_handle, $req);
	if (!$result)
	{
		echo 'Couldn\'t find table';
		return;
	}
	$info = $result->fetch_assoc();
	echo " ID: " . $info['ID'];
	$_SESSION['sID']= $info['ID'];
?>
