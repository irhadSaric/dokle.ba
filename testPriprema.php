<?php 

	$conn = new mysqli("localhost", "root", "", "korisnici");
	$conn->set_charset('utf8');

	$id = 23;

	$query = "SELECT * FROM korisnici WHERE id=?";
	$priprema = $conn->prepare($query);
	$priprema->bind_param("i", $id);
	$priprema->execute();
	$rez = $priprema->get_result();
	$red = $rez->fetch_array();

	for($i = 0; $i < count($red)/2; $i++){
		echo $red[$i]." ";
	}
	echo "<br>";
	$priprema->close();

	/**************************************************/

	$ime = "Irhad";
	$query = "UPDATE korisnici SET ime=? WHERE id=?";
	$stmt = $conn->prepare($query);
	$stmt->bind_param("si", $ime, $id);
	$stmt->execute();
	$stmt->close();
	
	/**************************************************/

	$prezime = "Prezime";
	$query = "INSERT INTO korisnici (ime, prezime) VALUES (?, ?)";
	$stmt = $conn->prepare($query);
	$stmt->bind_param("ss", $ime, $prezime);
	$stmt->execute();
	$stmt->close();

	/**************************************************/

	$query = "SELECT * FROM korisnici WHERE ime LIKE 'I%'";
	$stmt = $conn->prepare($query);
	$stmt->execute();
	$rez = $stmt->get_result();
	while($red = $rez->fetch_assoc())
	{
		echo $red['ime']." ".$red['prezime'];
		echo "<br>";
	}
	$stmt->close();

	/**************************************************/
	$query = "SELECT * FROM rute WHERE (datum BETWEEN '2018-01-31' AND '2018-02-13s')";
	$stmt = $conn->prepare($query);
	$stmt->execute();
	$rez = $stmt->get_result();
	while($red = $rez->fetch_assoc())
	{
		echo $red['polaziste']." -> ".$red['odrediste']. " u ".$red['vrijeme'];
		echo "<br>";
	}
	$stmt->close();
?>