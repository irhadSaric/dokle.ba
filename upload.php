<?php
	include("conn.php");

	if(isset($_POST['submit']))
	{
		$id   = $_SESSION['id'];
		$file = $_FILES['file'];

		$fileName 	 = $_FILES['file']['name'];
		$fileTmpName = $_FILES['file']['tmp_name'];
		$fileSize	 = $_FILES['file']['size'];
		$fileError	 = $_FILES['file']['error'];
		$fileType	 = $_FILES['file']['type'];

		$fileExt	 = explode('.', $fileName);//razdvoji ime fajla na ime i ekstenziju

		$filePraviExt= strtolower(end($fileExt));

		$dozvoljeni  = array('jpg', 'jpeg', 'png');

		if(in_array($filePraviExt, $dozvoljeni))
		{
			if($fileError === 0)
			{
				if($fileSize < 10485760)
				{
					$fileNameNovo = $id.".".$filePraviExt;
					$fileDestinacija = 'profilne/'.$fileNameNovo;

					move_uploaded_file($fileTmpName, $fileDestinacija);	

					$sql = "UPDATE korisnici SET profilna=? WHERE id=?";
					$priprema = $conn->prepare($sql);
					$priprema->bind_param("si", $fileDestinacija, $id);
					$priprema->execute();
					$priprema->close();

					header("location:profil.php?id=".$id);
				}
				else
				{
					echo "Slika prevelika!";
				}
			}
			else
			{
				echo "Neocekivana greska";
			}
		}
		else
		{
			echo "Ne mozes uploadovati sliku ovog tipa.";
		}
	}	
?>