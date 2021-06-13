<?php 

require_once 'connect.php';

require_once 'header.php';

echo "<div class='container'>";

if( isset($_POST['delete'])){
	$sql = "DELETE FROM evidencija_stanja WHERE ID=" . $_POST['ID'];
	if($con->query($sql) === TRUE){
		echo "<div class='alert alert-success'>Artikl uspješno obrisan!</div>";
	}
}

$sql 	= "SELECT * FROM evidencija_stanja";
$result = $con->query($sql); 

if( $result->num_rows > 0)
{ 
	?>
<a href="dodaj_evidencija.php" class="btn btn-success">Dodaj novi artikl</a>
 
	<h2>Popis svih artikala</h2>
	<table class="table table-bordered table-striped">
		<tr>
			<td>Naziv</td>
			<td>Količina</td>
			<td>Lokacija</td>
			<td width="70px"></td>
			<td width="70px"></td>
		</tr>
	<?php
	while( $row = $result->fetch_assoc()){ 
		echo "<form action='' method='POST'>";	//added
		echo "<input type='hidden' value='". $row['ID']."' name='ID' />"; //added
		echo "<tr>";
		echo "<td>".$row['naziv_robe'] . "</td>";
		echo "<td>".$row['kolicina'] . "</td>";
		echo "<td>".$row['lokacija'] . "</td>";
		echo "<td><input type='submit' name='delete' value='Izbrisi' class='btn btn-danger' /></td>";  
		echo "<td><a href='izmjeni_evidencija.php?ID=".$row['ID']."' class='btn btn-info'>Uredi</a></td>";
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