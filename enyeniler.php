 <?php session_start(); 
 error_reporting(0);

 ?>
 <!DOCTYPE html>
 <html lang="en" dir="ltr">
 <head>
   <meta charset="utf-8">
   <title></title>

   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
   <script defer src="https://use.fontawesome.com/releases/v5.0.10/js/all.js" integrity="sha384-slN8GvtUJGnv6ca26v8EzVaR9DC58QEwsIk9q1QXdCU8Yu8ck/tL/5szYlBbqmS+" crossorigin="anonymous"></script>
   <!-- Optional theme -->
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
   <!-- Latest compiled and minified JavaScript -->
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
   <link rel="stylesheet" type="text/css" href="css/content.css">
 </head>
 <body>
  <?php include 'functions.php'; include('connect.php'); ?>

  <hr>


  <!-- En yeniler -->
  <div style="border-right: 1px solid #aaa; overflow: scroll;" class="col-md-6">
    <div style="text-align: center;"><h3>En yeniler</h3></div><br>

    <ul style="overflow: scroll;" class="list-group ">
      <?php 

      $sayfada=5;
      $quee="SELECT * FROM BASLIK";
      $stmt0=$db->prepare($quee);
      $stmt0->execute();

      $toplamIcerik=$stmt0->rowCount();

      $toplam_sayfa=ceil($toplamIcerik/$sayfada);


      $sayfa=isset($_GET['sayfa']) ? int($_GET['sayfa']) : 1;

      if($sayfa<1)
      {
        $sayfa=1;
      } 
      if ($sayfa>$toplam_sayfa) {
        $sayfa=$toplam_sayfa;

      }

      $limit=($sayfa-1)+$sayfada;





      $kadi=$_SESSION['kullaniciad'];    

      $query="SELECT * FROM BASLIK ORDER BY ID DESC";
      $stmt=$db->prepare($query);
      $stmt->execute();
      if ($stmt->rowCount()<1) {
        echo '<b style="text-align:center;">Görüntülenebilecek icerik yok.</b>';
      }
      else
      {
       while ($row=$stmt->fetch()) 
       {
        ?>
        <li class="list-group-item bg-icerik"><a href="icerik.php?icerik=<?php echo $row['ID'] ?>">
          <p style="color:white;"><h4 style="color:white;"><?php echo $row["BASLIK"];  ?></h4><br></p></a>
          <p style="color:#c0c0c0;"><i><?php echo substr($row["BASLIK_ICERIK"],0,250); ?></i></p>
          <p style="color:black; margin-left:80%;"><i><?php echo $row["YAZAR_AD"] ; ?></i></p>


        </li><br>
        <!-- Sayfalama -->

        <?php 
      }

    }

    ?>

  </ul>

  <!-- Sayfalama -->
  <div align="center" class="col-md-12">

    <?php 
    $s=0;

    while ($s<$toplam_sayfa) {
      $s++;
      ?>

      <a href="enyeniler.php?sayfa=<?php echo $s ?>"><?php echo $s; ?></a>
      <?php         
    }

    ?>

  </div>



</div>






</body>
</html>
