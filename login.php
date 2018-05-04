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
  </head>
  <body>

    <!-- Diğer dosyaları dahil ediyoruz -->
    <?php include 'header.php'; include 'connect.php'; include 'functions.php'; ?>
    <hr>


    <div style="width:40%" class="container">
			<div class="row main">
				<div class="panel-heading">
	               <div class="panel-title text-center">
	               		<h1 class="title">Paü Sözlük</h1>
	               		<hr />
	               	</div>
	            </div>
				<div class="main-login main-center">
					<form class="form-horizontal" method="post" action="#">

						<div class="form-group">
							<label for="username" class="cols-sm-2 control-label">Kullanıcı Adı</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-users fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="username" id="username"  placeholder="Kullanıcı Adı giriniz"/>
								</div>
							</div>
						</div>

						<div class="form-group">
							<label for="password" class="cols-sm-2 control-label">Parola</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
									<input type="password" class="form-control" name="password" id="password"  placeholder="Parola Giriniz"/>
								</div>
							</div>
						</div>

             <div class="form-group ">
							<!-- <button type="submit" class="btn btn-primary btn-lg btn-block login-button">Giriş Yap</button> -->
              <input class="btn btn-primary btn-lg btn-block login-button" type="submit" name="girisyap" value="Giriş Yap">
						</div>

					</form>
				</div>
			</div>
		</div>

    <?php


      if (isset($_POST['girisyap'])) {

        $username=post('username');
        $pass=md5(post('password'));
        if (!isset($username) || !isset($pass) || empty($username) || empty($pass)) {

          $message0="Değerler boş girilemez";
          echo "<script type='text/javascript'>alert('$message0');</script>";

        }
        else {
          $query="SELECT * FROM USER WHERE KULLANICI_ADI=:kadi AND SIFRE=:pass";
          $stmt=$db->prepare($query);
          $stmt->execute(array(
            'kadi'=>$username,
            'pass'=>$pass
          ));
          if ($stmt->rowCount()==1) {
            echo '<meta http-equiv="refresh" content="1;url=index.php" />' ;
            
          }
          else {
            $message1="Giriş bilgileriniz hatalıdır";
            echo "<script type='text/javascript'>alert('$message1');</script>";
            echo '<meta http-equiv="refresh" content="1;url=login.php" />' ;


          }
        }
      }



     ?>




  </body>
</html>
