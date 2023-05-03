<?PHP
include '../Controller/commandeC.php';

$commandeC=new commandeC();
$listecommande=$commandeC->affichercommande();

?>
<html>
	<head></head>
		<body>
			<button><a href="ajoutercommande.php">Ajouter une commande</a></button>
			<center><h1>Liste des commandes</h1></center>
			<table border="1">
				<tr>
					<td>idCom</td>
					<td>Nom</td>
					<td>Telephone</td>
					<td>Adresse</td>
					<td>Prix</td>
					<td>supprimer</td>
					<td>modifier</td>
				</tr>

			<?PHP
			foreach($listecommande as $commande){
			?>
				<tr>
					<td><?PHP echo $commande['idCom']; ?></td>
					<td><?PHP echo $commande['nom']; ?></td>
					<td><?PHP echo $commande['telephone']; ?></td>
					<td><?PHP echo $commande['adresse']; ?></td>
					<td><?PHP echo $commande['prix']; ?></td>
					
					<td>
						<form method="POST" action="modifiercommande.php">
						<input type="submit" name="modifier" value="modifier">
						<input type="hidden" value="<?PHP echo $commande['idCom']; ?>" name="idCom">
					</form>
					</td>
					<td><a href="supprimercommande.php?idCom=<?PHP echo $commande['idCom']; ?>">
					Supprimer</a></td>
				</tr>
				<?PHP
			}
			?>
			</table>
	</body>
</html>


