<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title><?php echo $arananKategori; ?> Mangalar</title>
  <link rel="stylesheet" href="../style1.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
  <!--header section start-->
  <?php include("../headerforkategori.php"); ?>
  <!--header section end-->

  <!--kategori section start-->
  <section class="kategori">
    <div class="baslik">
      <h2><?php echo $arananKategori; ?></h2>
    </div>
    <div class="containerkategori">
    
    <?php
        include("../baglanti.php");

        $sqlkomut = "SELECT adi FROM manga WHERE kategori LIKE '%".$arananKategori."%'";
        $islem = $baglanti->query($sqlkomut);

        if($islem->num_rows > 0){
          while($manga = $islem->fetch_assoc()){
            $mangaAdi = $manga["adi"];
            $mangaAdiREPLACE = strtolower($mangaAdi);
            $mangaAdiREPLACE = str_replace(" ", "-", $mangaAdiREPLACE);

            echo "
<div class='manga'>
  <div class='mangaresim'>
    <a href='../mangalar/$mangaAdiREPLACE/$mangaAdiREPLACE.php'>
      <img src='../mangalar/$mangaAdiREPLACE/kapak-resmi/$mangaAdiREPLACE.jpg' alt='$mangaAdi' />
    </a>
  </div>
  <div class='mangatext'>
    <a href='../mangalar/$mangaAdiREPLACE/$mangaAdiREPLACE.php'>
      <h3>$mangaAdi</h3>
    </a>
  </div>
</div>
";
          }
        }
    ?>

    </div>
  </section>
  <!--kategori section end-->

  <!--footer section start-->
  <?php include("../footer.php"); ?>
  <!--footer section end-->

  <!--theme section start-->
  <?php include("../scriptfortheme.php"); ?>
  <!--theme section end-->

</body>

</html>