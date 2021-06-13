<?php 

require_once 'connect.php';

require_once 'header.php';

?>
<div class="container">
	<?php 

	if(isset($_POST['addnew'])){

		if( empty($_POST['naziv_robe']) || empty($_POST['kolicina']) || empty($_POST['lokacija']) ){
			echo "Molimo Vas da ispunite sva polja!"; 
		}else{		
			$ime  = $_POST['naziv_robe'];
			$prezime 	= $_POST['kolicina'];
			$OIB  	= $_POST['lokacija'];
			$sql = "INSERT INTO evidencija_stanja(naziv_robe,kolicina,lokacija) 
		    VALUES('$naziv_robe','$kolicina','$lokacija')";

			if( $con->query($sql) === TRUE){
				echo "<div class='alert alert-success'>Uspješno dodan novi artikl</div>";
			}else{
				echo "<div class='alert alert-danger'>Error: Dogodila se greška kod dodavanja novog artikla</div>";
			}
		}
	}
	?>
	<div class="row">
	<div class="col-md-6 col-md-offset-3">
		<div class="box">
			<h3><i class="glyphicon glyphicon-plus"></i>&nbsp;Dodaj novi artikl</h3> 
			<form action="" method="POST">
				<label for="naziv_robe">Naziv robe</label>
				<input type="text" id="naziv_robe"  name="naziv_robe" class="form-control"><br>
				<label for="kolicina">Kolicina</label>
				<input type="text"  name="kolicina" id="kolicina" class="form-control"><br>
				<label for="lokacija">Lokacija</label>
				<input type="text"  name="lokacija" id="lokacija" class="form-control"><br>
            
     </select>
                    
                                
				<input type="submit" name="addnew" class="btn btn-success" value="Dodaj">
			</form>
		</div>
	</div>
</div>
</div>

<?php 

 require_once 'footer.php';
