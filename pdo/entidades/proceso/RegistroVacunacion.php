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
include_once ('/../Entidad.php');

use Doctrine\ORM\Mapping\Entity,
    Doctrine\ORM\Mapping\Column,
    Doctrine\ORM\Mapping\ManyToOne,
    Doctrine\ORM\Mapping\OneToMany,
    Doctrine\Common\Collections\ArrayCollection,
    Doctrine\ORM\Mapping\JoinColumn,
    JMS\Serializer\Annotation\Type;

/**
 * @Entity
 */
class RegistroVacunacion extends Entidad {

    /**
     * @Type("Vacunacion")
     * @ManyToOne(targetEntity="Vacunacion", inversedBy="registroVacunacion", fetch="EAGER")
     * @JoinColumn(name="vacunacion_id", referencedColumnName="id")
     */
    public $vacunacion;

    /**
     * @Type("Usuario")
     * @ManyToOne(targetEntity="Usuario", inversedBy="registroVacunacion", fetch="EAGER")
     * @JoinColumn(name="usuario_id", referencedColumnName="id")
     */
    public $usuario;

    /**
     * @Type("ArrayCollection<RegistroVacunacion_has_Animal>")
     * @OneToMany(targetEntity="RegistroVacunacion_has_Animal",
     *  mappedBy="registroVacunacion",cascade={"all"}, fetch="EAGER")
     */
    public $registroVacunacion_has_Animal;

    public function __construct() {
        
    }

    //GETTER AND SETTER

    public function getVacunacion() {
        return $this->vacunacion;
    }

    public function getUsuario() {
        return $this->usuario;
    }

    /**
     * 
     * @return ArrayCollection<RegistroVacunacion_has_Animal>
     */
    public function getRegistroVacunacion_has_Animal() {
        if ($this->registroVacunacion_has_Animal == NULL) {
            $this->registroVacunacion_has_Animal = new ArrayCollection();
        }
        return $this->registroVacunacion_has_Animal;
    }

    public function setVacunacion($vacunacion) {
        $this->vacunacion = $vacunacion;
    }

    public function setUsuario($usuario) {
        $this->usuario = $usuario;
    }

    public function setRegistroVacunacion_has_Animal($registroVacunacion_has_Animal) {
        $this->registroVacunacion_has_Animal = $registroVacunacion_has_Animal;
    }

}
