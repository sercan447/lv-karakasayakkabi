<?php

$sifirla = md5(mt_rand(1,9999999));
echo "Sayın $isim\n";
echo "Şifre Sıfırlama işlemi için lütfen linke tıklayarak işleminize başlayabilirsiniz. \n ";
echo "http://localhost/LARAVEL-ISLER/lv_karakasAyakkabi/public/sifreyenile/".$no."/".$sifirla;



?>