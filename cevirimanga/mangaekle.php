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
        <label for="kapakresmi">Resim 2:3 oranında ve .jpg uzantılı olmak zorunda!</label>
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

            //Manga kapak resmi tanımlama
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
                    $sqlkomut = "INSERT INTO manga (adi, ikinciAdi, konusu, puani, durumu, kategori, eklenmeTarihi) VALUES (\"$mangaadiUC\", \"$mangaikinciadiUC\", \"$konu\", \"$puan\", \"$durumu\", \"$kategoriler\", NOW())";
                    if($baglanti->query($sqlkomut) === true){
                        echo "Manga database'ye eklendi.";
                    }
                    else{
                        echo "Manga database'ye eklenemedi!";
                    }
    
                    //Manga.php sitesinin içeriğini oluşturma
                    $mangaphp = "<?php
    \$arananManganinAdi = '$mangaadiUC';
                
    include('../../mangasayfasi.php');
?>";
    
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