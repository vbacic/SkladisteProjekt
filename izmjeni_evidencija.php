<?php 

require_once 'connect.php';

require_once 'header.php';

?>
<div class="container">
	<?php 
	
	if(isset($_POST['update'])){

		if( empty($_POST['naziv_robe']) || empty($_POST['kolicina']) || 
		 empty($_POST['lokacija']) )
		{
			echo "Molimo Vas da ispunite sva polja!"; 
		}else{		
			$naziv_robe  = $_POST['naziv_robe'];
			$kolicina 	= $_POST['kolicina'];;
			$lokacija  	= $_POST['lokacija'];
			$sql = "UPDATE evidencija_stanja SET naziv_robe='{$naziv_robe}', kolicina = '{$kolicina}',
						 lokacija = '{$lokacija}' 
						WHERE ID=" . $_POST['ID'];

			if( $con->query($sql) === TRUE){
				echo "<div class='alert alert-success'>Artikl je uspješno izmjenjen!</div>";
			}else{
				echo "<div class='alert alert-danger'>Error: Dogodila se greška kod izmjene podataka!</div>";
			}
		}
	}
	$ID = isset($_GET['ID']) ? (int) $_GET['ID'] : 0;
	$sql = "SELECT * FROM evidencija_stanja WHERE ID={$ID}";
	$result = $con->query($sql);

	if($result->num_rows < 1){
		header('Location: index.php');
		exit;
	}
	$row = $result->fetch_assoc();
	?>
	<div class="row">
	<div class="col-md-6 col-md-offset-3">
		<div class="box">
			<h3><i class="glyphicon glyphicon-plus"></i>&nbsp;Uredi artikl</h3> 
			<form action="" method="POST">
				<input type="hidden" value="<?php echo $row['ID']; ?>" name="ID">
				<label for="naziv_artikla">Naziv artikla</label>
				<input type="text" id="naziv_robe"  name="naziv_robe" value="<?php echo $row['naziv_robe']; ?>" class="form-control"><br>
				<label for="kolicina">Količina</label>
				<input type="text"  name="kolicina" id="kolicina" value="<?php echo $row['kolicina']; ?>" class="form-control"><br>
				<label for="lokacija">Lokacija</label> 
				<input type="text"  name="lokacija" id="lokacija"  value="<?php echo $row['lokacija']; ?>" class="form-control"><br>
				<br>
				<input type="submit" name="update" class="btn btn-success" value="Uredi">
			</form>
		</div>
	</div>
</div>
</div>

<?php 

 require_once 'footer.php';