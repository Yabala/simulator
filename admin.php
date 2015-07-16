<?php



// This file is part of Simulator https://github.com/Yabala/simulator
//
// Calculator is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Simulator is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Simulator.  If not, see <http://www.gnu.org/licenses/>.



?>



<html>
<head>
  <link rel="stylesheet" href="css/style.css">
</head>

<body>

<?php

include_once("../yabala/iyabala.php");

//Cargar la variable $YABALA
$nombre = $_POST["nombre"];
$s = file_get_contents('work/'.$nombre);
$YABALA = new yabala();
$YABALA = unserialize($s);

?>


<!-- ------------------------------------------------------------------------------------------------------------------>
<!-- INICIO ENCABEZADO ------------------------------------------------------------------------------------------------>
<!-- ------------------------------------------------------------------------------------------------------------------>

<h1>SIMULATOR</h1>
<h2>Administración de las licencia del conjunto</h2>

<!-- ------------------------------------------------------------------------------------------------------------------>
<!-- FIN ENCABEZADO --------------------------------------------------------------------------------------------------->
<!-- ------------------------------------------------------------------------------------------------------------------>








<!-- ------------------------------------------------------------------------------------------------------------------>
<!-- INICIO FORMULARIO AGREGAR LICENCIA ----------------------------------------------------------------------------------->
<!-- ------------------------------------------------------------------------------------------------------------------>
<form name='ocADD' method='post' action='add.php' class='admin'>

<div class='admin'>
Si quiere agregar una licencia seleccionela y luego haga clic en el botón "AGREGAR LICENCIA". 
</div>

<table>

<tr>
<td>
LICENCIA:
</td>
<td>
<select name='cc'>

	<?php
		//Toma la lista de licencias definidas por YABALA
		$licenses = $YABALA->getLicenses(); 

		//Imprime opciones de la lista despegable por cada licencia definida por YABALA
		foreach ($licenses as $license) {
		    echo "<option value='$license'>$license</option>\n";
		}
	?>

</select>
</td>
</tr>

</table>

<input name='nombre' value='<?php echo $nombre ?>' type='hidden' />
<input value='AGREGAR LICENCIA' type='submit' />
</form>
<!-- ------------------------------------------------------------------------------------------------------------------>
<!-- FIN FORMULARIO AGREGAR LICENCIA -------------------------------------------------------------------------------------->
<!-- ------------------------------------------------------------------------------------------------------------------>










<!-- ------------------------------------------------------------------------------------------------------------------>
<!-- INICIO FORMULARIO ADMINISTRAR LICENCIA ------------------------------------------------------------------------------>
<!-- ------------------------------------------------------------------------------------------------------------------>

<?php

$works = $YABALA->getWorks();
if ($works!=null){//HAY LICENCIAS QUE ADMINISTRAR	
	echo "<form name='ocDel' method='post' action='del.php' class='admin'>\n";
	echo "<div class='admin'>Listado de licencias agregadas, si quiere borrar una licencia seleccionela y haga clic en el botón \"BORRAR LICENCIA\".</div>";
	echo "<input name='nombre' value='".$nombre."' type='hidden' />\n";

	echo "<table class='admin'>";
	echo "<tr class='admin'><td class='admin'></td><td class='admin'>Licencia</td></tr>";
	
	foreach ($works as $key => $work){
		echo "<tr class='admin'><td class='admin'><input type='radio' name='works' value='$key'>";
		//$a=0;
		//print_r($work);
		//foreach ($work as $field){
			//$field1 = (string) $field;
			echo "<td class='admin'>".$work[4]."</td>";
			//echo "$a<p>";
			//$a = $a+1;
		//}
		echo "</tr>";
	}
	echo "</table>";
	echo "<input value='BORRAR LICENCIA' type='submit' />\n";
	echo "</form>\n";
}else{//NO HAY LICENCIA QUE ADMINISTRAR
	echo "<div class='admin'>NO HAY LICENCIAS PARA LISTAR</div>";
}
?>
<!-- ------------------------------------------------------------------------------------------------------------------>
<!-- FIN FORMULARIO ADMINISTRAR LICENCIA --------------------------------------------------------------------------------->
<!-- ------------------------------------------------------------------------------------------------------------------>










<!-- ------------------------------------------------------------------------------------------------------------------>
<!-- INICIO LICENCIAS DISPONIBLES ------------------------------------------------------------------------------->
<!-- ------------------------------------------------------------------------------------------------------------------>
<?php

$licencias = $YABALA->calculator();
$obras = $YABALA->getWorks();

if (($licencias!=null)&&($obras!=null)){//HAY LICENCIAS POR LAS CUALES OPTAR y LICENCIAS EN EL CONJUNTO
	echo "<form class='admin'>\n";
	echo "<div class='admin'>Las licencias disponibles para una obra derivada con la actual combinación de licencias, se lista a continuación:</div>";
	//echo "<input name='nombre' value='".$nombre."' type='hidden' />\n";
	//echo "\n"; 
	echo "<table>\n";
	foreach ($licencias as $item){
		echo "<tr><td>$item</td></tr>\n";
	}
	echo "</table>\n";
	//echo "<br>\n";
	//echo "<input value='CREAR CRÉDITOS' type='submit' />\n";
	echo "</form>\n";
}else{//NO HAY LICENCIAS POR LAS CUALES OPTAR O NO HAY LICENCIAS EN EL CONJUNTO
	if ($licencias==null){//NO HAY LICENCIAS
		echo "<div class='admin'>LA ACTUAL COMBINACIÓN DE LICENCIAS NO ADMITE GENERAR OBRAS DERIVADAS</div>";
	}else{//NO HAY MATERIALES
		echo "<div class='admin'>DEBE AGREGAR LICENCIAS PARA PODER OPTAR POR UNA LICENCIA EN LA OBRA DERIVADA</div>";
	}
}
?>
<!-- ------------------------------------------------------------------------------------------------------------------>
<!-- FIN FORMULARIO LICENCIAS DISPONIBLES ---------------------------------------------------------------------------------->
<!-- ------------------------------------------------------------------------------------------------------------------>










</body>
</html>