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
date_default_timezone_set("America/Caracas");

require_once '/../../../pdo/ServicesImport.php';
require_once '/../../../pdo/Des.php';

$json = file_get_contents('php://input');

$pdo = new PDOManager();
$em = $pdo->inicializarEntityManager();
$em->clear();
$caso = Caso::fromJson($json);

$em->beginTransaction();

$parroquia = $em->find(Parroquia::class, $caso->getParroquia()->getId());
$semana = $em->find(Semana::class, $caso->getSemana()->getId());

$animal_has_casos = $caso->getAnimal_has_Caso();

if ($caso->getId() == NULL) {
    $fecha = date_create($caso->getFechaElaboracion())->format('Y-m-d');
    $caso = new \Caso();
    $caso->setParroquia($parroquia);
    $caso->setSemana($semana);
        
    $caso->setFechaElaboracion(new DateTime($fecha));
    $em->persist($caso);
    $em->flush();
}else{
    echo 'no crea';
}
$caso = $em->find(Caso::class, $caso->getId());

foreach ($animal_has_casos as $animal_has_caso) {
    if ($animal_has_caso->getId() == NULL) {
        $tem = new Animal_has_Caso();
        $animal = $em->find(Animal::class, $animal_has_caso->getAnimal()->getId());

        $tem->setCantidadIngresado($animal_has_caso->getCantidadIngresado());
        $tem->setCantidadPositivos($animal_has_caso->getCantidadPositivos());
        $tem->setAnimal($animal);
        $tem->setCaso($caso);

        $animal->getAnimal_has_Caso()->add($tem);
        $caso->getAnimal_has_Caso()->add($tem);
    } else {
        $animal_has_caso->setCaso($caso);
        $animal_has_caso = $em->merge($animal_has_caso);
        $em->flush();
    }
}

$em->flush();
$em->commit();
$em->close();
echo Des::toJson(Caso::class, $caso);
