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
	<link rel="stylesheet" type="text/css" href="css/content.css">
</head>
<body>
	<?php include 'header.php'; include('connect.php'); include('functions.php'); ?><br><br>

	
	<div class="container">
		<ul class="list-group">

			<?php 

			$baslikid=$_GET['icerik'];

			$query="SELECT * FROM BASLIK WHERE ID=:baslikid ";
			$stmt=$db->prepare($query);
			$stmt->execute(array('baslikid'=>$baslikid));

			while ($row=$stmt->fetch()) 
			{
				?>
				<li class="list-group-item bg-eksayfa"><a href="icerik.php?icerik=<?php echo $row['ID'] ?>">
					<p style=""><h4 style="color:black;"><?php echo $row["BASLIK"];  ?></h4><br></p></a>
					<p style="color:black;"><i><?php echo substr($row["BASLIK_ICERIK"],0,250); ?></i></p>
					<p style="color:black; margin-left:80%;"><i><?php echo "- ".$row["YAZAR_AD"]."&nbsp;".$row["TARIH"] ; ?></i></p>
					<form action="" method="post">
						<button type='submit' name="begen"><i class="fas fa-heart"></i></button><span class="badge badge-light"><?php 
						echo $row['STAR'] ; ?></span>

					</form>
				</li><br>


				<!-- Sayfalama -->

				<?php 
			}

			?>	

		</ul>

	</div>

	<?php 


	if (isset($_POST['begen'])) {


		$query="SELECT * FROM BASLIK WHERE ID=:id";
		$stmt=$db->prepare($query);
		$stmt->execute(array('id'=>$baslikid));
		$deger=$stmt->fetch();
		$yenideger=$deger['STAR']+1;

		//Update edilme
		$queryx="UPDATE BASLIK  SET STAR=:st WHERE ID=:id";
		$stmtx=$db->prepare($queryx);
		$stmtx->execute(array('st'=>$yenideger,'id'=>$baslikid));

		if (stmtx) {
			echo '<meta http-equiv="refresh" content="1;url=icerik.php?icerik='.$baslikid.'  " />' ;
		}

		// Kontrol
		// $message1=$yenideger;
		// echo "<script type='text/javascript'>alert('$message1');</script>";



	}

	?>



</body>
</html>