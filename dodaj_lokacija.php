<?php 

require_once 'connect.php';

require_once 'header.php';

?>
<div class="container">
	<?php 

	if(isset($_POST['addnew'])){

		if( empty($_POST['naziv_lokacije'])){
			echo "Molimo Vas da ispunite sva polja!"; 
		}else{		
			$naziv_lokacije  = $_POST['naziv_lokacije'];
			$sql = "INSERT INTO lokacija(naziv_lokacije) 
		    VALUES('$naziv_lokacije')";

			if( $con->query($sql) === TRUE){
				echo "<div class='alert alert-success'>Uspješno dodana nova lokacija</div>";
			}else{
				echo "<div class='alert alert-danger'>Error: Dogodila se greška kod dodavanja nove lokacije.</div>";
			}
		}
	}
	?>
	<div class="row">
	<div class="col-md-6 col-md-offset-3">
		<div class="box">
			<h3><i class="glyphicon glyphicon-plus"></i>&nbsp;Dodaj novu lokaciju</h3> 
			<form action="" method="POST">
				<label for="naziv_lokacije">Naziv lokacije</label>
				<input type="text" id="naziv_lokacije"  name="naziv_lokacije" class="form-control"><br>
				<br>
				<input type="submit" name="addnew" class="btn btn-success" value="Dodaj">
			</form>
		</div>
	</div>
</div>
</div>

<?php 

 require_once 'footer.php';
