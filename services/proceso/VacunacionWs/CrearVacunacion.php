<?php

/*
 * Copyright 2016 angel.colina.
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *      http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */


require_once '/../../../pdo/ServicesImport.php';

$json = file_get_contents('php://input');

$pdo = new PDOManager();
$em = $pdo->inicializarEntityManager();
$em->clear();
$vacunacion = Vacunacion::fromJson($json);

$em->beginTransaction();

$parroquia = $em->find(Parroquia::class, $vacunacion->getParroquia()->getId());
$semana = $em->find(Semana::class, $vacunacion->getSemana()->getId());

$registrovacunacions = $vacunacion->getRegistroVacunacion();
echo 'cant  regs : '.  count($registrovacunacions)."<br>";
if ($vacunacion->getId() == NULL) {
    $vacunacion = new \Vacunacion();
    $vacunacion->setParroquia($parroquia);
    $vacunacion->setSemana($semana);
    $vacunacion->setFechaElaboracion(new DateTime());
    $em->persist($vacunacion);
    $em->flush();
}
$vacunacion = $em->find(Vacunacion::class, $vacunacion->getId());

foreach ($registrovacunacions as $registrovacunacion) {
    echo "reges : ".count($registrovacunacion->getRegistroVacunacion_has_Animal())."<br>";
    if ($registrovacunacion->getId() == NULL) {
        $reg = new \RegistroVacunacion();
        $u = $em->find(Usuario::class, $registrovacunacion->getUsuario()->getId());
        $reg->setVacunacion($vacunacion);
        $reg->setUsuario($u);

        $u->getRegistroVacunacion()->add($reg);
        $vacunacion->getRegistroVacunacion()->add($reg);
        $em->flush();
        relacionar($em, $registrovacunacion, $reg);
        continue;
    }
    relacionar($em, $registrovacunacion, $registrovacunacion);
}

$em->flush();
$em->commit();
$em->close();
echo H57\Util\Serializor::json_encode($vacunacion);

function relacionar(Doctrine\ORM\EntityManager $em, RegistroVacunacion $oldRegistro, RegistroVacunacion $newRegistro) {

    $r = $oldRegistro->getRegistroVacunacion_has_Animal();
    echo count($r);
    foreach ($r as $regs) {
        echo 'call';
        $reg = new \RegistroVacunacion_has_Animal();
        $reg->setCantidad($regs->getCantidad());
        $animal = $em->find(Animal::class, $regs->getAnimal()->getId());

        $reg->setAnimal($animal);
        $reg->setRegistroVacunacion($newRegistro);
        $newRegistro->getRegistroVacunacion_has_Animal()->add($reg);
        $animal->getVacunacion_has_Animal()->add($reg);
        $em->flush();
    }
}

//var_dump($caso);
