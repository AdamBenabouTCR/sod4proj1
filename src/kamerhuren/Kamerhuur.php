<?php

class kamerHuur
{
    protected $aantalnachten;

    public function __construct($huurId = NULL, $aantalnachten = NULL, $totaalprijs = NULL, $kamerId = NULL, $klantId = NULL)
    {
        $this->huurId = $huurId;
        $this->aantalnachten = $aantalnachten;
        $this->totaalprijs = $totaalprijs;
        $this->kamerId = $kamerId;
        $this->klantId = $klantId;
    }

    public function set_huurId($huurId)
    {
        $this->huurId = $huurId;
    }

    public function set_aantalnachten($aantalnachten)
    {
        $this->aantalnachten = $aantalnachten;
    }

    public function set_totaalprijs($totaalprijs)
    {
        $this->totaalprijs = $totaalprijs;
    }

    public function set_kamerId($kamerId)
    {
        $this->kamerId = $kamerId;
    }

    public function set_klantId($klantId)
    {
        $this->klantId = $klantId;
    }

    public function afdrukken()
    {
        echo $this->get_aantalnachten();
        echo "<br/>";
        echo $this->get_totaalprijs();
        echo "<br/>";
        echo "<br/>";
    }

    public function createKamerHuur()
    {
        require "../src/klant/oopconnect.php";

        $huurID = NULL;
        $aantalNachten = $this->get_aantalnachten();
        $totaalPrijs = $this->get_totaalprijs();
        $kamerID = $this->get_kamerId();
        $klantID = $this->get_klantId();

        $sql = $conn->prepare("insert into kamerhuren values(:huurID, :aantalNachten, :totaalPrijs, :kamerID, :klantID)");

        $sql->bindParam(":huurID", $huurID);
        $sql->bindParam(":aantalNachten", $aantalNachten);
        $sql->bindParam(":totaalPrijs", $totaalPrijs);
        $sql->bindParam(":kamerID", $kamerID);
        $sql->bindParam(":klantID", $klantID);

        $sql->execute([
            "huurID"=>$huurID,
            "aantalNachten"=>$aantalNachten,
            "totaalPrijs"=>$totaalPrijs,
            "kamerID"=>$kamerID,
            "klantID"=>$klantID
        ]);

        echo "Huur toegevoegd";
        echo "<a href='../kamerhuren/kamerHuurmenu.php'>Terug naar het menu. <a/>";
    }

