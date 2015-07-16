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
echo "<h2>Agregar licencia al conjunto</h2>";

//agregar el oc (obra) a la coleccion
$YABALA->add("", "", "", "", $_POST["cc"]);

//agregar el oc (obra) a la bd para que pueda ser recuperado en busquedas
//(esto no es obligatorio, el desarrollador puede optar por hacerlo o no)
//$YABALA->insert($_POST["format"], $_POST["keywords"], $_POST["autor"], $_POST["url"], $_POST["cc"]);

//Enviar la variable a disco 
$dump = serialize($YABALA);
file_put_contents('work/'.$nombre, $dump);

//formulario para volver al administrador
echo "<form name='back' method='post' action='admin.php' class='add'>";
echo "<div class='add'>Licencia agregada: ".$_POST["cc"]."</div>";
echo "<input name='nombre' value='$nombre' type='hidden' />";
echo "<input value='VOLVER' type='submit' />";
echo "</form>";

?>


</body>
</html>