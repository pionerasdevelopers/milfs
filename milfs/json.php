<?php
//ini_set('display_errors', 'On');
require ('xajax/xajax.inc.php');
$xajax = new xajax();
require ('funciones/funciones.php');
require ('funciones/convert.php');

	$fecha_inicio = mysql_seguridad($_REQUEST[inicio]);
	$fin = mysql_seguridad($_REQUEST[fin]);
	$perfil = mysql_seguridad($_REQUEST[id]);
	$id = mysql_seguridad($_REQUEST[id]);
	$busqueda = mysql_seguridad($_REQUEST[cadena]);
	$campo = buscar_campo_tipo($id,"14");
	$id_campo = $campo[0];
	  
$link=Conectarse();




	
	$consulta = "	SELECT  distinct(contenido) as data, control,form_datos.form_id as id, timestamp
					FROM form_datos
					WHERE form_datos.id_campo = '$id_campo' 
					AND form_id = '$id'
					";
					
// echo $consulta;

	mysql_query("SET NAMES 'UTF8'");


 $sql = mysql_query($consulta,$link) or die("error al ejecutar consulta  ");
 if (mysql_num_rows($sql)!='0'){
	$id = 1;
	$features = array();
while( $row = mysql_fetch_array( $sql ) ) {
	$marcador = array();
	$propiedades = array();
		//$marcador["id"] = $id;
		//$titulo = remplacetas("form_datos","control","$row[control]","contenido","id_campo ='28' AND timestamp ='$row[timestamp]'");
		//$marcador["id"] = $id;
		$campos = explode(" ",$row[data]);
														$lat = $campos[0];
														$lon = $campos[1];
														$zoom = $campos[2];	
		$marcador["type"] = "Point";
		$marcador["coordinates"] = array($lat,$lon);
		//$marcador["loc"] = array('lat'=>$lat,'lon'=>$lon);
		$formulario = formulario_imprimir($perfil,$row[control],'obligatorio');
		$propiedades["name"] ="$formulario";
		
		//formulario_imprimir($id,$control)
		//$marcador["zoom"] = $zoom;
		$geometria .= "{\"type\":\"Feature\",\"geometry\":".json_encode($marcador,JSON_NUMERIC_CHECK).",\"properties\":".json_encode($propiedades,JSON_NUMERIC_CHECK)."},";
		$features[] = $marcador;
 //$resultado .= "<li> $row[tipo]<br> <a href=\"#\" onclick=\"javascript:loadMarker($id);return false;\"><b>$row[title]</b></a><br>$row[description]<hr> </li>";
															
															$id++;
															}

}
//-75.58295 6.25578 16

//encode and output jsonObject
header('Content-Type: application/json');
//echo $consulta;
$resultado = " { \"type\": \"FeatureCollection\",
    \"features\": ";
$resultado .= json_encode($features,JSON_NUMERIC_CHECK);
$resultado .= "}";
//echo $resultado;
$geometria = substr("$geometria",0,-1);
$geometria = "{
    \"type\": \"FeatureCollection\",
    \"features\": [$geometria ]}";
echo $geometria;

?>