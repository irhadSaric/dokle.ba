<?php

include("conn.php");

if(isset($_GET["id"]))
{
  $id = $_GET["id"];

  if(is_numeric($id))
  {
        $id = $_GET["id"];
    $sql = "SELECT ime, prezime, email, profilna, mjestoStanovanja, brojTelefona FROM korisnici WHERE id=?";
    $spremna = $conn->prepare($sql);
    $spremna->bind_param("i", $_GET['id']);
    $spremna->execute();
    $spremna->bind_result($ime, $prezime, $email, $profilna, $mjestoStanovanja, $brojTelefona);
    $spremna->fetch();
    $spremna->close();
    /*while($spremna->fetch())
    {
      echo $ime." ".$prezime." ".$email;
    }

    if(isset($_SESSION['id']) && $_SESSION['id'] == $_GET['id'])
    {
      echo "<br /><a href='logout.php'>Odjavi me</a>";
    }
    */
    if(empty($ime) && empty($prezime) && empty($email))
    {
      header("location:404.html");
    }
  }
  else
  {
    header("location:index.php");
  }
}
else
{
  header("location:404.html");
}

?>

<?php
    include("header.php");
?>
      <div id="contentProfila">
        <div class="boksovi" id="lijevo">
          <?php echo "<img src='".$profilna."' />"?>
          <?php
            if(isset($_SESSION['id']) && isset($_GET['id']))
            {
              if($_SESSION['id']==$_GET['id'])
              {
                echo "<form action='upload.php' method='post' enctype='multipart/form-data'>
                  <input type='file' name='file' />
                  <input type='submit' name='submit' value='Upload' />
                  </form>
                ";
              }
              else
              {
                echo "<a href='posaljiPoruku.php?idPrimaoca=".$_GET['id']."'><button>Posalji poruku</button></a>
                ";
              }
            }
          ?>
          <ul>
            <li class="podaci"><i class="fa fa-user"></i><?php echo $ime." ".$prezime; ?></li>
            <?php 
              if($mjestoStanovanja !== NULL)
              {
                echo "<li class='podaci'><i class='fa fa-home'></i>Mjesto stanovanja: <b>".$mjestoStanovanja."</b></li>";
              }

              if($brojTelefona !== NULL)
              {
                echo "<li class='podaci'><i class='fa fa-phone'></i><b>".$brojTelefona."</b></li>"; 
              }
            ?>
            <li class="podaci"><i class="fa fa-envelope"></i><?php echo $email; ?></li>
            <?php
              if(isset($_SESSION['id']) && $_SESSION['id'] == $_GET['id'])
              {
                echo "<li class='podaci'><i class='fa fa-plus'></i><a href='uredi.php?id=".$id."'>Uredi vlastite podatke</a></li>";
              }
            ?>
            <!--<li class="podaci"><i class="fa fa-line-chart"></i>Rejting</li>-->
          </ul>
        </div>
        <div class="boksovi" id="lijevo2">
          <h1 class="podaci"><i class="fa fa-users"></i>Dojmovi</h1>
          <hr class="podaci"/>
                
                <?php
                    if(isset($_SESSION['id']) && isset($_GET['id']) && $_SESSION['id']!=$_GET['id'])
                    {
                        echo "<form action='dodajDojam.php?primaoc=".$id."' method='post'>
                                  <textarea name='dodaniDojam' id='dodaniDojam' placeholder='Dobar vozac ...'></textarea>
                                  <input type='submit' name='dodajDojam' value='Dodaj dojam' />
                              </form>
                        ";
                    }  
                ?>

                    <?php
                        $sql = "SELECT * FROM dojmovi WHERE idPrimaoca=? ORDER BY idDojma DESC";     
                        $priprema = $conn->prepare($sql);
                        $priprema->bind_param("i", $_GET["id"]);
                        $priprema->execute();
                        $rez = $priprema->get_result();
                        if($rez->num_rows === 0) echo "Korisnik nema dojmova";
                        while($row = $rez->fetch_assoc()) {
                          $idPosiljaoca[] = $row['idPosiljaoca'];
                          $dojmovi[] = $row['dojam'];

                          $idKorisnika = $row['idPosiljaoca'];

                          $sql2 = "SELECT profilna FROM korisnici WHERE id = ?";
                          $priprema2 = $conn->prepare($sql2);
                          $priprema2->bind_param("i", $idKorisnika);
                          $priprema2->execute();
                          $priprema2->bind_result($profilna2);
                          $priprema2->fetch();
                          
                          $slike[] = $profilna2;

                          $priprema2->close();
                        }
                        $priprema->close();      
                    ?>
            <?php 
                        for($i = 0; $i < $rez->num_rows; $i++)
                        {
                            echo "<div class='maliBoks'>
                                    <a href='profil.php?id=".$idPosiljaoca[$i]."'><img src='".$slike[$i]."' width='75px' height='75px'></img>
                                    </a>
                                  
                            <p>".$dojmovi[$i]."</p></div>";
                        }
                    ?>            
          <!--<div class="maliBoks">
                    <img src="Tripda Logo.jpg" width="75px" height="75px"></img>
                    <p><?php echo $dojmovi[1]; ?></p>
                </div>
                <div class="maliBoks">
                    <img src="Tripda Logo.jpg" width="75px" height="75px"></img>
                    <p><?php echo $dojmovi[2]; ?></p>
                </div>-->
        </div>
        <div class="boksovi" id="desno">
          <h1 class="podaci"><i class="fa fa-newspaper-o"></i>Objave</h1>
          <hr class="podaci" />
          <div class='objava'>
            <div id="mapa"></div>
            <ul>
              <li><i class='fa fa-map-marker'></i>Polaziste: Hadžići</li>
              <li><i class='fa fa-map-marker'></i>Odrediste: Sarajevo</li>
              <li><i class='fa fa-clock-o'></i>Vrijeme polaska: 8:00</li>
              <li><i class='fa fa-credit-card'></i>Nacin placanja: Keš</li>
            </ul>
            </div>
        </div>
      </div>
<script>
  function initMap() {
    var directionsService = new google.maps.DirectionsService;
    var directionsDisplay = new google.maps.DirectionsRenderer;
    var map = new google.maps.Map(document.getElementById('mapa'), {
      zoom: 22,
      center: {lat: 43.8486400, lng: 18.3564400}
      //center: {lat: 41.85, lng: -87.65}
    });

    directionsDisplay.setMap(map);

    function Iscrtaj() {
      calculateAndDisplayRoute(directionsService, directionsDisplay);
    };
    Iscrtaj();
  }

  function calculateAndDisplayRoute(directionsService, directionsDisplay) {
    directionsService.route({
      origin: 'Sarajevo, Federation of Bosnia and Herzegovina, Bosnia and Herzegovina',
      destination: 'Hadžići, Federation of Bosnia and Herzegovina, Bosnia and Herzegovina',
      travelMode: 'DRIVING'
    }, function(response, status) {
      if (status === 'OK') {
        directionsDisplay.setDirections(response);
      } else {
        window.alert('Directions request failed due to ' + status);
      }
    });
  }

  Iscrtaj();
</script>

<?php
    //include("footer.php");
?>
