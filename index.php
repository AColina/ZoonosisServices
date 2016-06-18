
<?php
require_once '/pdo/QueryBuilder.php';

$qb = new QueryBuilder("SELECT p FROM Parroquia p JOIN p.municipio m");
$r=$qb->agregarCondicion("LOWER(m.nombre)", "=", "Maracaibo")
        ->agregarCondicion("LOWER(p.nombre)", "=", "Idelfonso Vásquez")
        ->ejecutarQuery();
var_dump($r);