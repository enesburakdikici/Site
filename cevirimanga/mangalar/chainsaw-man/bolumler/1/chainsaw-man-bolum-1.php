<?php
    include("../../../../baglanti.php");

    $arananManganinAdi = "Chainsaw Man";
    $arananBolumSayisi = 1;

    $sqlkomut = "select * from bolum where (adi = '".$arananManganinAdi."' or ikinciAdi = '".$arananManganinAdi."') and bolumSayisi = '".$arananBolumSayisi."'";

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
    $sqlkomut2 = "select * from bolum where (adi = '".$arananManganinAdi."' or ikinciAdi = '".$arananManganinAdi."') and bolumSayisi = '".($arananBolumSayisi-1)."'";

    $islem2 = $baglanti->query($sqlkomut2);

    if($islem2->num_rows > 0){
        $oncekiBolumBilgisi = true;
    }
    else{
        $oncekiBolumBilgisi = false;
    }
    //Sonraki bölüm bilgisi sorgulama
    $sqlkomut3 = "select * from bolum where (adi = '".$arananManganinAdi."' or ikinciAdi = '".$arananManganinAdi."') and bolumSayisi = '".($arananBolumSayisi+1)."'";

    $islem3 = $baglanti->query($sqlkomut3);

    if($islem3->num_rows > 0){
        $sonrakiBolumBilgisi = true;
    }
    else{
        $sonrakiBolumBilgisi = false;
    }
?>

<!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title><?php echo $adi." ".$bolumSayisi.". "; ?>Bölüm</title>
    <link rel='stylesheet' href='../../../../style1.css'>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css' integrity='sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==' crossorigin='anonymous' referrerpolicy='no-referrer' />
</head>

<body>
    <!--header section start-->
    <?php include('../../../../headerformangabolum.php'); ?>
    <!--header section end-->

    <!--bolumler section start-->
    <?php include("../../../../bolumlerformangalar.php"); ?>
    <!--bolumler section end-->

    <!--bolum adi section start-->
    <div class="bolumadi">
        <h1><?php echo $bolumAdi; ?></h1>
    </div>
    <!--bolum adi section end-->

    <!--okuma section start-->
    <div class='okuma'>
        <?php
            $resimler = scandir("../$bolumSayisi");
            sort($resimler);

            foreach($resimler as $resim){
            
                if($resim != "." && $resim != ".." && $resim != "$adiREPLACE-bolum-$bolumSayisi.php"){
                    echo "
                    <img src='$resimLinki$resim' alt='Resim $resim'>
                    ";
                }
            }
        ?>
    </div>
    <!--okuma section end-->

    <!--bolumler section start-->
    <?php include("../../../../bolumlerformangalar.php"); ?>
    <!--bolumler section end-->

    <!--disqus section start-->
    <div style='margin: 0 7%;'>
        <?php include('../../../../disqusyorum.php'); ?>
    </div>
    <!--disqus section end-->

    <!--footer section start-->
    <?php include('../../../../footer.php'); ?>
    <!--footer section end-->

    <!--theme section start-->
    <?php include('../../../../scriptfortheme.php'); ?>
    <!--theme section end-->
</body>

</html>