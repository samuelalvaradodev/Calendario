<?php include_once('config.php'); ?><?php switch (substr($_GET['fecha'],6)) {
  		case '01':
  			$mes='Enero';
  			break;
  		case '02':
  			$mes='Febrero';
  			break;
  			case '03':
  			$mes='Marzo';
  			break;
  			case '04':
  			$mes='Abril';
  			break;
  			case '05':
  			$mes='Mayo';
  			break;
  			case '06':
  			$mes='Junio';
  			break;
  			case '07':
  			$mes='Julio';
  			break;
  			case '08':
  			$mes='Agosto';
  			break;
  			case '09':
  			$mes='Septiembre';
  			break;
  			case '10':
  			$mes='Octubre';
  			break;
  			case '11':
  			$mes='Noviembre';
  			break;
  			case '12':
  			$mes='diciembre';
  			break;
  		default:
  			echo 'Valor del mes incorrecto';
  			break;
  	} ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="css/fullcalendar.min.css">
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="css/home.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

	<title>Document</title>
</head>
<body>

<div class="loading show">
    <div class="spin"></div>
</div>

	<div class="mt-5"></div>
	<div class="card">
	<div class="container">
	<div class="row">
  <div class="col-md-12 mb-3">
  	  <h3 class="text-center" id="title">RESUMEN DEL MES: <?php echo strtoupper($mes); ?> </h3>
  </div>
