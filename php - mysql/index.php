<?php
	include("connect.php"); // MySQL bağlantısını al.
?>
<!DOCTYPE HTML5>
<head>
<title>Php Tutorial</title>
</head>
<body style="font-family:Arial;">
	<?php
	
	/*
	------------ MySQL Bağlantısı -----------
	- daha fazla bilgi connect.php'de var. -
	-----------------------------------------
	*/
	// MySQL Bağlantısı Var Mı?
	echo '<p>Mysql Bağlantısı : </p>';
	switch($connection){
		case 1:
		echo '<p style="color:green;">Var</p>';
		break;
		case 2:
		echo '<p style="color:red;">Yok</p>';
		break;
		default:
		echo '<p style="fcolor:gray">Bağlantı Yapılandırılamadı.</p>';
	}
	echo "<br/>";
	
	/*
	------------ PDO MySQL SELECT -----------
		- veritabanından veri seçmek. -
		Değişkenler : 
		$connect = connect.php'den
	-----------------------------------------
	*/
	
	$id = $_POST['id']; // id'yi post verisinden al
	$select = $connect->query("select * from table where id = 'id' "); // Tablodan verileri çek
	$select->execute(array( 'id' => $id )); // id değerini belirle
	if($select -> rowCount()){ // Veri bulundu mu?
		$row = $select->fetch(PDO::FETCH_ASSOC); // Verileri diziye aktar
	}
	else{
		echo $select->errorInfo();
	}
	/*
	------------ PDO MySQL INSERT -----------
		- veritabanına veri eklemek. -
		Değişkenler : 
		$connect = connect.php'den
	-----------------------------------------
	*/
	
	$id = $_POST['id']; // id'yi post verisinden al
	$insert = $connect->prepare("insert into tablo (id) values ( 'id' )"); // tabloya ekle
	$insert->execute(array( "id" => $id)); // id'yi belirle
	if(!$insert){ // İşlem gerçekleşti mi?
		$insert->errorInfo();
	}
	?>
</body>
</html>
