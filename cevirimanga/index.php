<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Çeviri Manga</title>
  <link rel="stylesheet" href="style1.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
  <!--header section start-->
  <?php include("headerforanasayfa.php"); ?>
  <!--header section end-->

  <!--search section start-->
  <div class="anchor" id="search"></div>
  <section class="search">
    <div class="containersearch">
      <form action="searchbox.php" method="get" name="searchform">
        <input type="text" name="aranan" id="aranan" placeholder="Ara" />
        <button type="submit" name="submit" value="submit" style="background-color: transparent; scale: 1.2; margin-right: 1.2rem; cursor: pointer;">
          <i class="fa-solid fa-magnifying-glass"></i>
        </button>
      </form>
    </div>
  </section>
  <!--search section end-->

  <!--populer section start-->
  <div class="anchor" id="populerseriler"></div>
  <section class="populer">
    <div class="baslik">
      <h2>Popüler Seriler</h2>
    </div>
    <div class="containermangalar">

      <?php
        include("baglanti.php");

        $sqlkomut = "SELECT DISTINCT adi FROM manga ORDER BY eklenmeTarihi DESC LIMIT 20";
        $islem = $baglanti->query($sqlkomut);

        if($islem->num_rows > 0){
          while($manga = $islem->fetch_assoc()){
            $mangaAdi = $manga["adi"];
            $mangaAdiREPLACE = strtolower($mangaAdi);
            $mangaAdiREPLACE = str_replace(" ", "-", $mangaAdiREPLACE);

            echo "
<div class='manga'>
  <div class='mangaresim'>
    <a href='mangalar/$mangaAdiREPLACE/$mangaAdiREPLACE.php'>
      <img src='mangalar/$mangaAdiREPLACE/kapak-resmi/$mangaAdiREPLACE.jpg' alt='$mangaAdi' />
    </a>
  </div>
  <div class='mangatext'>
    <a href='mangalar/$mangaAdiREPLACE/$mangaAdiREPLACE.php'>
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
  <!--populer section end-->

  <!--yenibolum section start-->
  <div class="anchor" id="yenibolumler"></div>
  <section class="yenibolum">
    <div class="baslik">
      <h2>Son Yükelenen Bölümler</h2>
    </div>
    <div class="containermangalar">

      <?php
        $sqlkomut2 = "SELECT DISTINCT adi FROM bolum ORDER BY eklenmeTarihi DESC LIMIT 20";
        $islem2 = $baglanti->query($sqlkomut2);

        if($islem2->num_rows > 0){
          while($bolum = $islem2->fetch_assoc()){
            $bolumAdi = $bolum["adi"];
            $bolumAdiREPLACE = strtolower($bolumAdi);
            $bolumAdiREPLACE = str_replace(" ", "-", $bolumAdiREPLACE);

            echo "
<div class='manga'>
  <div class='mangaresim'>
    <a href='mangalar/$bolumAdiREPLACE/$bolumAdiREPLACE.php'>
      <img src='mangalar/$bolumAdiREPLACE/kapak-resmi/$bolumAdiREPLACE.jpg' alt='$bolumAdi' />
    </a>
  </div>
  <div class='mangatext'>
    <a href='mangalar/$bolumAdiREPLACE/$bolumAdiREPLACE.php'>
      <h3>$bolumAdi</h3>
    </a>
  </div>
</div>
";
          }
        }
      ?>

    </div>
  </section>
  <!--yenibolum section end-->

  <!--kategoriler section start-->
  <div class="anchor" id="kategoriler"></div>
  <div class="baslik" id="kategorilersection">
    <h2>Kategoriler</h2>
  </div>
  <br />
  <section class="kategoriler">
    <div class="containerkategoriler">
      <a href="kategoriler/aksiyon.php">Aksiyon</a>
      <a href="kategoriler/avangart.php">Avangart</a>
      <a href="kategoriler/bilim-kurgu.php">Bilim Kurgu</a>
      <a href="kategoriler/dogaustu.php">Doğaüstü</a>
      <a href="kategoriler/drama.php">Drama</a>
      <a href="kategoriler/erkeklerin-aski.php">Erkeklerin Aşkı</a>
      <a href="kategoriler/fantezi.php">Fantezi</a>
      <a href="kategoriler/gerilim.php">Gerilim</a>
      <a href="kategoriler/gizem.php">Gizem</a>
      <a href="kategoriler/gurme.php">Gurme</a>
      <a href="kategoriler/hayattan-kesitler.php">Hayattan Kesitler</a>
      <a href="kategoriler/kizlarin-aski.php">Kızların Aşkı</a>
      <a href="kategoriler/komedi.php">Komedi</a>
      <a href="kategoriler/korku.php">Korku</a>
      <a href="kategoriler/macera.php">Macera</a>
      <a href="kategoriler/odullu.php">Ödüllü</a>
      <a href="kategoriler/romantik.php">Romantik</a>
      <a href="kategoriler/spor.php">Spor</a>
    </div>
  </section>
  <!--kategoriler section end-->

  <!--footer section start-->
  <?php include("footer.php"); ?>
  <!--footer section end-->

  <!--theme section start-->
  <?php include("scriptfortheme.php"); ?>
  <!--theme section end-->

  <!--cookies section start-->
  <!--cookies section end-->

</body>

</html>