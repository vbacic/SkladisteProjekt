<?php 

require_once 'connect.php';

require_once 'header.php';

echo "<div class='container'>";

if( isset($_POST['delete'])){
	$sql = "DELETE FROM users WHERE user_id=" . $_POST['userid'];
	if($con->query($sql) === TRUE){
		echo "<div class='alert alert-success'>Korisnik uspješno obrisan!</div>";
	}
}

$sql 	= "SELECT * FROM users";
$result = $con->query($sql); 

if( $result->num_rows > 0)
{ 
	?>
<a href="dodaj_korisnika.php" class="btn btn-success">Dodaj novog korisnika</a>
 
	<h2>Popis svih korisnika</h2>
	<table class="table table-bordered table-striped">
		<tr>
			<td>Ime</td>
			<td>Prezime</td>
			<td>OIB</td>
			<td width="70px"></td>
			<td width="70px"></td>
		</tr>
	<?php
	while( $row = $result->fetch_assoc()){ 
		echo "<form action='' method='POST'>";	//added
		echo "<input type='hidden' value='". $row['user_id']."' name='userid' />"; //added
		echo "<tr>";
		echo "<td>".$row['ime'] . "</td>";
		echo "<td>".$row['prezime'] . "</td>";
		echo "<td>".$row['OIB'] . "</td>";
		echo "<td><input type='submit' name='delete' value='Izbrisi' class='btn btn-danger' /></td>";  
		echo "<td><a href='izmjeni_korisnika.php?id=".$row['user_id']."' class='btn btn-info'>Uredi</a></td>";
		echo "</tr>";
		echo "</form>"; //added 
	}
	?>
	</table>
<?php 
}
else
{
	echo "<br><br>Ni jedan zapis nije pronađen";
}
?> 
</div>

<?php 

 require_once 'footer.php';