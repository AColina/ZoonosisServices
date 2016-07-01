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
require_once '/Entidad.php';

use Doctrine\ORM\Mapping\MappedSuperclass,
    Doctrine\ORM\Mapping\Column,
    JMS\Serializer\Annotation\Type;

/** @MappedSuperclass */
abstract class EntidadAdministrativa extends Entidad {

    /**
     * @var string 
     * @Type("string")
     * @Column(type="string") */
    public $nombre;

    public function __construct($nombre = null) {
        $this->nombre = $nombre;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function __toString() {
        return $this->nombre;
    }

}
