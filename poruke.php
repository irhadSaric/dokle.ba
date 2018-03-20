<?php
	include 'conn.php';
	include 'header.php';

	if(isset($_SESSION['id']))
	{
		$stmt = $conn->prepare("SELECT idPosiljaoca FROM poruke WHERE idPrimaoca=?");
		$stmt->bind_param("i", $_SESSION['id']);
		$stmt->execute();
		$stmt->store_result();
		$stmt->bind_result($id);
		if(!$stmt->num_rows)
			echo "<div style='width:500px; height:500px; margin-top: 95px; margin-left: auto; margin-right: auto; margin-bottom: 20px; line-height: 500px; vertical-align: middle; text-align: center; -webkit-box-shadow: 1px 1px 19px 2px rgba(0,0,0,0.24);
			  -moz-box-shadow: 1px 1px 19px 2px rgba(0,0,0,0.24);
			  box-shadow: 1px 1px 19px 2px rgba(0,0,0,0.24);'>Nemate poruka</div>";
		else
		{
			while ($stmt->fetch()) {
				$ids[] = $id;
			}
			$ids = array_unique($ids);
			echo "<div class='divZaPoruke' style='min-height:400px;'>";

			for ($i=0; $i < count($ids); $i++) { 
				$stmt = $conn->prepare("SELECT * FROM korisnici WHERE id=?");
				$stmt->bind_param("i", $ids[$i]);
				$stmt->execute();
				$rez = $stmt->get_result();

				while($row = $rez->fetch_assoc())
				{
					$stmt2 = $conn->prepare("SELECT vrijemeSlanja, procitana FROM poruke WHERE idPrimaoca=? AND idPosiljaoca=? ORDER BY vrijemeSlanja DESC LIMIT 1");
					$stmt2->bind_param("ii", $_SESSION['id'], $ids[$i]);
					$stmt2->execute();
					$rezhahu = $stmt2->get_result();
					$row2 = $rezhahu->fetch_assoc();
					
					if(!$row2['procitana'])
					{
						echo "<div class='poruka'>
				  			<a href='profil.php?id=".$row['id']."'><ul>
				  				<li><img src='".$row["profilna"]."' style='width:120px; height:120px; margin-left:10px;'></img><li>
				  				<li id='informacijePoruke' style='margin-left:10px;'>".$row['ime']." ".$row['prezime']."</li>
				  			</ul></a>
				  			<a href='procitajPoruku.php?idPrimaoca=".$row['id']."'><ul>
				  				<li><b>Nova poruka</b> od korisnika ".$row['ime']." ".$row['prezime']."</li><br>
				  				<li>".$row2['vrijemeSlanja']."</li>
				  			</ul>
				  			</a>
				  		</div>";
					}
					else
					{
						echo "<div class='poruka'>
				  			<a href='profil.php?id=".$row['id']."'><ul>
				  				<li><img src='".$row["profilna"]."' style='width:120px; height:120px; margin-left:10px;'></img><li>
				  				<li id='informacijePoruke' style='margin-left:10px;'>".$row['ime']." ".$row['prezime']."</li>
				  			</ul></a>
				  			<a href='procitajPoruku.php?idPrimaoca=".$row['id']."'><ul>
				  				<li>Poruke od korisnika ".$row['ime']." ".$row['prezime']."</li><br>
				  				<li>Posljednja poruka :".$row2['vrijemeSlanja']."</li>
				  			</ul>
				  			</a>
				  		</div>";
					}
				}		
			}
			echo "</div>";
		}
}
		/*
		$stmt = $conn->prepare("SELECT * FROM poruke WHERE idPrimaoca=?");
		$stmt->bind_param("i", $_SESSION['id']);
		$stmt->execute();
		$result = $stmt->get_result();

		if($result->num_rows === 0)
		{
			echo "<div style='width:500px; height:500px; margin-top: 95px; margin-left: auto; margin-right: auto; margin-bottom: 20px; line-height: 500px; vertical-align: middle; text-align: center; -webkit-box-shadow: 1px 1px 19px 2px rgba(0,0,0,0.24);
			  -moz-box-shadow: 1px 1px 19px 2px rgba(0,0,0,0.24);
			  box-shadow: 1px 1px 19px 2px rgba(0,0,0,0.24);'>Nemate poruka</div>";
		}
		else
		{
			echo "<div class='divZaPoruke' style='min-height:400px;'>";
			while($row = $result->fetch_assoc()) 
			{
			  $stmt2 = $conn->prepare("SELECT * FROM korisnici WHERE id=?");
			  $stmt2->bind_param("i", $row['idPosiljaoca']);
			  $stmt2->execute();
			  $rezultat = $stmt2->get_result();
			  if($rezultat->num_rows === 0) exit("Kardinalna greška");
			  while($row2 = $rezultat->fetch_assoc())
			  {
			  	$procitana = $row["procitana"];
			  	if(!$procitana)
			  	{
			  		echo "<div class='poruka'>
			  			<a href='profil.php?id=".$row2['id']."'><ul>
			  				<li><img src='".$row2["profilna"]."' style='width:100px; height:100px; margin-left:10px;'></img><li>
			  				<li id='informacijePoruke' style='margin-left:10px;'>".$row2['ime']." ".$row2['prezime']."</li>
			  			</ul></a>
			  			<a href='procitajPoruku.php?idPoruke=".$row['idPoruke']."&idPrimaoca=".$row2['id']."'><ul>
			  				<li><b>Nova poruka</b> od korisnika ".$row2['ime']." ".$row2['prezime']."</li><br>
			  				<li>".$row['vrijemeSlanja']."</li>
			  			</ul>
			  			</a>
			  		</div>";
			  	}
			  	else
			  	{
			  		echo "<div class='poruka'>
			  			<a href='profil.php?id=".$row2['id']."'><ul style='margin-left:5px;'>
			  				<li><img src='".$row2["profilna"]."' style='width:100px; height:100px;'></img><li>
			  				<li id='informacijePoruke'>".$row2['ime']."</li>
			  			</ul></a>
			  			<a href='procitajPoruku.php?idPoruke=".$row['idPoruke']."&idPrimaoca=".$row2['id']."'><ul>
			  				<li>Poruka od korisnika ".$row2['ime']." ".$row2['prezime']."</li><br>
			  				<li><b>".$row['sadrzaj']."</b></li><br>
			  				<li>".$row['vrijemeSlanja']."</li>			  				
			  			</ul></a>
			  		</div>";	
			  	}
			  	$stmt2->close();
			  }
			}
			echo "</div>";
			$stmt->close();
		}
	}*/
	else
	{
		echo "<br><br><br><br><br><br><br><br>Moraš se logovati";
	}

	include 'footer.php';
?>