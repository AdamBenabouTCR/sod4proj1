<?php

class Kamer
{
    protected $kamerNummer;

    public function __construct($kamerId = NULL, $kamerNummer = NULL, $kamerAantalBedden = NULL, $kamerPrijs = NULL)
    {
        $this->kamerId = $kamerId;
        $this->kamerNummer = $kamerNummer;
        $this->kamerAantalBedden = $kamerAantalBedden;
        $this->kamerPrijs = $kamerPrijs;
    }


    public function set_kamerNummer($kamerNummer)
    {
        $this->kamerNummer = $kamerNummer;
    }


    public function afdrukken()
    {
        echo $this->get_kamerNummer();
        echo "<br/>";
        echo $this->get_kamerAantalBedden();
        echo "<br/>";
        echo $this->get_kamerPrijs();
        echo "<br/>";
        echo "<br/>";
    }

    public function createKamer()
    {
        require "../src/klant/oopconnect.php";

        $kamerID = NULL;
        $kamerNummer = $this->get_kamerNummer();
        $kamerAantalBedden = $this->get_kamerAantalBedden();
        $kamerPrijs = $this->get_kamerPrijs();

        $sql = $conn->prepare("insert into kamers values(:kamerID, :kamerNummer, :kamerAantalBedden, :kamerPrijs)");

        $sql->bindParam(":kamerID", $kamerID);
        $sql->bindParam(":kamerNummer", $kamerNummer);
        $sql->bindParam(":kamerAantalBedden", $kamerAantalBedden);
        $sql->bindParam(":kamerPrijs", $kamerPrijs);

        $sql->execute([
            "kamerID"=>$kamerID,
            "kamerNummer"=>$kamerNummer,
            "kamerAantalBedden"=>$kamerAantalBedden,
            "kamerPrijs"=>$kamerPrijs
        ]);

        echo "Kamer toegevoegd";
        echo "<a href='../kamer/kamermenu.php'>Terug naar het menu. <a/>";
    }

