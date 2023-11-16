<?php
    include('../../baglanti.php');

    include('../../mangasorgu.php');
?>

<!DOCTYPE html>
<html lang='en'>
                
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title><?php include('../../mangabasligi.php') ?></title>
    <link rel='stylesheet' href='../../style1.css'>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css' integrity='sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==' crossorigin='anonymous' referrerpolicy='no-referrer' />
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
                    <img src='kapak-resmi/<?php echo $adiREPLACE; ?>.jpg' alt='<?php echo $adiREPLACE; ?>'>
                </div>
                <div class='bilgi'>
                    <div class='puan'>
                        <h3>Puanı:</h3>
                        <h3><?php echo $puani; ?></h3>
                    </div>
                    <div class='bolumsayisi'>
                        <h3>Bölüm Sayısı:</h3>
                        <h3><?php echo $maxBolumSayisi; ?></h3>
                    </div>
                    <div class='durum'>
                        <h3>Durumu:</h3>
                        <h3><?php echo $durumu; ?></h3>
                    </div>
                    <div class='kategori'>
                        Kategori:
                        <?php echo $kategori; ?>
                    </div>
                </div>
            </div>
            <div class='containermangaadkonu'>
                <div class='mangaadi'>
                    <h1><?php echo $adi; ?></h1>
                </div>
                <div class='mangakonu'>
                    <p><?php echo $konusu; ?></p>
                </div>
            </div>
        </div>
        <div class='buttons' style='justify-content: space-between;'>
            <a href='bolumler/<?php echo $minBolumSayisi; ?>/<?php echo $adiREPLACE; ?>-bolum-<?php echo $minBolumSayisi; ?>.php' class='btn' style='color: var(--second-color);'>İlk Bölüm</a> 
            <a href='bolumler/<?php echo $maxBolumSayisi; ?>/<?php echo $adiREPLACE; ?>-bolum-<?php echo $maxBolumSayisi; ?>.php' class='btn' style='color: var(--second-color);'>Son Bölüm</a> 
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

    <?php $baglanti->close(); ?>
                
</body>

</html>