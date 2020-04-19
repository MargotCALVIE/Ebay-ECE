

<!DOCTYPE html>
<html>
    
<head>
    <meta charset="utf-8"/>
    <title> Categories Ebay ECE </title>
    <link href="categories.css" rel="stylesheet" type="text/css"/>
    
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
                <li> <a href="categories.html" class="Categorie"> Catégories </a></li>
                <li> <a href="achat.html"> Achat </a></li>
                <li> <a href="vendre.html"> Vendre </a></li>
                <li> <a href="votrecompte.html"> Votre Compte </a></li>
                <li> <a href="panier.html"> Panier </a></li>
                <li> <a href="admin.html"> Admin </a></li>
                </ul>
            </nav>      
        </header>
        
        <section>
<?php
session_start(); // On démarre la session AVANT toute chose
if($_SESSION['categorie']=="1")
{
echo '<p class="titreCategorie"> Catégorie : FERRAILLE OU TRESOR </p>';
}
elseif($_SESSION['categorie']=="2")
{
echo '<p class="titreCategorie"> Catégorie : BON POUR LE MUSEE </p>';
}
else
{
 echo '<p class="titreCategorie"> Catégorie : ACCESSOIRE VIP  </p>';
}

if ($_POST["ValiderVente"])
{ 
        if($_POST['select_box_vente']=="directe")
        {
                echo '<p class="titreVente"> Vente directe </p>';
                  
        }
        if($_POST['select_box_vente']=="encheres")
        {
                echo '<p class="titreVente"> Vente par encheres </p>';
                
        }
        if($_POST['select_box_vente']=="negociation")
        {
                echo '<p class="titreVente"> Vente par negociation </p>'; 
        }
   
}
//identifier BDD
$database = "projet" ;

