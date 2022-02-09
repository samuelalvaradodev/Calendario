<?php
setlocale(LC_ALL,"es_ES");

include('config.php');
                        
$idEvento = $_POST['idEvento'];
$start = $_REQUEST['start'];
$fecha_inicio = date('Y-m-d', strtotime($start)); 
 


$UpdateProd = ("UPDATE eventoscalendar SET fecha_inicio ='$fecha_inicio' WHERE id='".$idEvento."' ");
$result = mysqli_query($con, $UpdateProd);

?>