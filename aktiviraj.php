<?php
	include("conn.php");
	//include("header.php");
?>
    <!DOCTYPE html>
    <html>
        <head>
            <meta charset="UTF-8">
            <link rel="icon" type="image/png" href="images/miniLogo.png">
            <title>Aktiviraj account</title>
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
                  integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
                  crossorigin="anonymous">
            <link rel="stylesheet" href="aktiviraj.css" type="text/css"/>
        </head>
        <body>
            <div class="container">
                <div class="jumbotron">
                    <img src="dokleIcon.png">
                    <h1>Aktivirajte Vas profil</h1>
                    <p style="color: red"><?php if(isset($_GET['poruka'])) {echo $_GET['poruka'];}?></p>
                    <form method="post" action="">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Vas aktivacijski kod"  name="kod">
                        </div>
                        <button type="submit" class="btn btn-primary" name="submit" value="Aktiviraj">Aktiviraj</button>
                    </form>
                </div>

            </div>
        </body>

    </html>

<?php
	//include("footer.php");
?>

<?php
	if(isset($_SESSION['email']) && !empty($_SESSION['email']))
	{
		if(!empty($_POST['kod']))
		{

			$uneseniKod = $_POST['kod'];
			$email 		= $_SESSION['email'];

			$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);
			$sql = "SELECT aktivacijskiKod FROM korisnici WHERE email=?";
			$priprema = $conn->prepare($sql);
			$priprema->bind_param("s", $email);
			$priprema->execute();
			$priprema->bind_result($rezultat);

			if($priprema->fetch())
			{
				$priprema->close();
				if($rezultat == $uneseniKod)
				{
					$conn2 = new mysqli($db_host, $db_user, $db_pass, $db_name);
					$sql2 = "UPDATE korisnici SET aktivan='jeste' WHERE email=?";
					$priprema2 = $conn2->prepare($sql2);
					$priprema2->bind_param("s", $email);
					$priprema2->execute();
					$priprema2->close();
                    echo "<h4 margin-left: 50px>Uspjesno ste se registrovali, slijedi redirekcija. Ako se to ne desi automatski kliknite na sljedeci link: <a href='index.php#druga'>Login</a></h4>";
					header("location:login.php?poruka=Uspjesno ste aktivirali account, logujte se.");
				}
				else
				{
					header("location:aktiviraj.php?poruka=Pokresan kod");
				}
			}

		}
	}
	else{
		header("location:aktiviraj.php?poruka=Moras se registrovati");
	}

?>