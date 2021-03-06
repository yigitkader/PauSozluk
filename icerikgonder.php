<?php 
session_start();

date_default_timezone_set('Europe/Istanbul');

include("functions.php");
include("connect.php");

if (isset($_POST['gonder'])) {

  $idd=$_SESSION['idd'];
  $ad=$_SESSION['kullaniciad'];

  $baslik=post('baslik');
  $baslik_icerik=post('baslik-icerik');
  $etiket=post('etiket');
  $tarih = date('d.m.Y');


  if (!isset($baslik) || !isset($baslik_icerik) || empty($baslik) || empty($baslik_icerik)   ) {

    $message0="Değerler boş girilemez";
    echo "<script type='text/javascript'>alert('$message0');</script>";
    echo '<meta http-equiv="refresh" content="1;url=index.php" />' ;

  }
  else{
    $query="INSERT INTO BASLIK(BASLIK,BASLIK_ICERIK,YAZAR_ID,YAZAR_AD,TARIH,ETIKET) VALUES(:baslik,:baslikicerik,:yazarid,:yazarad,:tarih,:etiket)";
    $stmt=$db->prepare($query);
    $stmt->execute(array(
      'baslik'=>$baslik,
      'baslikicerik'=>$baslik_icerik,
      'yazarid'=>$idd,
      'yazarad'=>$ad,
      'tarih'=>$tarih,
      'etiket'=>$etiket
    ));

    if ($stmt) {
      $message1="Entryniz gönderildi";
      echo "<script type='text/javascript'>alert('$message1');</script>";

      //Burada postun oldugu linke gidilecek
      echo '<meta http-equiv="refresh" content="1;url=index.php" />' ;


    }
    else
    {

      $message0="İşlem başarısız oldu";
      echo "<script type='text/javascript'>alert('$message0');</script>";
      echo '<meta http-equiv="refresh" content="1;url=index.php" />' ;

    }


  }

}


?>