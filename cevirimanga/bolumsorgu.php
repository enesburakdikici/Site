<?php
    $sqlkomut = "SELECT * FROM bolum WHERE adi = '".$arananManganinAdi."' AND bolumSayisi = '".$arananBolumSayisi."'";

    $islem = $baglanti->query($sqlkomut);

    if($islem->num_rows > 0){
        $degerler = $islem->fetch_object();

        $adi = $degerler->adi;
        $ikinciAdi = $degerler->ikinciAdi;
        $bolumAdi = $degerler->bolumAdi;
        $bolumSayisi = $degerler->bolumSayisi;
        $resimLinki = $degerler->resimLinki;
        $eklenmeTarihi = $degerler->eklenmeTarihi;

        $adiREPLACE = trim($adi);
        $adiREPLACE = strtolower($adiREPLACE);
        $adiREPLACE = str_replace(" ", "-", $adiREPLACE);
    }
    //Önceki bölüm bilgisi sorgulama
    $sqlkomut2 = "select * from bolum where adi = '".$arananManganinAdi."' and bolumSayisi = '".($arananBolumSayisi-1)."'";

    $islem2 = $baglanti->query($sqlkomut2);

    if($islem2->num_rows > 0){
        $oncekiBolumBilgisi = true;
    }
    else{
        $oncekiBolumBilgisi = false;
    }
    //Sonraki bölüm bilgisi sorgulama
    $sqlkomut3 = "select * from bolum where adi = '".$arananManganinAdi."' and bolumSayisi = '".($arananBolumSayisi+1)."'";

    $islem3 = $baglanti->query($sqlkomut3);

    if($islem3->num_rows > 0){
        $sonrakiBolumBilgisi = true;
    }
    else{
        $sonrakiBolumBilgisi = false;
    }
?>