<?php 
session_start();	
	$host = 'localhost';
    $user = 'root';
    $password = ''; //To be completed if you have set a password to root
    $database = 'projet'; //To be completed to connect to a database. The database must exist.

    $db_handle = mysqli_connect($host, $user, $password);
    $db_found = mysqli_select_db($db_handle, $database);

    if (!$db_found) { die('Database not found'); }
	$id=$_GET['var2'];

	$req="SELECT * FROM marche WHERE ID =" . $id . ";";
	$result=mysqli_query($db_handle, $req);
	if (!$result)
	{
		echo 'Couldn\'t find table';
		return;
	}
	$info = $result->fetch_assoc();
	echo " nom: " . $info['nom'];
	


?>
<html>
<head>
	<title>Acheter <?php echo $info['nom']  ?></title>
	<meta charset="utf-8">
</head>
<body>
<table>
	<tr>
		<td><img src= <?php echo($info["photo"]);?> ></td>
		<td><p><?php echo $info["description"]?></p>
		<p>Le prix est de: <?php echo $info["prix"]?></p>
		</td>
	</tr>
</table>
<input type="submit" value="Acheter" />
</body>
</html>