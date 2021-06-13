<?php 

require_once 'connect.php';

require_once 'header.php';

?>
<div class="container">
	<?php 
	
	if(isset($_POST['update'])){

		if( empty($_POST['naziv_lokacije']) )
		{
			echo "Molimo Vas da ispunite sva polja!"; 
		}else{		
			$naziv_lokacije  = $_POST['naziv_lokacije'];
			$sql = "UPDATE lokacija SET naziv_lokacije='{$naziv_lokacije}'
						WHERE ID=" . $_POST['ID'];

			if( $con->query($sql) === TRUE){
				echo "<div class='alert alert-success'>Lokacija je uspješno izmjenjena!</div>";
			}else{
				echo "<div class='alert alert-danger'>Error: Dogodila se greška kod izmjene podataka!</div>";
			}
		}
	}
	$ID = isset($_GET['ID']) ? (int) $_GET['ID'] : 0;
	$sql = "SELECT * FROM lokacija WHERE ID={$ID}";
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
			<h3><i class="glyphicon glyphicon-plus"></i>&nbsp;Uredi lokaciju</h3> 
			<form action="" method="POST">
				<input type="hidden" value="<?php echo $row['ID']; ?>" name="ID">
				<label for="naziv_lokacije">Lokacija</label>
				<input type="text" id="naziv_lokacije"  name="naziv_lokacije" value="<?php echo $row['naziv_lokacije']; ?>" class="form-control"><br>
				<br>
				<input type="submit" name="update" class="btn btn-success" value="Uredi">
			</form>
		</div>
	</div>
</div>
</div>

<?php 

 require_once 'footer.php';