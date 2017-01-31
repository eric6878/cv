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

//mise à jour
  if(isset($_POST['titre_xp'])){

    $titre_xp = addslashes($_POST['titre_xp']);
    $date_xp = addslashes($_POST['date_xp']);
    $description_xp = addslashes($_POST['description_xp']);
    $id_xpp = $_POST['id_xp'];
    $pdoCV -> exec("UPDATE experiences SET titre_xp = '$titre_xp', date_xp = '$date_xp', description_xp = '$description_xp' WHERE id_xp = '$id_xpp' ");
    header("location: experience.php");
    exit();
  }

//récupération

		$id_xp = $_GET['id_xp'];
		$sql = $pdoCV -> query("SELECT * FROM experiences WHERE id_xp = '$id_xp' ");
		$resultat = $sql -> fetch(); 

?>
 
<html lang="fr">
    <head>  
   	<meta charset="UTF-8" />
    <title>Modifier une expérience CV web <?php echo $resultat['prenom'] . ' ' . $resultat['nom']; ?></title>
    <link rel="stylesheet" type="text/css" href="../cssAdmin/myfrontstyle.css" />
    </head>

    <body>
        <header>
        	<h1>Page de Modification des Expériences</h1>

          <?php include 'navAdmin.php'; ?>
        </header>
         
        <section>

        <form  action="" method="POST">
          <table>
            
            <thead>
              <th colspan="2">Expérience sélectionnée :</th>
            </thead>
            
            <tbody>
              <tr>
                <td>Expérience</td>
                <td><input type="text" name="titre_xp" value="<?= $resultat['titre_xp']; ?>" /></td>
              </tr>

              <tr>
                <td>Date</td>
                <td><input type="text" name="date_xp" value="<?= $resultat['date_xp']; ?>" /></td>
              </tr>

              <tr>
                <td>Description</td>
                <td><textarea name="description_xp" cols="50" rows="10"><?= $resultat['description_xp']; ?></textarea></td>
              </tr>

              <tr>
                <input hidden name="id_xp" value="<?= $resultat['id_xp']; ?>" />
              </tr>	

              <tr>
                <td colspan="2"><input type="submit" value="Mise à jour" /></td> 				
              </tr>
            </tbody>
          
          </table>
        </form>
          
        <?php 
        	//include("admin_menu.php"); <!-- FAUT CREER LA PAGE MENU -->
        ?>   
        
        </section>

       <footer>
           <!-- faire le include du footer -->
       </footer>
	</body>
</html>












