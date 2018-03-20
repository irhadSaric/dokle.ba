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
                    <option value="Bosna i Hercegovina">Bosna</option>
                    <option value="Srbija">Srbija</option>
                    <option value="Hrvatska">Hrvatska</option>                    
                </select>
                <hr class="podaci" />

                <h3 class="podaci">Datum polaska</h3>
                    <input type="date" name="datumPolaska">
                <hr class="podaci" />

                <h3 class="podaci">Vrijeme polaska</h3>
                <h5>2:20:pm za 14:20 ili 6:20:am za 6:20</h5>
                    <input type="time" name="vrijemePolaska"></input>
                <hr class="podaci" />

                <h3 class="podaci">Način plaćanja</h3>
                    <input type="radio" name="placanje" value="Keš">Keš
                    <br />
                    <input type="radio" name="placanje" value="Besplatno">Besplatno
                    <br />
                    <input type="radio" name="placanje" value="Sve" checked>Sve
                <hr class="podaci" />

                <h3 class="podaci">Polazište</h3>
                    <input type="text" name="polaziste"></input>
                <h3 class="podaci">Odredište</h3>
                    <input type="text" name="odrediste"></input>
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
            function ispisi($red)
            {
                $db_host    = "localhost";
                $db_name    = "korisnici";//"id3608535_korisnici";
                $db_pass    = "";//"dokle.ba";
                $db_user    = "root";//"id3608535_irho";

                $conn = new mysqli($db_host, $db_user, $db_pass, $db_name);
                $conn->set_charset('utf8');

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
            function ispisiRutu($sql)
            {
                $db_host    = "localhost";
                $db_name    = "korisnici";//"id3608535_korisnici";
                $db_pass    = "";//"dokle.ba";
                $db_user    = "root";//"id3608535_irho";

                $conn = new mysqli($db_host, $db_user, $db_pass, $db_name);
                $conn->set_charset('utf8');
                $rez = mysqli_query($conn, $sql);

                if($rez === false) echo mysqli_error($conn);

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
                else
                {
                    echo "<p style='width: 100%; min-height:800px; line-height:800px; vertical-align:middle; text-align: center; color: red;'>Trazena ruta ne postoji. Ovdje sponzori</p>
                    ";
                }
            }

                if(isset($_SESSION["id"]))
                {                    
                    if(!isset($_POST["filtriraj"]))
                    {
                        $sql = "SELECT * FROM rute ORDER BY idRute DESC";
                        ispisiRutu($sql);
                    }                                       
                    else
                    {
                        $drzava = $_POST["drzava"];

                        if($_POST["placanje"] == "Sve")
                        {
                            if(!empty($_POST["datumPolaska"]))
                            {
                                if(!empty($_POST["vrijemePolaska"]))
                                {
                                    $datumPolaska = $_POST["datumPolaska"];
                                    $sql = "SELECT * FROM rute WHERE datum='$datumPolaska' AND drzava='$drzava'";

                                    $rez = mysqli_query($conn, $sql);

                                    if(mysqli_num_rows($rez) > 0)
                                    {
                                        $brojac = 0;
                                        while($red = mysqli_fetch_assoc($rez))
                                        {
                                            $razlika = strtotime($_POST["vrijemePolaska"]) - strtotime($red["vrijeme"]);
                                            $razlika = floor($razlika / 3600);

                                            if(abs($razlika) <= 1)
                                            {
                                                $brojac += 1;
                                                ispisi($red);
                                            }
                                        }
                                        if($brojac == 0) echo "Nema traženih ruta";
                                    }
                                }
                                else
                                {
                                    $datumPolaska = date($_POST["datumPolaska"]);  
                                    $sql = "SELECT * FROM rute WHERE datum='$datumPolaska' AND drzava='$drzava'";
                                    ispisiRutu($sql);
                                }   
                            }
                            else//nije postavljen datum polaska
                            {
                                if(!empty($_POST["vrijemePolaska"]))
                                {
                                    $sql = "SELECT * FROM rute WHERE drzava='$drzava'";

                                    $rez = mysqli_query($conn, $sql);

                                    if(mysqli_num_rows($rez) > 0)
                                    {
                                        $brojac = 0;
                                        while($red = mysqli_fetch_assoc($rez))
                                        {
                                            $razlika = strtotime($_POST["vrijemePolaska"]) - strtotime($red["vrijeme"]);
                                            $razlika = floor($razlika / 3600);

                                            if(abs($razlika) <= 1)
                                            {
                                                $brojac += 1;
                                                ispisi($red);
                                            }
                                        }
                                        if($brojac == 0) echo "Nema traženih ruta";
                                    }
                                }
                                else
                                {
                                    $drzava = $_POST["drzava"];
                                    $sql = "SELECT * FROM rute WHERE drzava='$drzava'";
                                    ispisiRutu($sql);
                                }  
                            }
                        }
                        else
                        {
                            $placanje = $_POST["placanje"];
                            if(!empty($_POST["datumPolaska"]))
                            {
                                if(!empty($_POST["vrijemePolaska"]))
                                {
                                    $datumPolaska = $_POST["datumPolaska"];
                                    $sql = "SELECT * FROM rute WHERE datum='$datumPolaska' AND drzava='$drzava' AND nacinPlacanja='$placanje'";

                                    $rez = mysqli_query($conn, $sql);

                                    if(mysqli_num_rows($rez) > 0)
                                    {
                                        $brojac = 0;
                                        while($red = mysqli_fetch_assoc($rez))
                                        {
                                            $razlika = strtotime($_POST["vrijemePolaska"]) - strtotime($red["vrijeme"]);
                                            $razlika = floor($razlika / 3600);

                                            if(abs($razlika) <= 1)
                                            {
                                                $brojac += 1;
                                                ispisi($red);
                                            }
                                        }
                                        if($brojac == 0) echo "Nema traženih ruta";
                                    }
                                }
                                else
                                {
                                    $datumPolaska = date($_POST["datumPolaska"]);  
                                    $sql = "SELECT * FROM rute WHERE datum='$datumPolaska' AND drzava='$drzava' AND nacinPlacanja='$placanje'";
                                    ispisiRutu($sql);
                                }   
                            }
                            else//nije postavljen datum polaska
                            {
                                if(!empty($_POST["vrijemePolaska"]))
                                {
                                    $sql = "SELECT * FROM rute WHERE drzava='$drzava' AND nacinPlacanja='$placanje'";

                                    $rez = mysqli_query($conn, $sql);

                                    if(mysqli_num_rows($rez) > 0)
                                    {
                                        $brojac = 0;
                                        while($red = mysqli_fetch_assoc($rez))
                                        {
                                            $razlika = strtotime($_POST["vrijemePolaska"]) - strtotime($red["vrijeme"]);
                                            $razlika = floor($razlika / 3600);

                                            if(abs($razlika) <= 1)
                                            {
                                                $brojac += 1;
                                                ispisi($red);
                                            }
                                        }
                                        if($brojac == 0) echo "Nema traženih ruta";
                                    }
                                }
                                else
                                {
                                    $drzava = $_POST["drzava"];
                                    $sql = "SELECT * FROM rute WHERE drzava='$drzava' AND nacinPlacanja='$placanje'";
                                    ispisiRutu($sql);
                                }  
                            }
                        }
                    }
                }                     
            ?>
            </div>
        <a href="https://sarajevogroundlines.neocities.org/"><div id="reklama2"><img src="https://media.giphy.com/media/l49JVVqMc1PwGSXbW/giphy.gif" /></div></a>
    </div>

<?php
    include("footer.php");
?>