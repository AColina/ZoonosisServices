<?php

/**
 * Created by PhpStorm.
 * User: Xea
 * Date: 4/6/2016
 * Time: 5:04 PM
 */
use Doctrine\ORM\Query\ResultSetMapping;

require '../../../pdo/QueryBuilder.php';

$nombreMunicipio = isset($_GET['nombreMunicipio']) ? $_GET['nombreMunicipio'] : NULL;
if ($nombreMunicipio == NULL) {
    die('El parametro nombreMunicipio es requerido');
}
$dia = isset($_GET['dia']) ? $_GET['dia'] : NULL;
if ($dia == NULL) {
    die("El parametro dia es requerido");
}


//echo $nombreMunicipio;
//$dia = date("Y/m/d", strtotime($dia))."<br>";
//$qb = new QueryBuilder('SELECT a FROM Municipio a');
//$r = $qb->agregarCondicion("a.nombre","=",$nombreMunicipio,false,true)
//    ->ejecutarQuery(0);
//$qb = new QueryBuilder('SELECT a FROM Parroquia a');
//$r = $qb->ejecutarQuery(-1);
//var_dump($r);
//echo $json = H57\Util\Serializor::json_encode($r);
//$idMunicipio = $json[0]['id'];
//$entityManager = PDOManager::inicializarEntityManager();
//$qbb = $entityManager->createQueryBuilder();

//$qb = new QueryBuilder('SELECT a FROM Parroquia a JOIN Municipio m');
//$r = $qb->agregarCondicion("m.nombre", "=", $nombreMunicipio, false, true)
//        ->ejecutarQuery(0);
//
//$json = H57\Util\Serializor::json_encode($r, true);
////echo $json;
//
//$json = json_decode($json, true);
//
//$listaIdVacunaciones;

//foreach ($json as $item['vacunaciones'] => $key) {
////$json = json_encode($item['vacunaciones'],true);
//    // echo var_dump($key['vacunaciones']);
//
//    if (!empty($key['vacunaciones'])) {
//
//        foreach ($key['vacunaciones'] as $vacunaciones) {
//
//            $fecha1 = date_create($dia)->format('Y-m-d');
//            $fecha2 = date_create($vacunaciones['fechaElaboracion'])->format('Y-m-d');
//
//
//            if ($fecha1 == $fecha2) {
//                //            echo "entre";
//                $listaIdVacunaciones[] = $vacunaciones['id'];
//            }
//        }
//
//        //  echo  $key['vacunaciones']['fechaElaboracion'];
//    }
//
//
//    //if($item['vacunaciones']== $dia){
//    //  echo "la fecha coincide";
//    // }
////echo $json;
//    //  echo "<br>";
//}

$fecha1 = date_create($dia)->format('Y-m-d');

//foreach ($listaIdVacunaciones as $id) {

    //  $qb = new QueryBuilder('SELECT r FROM Vacunacion a JOIN RegistroVacunacion r');
    // $r = $qb->agregarCondicion("a.id","=",$id,false,true)
    //    ->ejecutarQuery(0);
//    $query = $entityManager->createQuery(
    //       'SELECT r
    //       FROM Vacunacion a
    //      JOIN a.registroVacunacion r
    //     JOIN r.registroVacunacion_has_Animal rv
    //    WHERE a.id = :id'
    // )->setParameter('id',$id);
    // $r = $query->getResult();

//    $rsm = new ResultSetMapping();
//    $rsm->addEntityResult('registrovacunacion_has_animal', 're');
//    $rsm->addEntityResult('animal', 'a');
//    $rsm->addFieldResult('re', 'cantidad', 'cantidad');
//    $rsm->addMetaResult('re', 'animal_id', 'animal_id');
//    $rsm->addFieldResult('a', 'nombre', 'nombre');
//    $rsm->addMetaResult('a', 'id', 'id');
    //  $rsm->addFieldResult('re', 'animal', 'animal');
// build rsm here
//
//    $query = $entityManager->createNativeQuery('SELECT cantidad,nombre FROM vacunacion  INNER JOIN
//                                                 registrovacunacion  ON vacunacion.id = registrovacunacion.Vacunacion_id
//                                                 INNER JOIN registrovacunacion_has_animal ON
//                                                 registrovacunacion.id = registrovacunacion_has_animal.Registrovacunacion_id
//                                                 INNER JOIN animal ON
//                                                 registrovacunacion_has_animal.Animal_id = animal.id
//                                                 WHERE vacunacion.id = :id', $rsm);
//    $query->setParameter("id", $id);

    $pdo = new PDO("mysql:dbname=zoonosissystem;host=localhost", "root", "");



