 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title></title>
   </head>
   <body>
<hr>
     <!-- Degisen Baslık Alanlar -->
     <div style="border-right:1px solid #aaa;" class="col-md-3">
       <?php
        for ($i=0; $i <40 ; $i++) {
          echo '
            <b>'.$i.'.Baslik</b><br>
          ';
        }
        ?>
     </div>

     <!-- En populer yazılar -->
    <div style=" border-right:1px solid #aaa;" class="col-md-6">
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
