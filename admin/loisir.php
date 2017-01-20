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
//Insertion
if(isset($_POST['titre_loisir'])){ 
    if($_POST['titre_loisir']!= '' && $_POST['description_loisir']!= ''){
	    
	    $titre_loisir = addslashes($_POST['titre_loisir']);
	    $description_loisir = addslashes($_POST['description_loisir']);
	    /*$id_loisir = addslashes($_POST['id_loisir']);*/
    
	    $pdoCV->exec(" INSERT INTO loisirs VALUES (NULL, '$titre_loisir', '$description_loisir') ");
	        header('location: ../admin/loisir.php');
	        exit();
    }
}

//Suppression

if(isset($_GET['id_loisir'])){
    $eraser = $_GET['id_loisir'];
    $sql = "DELETE FROM loisirs WHERE id_loisir = '$eraser'";
    $resultat = $pdoCV -> query($sql);
    header('Location: loisir.php');
}
?>

<html lang="fr">
  <head> 
    <?php 
      $sql = $pdoCV->query("SELECT * FROM utilisateurs, loisirs");
      $resultat = $sql->fetch();
   	?>
   	<meta charset="UTF-8" />
    <title>Loisirs CV web <?php echo $resultat['prenom'] .' ' . $resultat['nom']; ?></title>
    <link rel="stylesheet" type="text/css" href="../cssAdmin/myfrontstyle.css" />
    <script src="../ckeditor/ckeditor.js"></script>
  </head>

  <body>
      <header>
       
       <h1>Page Loisirs</h1>

        <?php include 'navAdmin.php'; ?>
     
      </header>
       
      <section>

        <?php $sql = $pdoCV -> query("SELECT * FROM loisirs");
  		    $sql -> execute();
  		    $nbr_loisirs = $sql -> rowCount(); ?>
      
    
      <p>Il y a <?php echo $nbr_loisirs; ?> loisir(s) dans votre BDD.</p>

      <form action="loisir.php" method="POST">
     		<table>
     			<tr>
            	<td>Titre</td> 
              <td><input type="text" name="titre_loisir" size="50" required /></td>
          </tr>

          <tr>
            <td>Description</td> 
            <td>
              <textarea name="description_loisir" id="editor1" cols="50" rows="10" required /></textarea>  
                <script>
                  /* Replace the textarea id="editor1" with a CKeditor instance, using default configuration. */
                  CKEDITOR.replace( 'editor1' );
                </script>          
            </td>
          </tr>
         
          <tr>
            <td></td>
 				    <td><input type="submit" value="Insertion en BDD" /></td>
		      </tr>
			    </table>
        </form>
        
        <p>Liste des loisirs</p>
        <table>
          <thead>
            <th>Titre</th>
            <th>Description</th>
            <th>Modification</th>
            <th>Suppression</th>
          </thead>                                 
            
            <?php while($resultat = $sql->fetch(PDO::FETCH_ASSOC)){ ?>
          
          <tr>
            <td><?php echo $resultat['titre_loisir']; ?></td>                                 
            <td><?php echo $resultat['description_loisir']; ?></td>                                      
            <td><a href="modif_loisir.php?id_loisir=<?= $resultat['id_loisir']; ?>">Modifier</a></td> 
            <td><a href="loisir.php?id_loisir=<?= $resultat['id_loisir']; ?>">Supprimer</a></td>
          </tr>
       			
            <?php }; ?>
     
          </tr> 
        </table>
      </section>

     <footer>
         <!-- faire le include du footer -->
     </footer>
	</body>
</html>