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

//Encabezado
echo "<h1>SIMULATOR</h1>";
echo "<h2>Borrar licencia del conjunto</h2>";

//quitar el oc (obra) de la coleccion
if (isset($_POST["works"])) {
	$mensaje = "La licencia fue borrado del conjunto";
	$YABALA->del($_POST["works"]);
}else{
	$mensaje = "No seleccionó ninguna licencia para borrar del conjunto";
}

//Enviar la variable a disco
$dump = serialize($YABALA);
file_put_contents('work/'.$nombre, $dump);


//formulario para volver al administrador
echo "<form name='back' method='post' action='admin.php' class='add'>";
echo "<div class='add'>$mensaje</div>";
echo "<input name='nombre' value='$nombre' type='hidden' />";
echo "<input value='VOLVER' type='submit' />";
echo "</form>";

?>


</body>
</html>