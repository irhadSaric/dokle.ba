<?php
	
	include 'conn.php';

	if(isset($_GET['idPrimaoca']) && is_numeric($_GET['idPrimaoca']))
	{
		if(isset($_SESSION['id']))
		{
			if(isset($_GET['sadrzaj']) && !empty($_GET['sadrzaj']))
			{
				$idPosiljaoca = $_SESSION['id'];
				$idPrimaoca = $_GET['idPrimaoca'];
				$sadrzajPoruke = $_GET['sadrzaj'];

				$sql = "INSERT INTO poruke (idPosiljaoca, idPrimaoca, sadrzaj) VALUES (?, ?, ?)";
				$spremna2 = $conn->prepare($sql);
				$spremna2->bind_param('iis', $idPosiljaoca, $idPrimaoca, $sadrzajPoruke);
				$spremna2->execute();
				$spremna2->close();
			}
		}
		else
		{
			location("index.php?poruka=Moras se logovati");
		}
	}
	else
	{
		echo "Kardinalna greska";
		location("pocetna.php");
	}

?>