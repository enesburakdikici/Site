<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href='index.php'>Ana Sayfa'ya Git</a>
    <form action='<?php echo $_SERVER['PHP_SELF']; ?>' method='post' enctype='multipart/form-data'>
        <label for='mangaadi'>Manganın Popüler Adını Giriniz: </label>
        <input type='text' name='mangaadi' id='mangaadi'>
        <br>
        <label for='mangaikinciadi'>Manganın 2.Adını Giriniz: </label>
        <input type='text' name='mangaikinciadi' id='mangaikinciadi'>
        <label for='mangaikinciadi'>(Yok ise boş bırakın.)</label>
        <br>
        <label for='konu'>Konusu:</label>
        <textarea name='konu' id='konu'rows="10" cols="40"></textarea>
        <label for='konu'>Konuyu uzunca bir text olarak kopyala yapıştır yapabilirsiniz. Yazım kurallarına dikkat ederek metin girin!</label>
        <br>
        <label for='puan'>Manganın MyAnimeList Puanı: </label>
        <input type='text' name='puan' id='puan'>
        <br>
        <label for='durumu'>Devam etme durumu: </label>
        <select name='durumu' id='durumu'>
            <option value='Devam ediyor'>Devam ediyor</option>
            <option value='Bitti'>Bitti</option>
        </select>
        <br>
        <label for='kategoriler'>Kategorileri: </label>
        <input type='text' name='kategoriler' id='kategoriler'>
        <label for='kategoriler'>Örnek yazım şekli:Aksiyon, Macera, Ödüllü (Bölümlerin eksiksiz adını Ana Sayfadaki Kategoriler kısmından bakarak yazın.)</label>
        <br>
        <label for='kapakresmi'>Kapak Fotoğrafını Giriniz:</label>
        <input type='file' name='kapakresmi' id='kapakresmi'>
        <br>
        <input type='submit' name='onayla' id='onayla' value='Onayla'>
    </form>
            
    <?php
        if(isset($_POST['onayla'])){
            //Manga adı tanımlama
            $mangaadi = null;
            $mangaadi = $_POST['mangaadi'];
            $mangaadi = trim($mangaadi);
            $mangaadi = strtolower($mangaadi);
            $mangaadiREPLACE = str_replace(' ', '-', $mangaadi);
            $mangaadiUC = ucwords($mangaadi);
            
            //Manga 2. adı tanımlama
            $mangaikinciadi = null;
            $mangaikinciadi = $_POST['mangaikinciadi'];
            $mangaikinciadi = trim($mangaikinciadi);
            $mangaikinciadi = strtolower($mangaikinciadi);
            $mangaikinciadiREPLACE = str_replace(' ', '-', $mangaikinciadi);
            $mangaikinciadiUC = ucwords($mangaikinciadi);

            //Manga konu
            $konu = null;
            $konu = $_POST['konu'];
            $konu = str_replace('"','\"', $konu);

            //Manga puan tanımlama
            $puan = null;
            $puan = $_POST['puan'];
            $puan = trim($puan);

            //Manga durumu
            $durumu = null;
            $durumu = $_POST['durumu'];

            //Manga kategoriler
            $kategoriler = null;
            $kategoriler = $_POST['kategoriler'];
            $kategoriler = trim($kategoriler);
            $kategoriler = strtolower($kategoriler);
            $kategoriler = ucwords($kategoriler);

            //Manga kapak fotoğrafı tanımlama
            $kapakresmi = null;
            $kapakresmi = $_FILES['kapakresmi']['name'];
            $kapakresmi = basename($kapakresmi);
            $kapakresmiuzantisi = pathinfo($kapakresmi, PATHINFO_EXTENSION);

    
    
            if($mangaadi != '' && $_FILES['kapakresmi'] && $puan != '' && $durumu != '' && $kategoriler != ''){
                if(!file_exists("mangalar/$mangaadiREPLACE")){
                    //Dosyaları oluşturma
                    mkdir("mangalar/$mangaadiREPLACE", 0755);
                    mkdir("mangalar/$mangaadiREPLACE/bolumler", 0755);
                    mkdir("mangalar/$mangaadiREPLACE/kapak-resmi", 0755);
                    move_uploaded_file($_FILES['kapakresmi']['tmp_name'], "mangalar/$mangaadiREPLACE/kapak-resmi/$mangaadiREPLACE.$kapakresmiuzantisi");
                    fopen("mangalar/$mangaadiREPLACE/$mangaadiREPLACE.php", 'w');
    
                    //Mangayı database'ye kaydetme
                    include('baglanti.php');
                    $sqlkomut2 = "INSERT INTO manga (adi, ikinciAdi, konusu, puani, durumu, kategori, eklenmeTarihi) VALUES (\"$mangaadiUC\", \"$mangaikinciadiUC\", \"$konu\", \"$puan\", \"$durumu\", \"$kategoriler\", NOW())";
                    if($baglanti->query($sqlkomut2) === true){
                        echo "Manga database'ye eklendi.";
                    }
                    else{
                        echo "Manga database'ye eklenemedi!";
                    }
    
                    //Manga.php sitesinin içeriğini oluşturma
                    $mangaphp = "
<?php
    include('../../baglanti.php');
                    
    \$arananManganinAdi = '$mangaadiUC';
                    
    \$sqlkomut = \"SELECT * FROM manga WHERE adi = '\$arananManganinAdi'\";
                    
    \$islem = \$baglanti->query(\$sqlkomut);
                    
    if(\$islem->num_rows > 0){
        \$degerler = \$islem->fetch_object();

        \$adi = \$degerler->adi;
        \$ikinciAdi = \$degerler->ikinciAdi;
        \$konusu = \$degerler->konusu;
        \$puani = \$degerler->puani;
        \$durumu = \$degerler->durumu;
        \$kategori = \$degerler->kategori;
        \$eklenmeTarihi = \$degerler->eklenmeTarihi;

        \$adiREPLACE = trim(\$adi);
        \$adiREPLACE = strtolower(\$adiREPLACE);
        \$adiREPLACE = str_replace(' ', '-', \$adiREPLACE);
    }
    //Son bölüm sayısı bilgisi
    \$sqlkomut2 = \"SELECT MAX(bolumSayisi) AS maxBolumSayisi FROM bolum WHERE adi = '\$adi'\";

    \$islem2 = \$baglanti->query(\$sqlkomut2);

    if(\$islem2->num_rows > 0){
        \$degerler2 = \$islem2->fetch_assoc();

        \$maxBolumSayisi = \$degerler2[\"maxBolumSayisi\"];
    }
    \$baglanti->close();
?>
                
<!DOCTYPE html>
<html lang='en'>
                
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title><?php echo \$adi; ?></title>
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
                    <img src='kapak-resmi/<?php echo \$adiREPLACE; ?>.jpg' alt='<?php echo \$adiREPLACE; ?>'>
                </div>
                <div class='bilgi'>
                    <div class='puan'>
                        <h3>Puanı:</h3>
                        <h3><?php echo \$puani; ?></h3>
                    </div>
                    <div class='bolumsayisi'>
                        <h3>Bölüm Sayısı:</h3>
                        <h3><?php echo \$maxBolumSayisi; ?></h3>
                    </div>
                    <div class='durum'>
                        <h3>Durumu:</h3>
                        <h3><?php echo \$durumu; ?></h3>
                    </div>
                    <div class='kategori'>
                        Kategori:
                        <?php echo \$kategori; ?>
                    </div>
                </div>
            </div>
            <div class='containermangaadkonu'>
                <div class='mangaadi'>
                    <h1><?php echo \$adi; ?></h1>
                </div>
                <div class='mangakonu'>
                    <p><?php echo \$konusu; ?></p>
                </div>
            </div>
        </div>
        <div class='buttons'>
            <a href='bolumler/1/<?php echo \$adiREPLACE; ?>-bolum-1.php' class='btn' style='color: var(--second-color); padding-right: 1.5rem;'><i class='fa-solid fa-book' style='margin: 0 1rem 0 0.5rem;'></i>Oku</a> 
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

</html>";
    
                    //Düzenlenen manga dosyasını yerine geri yerleştirme
                    file_put_contents("mangalar/$mangaadiREPLACE/$mangaadiREPLACE.php", $mangaphp);
                }
                else{
                    echo 'Bu manga zaten kayıtlı!';
                }
                
            }
           else{
            echo 'Eksik değer!';
           }
        }
    ?>
             
</body>
</html>