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

require '/../../pdo/QueryBuilder.php';

$year = isset($_GET['year']) ? $_GET['year'] : NULL;
$number = isset($_GET['number']) ? "% " . $_GET['number'] : NULL;

if ($year == null) {
    die("Year is required");
} else if ($number == NULL) {
    die("number is required");
}

$qb = new QueryBuilder("SELECT s FROM Semana s", "ORDER By s.semana");
$r = $qb->agregarCondicion("s.year", "=", $year)
        ->agregarCondicion("s.semana", "Like", $number)
        ->ejecutarQuery();


echo H57\Util\Serializor::json_encode($r);
