<!DOCTYPE html>
<html>
    
<head>
    <meta charset="utf-8"/>
    <title>  Ebay ECE </title>
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
                <ul >
                <li> <a href="categories.html"> Catégories </a></li>
                <li> <a href="achat.html"> Achat </a></li>
                <li> <a href="vendre.html"> Vendre </a></li>
                <li> <a href="login.html"> Votre Compte </a></li>
                <li> <a href="panier.php"> Panier </a></li>
                <li> <a href="admin.php" class="admin"> Admin </a></li>
                </ul>
            </nav>      
        </header>
        
        <section>
            
            <h1 class="TitreVendre"> Supprimer un item a vendre </h1>
            <?php
            session_start();	
$database = "projet" ;

//connexion BDD
$db_handle= mysqli_connect('localhost', 'root', '') ;
$db_found= mysqli_select_db($db_handle, $database);

  if($db_found)
  {
   
    $req = "SELECT * FROM compte ";
    $result=mysqli_query($db_handle, $req);
    $info = $result->fetch_assoc();
    ?>
    <table>
        <tr>
            <td> Pseudo : <br></td> 
            <td> Email : <br></td>
            <td> Prenom : <br></td>
            <td> Nom : <br></td>
        </tr>
    <?php while($donnees = mysqli_fetch_array($result))
        {
     ?>
        <tr>
            <td> <?php echo $donnees['pseudo'] ; ?> <br></td>
            <td> <?php echo $donnees['mail'] ; ?><br> </td>
            <td> <?php echo $donnees['prenom'] ; ?><br> </td>
            <td> <?php echo $donnees['nom'] ; ?> <br></td>
        </tr>
        
        <?php
        }
    }
        //fermer la connexion
        mysqli_close($db_handle);
        ?>

       
    </table>

        </section>
                <footer>
            <p> Copyright &copy; 2020 EbayECE. All rights reserved </p>
        </footer>   
    </div>  
</body>
</html>
