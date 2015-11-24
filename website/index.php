<?php session_start(); 
//ini_set('display_errors', 'On');
if(isset($_REQUEST['debug'])) {ini_set('display_errors', 'On');} 
	require ('milfs/xajax/xajax.inc.php');
	$xajax = new xajax();
	require ("milfs/funciones/conex.php");
   require ('milfs/funciones/funciones.php');
   require ("milfs/includes/markdown.php");
   require ("milfs/includes/simple_html_dom.php");
	$xajax->processRequests();  ?>
<!DOCTYPE html>
<html lang="en">
   <head >
   <meta http-equiv="Cache-control" content="public">
    <meta charset="utf-8">
    <meta name="viewport" content="user-scalable=no, width=device-width,  maximum-scale=1,  initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="fredyrivera" >
	<link rel="shortcut icon" href="milfs/favicon-152.png">
	<link rel="apple-touch-icon-precomposed" href="milfs/favicon-152.png">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" integrity="sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==" crossorigin="anonymous">
	<?php $xajax->printJavascript("milfs/xajax/");  ?>
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha256-k2/8zcNbxVIh5mnQ52A0r3a6jAgMGxFJFE2707UxGCk= sha512-ZV9KawG2Legkwp3nAlxLIVFudTauWuBpC10uEafMHYL0Sarrz5A7G79kXh5+5+woxQ5HM559XX2UZjMJ36Wplg==" crossorigin="anonymous">
	<script src="milfs/js/scripts.js"></script>
<?php 
	

   
//$xajax->debugOn('');
$embebido =0;
$onload="";
if (isset($_REQUEST['form'])) {$form = $_REQUEST['form'];} else {$form = "";}
if (isset($_REQUEST['identificador'])) {$identificador = $_REQUEST['identificador'];} else {$identificador = NULL ;}
$acceso = 0;
if(	@$_REQUEST['empresa'] =="") { $id_empresa = "1";}
else { $id_empresa = $_REQUEST['empresa'];}
$id = remplacetas('empresa','id',"$id_empresa",'id','') ;
if($id[0]=="") { $id_empresa = "1";}
	if(!isset($_REQUEST['set'])){
	$titulo = remplacetas('empresa','id',"$id_empresa",'razon_social','') ;
	$descripcion = remplacetas('empresa','id',"$id_empresa",'slogan','') ;
	$background_imagen = buscar_imagen('',"","","$id_empresa"); 
	$uri_set = "";
	$acceso = 1;
	}
	else {
		$empresa = 	remplacetas('form_id','id',$_REQUEST['set'],'id_empresa',"") ;
		$id_empresa = $empresa[0];
		$titulo = 	remplacetas('form_id','id',$_REQUEST['set'],'nombre',"") ;
		$descripcion = 	remplacetas('form_id','id',$_REQUEST['set'],'descripcion',"") ;
		$background_imagen = buscar_imagen($_REQUEST['set'],"","","$id_empresa"); 
		$uri_set = "";
		$publico = remplacetas('form_id','id',$_REQUEST['set'],'publico',"") ;
			if($publico[0] =='1') {$acceso = 1;}
	
	}
	if( isset($identificador)){
		$form = 	remplacetas('form_datos','control',$identificador,'form_id',"") ;	
			if (isset($_REQUEST['t'])) {
				$t = $_REQUEST['t'];
				//$opciones= array();
				//$opciones[]= "$identificador";
				$onload =" <script type=\"text/javascript\">xajax_formulario_embebido_ajax($form[0],'$identificador','edit')</script>";
				} else {$t = "";}
		$empresa = 	remplacetas('form_datos','control',$_REQUEST['identificador'],'id_empresa',"") ;	
		$id_empresa = $empresa[0];
		
		$titulo = 	remplacetas('form_id','id',$form['0'],'nombre',"") ;
		$descripcion = 	remplacetas('form_id','id',$form['0'],'descripcion',"") ;
		$background_imagen = buscar_imagen("$form[0]",$_REQUEST['identificador'],"","$id_empresa");
		$uri_set = "<a class='' href='?set=$form[0]'>$titulo[0]</a>";
				$publico = remplacetas('form_id','id',$form[0],'publico',"") ;
			if($publico[0] =='1') {$acceso = 1;}
		}
	elseif( isset($form)){
		if($form!=''){ 
						$onload =" <script type=\"text/javascript\">xajax_formulario_embebido_ajax('$form','$opciones','nuevo')</script>";
							// echo formulario_embebido($form,$opciones);
							}
		
		}
		elseif( isset($_REQUEST['psi'])){$onload ="<script type=\"text/javascript\"> xajax_mostrar_psi()</script>";}
	else{}
