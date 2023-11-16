<?php
    include("../../baglanti.php");

    $arananManganinAdi = "Chainsaw Man";

    $sqlkomut = "select * from manga where adi = '".$arananManganinAdi."' or ikinciAdi = '".$arananManganinAdi."'";

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
        $adiREPLACE = str_replace(" ", "-", $adiREPLACE);
    }
    //Son bölüm sayısı bilgisi
    $sqlkomut2 = "SELECT MAX(bolumSayisi) AS maxBolumSayisi FROM bolum WHERE adi = '$adi'";

    $islem2 = $baglanti->query($sqlkomut2);

    if($islem2->num_rows > 0){
        $degerler2 = $islem2->fetch_assoc();

        $maxBolumSayisi = $degerler2["maxBolumSayisi"];
    }
    $baglanti->close();
?>

<!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>

    <!--title kısmını manga adı yap.-->
    <title><?php echo $adi; ?></title>
    <!-------------------------------->

    <link rel='stylesheet' href='../../style1.css'>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css'
        integrity='sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=='
        crossorigin='anonymous' referrerpolicy='no-referrer' />
</head>

<body>
    <!--header section start-->
    <?php include('../../headerformanga.php'); ?>
    <!--header section end-->

    <!--info section start-->
    <section class='info'>
        <div class='containermanga'>
            <div class='containermangaresimbilgi'>
                <div class='resim'>

                    <!--src ve alt kısmını değiştir-->
                    <img src='kapak-resmi/<?php echo $adiREPLACE; ?>.jpg' alt='<?php echo $adiREPLACE; ?>'>
                    <!------------------------------->

                </div>
                <div class='bilgi'>
                    <div class='puan'>
                        <h3>Puanı:</h3>

                        <!--puanı değiştir-->
                        <h3><?php echo $puani; ?></h3>
                        <!------------------>

                    </div>
                    <div class='bolumsayisi'>
                        <h3>Bölüm Sayısı:</h3>

                        <!--bölüm sayısını değiştir-->
                        <h3><?php echo $maxBolumSayisi; ?></h3>
                        <!--------------------------->

                    </div>
                    <div class='durum'>
                        <h3>Durumu:</h3>

                        <!--'Devam ediyor' ya da 'Bitti' bilgisini değiştir-->
                        <h3><?php echo $durumu; ?></h3>
                        <!--------------------------------------------------->

                    </div>
                    <div class='kategori'>
                        Kategori:

                        <!--Kategorileri değiştir-->
                        <?php echo $kategori; ?>
                        <!------------------------->

                    </div>
                </div>
            </div>
            <div class='containermangaadkonu'>
                <div class='mangaadi'>

                    <!--manga adını değiştir-->
                    <h1><?php echo $adi; ?></h1>
                    <!------------------------>

                </div>
                <div class='mangakonu'>

                    <!--manga konusunu değiştir-->
                    <p><?php echo $konusu; ?></p>
                    <!--------------------------->
                </div>
            </div>
        </div>
        <div class='buttons'>

            <!--href değerinin içine ilk bölümün dosya uzantısını gir.-->
            <a href='bolumler/1/<?php echo $adiREPLACE; ?>-bolum-1.php' class='btn' style='color: var(--second-color); padding-right: 1.5rem;'><i class='fa-solid fa-book' style='margin: 0 1rem 0 0.5rem;'></i>Oku</a>
            <!---------------------------------------------------------->

        </div>
    </section>
    <!--info section end-->

    <!--disqus section start-->
    <div style='margin: 0 7%; margin-top: 2rem;'>
        <?php include('../../disqusyorum.php'); ?>
    </div>
    <!--disqus section end-->

    <!--footer section start-->
    <?php include('../../footer.php'); ?>
    <!--footer section end-->

    <!--theme section start-->
    <?php include('../../scriptfortheme.php'); ?>
    <!--theme section end-->

</body>

</html>