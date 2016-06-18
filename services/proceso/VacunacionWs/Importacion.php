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
require_once '/../../../pdo/Des.php';
require_once '/../../../pdo/QueryBuilder.php';

$json = file_get_contents('php://input');

$pdo = new PDOManager();
$em = $pdo->inicializarEntityManager();
$em->clear();
$vacunaciones = Vacunacion::fromJson($json);

$em->beginTransaction();

foreach ($vacunaciones as $vacunacion) {
    $registrovacunacions = $vacunacion->getRegistroVacunacion();

    $qb = new QueryBuilder("SELECT v FROM Vacunacion v JOIN v.parroquia p JOIN p.municipio m JOIN v.semana s");
    $qb->setEm($em);

    $v = $qb->agregarCondicion("LOWER(m.nombre)", "=", $vacunacion->getParroquia()->getMunicipio()->getNombre())
            ->agregarCondicion("LOWER(p.nombre)", "=", $vacunacion->getParroquia()->getNombre())
            ->agregarCondicion("LOWER(s.nombre)", "=", ($vacunacion->getSemana()->getNombre()))
            ->agregarCondicion("s.year", "=", $vacunacion->getSemana()->getYear())
            ->ejecutarQuery();
    if ($v == null) {

        $parroquia = $qb->agregarQuery("SELECT p FROM Parroquia p JOIN p.municipio m")
                ->agregarCondicion("LOWER(m.nombre)", "=", $vacunacion->getParroquia()->getMunicipio()->getNombre())
                ->agregarCondicion("LOWER(p.nombre)", "=", $vacunacion->getParroquia()->getNombre())
                ->ejecutarQuery();

        $semana = $qb->agregarQuery("SELECT s FROM Semana s")
                ->agregarCondicion("LOWER(s.nombre)", "=", $vacunacion->getSemana()->getNombre())
                ->agregarCondicion("s.year", "=", $vacunacion->getSemana()->getYear())
                ->ejecutarQuery();

        if ($semana == NULL) {
            $semana = new \Semana();
            $semana->setNombre($vacunacion->getSemana()->getNombre());
            $semana->setYear($vacunacion->getSemana()->getYear());
            $em->persist($semana);
            $em->flush();
        }
    } else {
        $vacunacion = $v;
    }

    if ($vacunacion->getId() == NULL) {

        $fecha = date_create($vacunacion->getFechaElaboracion())->format('Y-m-d');
        $vacunacion = new \Vacunacion();
        $vacunacion->setParroquia($parroquia);
        $vacunacion->setSemana($semana);
        $vacunacion->setFechaElaboracion(new DateTime($fecha));
        $em->persist($vacunacion);
        $em->flush();
    }


    foreach ($registrovacunacions as $registrovacunacion) {

        $rr = $qb->agregarQuery("SELECT rg FROM RegistroVacunacion rg JOIN rg.vacunacion v JOIN rg.usuario u")
                ->agregarCondicion("v.id", "=", $vacunacion->getId())
                ->agregarCondicion("u.id", "=", $registrovacunacion->getUsuario()->getId())
                ->ejecutarQuery();

        if ($rr == NULL) {
            $reg = new \RegistroVacunacion();
            $u = $em->find(Usuario::class, $registrovacunacion->getUsuario()->getId());
            $reg->setVacunacion($vacunacion);
            $reg->setUsuario($u);

            $u->getRegistroVacunacion()->add($reg);
            $vacunacion->getRegistroVacunacion()->add($reg);
            $em->flush();
            relacionar($em, $registrovacunacion, $reg);
        } else {
            relacionar($em, $registrovacunacion, $rr);
        }
    }

    $em->flush();
}
$em->flush();
$em->commit();
$em->close();
echo Des::toJson(Vacunacion::class, $vacunaciones);

function relacionar(Doctrine\ORM\EntityManager $em, RegistroVacunacion $oldRegistro, RegistroVacunacion $newRegistro) {

    foreach ($oldRegistro->getRegistroVacunacion_has_Animal() as $regs) {
        $qb = new QueryBuilder("SELECT a FROM Animal a");
        $qb->setEm($em);
        $animal = $qb->agregarCondicion("a.nombre", "=", $regs->getAnimal()->getNombre())->ejecutarQuery();

        $reg = new \RegistroVacunacion_has_Animal();
        $reg->setCantidad($regs->getCantidad());

        $reg->setAnimal($animal);
        $reg->setRegistroVacunacion($newRegistro);
        $newRegistro->getRegistroVacunacion_has_Animal()->add($reg);
        $animal->getVacunacion_has_Animal()->add($reg);
        $em->flush();
    }
}
