
<?php

require '/pdo/PDOManager.php';
require './pdo/entidades/administracion/Permiso.php';
require './pdo/entidades/administracion/Municipio.php';
require './pdo/entidades/administracion/Parroquia.php';
$pdo = new PDOManager();

//$o = $pdo->obtenerEntidad(Municipio::class, 1);

$o = $pdo->ejecutarQuery("SELECT Distinct m FROM Municipio m JOIN m.parroquias p Where p is not null Order By m.nombre", NULL, -1);
//echo $pdo->getUltimoQuery();
//echo H57\Util\Serializor::json_encode($o);
echo json_encode($o);

