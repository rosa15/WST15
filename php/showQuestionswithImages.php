<?php 

include "dbConfig.php";
global $niremysqli;

$sql = "SELECT * FROM questions";
$res = mysqli_query($niremysqli, $sql); 

if (mysqli_num_rows($res) > 0) {
	
	echo "<table border = '1'> \n"; 
	echo "<tr><td>ID</td><td>Emaila</td><td>Galdera</td><td>Erantzun zuzena</td><td>Erantzun okerra 1</td><td>Erantzun okerra 2</td><td>Erantzun okerra 3</td><td>Zailtasuna</td><td>Gaia</td><td>Irudia</td></tr> \n"; 
	while ($row = mysqli_fetch_assoc($res)){ 
		if($row["Irudia"]!=null) echo "<tr><td>" . $row["Id"]. "</td><td>" . $row["Email"]. "</td><td>" . $row["Galdera"]. "</td><td>" . $row["Zuzena"]. " </td><td>" . $row["Okerra1"]. "</td><td> " . $row["Okerra2"]. "</td><td>" . $row["Okerra3"]. "</td><td>" . $row["Zailtasuna"]. "</td><td>" . $row["Gaia"]. "</td><td> <img width='75' height='75' src='" . $row["Irudia"] . "'/> </td></tr> \n"; 
		else echo "<tr><td>" . $row["Id"]. "</td><td>" . $row["Email"]. "</td><td>" . $row["Galdera"]. "</td><td>" . $row["Zuzena"]. " </td><td>" . $row["Okerra1"]. "</td><td> " . $row["Okerra2"]. "</td><td>" . $row["Okerra3"]. "</td><td>" . $row["Zailtasuna"]. "</td><td>" . $row["Gaia"]. "</td><td> <img width='75' height='75' src='../images/default.png'/> </td></tr> \n";	
	}
}
else{ echo "Ez dago lerrorik";}
if (!$res){	echo("Errorea query-a gauzatzerakoan: ". mysqli_error($niremysqli));}

if (isset ($_GET['op'])){
	//logeatua dago
	if ($_GET['op'] == 'logeatua'){
		//header ('location: ../layout.php' );
		$eposta = strval($_GET['eposta']);
		
		$lay = "layout.php?op=logeatua&eposta=" . $eposta;
		$lay = strval($lay);
		echo ("<a href=". $lay . "> ITZULI HASIERAKO ORRIRA </a></br></br>");
	}
}

//echo('<a href="../layout.html"> ITZULI HASIERAKO ORRIRA </a></br></br>');
mysqli_close($niremysqli);

?>