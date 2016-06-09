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
require_once ('/../EntidadAdministrativa.php');

use Doctrine\ORM\Mapping\Entity,
    Doctrine\ORM\Mapping\OneToMany,
    Doctrine\Common\Collections\ArrayCollection,
    JMS\Serializer\Annotation\Type;

/**
 * @Entity 
 */
class Permiso extends EntidadAdministrativa {

    /**
     * @var ArrayCollection 
     * @Type("ArrayCollection")
     * @OneToMany(targetEntity="Usuario", mappedBy="permiso") */
    public $usuarios;

    public function __construct() {
        
    }

    //GETTER AND SETTER
    public function getUsuarios() {
        return $this->usuarios;
    }

    public function setUsuarios($usuarios) {
        $this->usuarios = $usuarios;
    }

    public function __toString() {
        return $this->nombre;
    }

}
