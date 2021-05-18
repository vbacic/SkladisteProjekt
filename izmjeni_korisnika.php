<?php 

require_once 'connect.php';

require_once 'header.php';

?>
<div class="container">
	<?php 
	
	if(isset($_POST['update'])){

		if( empty($_POST['ime']) || empty($_POST['prezime']) || 
		 empty($_POST['OIB']) )
		{
			echo "Molimo Vas da ispunite sva polja!"; 
		}else{		
			$ime  = $_POST['ime'];
			$prezime 	= $_POST['prezime'];;
			$OIB  	= $_POST['OIB'];
			$sql = "UPDATE users SET ime='{$ime}', prezime = '{$prezime}',
						 OIB = '{$OIB}' 
						WHERE user_id=" . $_POST['userid'];

			if( $con->query($sql) === TRUE){
				echo "<div class='alert alert-success'>Korisnik je uspješno izmjenjen!</div>";
			}else{
				echo "<div class='alert alert-danger'>Error: Dogodila se greška kod izmjene podataka!</div>";
			}
		}
	}
	$id = isset($_GET['id']) ? (int) $_GET['id'] : 0;
	$sql = "SELECT * FROM users WHERE user_id={$id}";
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
			<h3><i class="glyphicon glyphicon-plus"></i>&nbsp;Uredi korisnika</h3> 
			<form action="" method="POST">
				<input type="hidden" value="<?php echo $row['user_id']; ?>" name="userid">
				<label for="ime">Ime</label>
				<input type="text" id="ime"  name="ime" value="<?php echo $row['ime']; ?>" class="form-control"><br>
				<label for="prezime">Prezime</label>
				<input type="text"  name="prezime" id="prezime" value="<?php echo $row['prezime']; ?>" class="form-control"><br>
				<label for="OIB">OIB</label> 
				<input type="text"  name="OIB" id="OIB"  value="<?php echo $row['OIB']; ?>" class="form-control"><br>
				<br>
				<input type="submit" name="update" class="btn btn-success" value="Uredi">
			</form>
		</div>
	</div>
</div>
</div>

<?php 

 require_once 'footer.php';