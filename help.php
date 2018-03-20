<?php
    include("conn.php");
    
    if(isset($_SESSION["id"]))
        include("header.php");
    else{
        header("location:index.php?poruka=Morate se ulogovati");
        die();
    }
?>
<a href="https://sarajevogroundlines.neocities.org/"><div id="reklama"><img src="reklama.png"></img></div></a>
    <div id="contentProfila">
        <div class="boksovi" id="filtracija">
            <h1 class="podaci"><i class="fa fa-filter"></i>Filtracija</h1>
            <hr class="podaci">
            <form action="" method="post">

                <h3 class="podaci">Država</h3>
                <select name="drzava">
                    <option value="bosna">Bosna</option>
                    <option value="srbija">Srbija</option>
                    <option value="hrvatska">Hrvatska</option>                    
                </select>
                <hr class="podaci" />

                <h3 class="podaci">Datum polaska</h3>
                    <input type="date" name="datumPolaska">
                <hr class="podaci" />

                <h3 class="podaci">Vrijeme polaska</h3>
                <h5>2:20:pm za 14:20 ili 6:20:am za 6:20</h5>
                    <input type="time" name=""></input>
                <hr class="podaci" />

                <h3 class="podaci">Način plaćanja</h3>
                    <input type="checkbox" name="">Keš
                    <br />
                    <input type="checkbox" name="">Besplatno
                <hr class="podaci" />

                <h3 class="podaci">Polazište</h3>
                    <input type="text" name=""></input>
                <h3 class="podaci">Odredište</h3>
                    <input type="text" name=""></input>
                <br />
                <input type="submit" name="filtriraj" value="Filtriraj">
            </form>
        </div>
        <a href="dodajRutu.php">
            <div class="boksovi" id="dodajObjavu">
                <h1 class="podaci"><i class="fa fa-plus"></i>Dodaj objavu</h1>
            </div>
        </a>
        <div class="boksovi" id="objave">
            <br>
            <?php
                if(isset($_SESSION["id"]))
                {                    
                    $sql = "SELECT * FROM rute ORDER BY idRute DESC";
                    $rez = mysqli_query($conn, $sql);

                    if(mysqli_num_rows($rez) > 0)
                    {
                        while($red = mysqli_fetch_assoc($rez))
                        {
                            $idVozaca = $red['idVozaca'];
                            $sql2= "SELECT * FROM korisnici WHERE id=$idVozaca";
                            $rezultat = mysqli_query($conn, $sql2);
                            $rezultat = mysqli_fetch_assoc($rezultat);

                            echo "
                            <br>
                            <div class='pocetnaObjave'>
                            <a href='profil.php?id=".$red["idVozaca"]."'><img src='".$rezultat['profilna']."' width='100px' height='100px'/><br><h4>".$rezultat['ime']."</h4></a>
                                <ul>
                                    <li><i class='fa fa-globe'><h4>Država:</h4></i>".$red['drzava']."</li>
                                    <li><i class='fa fa-map-marker'><h4>Polaziste:</h4></i>".$red['polaziste']."</li>
                                    <li><i class='fa fa-map-marker'><h4>Odredište:</h4></i>".$red['odrediste']."</li>
                                    <li><i class='fa fa-calendar'><h4>Datum: </h4></i>".$red['datum']."</li>
                                    <li><i class='fa fa-clock-o'><h4>Vrijeme: </h4></i>".$red['vrijeme']."</li>
                                    <li><i class='fa fa-credit-card-alt'><h4>Plaćanje: </h4></i>".$red['nacinPlacanja']."</li>
                                </ul>
                            </div>
                            <br>
                            <hr class='podaci'>
                            ";
                        }
                    }    
                }
                else
                {
                    echo "Neocekivana greska";
                }
            ?>
            </div>
        <a href="https://sarajevogroundlines.neocities.org/"><div id="reklama2"><img src="https://media.giphy.com/media/l49JVVqMc1PwGSXbW/giphy.gif" /></div></a>
    </div>

<?php
    include("footer.php");
?>