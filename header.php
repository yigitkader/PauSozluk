<head>
  <script
  src="https://code.jquery.com/jquery-3.3.1.js"
  integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
  crossorigin="anonymous"></script>
</head>
<script type="text/javascript">

  $(function(){
    // var a=$("#btn1").val();
    // alert(a);

    $("button").click(function(){

      var deger=$(this).val();
      
      var link="index.php?veri="+deger;

      $("#drm").load(link+" #drm .drm-inside");


    });

  });


</script>

<?php error_reporting(0); ?>

<nav style="padding:0.6%;" class="nav navbar text-light bg-primary">
  <!-- Navbar content -->
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div style="margin-top:-25px; margin-left: 0 ;" class="navbar-brand">
      <a href="index.php"><img src="img/12.png" alt="" height="70" width="150"></a>
    </div>
    

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <form method="get" action="search.php" style="margin-left:23%;" class="navbar-form navbar-left">
        <div class="form-group">
          <input size="50%;" type="text" name="arama" class="form-control" placeholder="Baslık ara..">
        </div>
        
        <button name="ara" type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
        <!-- <input type="submit" class="btn btn-primary" name="ara" value="ara"> -->
        
      </form>
      <ul class="nav navbar-nav navbar-right">
        <?php 
        if ($_SESSION['oturum']==1) {
          ?>
          <li> <a style="color:white;" href="profil.php" >Profilim</a>  </li>
          <li> <a style="color:white;" href="out.php" >Çıkış Yap</a>  </li>

          <?php  
        }
        else {
          ?>
          <li><a style="color:white;" href="login.php">Giris Yap</a></li>
          <li> <a style="color:white;" href="register.php">Kayıt Ol</a> </li>

          <?php 
        }

        ?>
        

      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>



<!-- Baslık Butonlarımız   -->
<div style="text-align:center;" class="container">
  <!-- Form Alanına Alınacak -->

  <button id="btn1" value="gündem" name="Gündem" type="submit" class="btn btn-default">Gündem</button>
  <button id="btn2" value="genel" name="Genel" type="submit" class="btn btn-primary">Genel</button>
  <button id="btn3" value="spor" name="Spor" type="submit" class="btn btn-success">Spor</button>
  <button id="btn4" value="yaşam" name="Yaşam" type="submit" class="btn btn-info">Yaşam</button>
  <button id="btn5" value="haberler" name="Haberler" type="submit" class="btn btn-warning">Haberler</button>
  <button id="btn6" value="sondakika" name="SonDakika" type="submit" class="btn btn-danger">Son Dakika</button>
  <span style="background-color:yellow;" type="submit" class="btn"><a href="chat.php">Chat Alanı</a></span>


</div>
