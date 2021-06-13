<?php 

require_once 'connect.php';

require_once 'header.php';

echo "<div class='container'>";

if( isset($_POST['delete'])){
	$sql = "DELETE FROM lokacija WHERE ID=" . $_POST['ID'];
	if($con->query($sql) === TRUE){
		echo "<div class='alert alert-success'>Lokacija uspješno obrisana!</div>";
	}
}

$sql 	= "SELECT * FROM lokacija";
$result = $con->query($sql); 

if( $result->num_rows > 0)
{ 
	?>
<a href="dodaj_lokacija.php" class="btn btn-success">Dodaj novu lokaciju</a>
 
	<h2>Popis svih lokacija</h2>
	<table class="table table-bordered table-striped">
		<tr>
			<td>ID</td>
			<td>Lokacija</td>
			<td width="70px"></td>
			<td width="70px"></td>
		</tr>
	<?php
	while( $row = $result->fetch_assoc()){ 
		echo "<form action='' method='POST'>";	//added
		echo "<input type='hidden' value='". $row['ID']."' name='ID' />"; //added
		echo "<tr>";
		echo "<td>".$row['ID'] . "</td>";
		echo "<td>".$row['naziv_lokacije'] . "</td>";
		echo "<td><input type='submit' name='delete' value='Izbrisi' class='btn btn-danger' /></td>";  
		echo "<td><a href='izmjeni_lokacija.php?ID=".$row['ID']."' class='btn btn-info'>Uredi</a></td>";
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