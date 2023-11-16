<?php
    include('../../../../baglanti.php');

    include('../../../../bolumsorgu.php');
?>

<!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title><?php include('../../../../bolumbasligi.php') ?></title>
    <link rel='stylesheet' href='../../../../style1.css'>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css' integrity='sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==' crossorigin='anonymous' referrerpolicy='no-referrer' />
</head>

<body>
    <!--header section start-->
    <?php include('../../../../headerformangabolum.php'); ?>
    <!--header section end-->

    <!--bolumler section start-->
    <?php include('../../../../bolumlerformangalar.php'); ?>
    <!--bolumler section end-->

    <!--bolum adi section start-->
    <div class='bolumadi'>
        <h1><?php echo $bolumAdi; ?></h1>
    </div>
    <!--bolum adi section end-->

    <!--okuma section start-->
    <div class='okuma'>
        <?php include('../../../../okuma.php') ?>
    </div>
    <!--okuma section end-->

    <!--bolumler section start-->
    <?php include('../../../../bolumlerformangalar.php'); ?>
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

    <?php $baglanti->close(); ?>
    
</body>

</html>