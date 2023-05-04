<!DOCTYPE html>
<html>
<head>
	<title>Liste des coachings</title>
	<style>
		body {
			background-color: #f2f2f2;
		}

		table {
			margin: 0 auto;
			background-color: white;
			border-collapse: collapse;
			width: 80%;
			box-shadow: 0 0 20px rgba(0,0,0,0.15);
			font-size: 1em;
		}

		th {
			background-color: #343a40;
			color: white;
			font-weight: bold;
			padding: 12px 15px;
			text-align: left;
			vertical-align: middle;
		}

		td {
			padding: 12px 15px;
			text-align: left;
			vertical-align: middle;
			border-bottom: 1px solid #f2f2f2;
		}

		tr:hover {
			background-color: #f5f5f5;
		}

		.stars {
			display: inline-block;
			margin: 0;
			padding: 0;
		}

		.stars input[type="radio"] {
			display: none;
		}

		.stars label {
			display: inline-block;
			cursor: pointer;
			color: #ccc;
			font-size: 30px;
			margin: 0;
			padding: 0;
		}

		.stars label:before {
			content: "\f005";
			font-family: FontAwesome;
			position: relative;
			display: block;
			margin: 0;
			padding: 0;
		}

		.stars label:hover:before,
		.stars label:hover ~ label:before,
		.stars input[type="radio"]:checked ~ label:before {
			content: "\f005";
			color: #FFD700;
		}
	</style>
</head>
<body>
	<div class="container">
		<h1>Liste des coachings</h1>
		<table>
			<thead>
				<tr>
					<th>Coach</th>
					<th>Date</th>
					<th>Heure</th>
					<th>Séance</th>
				</tr>
			</thead>
			<tbody>
			<?php
			// Connexion à la base de données
			$serveur = "localhost";
			$utilisateur = "root";
			$mot_de_passe = "";
			$base_de_donnees = "fitzone";

			$connexion = mysqli_connect($serveur, $utilisateur, $mot_de_passe);

			// Sélection de la base de données
			mysqli_select_db($connexion, $base_de_donnees);

			// Requête SQL pour effectuer une jointure entre les deux tableaux
			$sql = "SELECT coach.prenom, coaching.date, coaching.heure, coaching.seance
			        FROM coaching
			        INNER JOIN coach
			        ON coaching.id_coach = coach.id";

			// Exécution de la requête
			$resultat = mysqli_query($connexion, $sql);

			// Affichage des résultats dans le tableau
			while($ligne = mysqli_fetch_assoc($resultat)) {
			  echo "<tr>";
			  echo "<td>" . $ligne["prenom"] . "</td>";
			  echo "<td>" . $ligne["date"] . "</td>";
			  echo "<td>" . $ligne["heure"] . "</td>";
			  echo "<td>" . $ligne["seance"] . "</td>";
			  echo "</tr>";
			}

			// Fermeture de la connexion
			mysqli_close($connexion);
			?>
			</tbody>
		</table>
	</div>
</body>
</html>