</div>
      <?php 

      $fecha = $_GET['fecha'];
      $dias = date( 't', strtotime( $fecha) );
      $stmt1 = ("SELECT notas, 
SUM(CASE WHEN dias = 1 THEN horas END) as '1',
SUM(CASE WHEN dias = 2 THEN horas END) as '2',
SUM(CASE WHEN dias = 3 THEN horas END) as '3',
SUM(CASE WHEN dias = 4 THEN horas END) as '4',
SUM(CASE WHEN dias = 5 THEN horas END) as '5',
SUM(CASE WHEN dias = 6 THEN horas END) as '6',
SUM(CASE WHEN dias = 7 THEN horas END) as '7',
SUM(CASE WHEN dias = 8 THEN horas END) as '8',
SUM(CASE WHEN dias = 9 THEN horas END) as '9',
SUM(CASE WHEN dias = 10 THEN horas END) as '10',
SUM(CASE WHEN dias = 11 THEN horas END) as '11',
SUM(CASE WHEN dias = 12 THEN horas END) as '12',
SUM(CASE WHEN dias = 13 THEN horas END) as '13',
SUM(CASE WHEN dias = 14 THEN horas END) as '14',
SUM(CASE WHEN dias = 15 THEN horas END) as '15',
SUM(CASE WHEN dias = 16 THEN horas END) as '16',
SUM(CASE WHEN dias = 17 THEN horas END) as '17',
SUM(CASE WHEN dias = 18 THEN horas END) as '18',
SUM(CASE WHEN dias = 19 THEN horas END) as '19',
SUM(CASE WHEN dias = 20 THEN horas END) as '20',
SUM(CASE WHEN dias = 21 THEN horas END) as '21',
SUM(CASE WHEN dias = 22 THEN horas END) as '22',
SUM(CASE WHEN dias = 23 THEN horas END) as '23',
SUM(CASE WHEN dias = 24 THEN horas END) as '24',
SUM(CASE WHEN dias = 25 THEN horas END) as '25',
SUM(CASE WHEN dias = 26 THEN horas END) as '26',
SUM(CASE WHEN dias = 27 THEN horas END) as '27',
SUM(CASE WHEN dias = 28 THEN horas END) as '28',
SUM(CASE WHEN dias = 29 THEN horas END) as '29',
SUM(CASE WHEN dias = 30 THEN horas END) as '30',
SUM(CASE WHEN dias = 31 THEN horas END) as '31'
FROM `eventoscalendar`,`dias_trab` WHERE substr(fecha_inicio,9,2)=dias_trab.dias AND substr(fecha_inicio,1,7)= '".$fecha."' GROUP BY notas");
  $result1 = mysqli_query($con, $stmt1);
  $filas = mysqli_num_rows($result1);
   $cuenta = mysqli_num_rows($result1);
  $stmt2=("SELECT DISTINCT'Total', 
SUM(CASE WHEN dias = 1 THEN horas END) as '1',
SUM(CASE WHEN dias = 2 THEN horas END) as '2',
SUM(CASE WHEN dias = 3 THEN horas END) as '3',
SUM(CASE WHEN dias = 4 THEN horas END) as '4',
SUM(CASE WHEN dias = 5 THEN horas END) as '5',
SUM(CASE WHEN dias = 6 THEN horas END) as '6',
SUM(CASE WHEN dias = 7 THEN horas END) as '7',
SUM(CASE WHEN dias = 8 THEN horas END) as '8',
SUM(CASE WHEN dias = 9 THEN horas END) as '9',
SUM(CASE WHEN dias = 10 THEN horas END) as '10',
SUM(CASE WHEN dias = 11 THEN horas END) as '11',
SUM(CASE WHEN dias = 12 THEN horas END) as '12',
SUM(CASE WHEN dias = 13 THEN horas END) as '13',
SUM(CASE WHEN dias = 14 THEN horas END) as '14',
SUM(CASE WHEN dias = 15 THEN horas END) as '15',
SUM(CASE WHEN dias = 16 THEN horas END) as '16',
SUM(CASE WHEN dias = 17 THEN horas END) as '17',
SUM(CASE WHEN dias = 18 THEN horas END) as '18',
SUM(CASE WHEN dias = 19 THEN horas END) as '19',
SUM(CASE WHEN dias = 20 THEN horas END) as '20',
SUM(CASE WHEN dias = 21 THEN horas END) as '21',
SUM(CASE WHEN dias = 22 THEN horas END) as '22',
SUM(CASE WHEN dias = 23 THEN horas END) as '23',
SUM(CASE WHEN dias = 24 THEN horas END) as '24',
SUM(CASE WHEN dias = 25 THEN horas END) as '25',
SUM(CASE WHEN dias = 26 THEN horas END) as '26',
SUM(CASE WHEN dias = 27 THEN horas END) as '27',
SUM(CASE WHEN dias = 28 THEN horas END) as '28',
SUM(CASE WHEN dias = 29 THEN horas END) as '29',
SUM(CASE WHEN dias = 30 THEN horas END) as '30',
SUM(CASE WHEN dias = 31 THEN horas END) as '31'
FROM `eventoscalendar`,`dias_trab` WHERE substr(fecha_inicio,9,2)=dias_trab.dias AND substr(fecha_inicio,1,7)= '".$fecha."'  ");
$result2= mysqli_query($con, $stmt2);
if ($cuenta < 1) {
?>
<div class="container">
	<div class="card">
  <div class="card-body">
    No hay ninguna tarea guardada en esta fecha.
  </div>
</div>
<?php 
}else{
  ?>

   
<div class="container">

<table class="table table-bordered ">
  <thead>
    <tr>
      <th scope="col">tareas</th>
      <?php for ($i=1; $i <= $dias ; $i++) { 
      	echo"<th scope='col'>".$i."</th>";
      } ?>
      <th scope="col">Total</th>
    </tr>
  </thead>
  <tbody>
  	<?php while($row1 = mysqli_fetch_array($result1))
{?>
    <tr>
      <td><?php if ($row1['notas']=='Total') {
      	echo "<b>".$row1['notas']."</b>";
      }else{
      	echo $row1['notas'];
      } ?></td>
      <?php for ($i=1; $i <= $dias ; $i++) { 
      	if($row1[$i]==null){
      		echo "<td>0</td>";
      	}else{
      	echo "<td>".$row1[$i]."</td>";
      }
      }
      $suma=0;
      for ($i=1; $i <= $dias ; $i++) { 
      	$suma += $row1[$i];
		}
      ?>
      <td><b><?php echo $suma; ?></b>
</td>    </tr>
    <tr>
  <?php } ?>
  <tfoot>
    <tr>
    
  
  <?php

  while($row2 = mysqli_fetch_array($result2))
{
	?>
	<td><b><?php echo $row2['Total'];?></b></td>
	<?php 
	for ($i=1; $i <= $dias ; $i++) { 
      	if($row2[$i]==null){
      		echo "<th>0</th>";
      	}else{
      	echo "<th>".$row2[$i]."</th>";
      }
      }
      $suma=0;
      for ($i=1; $i <= $dias ; $i++) { 
      	$suma += $row2[$i];
		}
} ?>
<td><b><?php echo $suma; ?></b>
</tr> 
    </tr>
  </tbody><?php } ?>
</table>

<br><a href="vista.php" class="btn-group btn btn-primary" >Volver</a><br>
</div>
</div> 
</div>

</body>
</html>
<style>
    .loading {
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: white;
        display: flex;
        justify-content: center;
        align-items: center;
        z-index: 9999;
        transition: 1s all;
        opacity: 0;
    }
    .loading.show {
        opacity: 1;
    }
    .loading .spin {
        border: 3px solid hsla(185, 100%, 62%, 0.2);
        border-top-color: #3cefff;
        border-radius: 50%;
        width: 3em;
        height: 3em;
        animation: spin 1s linear infinite;
    }
    @keyframes spin {
      to {
        transform: rotate(360deg);
      }
    }            
</style>

<script>
var Loading=(loadingDelayHidden=0)=>{let loading=null;
	const myLoadingDelayHidden=loadingDelayHidden;
	let imgs=[];
	let lenImgs=0;
	let counterImgsLoading=0;
	function incrementCounterImgs(){counterImgsLoading+=1;
		if(counterImgsLoading===lenImgs){hideLoading()}}function hideLoading(){if(loading!==null){loading.classList.remove('show');
		setTimeout(function(){loading.remove()},myLoadingDelayHidden)}}function init(){document.addEventListener('DOMContentLoaded',function(){loading=document.querySelector('.loading');
			imgs=Array.from(document.images);
			lenImgs=imgs.length;
			if(imgs.length===0){hideLoading()
			}else{
				imgs.forEach(function(img){img.addEventListener('load',incrementCounterImgs,false)})}})}return{'init':init}}

Loading(1000).init();
</script>
