<?php 

// Include database connection file
include_once('connect.php');
include_once('header.php');

if (!isset($_SESSION['user_id'])) {
	header("Location:login.php");
	exit();
}

 ?>
<div class="container">
	<div class="jumbotron ">
	<h2>Upute za korištenje</h2>
        <p>S obzirom na moguću veliku količinu robe na skladištima, želimo implementirati sustav za jednostavnije,
            preglednije i brže organiziranje skladišta. Kroz našu web aplikaciju omogućilo bi se i dodavanje više 
            lokacija što znači da se može pratiti i stanje na više lokacija tj. podružnica neke trgovine. 
            Aplikacija je zamišljena da ju mogu koristiti sami vlasnici ili voditelji poslovnice te prodavači. </p>


<p>Odabirom Popisa korisnika prikazuje se popis svih unesenih koisnika aplikacije. Na stranici prikaza popisa moguće je unijeti podatke novog korisnika, ažurirati podatke već unesenih korisnika te brisati korisnike. </p>

<p>Odabirom Popis lokacija prikazuje se popis svih lokacija na kojima se nalaze podružnice neke trgovine. Na stranici prikaza popisa lokacija moguće je unijeti podatke nove lokacije, ažurirati podatke već unesenih lokacija, te izbrisati lokacije. </p>

<p>Odabirom Evidencije stanja prikazuje se popis unesene robe, te na kojoj lokaciji tj. u kojoj podružnici se nalazi. Na stranici prikaza evidencije stanja moguće je unijeti podatke o određenoj robi, te joj dodijeliti lokaciju na kojoj će biti uskladištena ili postojeću robu premjestiti na novu lokaciju, te izbrisati robu sa stanja. </p>
</div>
</div>
<?php 


 require_once 'footer.php';