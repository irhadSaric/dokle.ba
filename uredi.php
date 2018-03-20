<?php

	include("conn.php");

	if(isset($_POST['submit']))
	{
		if(isset($_SESSION['id']) && $_SESSION['id'] == $_GET['id'])
		{
			if(isset($_POST['ime']) && !empty($_POST['ime']))
			{
				$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);
				$conn->set_charset('utf8');
				$sql = "UPDATE korisnici SET ime=? WHERE id=?";
				$priprema = $conn->prepare($sql);
				$priprema->bind_param("si", $_POST['ime'], $_SESSION['id']);
				$priprema->execute();
				$priprema->close();
				header("location:profil.php?id=".$_GET['id']);
			}
			if(isset($_POST['prezime']) && !empty($_POST['prezime']))
			{
				$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);
				$conn->set_charset('utf8');
				$sql = "UPDATE korisnici SET prezime=? WHERE id=?";
				$priprema = $conn->prepare($sql);
				$priprema->bind_param("si", $_POST['prezime'], $_GET['id']);
				$priprema->execute();
				$priprema->close();
				header("location:profil.php?id=".$_GET['id']);
			}
			if(isset($_POST['email']) && !empty($_POST['email']))
			{
				$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);
				$conn->set_charset('utf8');
				$sql = "UPDATE korisnici SET email=? WHERE id=?";
				$priprema = $conn->prepare($sql);
				$priprema->bind_param("si", $_POST['email'], $_GET['id']);
				$priprema->execute();
				$priprema->close();
				header("location:profil.php?id=".$_GET['id']);
			}
			if(isset($_POST['brtelefona']) && !empty($_POST['brtelefona']))
			{
				$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);
				$conn->set_charset('utf8');
				$sql = "UPDATE korisnici SET brojTelefona=? WHERE id=?";
				$priprema = $conn->prepare($sql);
				$priprema->bind_param("si", $_POST['brtelefona'], $_GET['id']);
				$priprema->execute();
				$priprema->close();
				header("location:profil.php?id=".$_GET['id']);
			}
			if(isset($_POST['mjestoStanovanja']) && !empty($_POST['mjestoStanovanja']))
			{
				$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);
				$conn->set_charset('utf8');
				$sql = "UPDATE korisnici SET mjestoStanovanja=? WHERE id=?";
				$priprema = $conn->prepare($sql);
				$priprema->bind_param("si", $_POST['mjestoStanovanja'], $_GET['id']);
				$priprema->execute();
				$priprema->close();
				header("location:profil.php?id=".$_GET['id']);
			}
		}
	}
?>
<?php
	include("header.php");
?>

	<div id="formaIzUredi">
		<form method="post" action="">
			<h2>Uredi podatke</h2>
			<input type="text" name="ime" placeholder="Novo ime" />
			<input type="text" name="prezime" placeholder="Novo prezime" />
			<input type="text" name="email" placeholder="Novi mail" />
			<input type="text" name="brtelefona" placeholder="Novi broj telefona" />
			<input type="text" name="mjestoStanovanja" placeholder="Mjesto stanovanja" />
			<input type="submit" name="submit" value="Postavi" />
		</form>
	</div>
</body>
</html>