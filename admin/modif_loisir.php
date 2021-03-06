<?php require '../connexion/connexion.php'; ?>

<?php

// pour se connecter :
session_start();

if(isset($_SESSION['connexion']) && $_SESSION['connexion'] == 'Vous êtes connecté !'){
  $id_utilisateur = $_SESSION['id_utilisateur'];
  $prenom = $_SESSION['prenom'];
  $nom = $_SESSION['nom'];
}
else{
  header('location: authentification.php');
}



// pour se deconnecter : 

if(isset($_GET['deconnexion'])){
  $_SESSION['connexion'] = '';
  $_SESSION['id_utilisateur'] = '';
  $_SESSION['prenom'] = '';
  $_SESSION['nom'] = '';

  unset($_SESSION['connexion']);
  session_destroy();
  header('location: ../index.php');
}

?>



<?php 
 //MISE A JOUR D'UN LOISIR 
  if(isset($_POST['titre_loisir'])){
    
    $titre_loisir = addslashes($_POST['titre_loisir']);
  	$description_loisir = addslashes($_POST['description_loisir']);
  	$id_loisir = $_POST['id_loisir'];
  	$pdoCV -> exec(" UPDATE loisirs SET titre_loisir = '$titre_loisir', description_loisir = '$description_loisir' WHERE id_loisir = '$id_loisir' ");

  	header("location: loisir.php");
  		exit();
}

//récupération d'un loisir
	$id_loisir = $_GET['id_loisir'];
	$sql = $pdoCV -> query("SELECT * FROM loisirs WHERE id_loisir = '$id_loisir' ");
	$resultat = $sql -> fetch(); 
?>
   
<html lang="fr">
    <head>  
   	<meta charset="UTF-8" />
    <title>Modifier loisir CV web <?php /*echo $resultat['prenom'] . ' ' . $resultat['nom'];*/ ?></title>
    <script src="../ckeditor/ckeditor.js"></script>
    <link rel="stylesheet" type="text/css" href="../cssAdmin/myfrontstyle.css" />
    </head>

    <body>
        <header>
        	
          <h1> Page de Modification Loisirs</h1>

          <?php include 'navAdmin.php'; ?>

        </header>

        <section>
          <form action="modif_loisir.php" method="POST">
            <table>
              
              <thead>
                <th colspan="2">Loisir sélectionné :</th>
              </thead>
             
              <tbody>
                <tr>
                  <td>Titre</td>
                  <td><input type="text" name="titre_loisir" value="<?= $resultat['titre_loisir']; ?>" /></td>
                </tr>

                <tr>
                  <td>Description</td>
                  <td><textarea name="description_loisir" cols="50" rows="15"><?= $resultat['description_loisir']; ?></textarea></td>
                </tr>
           			  
         			  <tr>
                  <input hidden name="id_loisir" value="<?= $resultat['id_loisir']; ?>" />
                </tr>
                
                <tr>
                  <td colspan="2"><input type="submit" value="Mise à jour" /></td>
                </tr> 			  
              </tbody>
           
            </table>
          </form>    
         
        </section>

        <footer>
            <!-- faire le "include" du footer -->
        </footer>
	</body>
</html>