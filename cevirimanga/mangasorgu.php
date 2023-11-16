<?php
    include('../../baglanti.php');
                    
    $sqlkomut = "SELECT * FROM manga WHERE adi = '$arananManganinAdi'";
                    
    $islem = $baglanti->query($sqlkomut);
                    
    if($islem->num_rows > 0){
        $degerler = $islem->fetch_object();

        $adi = $degerler->adi;
        $ikinciAdi = $degerler->ikinciAdi;
        $konusu = $degerler->konusu;
        $puani = $degerler->puani;
        $durumu = $degerler->durumu;
        $kategori = $degerler->kategori;
        $eklenmeTarihi = $degerler->eklenmeTarihi;

        $adiREPLACE = trim($adi);
        $adiREPLACE = strtolower($adiREPLACE);
        $adiREPLACE = str_replace(' ', '-', $adiREPLACE);
    }
    //İlk bölüm bilgisi
    $sqlkomut2 = "SELECT MIN(bolumSayisi) AS minBolumSayisi FROM bolum WHERE adi = '$adi'";

    $islem2 = $baglanti->query($sqlkomut2);

    if($islem2->num_rows > 0){
        $degerler2 = $islem2->fetch_assoc();

        $minBolumSayisi = $degerler2["minBolumSayisi"];
    }
    //Son bölüm bilgisi
    $sqlkomut3 = "SELECT MAX(bolumSayisi) AS maxBolumSayisi FROM bolum WHERE adi = '$adi'";

    $islem3 = $baglanti->query($sqlkomut3);

    if($islem3->num_rows > 0){
        $degerler3 = $islem3->fetch_assoc();

        $maxBolumSayisi = $degerler3["maxBolumSayisi"];
    }
?>