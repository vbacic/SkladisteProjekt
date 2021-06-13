<!DOCTYPE html>
<html>
<head>
	<title>Evidencija stanja na skladištu</title>
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<style type="text/css">
		.box{
			background: #f0f0f0;
			padding: 20px;
		}
	</style>
</head>
<body> 

<div class="container"> 
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.php">Evidencija stanja na skladištu</a>
      </div>
      <div id="navbar" class="navbar-collapse collapse">
        <ul class="nav navbar-nav">
      
            <?php if($_SESSION['userlevel'] == '0'){ ?>
						       <li><a href="korisnici.php">Popis korisnika</a></li>
            <li><a href="lokacije.php">Popis lokacija</a></li>
          <li><a href="evidencija.php">Evidencija stanja</a></li> 
          <li> <a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a></li>
							<?php } ?>
          
          <?php if ($_SESSION['userlevel'] == '2' ) { ?>
	  <li><a href="lokacije.php">Popis lokacija</a></li>
          <li><a href="evidencija.php">Evidencija stanja</a></li> 
          <li> <a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a></li>
							<?php } ?>
            
            
        </ul>
        
      </div><!--/.nav-collapse -->
    </div><!--/.container-fluid -->
  </nav> 
</div>