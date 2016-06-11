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

require_once '/../../../pdo/Des.php';

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
} else if ($novedad->getCliente()->getPersona()->getId() != NULL && $novedad->getCliente()->getId() == NULL) {
    $temp = $novedad->getCliente();
    $temp->setPersona($em->find(Persona::class, $novedad->getCliente()->getPersona()->getId()));
    $cliente = crearCliente($temp, $em);
} else {
    $temp = $novedad->getCliente();
    $persona = new \Persona();
    $persona->setNombre($temp->getPersona()->nombre);
    $persona->setApellido($temp->getPersona()->apellido);
    $persona->setCedula($temp->getPersona()->cedula);
    $temp->setPersona($persona);
    $cliente = crearCliente($temp, $em);
}
$em->flush();

if ($novedad->getId() == NULL) {
    $nov = new \Novedades();
    $nov->setFechaElaboracion(new DateTime());
    $nov->setCliente($cliente);
    $nov->setDescripcion($novedad->getDescripcion());
    $nov->setUsuario($usuario);
    $nov->setNombre($novedad->getNombre());

    $usuario->getNovedades()->add($nov);
    $cliente->getNovedades()->add($nov);
    $em->flush();
    $novedad = $nov;
}

$em->flush();
$em->commit();
$em->close();
echo Des::toJson(Novedades::class, $novedad);

function crearCliente($cliente, \Doctrine\ORM\EntityManager $em) {
    if ($cliente->getId() == null) {
        $cl = new \Cliente();
        $persona = $cliente->getPersona();
        $parroquia = $em->find(Parroquia::class, $cliente->getPersona()->getId());

        $cl->setPersona($persona);
        $cl->setCorreo($cliente->getCorreo());
        $cl->setDireccion($cliente->getDireccion());
        $cl->setTelefono($cliente->getTelefono());
        $cl->setParroquia($parroquia);

        $parroquia->getClientes()->add($cl);
        $persona->setCliente($cl);
        $em->flush();
        return $cl;
    }
}
