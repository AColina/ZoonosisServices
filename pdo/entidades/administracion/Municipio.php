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
    JMS\Serializer\Annotation\Type,
    Doctrine\Common\Collections\ArrayCollection;

/**
 * @Entity 
 */
class Municipio extends EntidadAdministrativa {

    /**
     * @Type("ArrayCollection")
     * @OneToMany(targetEntity="Parroquia", mappedBy="municipio",fetch="EAGER") 
     */
    public $parroquias;

    public function __construct() {
        $this->parroquias = new ArrayCollection();
    }

    public function getParroquias() {
        return $this->parroquias;
    }

    public function setParroquias($parroquias) {
        $this->parroquias = $parroquias;
    }

}
