<?php
	include("conn.php");
	include("header.php");
?>
	<div id="sadrzaj" style="min-height: 400px; margin-bottom: 20px; width: 600px;">
		<h1 style="text-align: center;">Pošalji poruku</h1>
		<form method="post" style="margin-left: 100px;">
			<textarea name="sadrzajPorukue" value="" style="height: 200px; width: 400px;"></textarea>
			<br>
			<input type="submit" name="posalji" value="Pošalji poruku" style="width: 400px; margin-left: 0; height: 25px;" />
		</form>
	</div>
<?php

	if(isset($_GET['idPrimaoca']) && is_numeric($_GET['idPrimaoca']) && isset($_POST['posalji']))
	{
		if(isset($_SESSION['id']))
		{
			if(isset($_POST['sadrzajPorukue']) && !empty($_POST['sadrzajPorukue']))
			{
				$idPosiljaoca = $_SESSION['id'];
				$idPrimaoca = $_GET['idPrimaoca'];
				$sadrzajPoruke = $_POST['sadrzajPorukue'];

				$sql = "INSERT INTO poruke (idPosiljaoca, idPrimaoca, sadrzaj) VALUES (?, ?, ?)";
				$spremna2 = $conn->prepare($sql);
				$spremna2->bind_param('iis', $idPosiljaoca, $idPrimaoca, $sadrzajPoruke);
				$spremna2->execute();
				$spremna2->close();

				echo "Poruka uspjesno poslata";

				header( "refresh:2;url=profil.php?id=".$idPrimaoca );
			}
		}
	}

	include 'footer.php';

?>