$logo = remplacetas('empresa','id',"$id_empresa",'imagen','') ;
$direccion = remplacetas('empresa','id',"$id_empresa",'direccion','') ;
$telefono = remplacetas('empresa','id',"$id_empresa",'telefono','') ;
$email = remplacetas('empresa','id',"$id_empresa",'email','') ;
$facebook = remplacetas('empresa','id',"$id_empresa",'facebook','') ;
$twitter = remplacetas('empresa','id',"$id_empresa",'twitter','') ;

$razon_social = remplacetas('empresa','id',"$id_empresa",'razon_social','') ;
$sigla = remplacetas('empresa','id',"$id_empresa",'sigla','') ;



	?>

    <!-- Custom CSS -->
    <!-- Custom Fonts -->
    
    <link href="http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
<style type="text/css">
/*!
 * Start Bootstrap - Landing Page Bootstrap Theme (http://startbootstrap.com)
 * Code licensed under the Apache License v2.0.
 * For details, see http://www.apache.org/licenses/LICENSE-2.0.
 */

body,
html {
	 background-color: #A4A4A4;
    width: 100%;
    height: 100%;
}

body,
h1,
h2,
h3,
h4,
h5,
h6 {
    font-family: "Lato","Helvetica Neue",Helvetica,Arial,sans-serif;
    font-weight: 700;
}
fieldset.fieldset-borde {

    border: 2px solid #EDEDED !important;
    border-radius:3px;
    padding: 0 1.4em 1.4em 1.4em !important;
    margin: 0 0 1.5em 0 !important;
    -webkit-box-shadow:  0px 0px 0px 0px #000;
            box-shadow:  0px 0px 0px 0px #000;
}

legend.legend-area {
        font-size: 1.2em !important;
        font-weight: bold !important;
        text-align: left !important;
        width:auto;
        padding:0 10px;
        border-bottom:none;
    }

.modal-dialog {
  min-width: 600px;
  height: auto;
  padding: 0;
}

.modal-content {
  height: auto;
}

.topnav {
    font-size: 14px; 
}

.lead {
    font-size: 18px;
    font-weight: 400;
}

.intro-header {
    padding-top: 50px; /* If you're making other pages, make sure there is 50px of padding to make sure the navbar doesn't overlap content! */
    padding-bottom: 50px;
    text-align: center;
    color: #f8f8f8;
    background: url(milfs/images/secure/?file=600/<?php echo $background_imagen; ?> ) no-repeat center center;
    background-size: cover;
}

.intro-message {
    position: relative;
    padding-top: 20%;
    padding-bottom: 20%;
    /*background: url(images/transparente50.png ) ;*/
}

.intro-message > h1 {
    margin: 0;
    text-shadow: 2px 2px 3px rgba(0,0,0,0.6);
    font-size: 5em;
    border-radius: 3px;
    background: url(milfs/images/oscuro40.png ) ;
}

.intro-divider {
    width: 400px;
    border-top: 1px solid #f8f8f8;
    border-bottom: 1px solid rgba(0,0,0,0.2);
}

.intro-message > h3 {
    text-shadow: 2px 2px 3px rgba(0,0,0,0.6);
    background: url(images/oscuro40.png ) ;
    border-radius: 3px;
}

@media(max-width:767px) {
    .intro-message {
        padding-bottom: 15%;
    }

    .intro-message > h1 {
        font-size: 3em;
    }

    ul.intro-social-buttons > li {
        display: block;
        margin-bottom: 20px;
        padding: 0;
    }

    ul.intro-social-buttons > li:last-child {
        margin-bottom: 0;
    }

    .intro-divider {
        width: 100%;
    }
}

.network-name {
    text-transform: uppercase;
    font-size: 14px;
    font-weight: 400;
    letter-spacing: 2px;
}

.content-section-a {
    padding: 50px 0;
    background-color: #f8f8f8;
    border-radius: 5px;
    margin: 10px;
}

.content-section-b {
    padding: 50px 0;
    border-top: 1px solid #e7e7e7;
    border-bottom: 1px solid #e7e7e7;
}

.section-heading {
    margin-bottom: 30px;
}

.section-heading-spacer {
    float: left;
    width: 200px;
    border-top: 3px solid #e7e7e7;
}

.banner {
    padding: 100px 0;
    color: #f8f8f8;
    background: url(../img/banner-bg.jpg) no-repeat center center;
    background-size: cover;
}

.banner h2 {
    margin: 0;
    text-shadow: 2px 2px 3px rgba(0,0,0,0.6);
    font-size: 3em;
}

.banner ul {
    margin-bottom: 0;
}

.banner-social-buttons {
    float: right;
    margin-top: 0;
}

@media(max-width:1199px) {
    ul.banner-social-buttons {
        float: left;
        margin-top: 15px;
    }
}

