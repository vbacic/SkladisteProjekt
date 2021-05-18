<?php 

require_once 'connect.php';

require_once 'header.php';

?>
<div class="container">
	<?php 

	if(isset($_POST['addnew'])){

		if( empty($_POST['ime']) || empty($_POST['prezime']) || empty($_POST['OIB']) ){
			echo "Molimo Vas da ispunite sva polja!"; 
		}else{		
			$ime  = $_POST['ime'];
			$prezime 	= $_POST['prezime'];
			$OIB  	= $_POST['OIB'];
			$sql = "INSERT INTO users(ime,prezime,OIB) 
		    VALUES('$ime','$prezime','$OIB')";

			if( $con->query($sql) === TRUE){
				echo "<div class='alert alert-success'>Uspješno dodan novi korisnik</div>";
			}else{
				echo "<div class='alert alert-danger'>Error: Dogodila se greška kod dodavanja novog korisnika</div>";
			}
		}
	}
	?>
	<div class="row">
	<div class="col-md-6 col-md-offset-3">
		<div class="box">
			<h3><i class="glyphicon glyphicon-plus"></i>&nbsp;Dodaj novog korisnika</h3> 
			<form action="" method="POST">
				<label for="ime">Ime</label>
				<input type="text" id="ime"  name="ime" class="form-control"><br>
				<label for="prezime">Prezime</label>
				<input type="text"  name="prezime" id="prezime" class="form-control"><br>
				<label for="OIB">OIB</label> 
				<input type="text"  name="OIB" id="OIB" class="form-control"><br>
				<br>
				<input type="submit" name="addnew" class="btn btn-success" value="Dodaj">
			</form>
		</div>
	</div>
</div>
</div>

<?php 

 require_once 'footer.php';
