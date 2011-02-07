<h2>Reporte de usuarios</h2>
<?php
for($i=0; $i<count($reporte); $i++)
{
	foreach($reporte[$i]['User'] as $rpt)
	{
		echo $rpt."<br>";
	}
	echo "<br><br>";
}
?>