@media(max-width:767px) {
    .banner h2 {
        margin: 0;
        text-shadow: 2px 2px 3px rgba(0,0,0,0.6);
        font-size: 3em;
    }

    ul.banner-social-buttons > li {
        display: block;
        margin-bottom: 20px;
        padding: 0;
    }

    ul.banner-social-buttons > li:last-child {
        margin-bottom: 0;
    }
}

footer {
    padding: 50px 0;
    background-color: #f8f8f8;
}

p.copyright {
    margin: 15px 0 0;
}
</style>
</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top topnav" role="navigation">
        <div class="container topnav">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand topnav" href="?empresa=<?php echo $id_empresa; ?>"><i class='fa fa-home'></i> <?php echo $sigla[0]; ?></a>
                
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav ">
                <li><?php echo $uri_set; ?></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="milfs/?ingresar">Ingresar</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>


    <!-- Header -->
    <a name="about"></a>
    <div class="intro-header">
        <div class="container">

            <div class="row">
                <div class="col-lg-12">
                    <div class="intro-message">
                   
                        <h1><?php echo $titulo[0]; ?></h1>
                        
                        <h3><?php echo $descripcion[0]; ?></h3>
                        <hr class="intro-divider">
                        <ul class="list-inline intro-social-buttons">
                            <li>
                                <a target='redes' href="https://twitter.com/<?php echo $twitter[0]; ?>" class="btn btn-default btn-lg"><i class="fa fa-twitter fa-fw"></i> <span class="network-name">@<?php echo $twitter[0]; ?></span></a>
                            </li>
                            <li>
                                <a target='redes' href="https://github.com/humano/milfs/" class="btn btn-default btn-lg"><i class="fa fa-github fa-fw"></i> <span class="network-name">Github</span></a>
                            </li>
                            <li>
                                <a target='redes'  href="https://www.facebook.com/<?php echo $facebook[0]; ?>" class="btn btn-default btn-lg"><i class="fa fa-facebook fa-fw"></i> <span class="network-name"><?php echo $facebook[0]; ?></span></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>
        <!-- /.container -->

    </div>
    <!-- /.intro-header -->

    <!-- Page Content -->
    <a  name="formularios"></a>
    
<?php
if($acceso ==1) {
if(isset($_REQUEST['set'])) { 
	echo landingpage_contenido_formulario($_REQUEST['set']); }
	elseif(isset($_REQUEST['identificador'])) { echo landingpage_contenido_identificador($_REQUEST['identificador']); }
else{ echo landingpage_contenido($id_empresa);}
}
 ?>
	
    

	<a  name="contact"></a>
    <div class="banner">

        <div class="container">

            <div class="row">
                <div class="col-lg-4">
                    <h2>Conéctate:</h2>
                </div>
                <div class="col-lg-8">
                    <ul class="list-inline banner-social-buttons">
                       		<li>
                                <a target='redes' href="https://twitter.com/<?php echo $twitter[0]; ?>" class="btn btn-default btn-lg"><i class="fa fa-twitter fa-fw"></i> <span class="network-name"><?php echo $twitter[0]; ?></span></a>
                            </li>
                            <li>
                                <a target='redes' href="https://github.com/humano/milfs/" class="btn btn-default btn-lg"><i class="fa fa-github fa-fw"></i> <span class="network-name">Github</span></a>
                            </li>
                            <li>
                                <a target='redes'  href="https://www.facebook.com/<?php echo $facebook[0]; ?>" class="btn btn-default btn-lg"><i class="fa fa-facebook fa-fw"></i> <span class="network-name"><?php echo $facebook[0]; ?></span></a>
                            </li>
                    </ul>
                </div>
            </div>

        </div>
        <!-- /.container -->

    </div>
    <!-- /.banner -->
<!-- Modal -->

<div class='modal fade ' id='muestraInfo' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
  <div class='modal-dialog modal-lg' >
    <div class='modal-content'>
      <div class='modal-header' >
        <button type='button' class='close' data-dismiss='modal' aria-hidden='true'><i class='fa fa-times-circle'></i></button>
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
<!-- Modal -->
    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="list-inline">
                        <li>
                            <a href="#">Home</a>
                        </li>
                        <li class="footer-menu-divider">&sdot;</li>
                        <li>
                            <a href="#formularios">Contenido</a>
                        </li>
                        <li class="footer-menu-divider">&sdot;</li>
                        <li>
                            <a href="#contact">Contacto</a>
                        </li>
                    </ul>
                    <p class="copyright text-muted small"> <a href='http://QWERTY.co/milfs'>&copy; MILFS Un proyecto de http://QWERTY.co</a> Se distribuye bajo licencia GPL V3
        						<a href="milfs/?psi" ><i class="fa fa-smile-o "></i> Políticas de privacidad y protección de datos.</a></p>
                </div>
            </div>
        </div>
    </footer>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <?php echo $onload;  ?>
</body>
<?php //} ?>
</html>