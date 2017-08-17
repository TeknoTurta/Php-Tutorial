<?php
	include("connect.php"); // MySQL ba�lant�s�n� al.
?>
<!DOCTYPE HTML5>
<head>
<title>Php Tutorial</title>
</head>
<body style="font-family:Arial;">
	<?php
	
	/*
	------------ MySQL Ba�lant�s� -----------
	- daha fazla bilgi connect.php'de var. -
	-----------------------------------------
	*/
	// MySQL Ba�lant�s� Var M�?
	echo '<p>Mysql Ba�lant�s� : </p>';
	switch($connection){
		case 1:
		echo '<p style="color:green;">Var</p>';
		break;
		case 2:
		echo '<p style="color:red;">Yok</p>';
		break;
		default:
		echo '<p style="fcolor:gray">Ba�lant� Yap�land�r�lamad�.</p>';
	}
	echo "<br/>";
	
	/*
	------------ PDO MySQL SELECT -----------
		- veritaban�ndan veri se�mek. -
		De�i�kenler : 
		$connect = connect.php'den
	-----------------------------------------
	*/
	
	$id = $_POST['id']; // id'yi post verisinden al
	$select = $connect->query("select * from table where id = 'id' "); // Tablodan verileri �ek
	$select->execute(array( 'id' => $id )); // id de�erini belirle
	if($select -> rowCount()){ // Veri bulundu mu?
		$row = $select->fetch(PDO::FETCH_ASSOC); // Verileri diziye aktar
	}
	else{
		echo $select->errorInfo();
	}
	/*
	------------ PDO MySQL INSERT -----------
		- veritaban�ndan veri se�mek. -
		De�i�kenler : 
		$connect = connect.php'den
	-----------------------------------------
	*/
	
	$id = $_POST['id']; // id'yi post verisinden al
	$insert = $connect->prepare("insert into tablo (id) values ( 'id' )"); // tabloya ekle
	$insert->execute(array( "id" => $id)); // id'yi belirle
	if(!$insert){ // ��lem ger�ekle�ti mi?
		$insert->errorInfo();
	}
	?>
</body>
</html>