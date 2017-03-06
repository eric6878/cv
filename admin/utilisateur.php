<?php require '../connexion/connexion.php'; ?>

<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="UTF-8" />
		<title>Mon Site CV - Admin : Accueil</title>
		<link href="../cssfrontbootstrap/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" type="text/css" href="../cssAdmin/myfrontstyle.css" />
	</head>
	
	<body>
		<header>
			<h1>Profil Admin du site CV Éric Coudert</h1>

			<?php include 'navAdmin.php'; ?>
			
			<p>Bienvenue admin éric coudert</p>

			
		</header>

		<?php $sql = $pdoCV -> query("SELECT * FROM utilisateurs");
		    $sql -> execute();
		    $resultat = $sql -> rowCount(); ?>

		 

			<table>
		          <thead>
		            <th>Titre</th>
		            <th>Description</th>
		            <th>Modification</th>
		            <th>Suppression</th>
		          </thead> 

		          <tbody>                               
		            
		            <?php while($resultat = $sql -> fetch(PDO::FETCH_ASSOC)){ ?>
		          
		          <tr>
		          	<td>Prénom</td>
		            <td><?php echo $resultat['prenom']; ?></td>
		            <td><a href="modif_utilisateur.php?id_utilisateur=<?= $resultat['prenom']; ?>"><i class="fa fa-pencil-square-o fa2"></i></a></td> 
		            <td><a href="utilisateur.php?id_utilisateur=<?= $resultat['prenom']; ?>"><i class="fa fa-trash-o"></i></a></td>
		          </tr>

		          <tr>
		          	<td>Nom</td>
		            <td><?php echo $resultat['nom']; ?></td>
		            <td><a href="modif_utilisateur.php?id_utilisateur=<?= $resultat['nom']; ?>"><i class="fa fa-pencil-square-o fa2"></i></a></td> 
		            <td><a href="utilisateur.php?id_utilisateur=<?= $resultat['nom']; ?>"><i class="fa fa-trash-o"></i></a></td>
		          </tr>

		          <tr>
		          	<td>Age</td>
		            <td><?php echo $resultat['age']; ?></td>
		            <td><a href="modif_utilisateur.php?id_utilisateur=<?= $resultat['age']; ?>"><i class="fa fa-pencil-square-o fa2"></i></a></td> 
		            <td><a href="utilisateur.php?id_utilisateur=<?= $resultat['age']; ?>"><i class="fa fa-trash-o"></i></a></td>
		          </tr>

		          <tr>
		          	<td>Adresse</td>
		            <td><?php echo $resultat['adresse']; ?></td>
		            <td><a href="modif_utilisateur.php?id_utilisateur=<?= $resultat['adresse']; ?>"><i class="fa fa-pencil-square-o fa2"></i></a></td> 
		            <td><a href="utilisateur.php?id_utilisateur=<?= $resultat['adresse']; ?>"><i class="fa fa-trash-o"></i></a></td>
		          </tr>

		          <tr>
		          	<td>Ville</td>
		            <td><?php echo $resultat['ville']; ?></td>
		            <td><a href="modif_utilisateur.php?id_utilisateur=<?= $resultat['ville']; ?>"><i class="fa fa-pencil-square-o fa2"></i></a></td> 
		            <td><a href="utilisateur.php?id_utilisateur=<?= $resultat['ville']; ?>"><i class="fa fa-trash-o"></i></a></td>
		          </tr>

		          <tr>
		          	<td>Téléphone</td>
		            <td><?php echo $resultat['telephone']; ?></td>
		            <td><a href="modif_utilisateur.php?id_utilisateur=<?= $resultat['telephone']; ?>"><i class="fa fa-pencil-square-o fa2"></i></a></td> 
		            <td><a href="utilisateur.php?id_utilisateur=<?= $resultat['telephone']; ?>"><i class="fa fa-trash-o"></i></a></td>
		          </tr>

		          <tr>
		          	<td>Email</td>
		            <td><?php echo $resultat['email']; ?></td>
		            <td><a href="modif_utilisateur.php?id_utilisateur=<?= $resultat['email']; ?>"><i class="fa fa-pencil-square-o fa2"></i></a></td> 
		            <td><a href="utilisateur.php?id_utilisateur=<?= $resultat['email']; ?>"><i class="fa fa-trash-o"></i></a></td>
		          </tr>                                
			
		            <?php }; ?>

	            </tbody> 
		     
	        </table>

		<p><a href="modif_utilisateur.php">Modifier le profil de l'utilisateur</a></p>
	</body>
</html>