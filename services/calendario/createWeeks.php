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
require_once '/../../pdo/ServicesImport.php';
$json = file_get_contents('php://input');

$pojo = json_decode($json);
$em = PDOManager::inicializarEntityManager();

for ($i = 0; $i < $pojo->semanas; $i++) {
    $semana = new \Semana();
    $semana->setYear(ceil($pojo->year));
    $semana->setSemana("Semana " . ($i + 1));
    $em->persist($semana);
}
$em->flush();
