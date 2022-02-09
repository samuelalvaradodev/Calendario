<?php 
include('config.php');

 ?>
 <!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Calendario</title>
	<link rel="stylesheet" href="">
	<link rel="stylesheet" type="text/css" href="css/fullcalendar.min.css">
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/home.css">
</head>
<body>
<div class="loading show">
    <div class="spin"></div>
</div>

<?php


  $SqlEventos   = ("SELECT * FROM eventoscalendar");
  $resulEventos = mysqli_query($con, $SqlEventos);

?>
<div class="mt-5"></div>

<div class="container">
  <div class="row">
    <div class="col msjs">
      <?php
        include('msjs.php');
      ?>
    </div>
  </div>

<div class="row">
  <div class="col-md-12 mb-3">
  <h3 class="text-center" id="title">CALENDARIO</h3>
  </div>
</div>
</div>



<div id="calendar"></div>


<?php  
  include('modalNuevoEvento.php');
  
?>



<script src ="js/jquery-3.0.0.min.js"> </script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>

<script type="text/javascript" src="js/moment.min.js"></script>	
<script type="text/javascript" src="js/fullcalendar.min.js"></script>
<script src='locales/es.js'></script>

<script type="text/javascript">
$(document).ready(function() {
  $("#calendar").fullCalendar({
  	 customButtons: {
    myCustomButton: {
      text: 'Resumen',
      click:function() {
    var moment = $('#calendar').fullCalendar('getDate');
    var myarray = moment.format().split("-")
    anio = myarray[0];
    mes = myarray[1];
    window.location.href='resumen.php?fecha='+anio+'-'+mes;

      }
    }
  },
    header: {
      left: "prev,next today",
      center: "title",
      right: "month,myCustomButton",
    },

    locale: 'es',

    defaultView: "month",
    navLinks: true, 
    editable: true,
    eventLimit: true, 
    selectable: true,
    selectHelper: false,
    allDay: true,
    expandRows: true,

//Nuevo Evento
  select: function(start){
      $("#exampleModal").modal();
      $("input[name=fecha_inicio]").val(start.format('YYYY-MM-DD'));

    },
      
    events: [
      <?php
       while($dataEvento = mysqli_fetch_array($resulEventos)){?>
          ,{
          _id: '<?php echo $dataEvento['id']; ?>',
          evento: '<?php echo $dataEvento['evento']; ?>',
          title: '<?php echo strtoupper($dataEvento['notas']); ?>',
          type: '<?php echo $dataEvento['tipo_sol']; ?>',
          time: '<?php echo $dataEvento['horas']; ?>',
          start: '<?php echo $dataEvento['fecha_inicio']; ?>',
          color: '<?php echo $dataEvento['color_evento']; ?>',
          allDay: true,
          expandRows: true,
          },
        <?php } ?>

    ],


//Eliminar Evento
eventRender: function(event, element) {
    element
      .find(".fc-content")
      .prepend("<span id='btnCerrar'; class='closeon material-icons'>&#xe5cd;</span>")
    
    element.find(".closeon").on("click", function() {

  var pregunta = confirm("Deseas Borrar este Evento?");   
  if (pregunta) {

    $("#calendar").fullCalendar("removeEvents", event._id);

     $.ajax({
            type: "POST",
            url: 'deleteEvento.php',
            data: {id:event._id},
            success: function(datos)
            {
              $(".alert-danger").show();

              setTimeout(function () {
                $(".alert-danger").slideUp(500);
              }, 3000); 

            }
        });
      }
    });
  },


//mover el evento
eventDrop: function (event, delta) {
  var idEvento = event._id;
  var start = (event.start.format('YYYY-MM-DD'));

    $.ajax({
        url: 'drag_drop_evento.php',
        data: 'start=' + start + '&idEvento=' + idEvento,
        type: "POST",
        success: function (response) {
        }
    });
},

//Modificar 
eventClick:function(event){
      var fecha = (event.start.format('YYYY-MM-DD'));
     var id = event._id;
      $.ajax({
      	url:'traer.php',
        data: 'fecha=' + fecha,
        type: "GET",
        success:window.location.href = 'traer.php?fecha=' + fecha + '&id=' + id
    });
      /*$("#modalUpdateEvento").modal();
      $("input[name=fecha_inicio]").val(start.format('DD-MM-YYYY'));
var idEvento = event._id;
    var fecha = event.start;
    $('input[name=idEvento').val(idEvento);
    $('input[name=fecha').val(fecha);
    $('input[name=evento').val(event.titles);
    $('input[name=notas').val(event.title);
    $('input[name=tipo').val(event.type);
    $('input[name=horas').val(event.time);
    $('input[name=horasr').val(event.time);
      function(event){
    var idEvento = event._id;
    var fecha = event.start;
    var fechar = fecha + fecha
    $('input[name=idEvento').val(idEvento);
    $('input[name=fecha').val(fecha);
    $('input[name=evento').val(event.titles);
    $('input[name=notas').val(event.title);
    $('input[name=tipo').val(event.type);
    $('input[name=horas').val(event.time);
    $('input[name=fecha_inicio').val(event.start.format('DD-MM-YYYY'));
    $("#modalUpdateEvento").modal();*/
  },


  });


//tiempo notificacion
  setTimeout(function () {
    $(".alert").slideUp(300);
  }, 3000); 


});


</script>


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
