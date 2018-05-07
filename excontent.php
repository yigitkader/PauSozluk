 <?php session_start(); ?>
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

  

  <!-- Degisen Baslık Alanlar -->

  <!-- Entry girme alanı , lakin giris yapmıssa -->
  <?php if ($_SESSION['oturum']==1) {

    ?>
    <div style="margin-left: 15%;" class="container">
     <div class="form-group row">
      <form>

        <div style="text-align: center;" class="col-xs-10">
          <!-- <label  for="ex3">Baslık</label> -->
          <input class="form-control" required="required" name="baslik" placeholder="Baslık" id="ex3" type="text">
        </div><br><br>
        <div style="text-align: center;" class="col-xs-10">
          <!-- <label  for="ex3">Iceriginiz</label> -->
          <textarea style="max-width: 100%; max-height: 10%;" cols="10" rows="2" required="required" name="baslik-icerik" placeholder="Iceriginiz" class="form-control"></textarea>
          <!-- <input class="form-control" id="ex3" type="text"> -->
        </div><br><br><br>
        <!-- Etiket -->
        <div style="text-align: center;" class="col-xs-10">

          <input class="form-control" name="etiket" placeholder="Etiket giriniz , virgülle ayırınız " id="ex3" type="text">
        </div><br><br>
        <input style="margin-left: 35%;" class="btn btn-primary " type="submit" value="Şutlaa" name="gonder">
      </form>
    </div>
  </div><hr>


  <?php    

}

?>


<div style="border-right: 1px solid #aaa;" class="col-md-3">

  <?php
  for ($i=0; $i <40 ; $i++) {
    echo '
    <ul class="nav nav-pills nav-stacked">
    '.$i.'.Baslik<br>
    </ul>
    ';
  }
  ?>


</div>

<!-- En populer yazılar -->
<div style=" border-right:1px solid #aaa;" class="col-md-6">
  <b>Baslık Olustur</b><br><br>
  <?php
  for ($i=0; $i <40 ; $i++) {
   echo '
   <b>'.$i.'.Popüler yazı</b><br>
   ';
 }
 ?>
</div>

<!-- Son dakika haberleri -->
<div class="col-md-3">
  <?php
  for ($i=0; $i <40 ; $i++) {
   echo '
   <b>'.$i.'.Son dakika haberi</b><br>
   ';
 }
 ?>
</div>


</body>
</html>
