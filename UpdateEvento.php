<?php

setlocale(LC_ALL,"es_ES");

include('config.php');
                        
$idEvento = $_GET['idEvento'];
//$evento = ucwords($_REQUEST['evento']);
$f_inicio = $_REQUEST['fecha_inicio'];
$fecha_inicio = date('Y-m-d', strtotime($f_inicio)); 
//echo $fecha_inicio;

//$color_evento = $_REQUEST['color_evento'];
$notas = $_REQUEST['notas'];
//echo $notas;
//$tipo = $_REQUEST['tipo'];
if (is_int($_REQUEST['horas'])) {
	$horas= intval($_REQUEST['horas']);

$horas = $_REQUEST['horas'];
//echo $horas;
$UpdateProd = ("UPDATE eventoscalendar SET fecha_inicio ='$fecha_inicio',notas='$notas',horas='$horas'
    WHERE id='".$idEvento."' ");
$result = mysqli_query($con, $UpdateProd);

header("Location:vista.php?");
}else
{
	echo'no'; 
}
?>