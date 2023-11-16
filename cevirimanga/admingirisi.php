<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<body>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <label for="adminadi">Admin Adı: </label>
        <input type="text" name="adminadi" id="adminadi">
        <br>
        <label for="sifre">Şifre: </label>
        <input type="password" name="sifre" id="sifre">
        <br>
        <input type="submit" name="girisyap" id="girisyap" value="Giriş Yap">
        <?php
            if(isset($_POST["girisyap"])){

                $adminAdi = $_POST["adminadi"];
                $sifre = $_POST["sifre"];

                include("baglanti.php");
                $sqlkomut = "SELECT * FROM admin where kullaniciAdi = '".$adminAdi."' and sifre = '".$sifre."'";
                $islem = $baglanti->query($sqlkomut);
                
                if($islem->num_rows > 0){
                    $islem->fetch_object();

                    $eklenenBolumSayisi = $islem->eklenenBolumSayisi;

                    header("Location: mangaekle.php");
                }
                else{
                    echo '<h2>Admin adı veya şifre yanlış!</h2>';
                }
            }
        ?>

    </form>
</body>
</html>