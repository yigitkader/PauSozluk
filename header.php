<?php error_reporting(0); ?>
<nav style="padding:0.6%;" class="nav navbar text-light bg-primary">
  <!-- Navbar content -->
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-brand">
      <img src="img/pau.png" alt="" height="20" width="60">
    </div>
    <a style="color:white;" class="navbar-brand" href="index.php"><b>PaüSözlük</b></a>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <form style="margin-left:23%;" class="navbar-form navbar-left">
        <div class="form-group">
          <input size="50%;" type="text" name="aramaAlani" class="form-control" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
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
  <button type="button" class="btn btn-default">Gündem</button>
  <button type="button" class="btn btn-primary">Genel</button>
  <button type="button" class="btn btn-success">Spor</button>
  <button type="button" class="btn btn-info">Yaşam</button>
  <button type="button" class="btn btn-warning">Haberler</button>
  <button type="button" class="btn btn-danger">Son Dakika</button>
  <button style="background-color:yellow;" type="button" class="btn"><a href="chat.php">Chat Alanı</a></button>


</div>
