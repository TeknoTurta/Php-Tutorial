<?php

// Mysql bilgileri

$db_host = "db_host";
$db_user = "db_user";
$db_password = "db_password";
$db_name = "db_name";

/*
---------- MySQL Ba�lant�s� ----------
- PDO ile MySQL veritaban�na ba�lan. -
--------------------------------------
*/

try{ // Mysql ' e ba�lanmay� dene
	$connect = new PDO("mysql:host=$db_host;dbname=$db_name"$db_user,$db_password);
catch(PDOException $e){ // Mysql ba�lant� hatas�
	print -> $e.getMessage();
	$connection = 0; // Ba�lant� ba�ar�s�z, 0 de�eri d�nd�r.
}
$connection = 1; // Ba�lant� ba�ar�l�, 1 de�eri d�nd�r.
?>