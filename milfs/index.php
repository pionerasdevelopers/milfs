<?php
session_start();
//ini_set('display_errors', 'On');
require ('xajax/xajax.inc.php');
$xajax = new xajax();
require ('funciones/funciones.php');
require ('funciones/convert.php');
require ('funciones/login.php');

$xajax->processRequests(); 
//$xajax->debugOn();
?>
<!DOCTYPE html>
<html lang="en">
   <head >
    <meta charset="utf-8">
    <meta name="viewport" content="user-scalable=no, width=device-width,  maximum-scale=1,  initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="fredyrivera" >
     <?php $xajax->printJavascript("xajax/");  ?>
	<link rel="shortcut icon" href="favicon-152.png">
	<link rel="apple-touch-icon-precomposed" href="favicon-152.png">
	<link href="css/font-awesome/css/font-awesome.css" rel="stylesheet">
<!-- 	<link href="css/estilos.php?dd" rel="stylesheet">
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" media="screen" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" media="screen" href="css/bootstrap-markdown.css">
	<link rel="stylesheet" type="text/css" media="screen" href="css/bootstrap-markdown.min.css"> -->
	<link rel="stylesheet" type="text/css" media="screen" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" media="screen" href="css/bootstrap-markdown.css">
	<link rel="stylesheet" type="text/css" media="screen" href="css/bootstrap-markdown.min.css">


<style>
  #map {width: 500px;height:200px;}
  
</style>


    <title>I<3MILFS</title>

    <!-- Bootstrap core CSS -->
    
<!--     <script language="JavaScript" src="escritorio/librerias/scripts.js" type="text/javascript"></script> -->
    <!-- Custom styles for this template -->
    
<!--     <link href="jumbotron.css" rel="stylesheet"> -->


    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
<?php
    					//		if($_COOKIE['aviso'] != 'presentacion') {
		//$onload = "onload = \"$('#muestraInfo').modal('toggle')\"";    	
		//setcookie("aviso","presentacion",time()+60*60*24);
					//	}
					//($id,$form_respuesta,$control,$tipo)
					if($_REQUEST[id] !='' OR $_REQUEST[c]){$onload ="<script type=\"text/javascript\"> xajax_formulario_modal('$_REQUEST[id]','','$_REQUEST[c]','$_REQUEST[t]')</script>";}
					
?>
</head>
<body  >
<?php if($_REQUEST[form] !='') { echo formulario_embebido("$_REQUEST[form]"); echo "Hola mundo";
}else{

 ?>
<?php echo $onload; ?>
<?php if(isset($_REQUEST[f])){
form_publico("$_REQUEST[f]");
}
 if ( isset ( $_SESSION['id'] ) ) {	?>
<div class="navbar navbar-inverse nav-bar-fixed-top " role="navigation">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">MILFS</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#"><img src="favicon-152.png" style="width:60px" alt="MILFS" title="Multi Interactive Light Form System"></a>
    </div>

<?php  echo milfs() ?>
  </div><!-- /.container-fluid -->
</div>
<?php }else{ } ?>



	<div class='container'>
		<div id='contenido'>
		
		<?php 
		if(!isset($_SESSION[id_empresa])) {$id_empresa_portada='1';} else{$id_empresa_portada = $_SESSION[id_empresa];}
	$encabezado = empresa_datos("$id_empresa_portada",'encabezado');
	$pie = empresa_datos("$id_empresa_portada",'pie');
	echo "$encabezado";		
		?>
		
<?php if(isset($_REQUEST[change])){
echo cambiar_password_formato("$_REQUEST[change]");
}
revisar_ingreso();?>		

<?php echo $pie; ?>
<img class='img-responsive center-block' src="images/logo.png" alt="MILFS">
		</div>

<?php
/*session_start();
// Comprobamos si existe la variable
if ( !isset ( $_SESSION['grupo'] ) ) {
 // Si no existe 
 header("Location: includes/error.php");
// echo "hola 2";
} */

/*if($_SESSION[prioridad] <= '2'){  }else{
 echo consultar_formulario();
 */
/*
formulario_importar("","");
 echo "<div id='importador' name='importador'>";
 echo "</div> ";
 */







/*formulario_consultar('','');
if($_REQUEST[id] !=''){$onload ="<script type=\"text/javascript\"> xajax_formulario_areas('despacho','$_REQUEST[id]')</script>";}
?>
<div id='despacho'  name='despacho' class='div_flotante'  style="top:500px; left:500px; position:absolute; "  ></div> 
<?php echo "$onload "; 
}///fin de la seguridad
*/

?>


<!-- Modal -->

<div class='modal fade ' id='muestraInfo' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
  <div class='modal-dialog' >
    <div class='modal-content'>
      <div class='modal-header' >
        <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
        <h4 class='modal-title' id='myModalLabel_info'><div id='titulo_modal'></div></h4>
      </div>
      <div class='modal-body'>

       <div id='muestra_form'></div>
      </div>
      <div class='modal-footer' id='pie_modal'>
        
       
      </div>
    </div>
  </div>
</div>

	</div>


       <div class="">
	       <div class="container">
        <a href='http://QWERTY.co/milfs'>&copy; MILFS Un proyecto de http://QWERTY.co</a> Se distribuye bajo licencia GPL V3
        <a target="_blank" href='http://qwerty.co/faq/category/19/privacidad-y-protecci%C3%B3n-de-datos.html'>Políticas de privacidad y protección de datos.</a> 
        	</div> 
      </div>
      <?php } ?>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
      <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.js"></script>
  <script src="js/markdown.js"></script>
  <script src="js/to-markdown.js"></script>
  <script src="js/bootstrap-markdown.js"></script>
      <script src="js/scripts.js"></script>
<!-- <script src="js/jquery.min.js"></script> 
<script src="js/bootstrap.min.js"></script>
    <script src="js/scripts.js"></script>
<script src="js/bootstrap-markdown.js"></script>
<script src="js/markdown.js"></script>
<script src="js/to-markdown.js"></script>
<script src="js/bootstrap-markdown.js"></script>
 -->
</body>
</html>