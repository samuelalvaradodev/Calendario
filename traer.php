<?php include_once('config.php');

if (isset($_GET["fecha"])||isset($_GET["id"])) {
$fechas = $_GET["fecha"];
$idEvento = $_GET["id"];
$fecha = date('Y-m-d', strtotime($fechas)); 
}
$stmt   = ("SELECT SUM(horas) AS totalh FROM eventoscalendar WHERE fecha_inicio='".$fecha."' ");
  $result = mysqli_query($con, $stmt);
  while($row = mysqli_fetch_array($result)){
  	$totalh = $row['totalh'];
  }
 $stmt1   = ("SELECT * FROM eventoscalendar WHERE id={$idEvento} ");
  $result1 = mysqli_query($con, $stmt1);
  while($row1 = mysqli_fetch_array($result1)){

   ?>
<html>
<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Calendario</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/home.css">
</head>
<body>

<div class="loading show">
    <div class="spin"></div>
</div>
	<br>
	<div class="container">
<div class="card">
	<div class="card-title center">
	<div class="row">
  <div class="col-md-12 mb-3">
  	  <h3 class="text-center" id="title">ACTUALIZA LOS DATOS</h3>
  </div>
</div>
		<div>
	<form name="formEventoUpdate" id="formEventoUpdate" action="UpdateEvento.php?idEvento=<?php echo $row1['id']; ?>" class="form-horizontal" method="POST">
    <input type="hidden" class="form-control" name="idEvento" id="idEvento" value="<?php echo $row1["id"]; ?>" >
    <div class="form-group">
      <label for="evento" class="col-sm-12 control-label">Nombre del Evento</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="evento" id="evento" placeholder="Nombre del Evento" value="<?php echo $row1['evento']; ?>" disabled>
      </div>
    </div>
    <div class="form-group">
      <label for="evento" class="col-sm-12 control-label">Tipo de solicitud</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="tipo" id="tipo" placeholder="Tipo de solicitud" value="<?php echo $row1['tipo_sol']; ?>" disabled>
      </div>
    </div>
    <div class="form-group">
      <label for="evento" class="col-sm-12 control-label">Tareas</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="notas" id="notas" placeholder="<?php echo $row1['notas'] ?>" required/>
      </div>
    </div>
    <div class="form-group">
      <label for="evento" class="col-sm-12 control-label">Horas de trabajo</label>
      <div class="col-sm-10">
        <input type="number" class="form-control" name="horas" id="horas" value="<?php echo $row1['horas']?>">
        </div>

        <h4>horas acumuladas de trabajo:</h4>
        <h5><?php echo $totalh.' - Horas'; ?></h5>
      </div>
    </div>
    <div class="ocult">
    <div class="form-group">
      <label for="fecha_inicio" class="col-sm-12 control-label">Fecha</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="fecha_inicio" id="fecha_inicio" placeholder="Fecha Inicio" value="<?php echo $row1['fecha_inicio'];?>">
      </div>
    </div>
  </div>
<?php } ?>
        <button type="submit" class="form-group btn btn-success">Guardar Cambios de mi Evento</button>
        <a href="vista.php"><button type="button" class="form-group btn btn-secondary" data-dismiss="modal">Salir</button></a>
      </div>
  </form>
</div>
  </div>
</div>
</div>

</body>
</div>
<style>
	.ocult{
  display:none !important
}
</style>
<script src="https://code.jquery.com/jquery-1.6.2.min.js"></script>
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
