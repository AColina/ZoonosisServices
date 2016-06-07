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
$novedad = Novedades::fromJson($json);

$em->beginTransaction();

$usuario = $em->find(Usuario::class, $novedad->getUsuario()->getId());
$cliente = null;

if ($novedad->getCliente()->getId() != NULL) {
    $cliente = $em->find(Cliente::class, $novedad->getCliente()->getId());
} else if ($novedad->getCliente()->getPersona()->getId() != NULL) {
    $cliente = $novedad->getCliente();
    $cliente->setPersona($em->find(Persona::class, $novedad->getCliente()->getPersona()->getId()));
} else {
    $cliente = $novedad->getCliente();
}
if ($novedad->getId() == NULL) {
    $novedad = new \Novedades();
    $novedad->setParroquia($parroquia);
    $novedad->setSemana($semana);
    $novedad->setFechaElaboracion(new DateTime());
    $em->persist($novedad);
    $em->flush();
}
$em->flush();
$em->commit();
$em->close();
echo H57\Util\Serializor::json_encode($novedad);
