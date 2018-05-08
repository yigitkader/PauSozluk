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
			$("#frm").hide();
			$("#btnn").click(function(){
				$("#frm").toggle();
			});
		});

	</script>
</head>
<body>
	<?php include("connect.php"); ?>
	<?php include('header.php'); ?><hr>

	<?php 

	if ($_SESSION['oturum']==1) {

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
					$kid=$_SESSION['idd'];
					$query="SELECT * FROM BASLIK WHERE YAZAR_ID=:kid";
					$stmt=$db->prepare($query);
					$stmt->execute(array('kid'=>$kid));
					$postSayi=$stmt->rowCount();

					?>		
					<div class="well">
						<div  class="tab-content">
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

					</div><hr>

				</div>				

			</div>
			
			<!-- Kullanıcının postlarını ve posta yapılan yorumları getir -->
			<div style="text-align: center;" class="container">

				<?php 
				$idd=$_SESSION['idd'];

				$query="SELECT * FROM BASLIK JOIN USER ON USER.ID=BASLIK.YAZAR_ID WHERE USER.ID=:id";
				$stmt=$db->prepare($query);
				$stmt->execute(array('id'=>$idd));
					
				if ($stmt->rowCount()==0) {
					echo '<b>Henüz hic paylasım yok</b>';
				}
				else{
					?>
					
					<table class='table'>

						<tr>
							<th>Paylasımlar</th>
							<br></tr> 
							<?php 
							while($row=$stmt->fetch()) 
							{   
								?>

								<tr>

									<td><?php echo $row['BASLIK'] ; ?></td>
									<td><?php echo $row['TARIH'] ?></td>

								</tr>

								<?php 
							}
							?>	
						</table>

						<?php 


					}
					?>

				</div>


			</div>


			<?php 

		}
		else{
			echo '<meta http-equiv="refresh" content="1;url=index.php" />' ;
		}



		?>






	</body>
	</html>