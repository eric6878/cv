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

<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8" />
    <title>Portfolio CV web <?= $_POST['prenom'] . $_POST['nom']; ?></title>
    <link rel="stylesheet" type="text/css" href="../cssAdmin/myfrontstyle.css" />
  </head>
  
  <body>
    <header>
      
      <h1>Page de Modification du Portfolio</h1>

      <?php include 'navAdmin.php'; ?>

    </header>

    <section>
      <?php 
    
      $sql = $pdoCV -> query("SELECT * FROM portfolio");
      $sql -> execute();
      $nbr_portfolio = $sql -> rowCount();
    
      ?>
      
      <p>Il y a <?php echo $nbr_portfolio; ?> portfolio(s) dans votre BDD.</p>
      
      <form action="portfolio.php" method="POST" name="portfolio">
        <label>Ajouter un projet au portfolio</label>
        <input type="text" name="titre_portfolio" required />
        <!-- <input type="file" name="img_portfolio" /> -->
        <textarea name="description_portfolio" required></textarea>
        <script>

                /* Replace the textarea id="editor1" with a CKeditor instance, using default configuration. */
                CKEDITOR.replace( 'editor1' );
                </script>
        <input type="submit" value="valider" /></td>
      </form> 
      
      <table>
        <thead>
          <th>projet</th>
          <th>description</th>
          <th>Fichier</th>
          <th>Modification</th>
          <th>Suppression</th>
        </thead>
        <tr>
          <?php while($ligne = $sql -> fetch()){ ?>
          <td>
          <?php echo $ligne['titre_portfolio']; ?>
          </td>
          <td><a href="modif_portfolio.php?modifier_portfolio=<?= $ligne['id_portfolio']; ?>">Modifier</a></td>
          <td><a href="portfolio.php?supprimer_portfolio=<?= $ligne['id_portfolio']; ?>">Supprimer</a></td>
        </tr>
          <?php } ?>
       </table>
    </section>
  </body>
</html>
