<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bölüm Ekle</title>
</head>
<body>
    <a href="index.php">Ana Sayfa'ya Git</a>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
        <label for="mangaadi">Manga Seçiniz: </label>
        <select name="mangaadi" id="mangaadi">
            <?php
                include("baglanti.php");

                $sqlkomut = "SELECT adi FROM manga";
                $islem = $baglanti->query($sqlkomut);
        
                if($islem->num_rows > 0){
                  while($manga = $islem->fetch_assoc()){
                    $mangaAdi = $manga["adi"];
                    $mangaAdiREPLACE = strtolower($mangaAdi);
                    $mangaAdiREPLACE = str_replace(" ", "-", $mangaAdiREPLACE);
                    
                    echo "<option value='$mangaAdiReplace'>$mangaAdi</option>";
                  }
                }  
            ?>
        </select>
        <br>
        <label for="bolumadi">Bölümün Adını Giriniz: </label>
        <input type="text" name="bolumadi" id="bolumadi">
        <label for="bolumadi">Bağlaçlar hariç baş harfleri büyük giriniz. (Yok ise boş bırakın ama var ise mutlaka girin.)</label>
        <br>
        <label for="bolumsayisi">Kaçıncı Bölümü Ekleyeceğinizi Seçin: </label>
        <input type="number" name="bolumsayisi" id="bolumsayisi">
        <br>
        <label for="resimlinki">Resimler Hangi Linkte: </label>
        <input type="text" name="resimlinki" id="resimlinki">
        <label for="resimlinki">Site yayımlanana kadar boş bırakın.</label>
        <br>
        <label for="resimler">Resim Dosyalarını Seçiniz: </label>
        <input type="file" name="resimler[]" id="resimler" multiple accept="image/*">
        <label for="resimler">Dosyalar resim formatında olmalı.</label>
        <br>
        <input type="submit" name="onayla" id="onayla" value="Onayla">
    </form>
</body>
</html>

<?php
    if(isset($_POST["onayla"])){
        
        //Manga adı tanımlama
        $mangaadiREPLACE = null;
        $mangaadiREPLACE = $_POST["mangaadi"];
        $mangaadi = str_replace("-", " ", $mangaadiREPLACE);
        $mangaadiUC = ucwords($mangaadi);

        //Manga ikinci adı tanımlama
        include('baglanti.php');
        $sqlkomut = "SELECT ikinciAdi FROM manga WHERE adi = '".$mangaadiUC."'";
        $islem = $baglanti->query($sqlkomut);
        if($islem->num_rows > 0){
            $deger = $islem->fetch_object();

            $mangaikinciadiUC = $deger->ikinciAdi;
            $mangaikinciadiREPLACE = strtolower($mangaikinciadiUC);
            $mangaikinciadiREPLACE = str_replace(" ", "-", $mangaikinciadiREPLACE);
        }

        //Manga bölüm adı tanımlama
        $bolumadi = null;
        $bolumadi = $_POST["bolumadi"];
        $bolumadi = trim($bolumadi);

        //Manga bölüm sayısı tanımlama
        $bolumsayisi = null;
        $bolumsayisi = $_POST["bolumsayisi"];

        //Resim linki tanımlama
        $resimlinki = null;
        $resimlinki = $_POST["resimlinki"];

        //Resimleri tanımlama
        $resimler = $_FILES['resimler']['name'];
        $resimsayisi = count($resimler);


        
        if($mangaadiREPLACE != "" && $bolumsayisi != "" && $_FILES["resimler"]){
            if(!file_exists("mangalar/$mangaadiREPLACE/bolumler/$bolumsayisi")){
                //Dosyaları oluşturma                
                mkdir("mangalar/$mangaadiREPLACE/bolumler/$bolumsayisi", 0755);
                fopen("mangalar/$mangaadiREPLACE/bolumler/$bolumsayisi/$mangaadiREPLACE-bolum-$bolumsayisi.php", "w");
                
                //Resimleri ekleme
                for($i = 0; $i < $resimsayisi; $i++){
                    
                    $hedefdosya = "mangalar/$mangaadiREPLACE/bolumler/$bolumsayisi/".basename($_FILES['resimler']['name'][$i]);
                    $resimuzantisi = strtolower(pathinfo($hedefdosya, PATHINFO_EXTENSION));

                    if(move_uploaded_file($_FILES['resimler']['tmp_name'][$i], $hedefdosya)){
                        echo "Resim başarıyla yüklendi: ".htmlspecialchars(basename($_FILES['resimler']['name'][$i]))."<br>";
                    }
                    else{
                        echo "Resim yüklenirken bir hata oluştu!";
                    }
                }

                //Bölümü database'ye kaydetme
                include('baglanti.php');
                $sqlkomut2 = "INSERT INTO bolum (adi, ikinciAdi, bolumAdi, bolumSayisi, resimLinki, eklenmeTarihi) VALUES (\"$mangaadiUC\", \"$mangaikinciadiUC\", \"$bolumadi\", \"$bolumsayisi\", \"$resimlinki\", NOW())";
                if($baglanti->query($sqlkomut2) === true){
                    echo "Bölüm database'ye eklendi.";
                }
                else{
                    echo "Manga database'ye eklenemedi!";
                }

                //Manga bölümü.php sitesinin içeriğini oluşturma
                $bolumphp = 
"<?php
    \$arananManganinAdi = '$mangaadiUC';
    \$arananBolumSayisi = $bolumsayisi;

    include('../../../../bolumsayfasi.php');
?>";

                //Düzenlenen bölüm dosyasını yerine geri yerleştirme
                file_put_contents("mangalar/$mangaadiREPLACE/bolumler/$bolumsayisi/$mangaadiREPLACE-bolum-$bolumsayisi.php", $bolumphp);

            }
            else{
                echo "Bu bölüm zaten kayıtlı!";
            }
        }
        else{
            echo "Eksik değer!";
        }
    }
?>