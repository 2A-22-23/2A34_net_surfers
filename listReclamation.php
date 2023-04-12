<?php
include "../Controller/crud.php";

$CrudReclamation = new CrudReclamation();
$list = $CrudReclamation->Display_reclamations();
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title> Reclamations </title>

	<style>
		td {
			padding: 10px;
		}
	</style>
</head>

<body>
	<div>
		<button>
			<a href="/gestion_reclamation/view/insert.php">ADD</a>
		</button>
	</div>
	<!-- ALL RECLAMATIONS -->
	<div>
		<h3>LES RECLAMATIONS:</h3>
		<table border="1">
			<?php
			
				echo "<tr>";
				echo ("<td>"  ."Username".  "</td>");
				echo ("<td>"  ."Firstname".  "</td>");
				echo ("<td>"  ."Lastname".  "</td>");
				echo ("<td>"  ."Email".  "</td>");
				echo ("<td>"  ."Phone_Number".  "</td>");
				echo ("<td>"  ."Object".  "</td>");
				echo ("<td>"  ."Comment".  "</td>");
				echo "</tr>";
			foreach ($list as $row) {
				
				echo "<tr>";
				echo ("<td>" . $row["username"] . "</td>");
				echo ("<td>" . $row["firstname"] . "</td>");
				echo ("<td>" . $row["lastname"] . "</td>");
				echo ("<td>" . $row["email"] . "</td>");
				echo ("<td>" . $row["phone_number"] . "</td>");
				echo ("<td>" . $row["object"] . "</td>");
				echo ("<td>" . $row["comment"] . "</td>");


				echo ("<td> <a href='http://localhost/gestion_reclamation/Actions/deleteReclamation.php?username=" . $row["username"] . "'>delete</a></td>");
				echo ("<td> <a href='http://localhost/gestion_reclamation/View/update.php?username=" . $row["username"] . "'>update</a></td>");
				echo "</tr>";
			}
			?>
		</table>

	</div>
</body>

</html>