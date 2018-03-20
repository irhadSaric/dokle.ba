<?php
    include("conn.php");
    if(isset($_POST["dodajRutu"]))
    {
        $trenutniDatum = $_POST["datumPolaska"];
        $konvertovani = date("Y-m-d", strtotime($trenutniDatum));

        header("location:dodajRutu2.php?drzava=".$_POST["drzava"]."&datumPolaska=".$konvertovani."&vrijemePolaska=".$_POST["vrijemePolaska"]."&placanje=".$_POST["placanje"]);
    }
    include("header.php");
?>
    <div id="sadrzaj">
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
            <hr class="podaci" />

            <!--<h3 class="podaci">Polazište</h3>
                <input type="text" name="polaziste"></input>
            <h3 class="podaci">Odredište</h3>
                <input type="text" name="odrediste"></input>
            <br />-->
            <input type="submit" name="dodajRutu" value="Dodaj rutu" id="dodavanjeRute"></a>
        </form>
    </div>

    <?php
        if(isset($_POST["dodajRutu"])){
            echo $_POST["datumPolaska"]."<br>";
            echo $_POST["vrijemePolaska"];
            echo $_POST["placanje"];
        }
    ?>

<?php
    include("footer.php");
?>