<?php



require '../../../pdo/QueryBuilder.php';

$dia = isset($_GET['dia']) ? $_GET['dia'] : NULL;
if ($dia == NULL) {
    die("El parametro dia es requerido");
}

$fecha1 = date_create($dia)->format('Y-m-d');

$db = PDOManager::db;
$host = PDOManager::host;
$user = PDOManager::user;
$pass = PDOManager::pass;
$con = 'mysql:dbname=' .$db. ';host=' . $host;
$pdo = new PDO($con, $user, PDOManager::pass);

$st = $pdo->prepare("Select SUM(registrovacunacion_has_animal.cantidad) "
        . "FROM parroquia "
        . "INNER JOIN vacunacion "
        . "ON parroquia.id = vacunacion.Parroquia_id "
        . "INNER JOIN registrovacunacion "
        . "ON vacunacion.id = registrovacunacion.Vacunacion_id "
        . "INNER JOIN registrovacunacion_has_animal "
        . "ON registrovacunacion.id = registrovacunacion_has_animal.Registrovacunacion_id "
        . "INNER JOIN animal "
        . "ON registrovacunacion_has_animal.Animal_id = animal.id "
        . "WHERE vacunacion.fechaElaboracion "
        . "BETWEEN :fecha AND LAST_DAY( :fecha )");
$st->bindParam(':fecha', $fecha1);
//echo $fecha1;
//echo $st->queryString;
$resultado = $st->execute();


echo json_encode($st->fetch()[0]);