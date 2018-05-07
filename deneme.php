
<?php 

$idd=$_SESSION['idd'];

if (isset($_POST['gonder'])) {
  $baslik=post('baslik');
  $baslik-icerik=post('baslik-icerik');
  $etiket=post('etiket');
  $tarih = date('d.m.Y');


  if (!isset($baslik) || !isset($baslik-icerik) || empty($baslik) || empty($baslik-icerik)   ) {

    $message0="Değerler boş girilemez";
    echo "<script type='text/javascript'>alert('$message0');</script>";
    echo '<meta http-equiv="refresh" content="1;url=index.php" />' ;

  }
  else{
    $query="INSERT INTO BASLIK(BASLIK,BASLIK_ICERIK,YAZAR_ID,TARIH,ETIKET) VALUES(:baslik,:baslikicerik,:yazarid,:tarih,:etiket)";
    $stmt=$db->prepare($query);
    $stmt->execute(array(
      'baslik'=>$baslik,
      'baslikicerik'=>$baslik-icerik,
      'yazarid'=>$idd,
      'tarih'=>$tarih,
      'etiket'=>$etiket
    ));

    if ($stmt) {
      $message1="Entryniz gönderildi";
      echo "<script type='text/javascript'>alert('$message1');</script>";
    //Burada postun oldugu linke gidilecek

    }
    else
    {

      $message0="İşlem başarısız oldu";
      echo "<script type='text/javascript'>alert('$message0');</script>";
    }


  }

}


?>