//connexion BDD
$db_handle= mysqli_connect('localhost', 'root', '') ;
$db_found= mysqli_select_db($db_handle, $database);

  if($db_found)
  {
    if($_SESSION['categorie']=="1") // categorie = ferraille ou tresor
    {
        $sql = "SELECT * FROM marche WHERE categorie = '0'";
        
        if($_POST['select_box_vente']=="directe")
        {
          $sql .= " AND  type_achat = '0'";
          $res = mysqli_query($db_handle, $sql);
          while ($data = mysqli_fetch_assoc($res))
           {
              echo  '<br>';
              echo ' <font color="#6A5ACD" > Nom : </font> <font color="#6A5ACD" font face="Courier" >'.$data['nom'].'</font> <br>';
              echo ' <font color="#6A5ACD" > Description : </font> <font color="#6A5ACD" font face="Courier" >'.$data['description'].'</font> <br>';
              echo ' <font color="#6A5ACD" > Prix : </font> <font color="#6A5ACD" font face="Courier" >'.$data['prix'].'</font> <br>';
              echo' <br>'; 
           } 
        }
        elseif ($_POST['select_box_vente']=="encheres")
        {
          $sql .= " AND  type_achat = '1'";
          $res = mysqli_query($db_handle, $sql);
          while ($data = mysqli_fetch_assoc($res))
           {
              echo  '<br>';
              echo ' <font color="#6A5ACD" > Nom : </font> <font color="#6A5ACD" font face="Courier" >'.$data['nom'].'</font> <br>';
              echo ' <font color="#6A5ACD" > Description : </font> <font color="#6A5ACD" font face="Courier" >'.$data['description'].'</font> <br>';
              echo ' <font color="#6A5ACD" > Prix : </font> <font color="#6A5ACD" font face="Courier" >'.$data['prix'].'</font> <br>';
              echo' <br>';  
           } 
        }
        else
        {
           $sql .= " AND  type_achat = '2'";
          $res = mysqli_query($db_handle, $sql);
          while ($data = mysqli_fetch_assoc($res))
           {
              echo  '<br>';
              echo ' <font color="#6A5ACD" > Nom : </font> <font color="#6A5ACD" font face="Courier" >'.$data['nom'].'</font> <br>';
              echo ' <font color="#6A5ACD" > Description : </font> <font color="#6A5ACD" font face="Courier" >'.$data['description'].'</font> <br>';
              echo ' <font color="#6A5ACD" > Prix : </font> <font color="#6A5ACD" font face="Courier" >'.$data['prix'].'</font> <br>';
              echo' <br>';
           } 
         
         
        }
    }
    elseif($_SESSION['categorie']=="2") // categorie = bon pour le musee
    {
        $sql = "SELECT * FROM marche WHERE categorie = '1'";
        
        if($_POST['select_box_vente']=="directe")
        {
          $sql .= " AND  type_achat = '0'";
          $res = mysqli_query($db_handle, $sql);
          while ($data = mysqli_fetch_assoc($res))
           {
              echo  '<br>';
              echo ' <font color="#6A5ACD" > Nom : </font> <font color="#6A5ACD" font face="Courier" >'.$data['nom'].'</font> <br>';
              echo ' <font color="#6A5ACD" > Description : </font> <font color="#6A5ACD" font face="Courier" >'.$data['description'].'</font> <br>';
              echo ' <font color="#6A5ACD" > Prix : </font> <font color="#6A5ACD" font face="Courier" >'.$data['prix'].'</font> <br>';
              echo' <br>';   
           } 
        }
        elseif ($_POST['select_box_vente']=="encheres")
        {
           $sql .= " AND  type_achat = '1'";
          $res = mysqli_query($db_handle, $sql);
          while ($data = mysqli_fetch_assoc($res))
           {
              echo  '<br>';
              echo ' <font color="#6A5ACD" > Nom : </font> <font color="#6A5ACD" font face="Courier" >'.$data['nom'].'</font> <br>';
              echo ' <font color="#6A5ACD" > Description : </font> <font color="#6A5ACD" font face="Courier" >'.$data['description'].'</font> <br>';
              echo ' <font color="#6A5ACD" > Prix : </font> <font color="#6A5ACD" font face="Courier" >'.$data['prix'].'</font> <br>';
              echo' <br>';  
           } 
        }
        else
        {
           $sql .= " AND  type_achat = '2'";
          $res = mysqli_query($db_handle, $sql);
          while ($data = mysqli_fetch_assoc($res))
           {
              echo  '<br>';
              echo ' <font color="#6A5ACD" > Nom : </font> <font color="#6A5ACD" font face="Courier" >'.$data['nom'].'</font> <br>';
              echo ' <font color="#6A5ACD" > Description : </font> <font color="#6A5ACD" font face="Courier" >'.$data['description'].'</font> <br>';
              echo ' <font color="#6A5ACD" > Prix : </font> <font color="#6A5ACD" font face="Courier" >'.$data['prix'].'</font> <br>';
              echo' <br>';   
           } 
         
         
        }
    }
    else // categorie = accesoire Vip
    {
        $sql = "SELECT * FROM marche WHERE categorie = '2'";
        
        if($_POST['select_box_vente']=="directe")
        {
          $sql .= " AND  type_achat = '0'";
          $res = mysqli_query($db_handle, $sql);
          while ($data = mysqli_fetch_assoc($res))
           {
              echo  '<br>';
              echo ' <font color="#6A5ACD" > Nom : </font> <font color="#6A5ACD" font face="Courier" >'.$data['nom'].'</font> <br>';
              echo ' <font color="#6A5ACD" > Description : </font> <font color="#6A5ACD" font face="Courier" >'.$data['description'].'</font> <br>';
              echo ' <font color="#6A5ACD" > Prix : </font> <font color="#6A5ACD" font face="Courier" >'.$data['prix'].'</font> <br>';
              echo' <br>';  
           } 
        }
        elseif ($_POST['select_box_vente']=="encheres")
        {
           $sql .= " AND  type_achat = '1'";
          $res = mysqli_query($db_handle, $sql);
          while ($data = mysqli_fetch_assoc($res))
           {
              echo  '<br>';
              echo ' <font color="#6A5ACD" > Nom : </font> <font color="#6A5ACD" font face="Courier" >'.$data['nom'].'</font> <br>';
              echo ' <font color="#6A5ACD" > Description : </font> <font color="#6A5ACD" font face="Courier" >'.$data['description'].'</font> <br>';
              echo ' <font color="#6A5ACD" > Prix : </font> <font color="#6A5ACD" font face="Courier" >'.$data['prix'].'</font> <br>';
              echo' <br>';   
           } 
        }
        else
        {
          $sql .= " AND  type_achat = '2'";
          $res = mysqli_query($db_handle, $sql);
          while ($data = mysqli_fetch_assoc($res))
           {
              echo  '<br>';
              echo ' <font color="#6A5ACD" > Nom : </font> <font color="#6A5ACD" font face="Courier" >'.$data['nom'].'</font> <br>';
              echo ' <font color="#6A5ACD" > Description : </font> <font color="#6A5ACD" font face="Courier" >'.$data['description'].'</font> <br>';
              echo ' <font color="#6A5ACD" > Prix : </font> <font color="#6A5ACD" font face="Courier" >'.$data['prix'].'</font> <br>';
              echo' <br>';   
           } 
         
         
        }
    }
    
  }
//fermer la connexion
mysqli_close($db_handle);

?>
         </section>
        
        
        <footer>
            <p> Copyright &copy; 2020 EbayECE. All rights reserved </p>
        </footer>   
    </div>  
</body>
</html>

