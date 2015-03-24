<?php
include 'lib/PDO.php';
echo '<pre>';
print_r($_POST);
echo '</pre>';
if(!empty($_POST))
{
	foreach($_POST as $key=>$value)
	{
		$$key = $value;
	}
	$base = 'exercicepdo_hachage';
	$sql = 'INSERT INTO utilisateur (login, password) VALUES (:new_login,md5(:new_password))';
	
	InsertAjout($base,$sql,$new_login,$new_password);
	header("location:hachage_connexion.php");
	

}
else 
{
	header("location:hachage_connexion.php");
}
?>
<html><head><title>Ajout utilisateur</title></head></html>