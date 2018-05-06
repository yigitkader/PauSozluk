<?php 
session_start();
//Yigit Kader tarafından yazılmıstır!!.
include("connect.php");
include("functions.php");

// Gelen degere göre farklı klasörlere resim yükleme.


if (isset($_POST['submit'])) 
{

    $orginalName= $_FILES['img']['name'];
    $imageType=$_FILES['img']['type'];
    $imageSize=$_FILES['img']['size'];
    $tmpName=$_FILES['img']['tmp_name'];
    $imageError=$_FILES['img']['error'];  // Eğer hata verirse diye.
    $uploadFolder1="img-user/";


    $maxSize=1024*1024*3; // Dosya 3 mb dan büyük olmasın .
    $fileExt=substr($_FILES['img']['name'],-4,4);  // Name deki -4 ten 4 ü al.


    $newFileName=$uploadFolder1."-user-".rand(0,9999).$fileExt;

    if ($_FILES['img']['size'] > $maxSize) 
    {
        echo 'Resmin boyutu çok büyük';   
    }
    else
    {
        $file=$_FILES['img']['type'];

        if ($file=='image/jpeg' || $file=='image/jpg' ||  $file=='image/png') 
        {
            if (is_uploaded_file($tmpName)) 
            {
                $move=move_uploaded_file($tmpName,$newFileName); 
                if ($move) 
                {
                    echo 'Dosya yüklendi';   

                        // Buradan sqle gönder 

                    $query="INSERT INTO AYAKKABI(KATEGORI,KISI_TIP,BASLIK,RESIM_URL) VALUES(:kategori,:kisitip,:baslik,:resimurl)";
                    $stmt=$db->prepare($query);
                    $stmt->execute(array('kategori'=>$kategori,
                        'kisitip'=>$kisiTip,
                        'baslik'=>$baslik,
                        'resimurl'=>$newFileName));   

                    echo '<meta http-equiv="refresh" content="2;url=admin-page.php" />' ; 
                }
                else {
                   echo 'Dosya yüklenememiştir';
               }   
           }
       }
       else
       {
        echo 'Yüklediginiz resim sadece jpeg, jpg veya png olabilir.';
    }
}





}



?>