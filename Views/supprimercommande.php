<?php
	include '../Controller/commandeC.php';
	$commandeC=new commandeC();
	$commandeC->supprimercommande($_GET["idCom"]);
	header('Location:affichercommande.php');
?>