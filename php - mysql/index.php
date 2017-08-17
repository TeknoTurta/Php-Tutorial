<?php
	include("connect.php"); // MySQL baðlantýsýný al.
?>
<!DOCTYPE HTML5>
<head>
<title>Php Tutorial</title>
</head>
<body style="font-family:Arial;">
	<?php
	
	/*
	------------ MySQL Baðlantýsý -----------
	- daha fazla bilgi connect.php'de var. -
	-----------------------------------------
	*/
	// MySQL Baðlantýsý Var Mý?
	echo '<p>Mysql Baðlantýsý : </p>';
	switch($connection){
		case 1:
		echo '<p style="color:green;">Var</p>';
		break;
		case 2:
		echo '<p style="color:red;">Yok</p>';
		break;
		default:
		echo '<p style="fcolor:gray">Baðlantý Yapýlandýrýlamadý.</p>';
	}
	echo "<br/>";
	
	/*
	------------ PDO MySQL SELECT -----------
		- veritabanýndan veri seçmek. -
		Deðiþkenler : 
		$connect = connect.php'den
	-----------------------------------------
	*/
	
	$id = $_POST['id']; // id'yi post verisinden al
	$select = $connect->query("select * from table where id = 'id' "); // Tablodan verileri çek
	$select->execute(array( 'id' => $id )); // id deðerini belirle
	if($select -> rowCount()){ // Veri bulundu mu?
		$row = $select->fetch(PDO::FETCH_ASSOC); // Verileri diziye aktar
	}
	else{
		echo $select->errorInfo();
	}
	/*
	------------ PDO MySQL INSERT -----------
		- veritabanýndan veri seçmek. -
		Deðiþkenler : 
		$connect = connect.php'den
	-----------------------------------------
	*/
	
	$id = $_POST['id']; // id'yi post verisinden al
	$insert = $connect->prepare("insert into tablo (id) values ( 'id' )"); // tabloya ekle
	$insert->execute(array( "id" => $id)); // id'yi belirle
	if(!$insert){ // Ýþlem gerçekleþti mi?
		$insert->errorInfo();
	}
	?>
</body>
</html>