<?php
include 'lib/PDO.php';

if(!empty($_POST))
{
	foreach($_POST as $key=>$value)
	{
		$$key = $value;
	}
	$base = 'exercicepdo_hachage';
	$sql = 'SELECT id FROM utilisateur WHERE login =\''.$login.'\' AND password =\''.md5($password).'\'';
	
	if(SelectAll($base,$sql))
	{
		$row = SelectAll($base,$sql);
		echo '<p>Bienvenue utilisateur numéro : '.$row[0]['id'].'</p>';
	}
	else
	{
		echo ("Login ou Mot de passe incorrect.");
		echo ('<a href="hachage_connexion.php">Retour</a>');
	}
	

}
else 
{
	header("location:hachage_connexion.php");
}
?>
<html><head><title>Accueil</title></head></html>