    public function readKamerHuur()
    {
        require "../src/klant/oopconnect.php";

        $kamerhuren = $conn->prepare("select        huurID,
                                                    aantalNachten,
                                                    totaalPrijs,
                                                    kamerID,
                                                    klantID
                                         from   kamerhuren");

        $kamerhuren->execute();
        echo"<table>";
        foreach($kamerhuren as $kamerhuur)
        {
            echo "<tr>";
            echo "<td>" . $kamerhuur["huurID"] . "</td>";
            echo "<td>" . $kamerhuur["aantalNachten"] . "</td>";
            echo "<td>" . $kamerhuur["totaalPrijs"] . "</td>";
            echo "<td>" . $kamerhuur["kamerID"] . "</td>";
            echo "<td>" . $kamerhuur["klantID"] . "</td>";
        }
        echo"</table>";
        echo "<a href='../kamerhuren/kamerHuurmenu.php'>Terug naar het menu. <a/>";
    }

    public function updateKamerHuur()
    {
        require "../src/klant/oopconnect.php";

        $kamerhuren= $conn->prepare("
    select huurID,
       aantalNachten,
       totaalPrijs,
       kamerID,
       klantID
    from   kamerhuren
    where huurID = :huurID
    ");
        $huurID = $this->get_HuurId();
        $kamerhuren->execute(["huurID"=>$huurID]);
//nieuw formulier
        echo "<form action='../kamerhuren/updateKamerHuur3.php' method='post'>";
        foreach ($kamerhuren as $kamerhuur)
        {
//huurid mag niet gewijzigd worden
            echo "huurID:" . $kamerhuur ["huurID"];
            echo " <input type='hidden' name ='huuridvak' ";
            echo " value=' ". $kamerhuur ["huurID"]. "'> <br/>";

            echo "aantalNachten: <input type='text' ";
            echo "name ='aantalnachtenvak'";
            echo " value=' ". $kamerhuur ["aantalNachten"]. "' ";
            echo "'> <br/>";

            echo "totaalPrijs: <input type='text' ";
            echo "name ='totaalprijsvak'";
            echo " value=' ". $kamerhuur ["totaalPrijs"]. "' ";
            echo "'> <br/>";

            echo "kamerID: <input type='text' ";
            echo "name ='kameridvak'";
            echo " value=' ". $kamerhuur ["kamerID"]. "' ";
            echo "'> <br/>";

            echo "klantID: <input type='text' ";
            echo "name ='klantidvak'";
            echo " value=' ". $kamerhuur ["klantID"]. "' ";
            echo "'> <br/>";


        }
        echo "<input type='submit' name='submit' value='Submit'>";
        echo "</form>";
    }

    public function updateKamerHuur2()
    {
        require "../src/klant/oopconnect.php";

        $huurID = $this->get_huurId();
        $aantalNachten = $this->get_aantalnachten();
        $totaalPrijs = $this->get_totaalprijs();
        $kamerID = $this->get_kamerId();
        $klantID = $this->get_klantId();

        $sql = $conn->prepare("
                               update kamerhuren set huurID = :huurID,
                                                  aantalNachten = :aantalNachten,
                                                  totaalPrijs = :totaalPrijs,
                                                  kamerID = :kamerID,
                                                  klantID = :klantID
                                                  where   kamerID = :kamerID 
                               ");
        $sql->execute([
            "huurID" => $huurID,
            "aantalNachten" => $aantalNachten,
            "totaalPrijs" => $totaalPrijs,
            "kamerID" => $kamerID,
            "klantID" => $klantID

        ]);
        echo "Huur Gewijzigd . <br/>";
        echo "<a href='../kamerhuren/kamerHuurmenu.php'>Terug naar het menu. <a/>";
    }

    public function deleteKamerHuur()
    {
        require "../src/klant/oopconnect.php";

        $kamerhuren= $conn->prepare("
    select huurID,
       aantalNachten,
       totaalPrijs,
       kamerID,
       klantID
    from   kamerhuren
    where huurID = :huurID
    ");
        $huurID = $this->get_huurId();
        $aantalNachten = $this->get_aantalnachten();
        $totaalPrijs = $this->get_totaalprijs();
        $kamerID = $this->get_kamerId();
        $klantID = $this->get_klantId();

        $kamerhuren->execute(["huurID"=>$huurID]);

        echo "<table>";
        while ($row = $kamerhuren->fetch(PDO::FETCH_ASSOC))
        {
            extract($row);

            echo "<tr>";
            echo  "<td>".$huurID . "</td>";
            echo  "<td>".$aantalNachten . "</td>";
            echo  "<td>".$totaalPrijs. "</td>";
            echo  "<td>".$kamerID . "</td>";
            echo  "<td>".$klantID . "</td>";
            echo "</tr>";
        }
        echo "</table><br/>";

        echo "<form action='../kamerhuren/deleteKamerHuur3.php' method ='post'>";
//waarde null als dit niet gecheckt word
        echo "<input type='hidden' name='huuridvak' value='".$huurID."'>";
        echo "Kamer verwijderen. <br/>";
        echo "<input type='checkbox' name='verwijdervak' value='1'>";
        echo "<input div class = submit type='submit'>";
        echo "</form>";
    }

    public function deleteKamerHuur2()
    {
        $huurID = $this->get_huurId();
        $verwijder = $_POST ["verwijdervak"];

        if ($verwijder)
        {
            require "../src/klant/oopconnect.php";
            $sql = $conn->prepare("delete from kamerhuren 
        where huurID = :huurID");

            $sql->execute(["huurID" =>$huurID]);
            echo "De gegevens zijn verwijderd. <br/>";
            echo "<a href='../kamerhuren/kamerHuurmenu.php'>Terug naar het menu. <a/>";

        }
        else
        {
            echo "De gegevens zijn niet verwijderd. <br/>";
            echo "<a href='../kamerhuren/kamerHuurmenu.php'>Terug naar het menu. <a/>";
        }
    }

    public function searchKamerHuur()
    {
        $huurID = $this->get_huurId();
        require "../src/klant/oopconnect.php";

        $sql = $conn->prepare("
                                     select * from  kamerhuren
                                     where      huurID = :huurID
                                   ");
        $sql->bindParam("huurID", $huurID);
        $sql->execute();

        foreach($sql as $kamerhuur)
        {
            echo $kamerhuur["huurID"] . "<br/>";
            $this->aantalNachten=$kamerhuur["aantalNachten"];
            $this->totaalPrijs=$kamerhuur["totaalPrijs"];
            $this->kamerID=$kamerhuur["kamerID"];
            $this->klantID=$kamerhuur["klantID"];
        }
        echo "<a href='../kamerhuren/kamerHuurmenu.php'> terug naar het menu </a>";
    }

    public function get_huurId()
    {
        return $this->huurId;
    }

    public function get_aantalnachten()
    {
        return $this->aantalnachten;
    }

    public function get_totaalprijs()
    {
        return $this->totaalprijs;
    }

    public function get_kamerId()
    {
        return $this->kamerId;
    }

    public function get_klantId()
    {
        return $this->klantId;
    }
}
?>