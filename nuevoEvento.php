<?php
setlocale(LC_ALL,"es_ES");



require("config.php");
$evento = ucwords($_REQUEST['evento']);
$f_inicio = $_REQUEST['fecha_inicio'];
$fecha_inicio = date('Y-m-d', strtotime($f_inicio)); 


$color_evento = $_REQUEST['color_evento'];
$notas = $_REQUEST['notas'];
$tipo = $_REQUEST['tipo'];
if (!is_int($_REQUEST['horas'])) {
$horas= intval($_REQUEST['horas']);
$usuario = 'usuario';
if (!empty($evento)||!empty($notas)||!empty($tipo)||!empty($horas)) {
	

$InsertNuevoEvento = "INSERT INTO eventoscalendar(usuario,evento,notas,tipo_sol,horas,fecha_inicio,color_evento)
    VALUES ('".$usuario. "','".$evento. "','".$notas."','".$tipo."','".$horas."','". $fecha_inicio."','" .$color_evento. "')";
$resultadoNuevoEvento = mysqli_query($con, $InsertNuevoEvento);

header("Location:vista.php?fecha=".$fecha_inicio."");
}else{
header("Location:vista.php?al");
}
}else{
	echo 'no paso';
}

?>