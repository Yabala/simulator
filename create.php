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

<h1>SIMULATOR</h1>

<?php

include_once("../yabala/iyabala.php");



//nombre del archivo a abrir
$nombre = mt_rand().time();

//Crear la OP vacía
$YABALA = new yabala();


if (file_exists('work/'.$nombre)) {//si el archivo existe lo carga
    $s = file_get_contents('work/'.$nombre);
	$YABALA = unserialize($s);
$YABALA = unserialize($s);
} else {//el archivo no existe y lo crea
    $dump = serialize($YABALA);
	file_put_contents('work/'.$nombre, $dump);
}

?>


<form name="back" method="post" action="admin.php">

<input name="nombre" value="<?php echo $nombre ?>" type="hidden" />

<input value="INGRESAR A SIMULADOR" type="submit" />

</form>

</body>
</html>