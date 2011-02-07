<h2>Reporte de usuarios</h2>
<?php
echo "<br>";
for($i=0; $i<count($reporte); $i++)
{
	foreach($reporte[$i]['User'] as $indice =>$valor)
	{
		echo $indice." : ".$valor."<br>";
	}
	echo "<br><br>";
}
?>

