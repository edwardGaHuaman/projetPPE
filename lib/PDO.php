<?php

function  Connect($base)
{
		$user = 'root';
		$pass = '';
		$hote = 'localhost';
		$port = '8080';
		$base = 'exercicepdo_hachage';
		$dsn="mysql:$hote;port=$port;dbname=$base";

		try
		{
			$dbh = new PDO($dsn, $user, $pass, array( PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
				
		}
		catch (PDOException $e)
		{
			die("Erreur! :" . $e->getMessage());
		}
		return $dbh;
}


//Select qui retourne un array associatif
function SelectAll($base,$sql)
{
	//Connection à la base
	$dbh = connect($base);
	$query  =  $dbh->query($sql);
	
	if ($query)
	{
		return  $query->fetchAll();
	}
	else
	{
		echo 'Erreur connexion';
		return false;
	}

}
function SelectAllUser()
{
	//Connection à la base
	$base = 'exercicepdo_hachage';
	$dbh = connect($base);
	$sql = 'SELECT * FROM utilisateur';
	$query  =  $dbh->query($sql);

	if ($query)
	{
		return  $query->fetchAll(PDO::FETCH_OBJ);
	}
	else
	{
		echo 'Erreur connexion';
		return false;
	}

}

//On retourne toute la liste mais on utilise un fetch.

function Select($base,$sql)
{
	$dbh = connect($base);
	$query = $dbh->query($sql);

	if ($query)
	{
		return $query;
	}
	else
	{
		return false;
	}

}

function Insert($base,$sql,$value,$valuecontent)
{
	$dbh = connect($base);
	$stmt = $dbh->prepare($sql);
	$stmt->BindValue($value,$valuecontent);
	$stmt->execute();
}

function InsertAjout($base,$sql,$login,$password)
{
  $dbh = connect($base);
  $stmt = $dbh->prepare($sql);
  $stmt->BindValue(':new_login',$login);
  $stmt->BindValue(':new_password',$password);
  $stmt->execute();
}