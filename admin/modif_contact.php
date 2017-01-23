
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

<!-- MISE A JOUR D'UN CONTACT -->

<?php 

//mise à jour

if($_POST){
  $modif_nom_contact = addslashes($_POST['nom_contact']);
  $modif_prenom_contact = addslashes($_POST['prenom_contact']);
  $modif_email_contact = addslashes($_POST['email_contact']);
  $modif_telephone_contact = addslashes($_POST['telephone_contact']);
	$id_contact = $_POST['id_contact'];
	$pdoCV -> exec(" UPDATE contacts SET nom_contact = '$modif_nom-contact', prenom_contact = '$modif_prenom_contact', email_contact = '$modif_email_contact', telephone_contact = '$modif_telephone_contact' WHERE id_contact = '$id_contact' ");

	header("location: contact.php");
		exit();
}
//récupération
	$id_contact = $_GET['modifier_contact'];
	$sql = $pdoCV -> query("SELECT * FROM contacts WHERE id_contact = '$id_contact' ");
	$ligne_contact = $sql -> fetch(); 
?>
   
<html lang="fr"><!--  -->
    <head>  
   	<meta charset="UTF-8" />
    <title>Modifier contact CV web <?php /*echo $resultat['prenom'] . ' ' . $resultat['nom'];*/ ?></title>
    <link rel="stylesheet" type="text/css" href="../cssAdmin/myfrontstyle.css" />
    </head>

    <body>
        <header>
        	<h1>Page de modification des Contacts</h1>

          <?php include 'navAdmin.php'; ?>
        </header>
         
        <section>

        <form action="contact.php" method="POST">
        	<label>Compétence sélectionnée :</label>
        <input type="text" name="modif_contact_nom" value="<?= $ligne_contact['nom_contact']; ?>" />
        <input type="text" name="modif_contact_prenom" value="<?= $ligne_contact['prenom_contact']; ?>" />
   			<input type="text" name="modif_contact_email" value="<?= $ligne_contact['email_contact']; ?>" />
        <input type="text" name="modif_contact_telephone" value="<?= $ligne_contact['telephone_contact']; ?>" />     
   			<input hidden name="modif_contact_id" value="<?= $ligne_contact['id_contact']; ?>" />			
   			<input type="submit" value="Mise à jour" />
        </form>
          


        </section>

       <footer>
           <!-- faire le include du footer -->
       </footer>
	</body>
</html>

