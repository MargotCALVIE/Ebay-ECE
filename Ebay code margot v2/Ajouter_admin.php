<?php
session_start();
//identifier BDD
$database = "projet" ;

//connexion BDD
$db_handle= mysqli_connect('localhost', 'root', '') ;
$db_found= mysqli_select_db($db_handle, $database);

  if($db_found)
  {
    if ($_POST['AjouterV']) //si admin ajoute un vendeur 
    {
        header('Location: VendreInscription.php');
    }
        if ($_POST['AjouterI']) //si admin ajoute un item 
    {
        header('Location: Ajouter_item.php');
    }
        if ($_POST['SupV']) //si admin supprime un vendeur 
    {
        header('Location: Supprime_vendeur.php');
    }
        if ($_POST['SupI']) //si admin supprimer un item 
    {
        header('Location: Supprimer_item.php');
    }
    
  }
?>