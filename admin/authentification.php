<?php require '../connexion/connexion.php'; ?>

<?php

?>

<html lang="fr">
    <head>  
   	<meta charset="UTF-8" />
    <title>Connexion au site CV <?php echo $resultat['prenom'] . ' ' . $resultat['nom']; ?></title>
    <link rel="stylesheet" type="text/css" href="../css/style.css" />
    </head>

    <body>
        <header id="headerXp">
	    	<!-- include admin_menu.php -->
	    	<h1>Page de connexion</h1>
        </header>

        <section>
        	<form method="POST" action="" name="">
        		<table>
        			<thead>
        				<th>Formulaire de connexion</th>
        			</thead>
    				
    				<tr>
    					<td>
    						<label>Nom d'utilisateur :</label>
    					</td>

    					<td>
							<input type="text" name="nom" value="" />
    					</td>
    				</tr>

    				<tr>
    					<td>
    						<label>Mot de passe :</label>
    					</td>

    					<td>
							<input type="password" name="mdp" />
    					</td>
    				</tr>

    				<tr>
    					<td>
    						<input type="submit" value="login" />
    					</td>
    				</tr>
				</table>
        	</form>
        </section>
        <!-- include footer.php -->
