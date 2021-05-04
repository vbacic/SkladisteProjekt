<?php
    //test
 
    $con = mysqli_connect("localhost","root",""); //spajanje na server

    if(!$con){
		echo "Neuspjelo spajanje na bazu";
    }
    
    if(!mysqli_select_db($con,'iooa')){ //spajanje na bazu
		echo "Baza podataka nije izabrana";
    }

?>