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