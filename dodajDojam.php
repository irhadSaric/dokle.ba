<?php

include("conn.php");

if(isset($_POST['dodajDojam']) && isset($_SESSION["id"]))
{
	if(!empty($_POST['dodaniDojam']))
	{
		$primaoc = $_GET["primaoc"];

		$sql = "INSERT INTO dojmovi (idPosiljaoca, idPrimaoca, dojam) VALUES (?, ?, ?)";
		$spremna2 = $conn->prepare($sql);
		$spremna2->bind_param('iis', $_SESSION['id'], $primaoc, $_POST['dodaniDojam']);
		$spremna2->execute();
		$spremna2->close();

		header("location:profil.php?id=".$primaoc);
	}
	else
	{
		header("location:index.php?poruka=Unesite sva polja");
	}
}
else 
{
	header("location:index.php?poruka=Kardinalna greska!");
}

?>