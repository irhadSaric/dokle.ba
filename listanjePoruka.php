<?php
	include 'conn.php';
	
	if(isset($_GET['idPosiljaoca']) and is_numeric($_GET['idPosiljaoca']) and isset($_GET['idPrimaoca']) and is_numeric($_GET['idPrimaoca']))
	{
		$qry = "SELECT * FROM poruke WHERE (idPosiljaoca=? AND idPrimaoca=?) OR (idPosiljaoca=? AND idPrimaoca=?) ORDER BY vrijemeSlanja DESC";
		$stmt = $conn->prepare($qry);
		$stmt->bind_param("iiii", $_GET['idPosiljaoca'], $_GET['idPrimaoca'], $_GET['idPrimaoca'], $_GET['idPosiljaoca']);
		$stmt->execute();
		$rez = $stmt->get_result();
		while($row = $rez->fetch_assoc())
		{
			if($row['idPosiljaoca'] == $_SESSION['id'])
			{
				echo "<b style='color:green; margin-left: 10px;'>Ja</b>: <p style='margin-left: 10px;'>".$row['sadrzaj']."</p><br>";
			}
			else 
			{
				echo "<b style='color:blue; margin-left: 10px;'>On</b>: ".$row['sadrzaj']."<br>";
			}
		}
		$stmt->close();

	}

?>