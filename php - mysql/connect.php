<?php

// Mysql bilgileri

$db_host = "db_host";
$db_user = "db_user";
$db_password = "db_password";
$db_name = "db_name";

/*
---------- MySQL Baðlantýsý ----------
- PDO ile MySQL veritabanýna baðlan. -
--------------------------------------
*/

try{ // Mysql ' e baðlanmayý dene
	$connect = new PDO("mysql:host=$db_host;dbname=$db_name"$db_user,$db_password);
catch(PDOException $e){ // Mysql baðlantý hatasý
	print -> $e.getMessage();
	$connection = 0; // Baðlantý baþarýsýz, 0 deðeri döndür.
}
$connection = 1; // Baðlantý baþarýlý, 1 deðeri döndür.
?>