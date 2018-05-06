<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<script defer src="https://use.fontawesome.com/releases/v5.0.10/js/all.js" integrity="sha384-slN8GvtUJGnv6ca26v8EzVaR9DC58QEwsIk9q1QXdCU8Yu8ck/tL/5szYlBbqmS+" crossorigin="anonymous"></script>
	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
	crossorigin="anonymous"></script>
	<script
  src="https://code.jquery.com/jquery-3.3.1.js"
  integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
  crossorigin="anonymous"></script>

	
	<link rel="stylesheet" type="text/css" href="css/profil-page.css">
	<script type="text/javascript" src="js/profil-page.js"></script>
	<script type="text/javascript">
		
		$(function(){

			$("frm").hide();

			$("#btnn").click(function(){
				$("#frm").hide();

			},function(){
				$("#frm").show();
			});
		});

	</script>
</head>
<body>
	<?php include("connect.php"); ?>
	<?php include('header.php'); ?><hr>

	<?php 




	?>

	<!-- Profil Alanı -->
	<div style="" class="">
		<div class="container">
			<div class="col-lg-12 col-sm-12">
				<div class="card hovercard">
					<div class="card-background">
						<img class="card-bkimg" alt="" src="http://lorempixel.com/100/100/people/9/">

						<!-- http://lorempixel.com/850/280/people/9/ -->
					</div>
					<div class="useravatar">
						<!-- resim url buradan cekilecek -->
						<img alt="" src="<?php echo $_SESSION['resimurl']; ?>"> 
					</div>
					<div class="card-info"> <span class="card-title"><?php echo $_SESSION['kullaniciad']; ?></span>
						
					</div>

				</div>

				
				<?php 
				$kadi=$_SESSION['kullaniciad'];
				$query="SELECT COUNT(*) FROM BASLIK WHERE KULLANICI_AD=:kadi";
				$stmt=$db->prepare($query);
				$stmt->execute(array('kadi'=>$kadi));
				$postSayi=$stmt->rowCount();

				?>		
				<div class="well">
					<div class="tab-content">
						<div class="tab-pane fade in active" id="tab1">
							<b>Paylaşılan Baslık : </b>
							<b><?php echo $postSayi; ?></b>
						</div>
						
						
					</div>

				</div>
				<button id="btnn">Resmi Değiştir</button>
				<div id="frm">
					<form action="upload.php" method="post" enctype="multipart/form-data">
						Yükelenecek resmi seciniz:
						<input type="file" name="img" id="fileToUpload"><br><br>
						<input type="submit" name="submit" value="Yukle">

					</form>
					
				</div>
				
			</div>				

		</div>


	</div>





</body>
</html>