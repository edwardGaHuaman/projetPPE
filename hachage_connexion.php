<?php 
include 'lib/PDO.php';

$row = SelectAllUser();

function AffichageUtilisateurs($row)
{
	//Affichage en mode OBJET
	foreach ($row as $value)
	{
		echo '<tr>';
		echo '<td>'.$value->id.'</td>';
		echo '<td>'.$value->login.'</td>';
		echo '<td>'.$value->password.'</td>';
		echo '</tr>';
	}
	/*
	//Affichage en mode Tab ASSOC
	foreach ($row as $value)
	{
		echo '<tr>';
		echo '<td>'.$value['id'].'</td>';
		echo '<td>'.$value['login'].'</td>';
		echo '<td>'.$value['password'].'</td>';
		echo '</tr>';
	}
	*/
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Exercice Hachage</title>
	<style>body{width:960px; margin:auto; margin-top:50px;}</style>
</head>
<body>
	<div>
		<h2>S'identifier</h2>
		<form method="post" action="hachage_user.php">
			Login : <input type="text" name="login" placeholder="Login">
			Password : <input type="password" name="password" placeholder="Password">
			<input type="submit" value="Se connecter">
		</form>
	</div>
	<div>
		<h2>Ajouter Utilisateur</h2>
		<form method="post" action="hachage_ajout.php">
			Login : <input type="text" name="new_login" placeholder="Login">
			Password : <input type="password" name="new_password" placeholder="Password">
			<input type="submit" value="Ajouter">
		</form>
	</div>
	<div>
		<h2>Utilisateurs Inscrits</h2>
		<table border=1>
			<tr>
				<td>Id</td><td>login</td><td>Mot de passe</td>
			</tr>
				<?php AffichageUtilisateurs($row); ?>
		</table>
	</div>
</body>
</html>