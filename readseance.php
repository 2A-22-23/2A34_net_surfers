<?php
include "../Controller/coachingc.php";

$coachingc = new coachingc();
$list = $coachingc->listseance();
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title> read</title>

	<style>
		td {
			padding: 10px;
		}
	</style>
</head>

<body>
	
	
	<!-- TOUT LES SEANCES -->
	<div>
		<h3>MES SEANCES :</h3>
		<table border="1">
			<?php
                echo "<tr>";
				echo ("<td>" . "Id Seance" . "</td>");
				echo ("<td>" . "Date" . "</td>");
				echo ("<td>" . "Heure". "</td>");
				echo ("<td>" . "Nb_participant" . "</td>");
				echo ("<td>" . "Seances " . "</td>");
                echo "</tr>";
			foreach ($list as $row) {
				echo "<tr>";
				echo ("<td>" . $row["id_seance"] . "</td>");
				echo ("<td>" . $row["date"] . "</td>");
				echo ("<td>" . $row["heure"] . "</td>");
				echo ("<td>" . $row["nb_participant"] . "</td>");
				echo ("<td>" . $row["seance"] . "</td>");
                echo "</tr>";
			}
			?>
		</table>

	</div>
</body>

</html>
