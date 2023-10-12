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

        $sql = $conn->prepare("insert into kamerhuren values(:huurID, :aantalNachten, :totaalPrijs, :huurID, :klantID)");

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

    }

    public function updateKamerHuur()
    {

    }

    public function updateKamerHuur2()
    {

    }

    public function deleteKamerHuur()
    {

    }

    public function deleteKamerHuur2()
    {

    }

    public function searchKamerHuur()
    {

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