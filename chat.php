<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">

    <meta http-equiv="Content-Type" content="text/html" charset="ISO-SS59-9"/>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="js/jquery-3.2.1.js"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>
    <script type="text/javascript">

    document.onkeydown=mesajGonder;

    function mesajGonder(x){

      var tus=x.which;
      if (tus==13) {

        var mesaj=$("textarea[name=mesaj]").val();

      $("textarea[name=mesaj]").attr("disabled","disabled");


      $.ajax(
        {
          type: "POST",
          url: "chat-islem.php",
          data: {"tip":"gonder","mesaj":mesaj},
          success: function(sonuc)
          {
            //alert(sonuc);  --> Kontrol

            if (sonuc=="bos")
            {
              alert("Lütfen boş mesaj gondermeyin");
              $("textarea[name=mesaj]").removeAttr("disabled");


            }
            else
            {
                $("textarea[name=mesaj]").removeAttr("disabled");
                $("textarea[name=mesaj]").val("");
                sohbetGuncelle();
                //alert(sonuc);
                $("#area").focus();
            }


          }
        });



      }
    }

  function sohbetGuncelle()
  {
    $.ajax({
      type:"POST",
      url:"chat-islem.php",
      data:{"tip":"guncelle"},
      success: function(sonuc)
      {
        $("#sohbet-icerik").html(sonuc);
      }
    })
  }
  sohbetGuncelle();
  setInterval("sohbetGuncelle()",1500);


    </script>

    <title></title>
  </head>
  <body>
    <div class="container">
      <h1 style="text-align: center; color:white;">Paü Sözlük Sohbet Alanı</h1>
      
    </div>

    <div style="width: 78%; " id="sohbet-genel">
    	<div style="border-radius:5px;" id="sohbet-icerik" >
    	</div><br><br>

    	<div class="container" id="mesaj-gonder">

      <textarea style=" border-radius: 5px;" placeholder="Mesajınızı yazın" required="required" id="area" rows="" cols="" name="mesaj"></textarea>





    	</div>


</div>


  </body>
</html>
