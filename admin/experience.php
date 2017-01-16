<?php require '../connexion/connexion.php'; ?>

<?php
if(isset($_POST['titre_xp'])){ // On vérife si on a creer une nouvelle compétence
    if($_POST['titre_xp']!= '' && $_POST['sous_titre_xp']!= ''  && $_POST['date']!= '' && $_POST['description']!= ''){//si compétence n'est pas vide
     $titre_xp = addslashes($_POST['titre_xp']);
     $sous_titre_xp = addslashes($_POST['sous_titre_xp']);
     $date = addslashes($_POST['date']);
     $description = addslashes($_POST['description']);
     $id_experience = addslashes($_POST['id_experience']);
    
    $pdoCV->exec(" INSERT INTO experiences VALUES (NULL,'$titre_xp', '$sous_titre_xp' , '$date', '$description') ");
        header("location:../admin/experience.php");
        exit();
    }// on ferle le if
}//on ferme le isset

if(isset($_GET['id_xp'])){
    $sql = 'DELETE FROM experiences WHERE id_xp = "' . $_GET['id_xp'] . '"';
    $resultat = $pdoCV -> query($sql);
    header('Location: experience.php');
}
?>

<html lang="fr">
  <head> 
    <?php 
      $sql = $pdoCV->query("SELECT * FROM utilisateurs, experiences");
      $resultat = $sql->fetch();
   	?>
   	<meta charset="UTF-8" />
    <title>Expériences CV web <?php echo $resultat['prenom'] .' ' . $resultat['nom']; ?></title>
    <link rel="stylesheet" type="text/css" href="../css/style.css" />
  </head>

  <body>
      <header id="headerXp">
      	
        <?php //include("admin_menu.php"); ?> <!-- FAUT CREER LA PAGE MENU -->

        <h1>Expériences</h1>
     
      </header>
       
      <section id="sectionXp">



      <?php 
      $sql = $pdoCV -> query("SELECT * FROM experiences");
      $sql -> execute();
      $nbr_experiences = $sql -> rowCount(); ?>
    
      <p>Il y a <?php echo $nbr_experiences; ?> expériences dans votre BDD.</p>

      <form action="experience.php" method="POST" id="formXp">
       		<table id="tabXp">
       			<tr>
              	<td>Titre XP :</td> 
                <td><input type="text" name="titre_xp" id="titreXp" size="50" required /></td>
            </tr>
                
            <tr>                        
              <td>Sous-Titre XP :</td> 
              <td><input type="text" name="sous_titre_xp" id="sousTitreXp" size="50" required /></td>                        
            </tr>
           
            <tr>
              <td>Date XP :</td> 
              <td><input type="text" name="date" id="dateXp" size="50" required /></td>                          
            </tr>

            <tr>
              <td>Description XP :</td> 
              <td><input type="text" name="description" id="descriptionXp" size="50" required /></td>
            </tr>
           
            <tr>
              <td>Valider en BDD =></td>
   				    <td><input type="submit" value="Insérer en BDD" /></td>
				      </tr>
   			  </table>
        </form>
        
        <caption id="captionXp">Liste des expériences :</caption>
        <table id="tabXp">
          <thead>
            <th>Titre xp</th>
            <th>Sous-titre xp</th>
            <th>Date xp</th>
            <th>Description xp</th>
            <th>Modification</th>
            <th>Suppression</th>
          </thead>                                 
            
            <?php while($resultat = $sql->fetch(PDO::FETCH_ASSOC)){ ?>
          <tr>
            <td><?php echo $resultat['titre_xp']; ?></td>                 
            <td><?php echo $resultat['sous_titre_xp']; ?></td>                
            <td><?php echo $resultat['date']; ?></td>                
            <td><?php echo $resultat['description']; ?></td>                               
            <td><a href="modif_experience.php?id_xp=<?= $resultat['id_xp']; ?>">Modifier</a></td> 
            <td><a href="experience.php?id_xp=<?= $resultat['id_xp']; ?>">Supprimer</a></td>
          </tr>
       			
            <?php };?>
     
          </tr> 
        </table>
      </section>

     <footer id="footerXp">
         <!-- faire le include du footer -->
     </footer>
	</body>
</html>