<?php

	include 'conn.php';

	if(isset($_SESSION['id']) && isset($_GET['idPrimaoca']) && isset($_GET['idPosiljaoca']))
	{
		$query = "UPDATE poruke SET procitana=true WHERE idPosiljaoca=? AND idPrimaoca=?";
		$prepared = $conn->prepare($query);
		$prepared->bind_param("ii", $_GET['idPosiljaoca'], $_GET['idPrimaoca']);
		$prepared->execute();

		$prepared->close();
	}

?>