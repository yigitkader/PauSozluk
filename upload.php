<?php 
session_start();
//Yigit Kader tarafından yazılmıstır!!.
include("connect.php");
include("functions.php");

// Gelen degere göre farklı klasörlere resim yükleme.


//*** Dosyanın yükseklik ve genislik kontrolünü yap!! -> File upload acıgı icin

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


    $newFileName=$uploadFolder1."-pic-".rand(0,9999).$fileExt;

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
                    $kadii=$_SESSION['kullaniciad'];

                    $query="UPDATE USER SET RESIM_URL=:resimurl WHERE KULLANICI_ADI=:kadi";
                    $stmt=$db->prepare($query);
                    $stmt->execute(array('resimurl'=>$newFileName,'kadi'=>$kadii));   

                    $query2="SELECT RESIM_URL FROM USER WHERE KULLANICI_ADI=:kadi";
                    $stmt2=$db->prepare($query2);
                    $stmt2->execute(array('kadi'=>$kadii));
                    $row=$stmt2->fetch();
                    $_SESSION['resimurl']=$row['RESIM_URL'];

                    echo '<meta http-equiv="refresh" content="2;url=profil.php" />' ; 
                }
                else {
                   echo 'Dosya yüklenememiştir';
               }   
           }
       }
       else
       {
        echo 'Yüklediginiz resim sadece jpeg, jpg veya png olabilir ve bos gönderemezsiniz';
    }
}

}



?>