    public function readKamer()
    {
        require "../src/klant/oopconnect.php";

        $kamers = $conn->prepare("select        kamerID,
                                                kamerNummer,
                                                kamerAantalBedden,
                                                kamerPrijs
                                         from   kamers");

        $kamers->execute();
        echo"<table>";
        foreach($kamers as $kamer)
        {
            echo "<tr>";
            echo "<td>" . $kamer["kamerID"] . "</td>";
            echo "<td>" . $kamer["kamerNummer"] . "</td>";
            echo "<td>" . $kamer["kamerAantalBedden"] . "</td>";
            echo "<td>" . $kamer["kamerPrijs"] . "</td>";
        }
        echo"</table>";
        echo "<a href='../kamer/kamermenu.php'>Terug naar het menu. <a/>";
    }

    public function updateKamer()
    {
        require "../src/klant/oopconnect.php";

        $kamers= $conn->prepare("
    select kamerID,
       kamerNummer,
       kamerAantalBedden,
       kamerPrijs
    from   kamers
    where kamerID = :kamerID
    ");
        $kamerID = $this->get_kamerId();
        $kamers->execute(["kamerID"=>$kamerID]);
//nieuw formulier
        echo "<form action='../kamer/updateKamer3.php' method='post'>";
        foreach ($kamers as $kamer)
        {
//kamerid mag niet gewijzigd worden
            echo "kamerID:" . $kamer ["kamerID"];
            echo " <input type='hidden' name ='kameridvak' ";
            echo " value=' ". $kamer ["kamerID"]. "'> <br/>";

            echo "kamerNummer: <input type='text' ";
            echo "name ='kamernummervak'";
            echo " value=' ". $kamer ["kamerNummer"]. "' ";
            echo "'> <br/>";

            echo "kamerAantalBedden: <input type='text' ";
            echo "name ='kameraantalbeddenvak'";
            echo " value=' ". $kamer ["kamerAantalBedden"]. "' ";
            echo "'> <br/>";

            echo "kamerPrijs: <input type='text' ";
            echo "name ='kamerprijsvak'";
            echo " value=' ". $kamer ["kamerPrijs"]. "' ";
            echo "'> <br/>";


        }
        echo "<input type='submit' name='submit' value='Submit'>";
        echo "</form>";
    }

    public function updateKamer2()
    {
        require "../src/klant/oopconnect.php";

        $kamerID = $this->get_kamerId();
        $kamerNummer = $this->get_kamerNummer();
        $kamerAantalBedden = $this->get_kamerAantalBedden();
        $kamerPrijs= $this->get_kamerPrijs();

        $sql = $conn->prepare("
                               update kamers set kamerID = :kamerID,
                                                  kamerNummer = :kamerNummer,
                                                  kamerAantalBedden = :kamerAantalBedden,
                                                  kamerPrijs = :kamerPrijs,
                                                  where   kamerID = :kamerID 
                               ");
        $sql->execute([
            "kamerID" => $kamerID,
            "kamerNummer" => $kamerNummer,
            "kamerAantalBedden" => $kamerAantalBedden,
            "kamerPrijs" => $kamerPrijs

        ]);
        echo "Kamer Gewijzigd . <br/>";
        echo "<a href='../kamer/kamermenu.php'>Terug naar het menu. <a/>";
    }

    public function deleteKamer()
    {
        require "../src/klant/oopconnect.php";

        $kamers= $conn->prepare("
    select kamerID,
       kamerNummer,
       kamerAantalBedden,
       kamerPrijs
    from   kamers
    where kamerID = :kamerID
    ");
        $kamerID = $this->get_kamerId();
        $kamerNummer = $this->get_kamerNummer();
        $kamerAantalBedden = $this->get_kamerAantalBedden();
        $kamerPrijs = $this->get_kamerPrijs();

        $kamers->execute(["kamerID"=>$kamerID]);

        echo "<table>";
        while ($row = $kamers->fetch(PDO::FETCH_ASSOC))
        {
            extract($row);

            echo "<tr>";
            echo  "<td>".$kamerID . "</td>";
            echo  "<td>".$kamerNummer . "</td>";
            echo  "<td>".$kamerAantalBedden. "</td>";
            echo  "<td>".$kamerPrijs . "</td>";
            echo "</tr>";
        }
        echo "</table><br/>";

        echo "<form action='../kamer/deleteKamer3.php' method ='post'>";
//waarde null als dit niet gecheckt word
        echo "<input type='hidden' name='artidvak' value='".$kamerID."'>";
        echo "Kamer verwijderen. <br/>";
        echo "<input type='checkbox' name='verwijdervak' value='1'>";
        echo "<input div class = submit type='submit'>";
        echo "</form>";
    }

    public function deleteKamer2()
    {
        $kamerID = $this->get_kamerId();
        $verwijder = $_POST ["verwijdervak"];

        if ($verwijder)
        {
            require "../src/klant/oopconnect.php";
            $sql = $conn->prepare("delete from kamers 
        where kamerID = :kamerID");

            $sql->execute(["kamerID" =>$kamerID]);
            echo "De gegevens zijn verwijderd. <br/>";
            echo "<a href='../kamer/kamermenu.php'>Terug naar het menu. <a/>";

        }
        else
        {
            echo "De gegevens zijn niet verwijderd. <br/>";
            echo "<a href='../kamer/kamermenu.php'>Terug naar het menu. <a/>";
        }
    }

    public function searchKamer()
    {
        //haalt gegevens op die ingevoerd waren op searchArtikelFormulier1 en searchKlantFormulier2
        $kamerID = $this->get_kamerId();
        require "../../src/klant/oopconnect.php";

        $sql = $conn->prepare("
                                     select * from  kamers
                                     where      kamerID = :kamerID
                                   ");
        $sql->bindParam("kamerID", $kamerID);
        $sql->execute();

        foreach($sql as $kamer)
        {
            echo $kamer["kamerID"] . "<br/>";
            $this->kamer=$kamer["kamerNummer"];
            $this->kamer=$kamer["kamerAantalBedden"];
            $this->kamer=$kamer["kamerPrijs"];
        }
        echo "<a href='../artikelen/artikelmenu.php'> terug naar het menu </a>";
    }

    public function set_kamerAantalBedden($kamerAantalBedden)
    {
        $this->kamerAantalBedden = $kamerAantalBedden;
    }

    public function set_kamerPrijs($kamerPrijs)
    {
        $this->kamerPrijs = $kamerPrijs;
    }

    public function set_kamerId($kamerId)
    {
        $this->kamerId = $kamerId;
    }


    public function get_kamerNummer()
    {
        return $this->kamerNummer;
    }

    function get_kamerAantalBedden()
    {
        return $this->kamerAantalBedden;
    }

    function get_kamerPrijs()
    {
        return $this->kamerPrijs;
    }


    function get_kamerId()
    {
        return $this->kamerId;
    }
}
?>