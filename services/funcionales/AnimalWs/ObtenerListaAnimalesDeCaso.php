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

$st = $pdo->prepare("Select SUM(animal_has_caso.cantidadIngresado) "
        . "FROM parroquia "
        . "INNER JOIN caso "
        . "ON parroquia.id = caso.Parroquia_id "
        . "INNER JOIN animal_has_caso "
        . "ON caso.id = animal_has_caso.Caso_id "
        . "INNER JOIN animal "
        . "ON animal_has_caso.Animal_id = animal.id "
        . "WHERE caso.fechaElaboracion "
        . "BETWEEN :fecha AND LAST_DAY( :fecha )");

$st->bindParam(':fecha', $fecha1);

$resultado = $st->execute();

echo json_encode($st->fetch()[0]);