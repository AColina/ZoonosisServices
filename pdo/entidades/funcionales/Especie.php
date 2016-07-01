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
include_once ('/../EntidadAdministrativa.php');

use Doctrine\ORM\Mapping\Entity,
    JMS\Serializer\Annotation\Type,
    Doctrine\ORM\Mapping\OneToMany,
    Doctrine\Common\Collections\ArrayCollection;

/**
 * @Entity
 */
class Especie extends EntidadAdministrativa {

    /**
     * @var ArrayCollection
     * @Type("ArrayCollection<Animal>")
     * @OneToMany(targetEntity="Animal", mappedBy="especie",cascade={"all"}) */
    public $animales;

    //GETTER AND SETTER
    /**
     * 
     * @return ArrayCollection
     */
    public function getAnimales() {
        if ($this->animales == NULL) {
            $this->animales = new ArrayCollection();
        }
        return $this->animales;
    }

    public function setAnimales($animales) {
        $this->animales = $animales;
    }

}