//    $query = "SELECT cantidad,nombre FROM vacunacion  INNER JOIN
//                                                 registrovacunacion  ON vacunacion.id = registrovacunacion.Vacunacion_id
//                                                 INNER JOIN registrovacunacion_has_animal ON
//                                                 registrovacunacion.id = registrovacunacion_has_animal.Registrovacunacion_id
//                                                 INNER JOIN animal ON
//                                                 registrovacunacion_has_animal.Animal_id = animal.id
//                                                 WHERE vacunacion.id = "+$id;
  $st =  $pdo->prepare("Select registrovacunacion_has_animal.cantidad, animal.nombre "
            . "FROM municipio "
            . "INNER JOIN parroquia "
            . "ON municipio.id = parroquia.Municipio_id "
            . "INNER JOIN vacunacion "
            . "ON parroquia.id = vacunacion.Parroquia_id "
            . "INNER JOIN registrovacunacion "
            . "ON vacunacion.id = registrovacunacion.Vacunacion_id "
            . "INNER JOIN registrovacunacion_has_animal "
            . "ON registrovacunacion.id = registrovacunacion_has_animal.Registrovacunacion_id "
            . "INNER JOIN animal "
            . "ON registrovacunacion_has_animal.Animal_id = animal.id " 
            . "WHERE municipio.nombre = :nombreMunicipio AND vacunacion.fechaElaboracion = :fecha");
    $st->bindParam(':nombreMunicipio', $nombreMunicipio);
    $st->bindParam(':fecha', $fecha1);
//    echo $fecha1;
    $resultado = $st->execute();
    
 echo   json_encode($st->fetchAll());
    
//    $query =  "Select registrovacunacion_has_animal.cantidad, animal.nombre "
//            . "FROM municipio "
//            . "INNER JOIN parroquia "
//            . "ON municipio.id = parroquia.Municipio_id "
//            . "INNER JOIN vacunacion "
//            . "ON parroquia.id = vacunacion.Parroquia_id "
//            . "INNER JOIN registrovacunacion "
//            . "ON vacunacion.id = registrovacunacion.Vacunacion_id "
//            . "INNER JOIN registrovacunacion_has_animal "
//            . "ON registrovacunacion.id = registrovacunacion_has_animal.Registrovacunacion_id "
//            . "INNER JOIN animal "
//            . "ON registrovacunacion_has_animal.Animal_id = animal.id " 
//            . "WHERE municipio.nombre = :nombreMunicipio AND vacunacion.fechaElaboracion(date) = ";
  //  echo $query;
  //  $resultado = $pdo->query($query);

//    var_dump($resultado);
//    
//    foreach($resultado as  $row) {
//        echo $row['nombre'] . '<br/>';
//    }

   // var_dump($resultado);

//    $pdo->prepare("SELECT cantidad,nombre FROM vacunacion  INNER JOIN
//                                                 registrovacunacion  ON vacunacion.id = registrovacunacion.Vacunacion_id
//                                                 INNER JOIN registrovacunacion_has_animal ON
//                                                 registrovacunacion.id = registrovacunacion_has_animal.Registrovacunacion_id
//                                                 INNER JOIN animal ON
//                                                 registrovacunacion_has_animal.Animal_id = animal.id
//                                                 WHERE vacunacion.id = :id")->setAttribute("id", $id);
    //$pdo->
//echo $query->getSQL();
    // $resultado = $query->getResult();
    // var_dump($query->getResult());
    // echo json_encode($resultado);
    //echo $resultado;
    //  $json = H57\Util\Serializor::json_encode($resultado,true);
//echo $json;
    //  $json = json_decode($json, true);
//}


//$municipio = Municipio::fromJson($json);

//echo $json[4];

//$qb = new QueryBuilder("SELECT a FROM Animal a");
//$r = $qb->ejecutarQuery(-1);

//$r = $qb->agregarCondicion("p.cedula", "=", $cedula, false, true)
  //  ->ejecutarQuery();

//echo json_encode($r,true);

//echo H57\Util\Serializor::json_encode($r,true);