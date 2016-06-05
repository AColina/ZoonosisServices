
<?php

require_once '/pdo/ServicesImport.php';
$pdo = new PDOManager();

$entity= new Persona();

$entity->setNombre("Angel");
$entity->setApellido("Colina");
$entity->setCedula("45676543");

$pdo->persistirEntidad($entity);

        