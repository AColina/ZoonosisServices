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

/**
 * Description of Caso
 *
 * @author GustavoG
 */
class Caso extends Entidad {

    public $fechaElaboracion;

    /**
     * @ManyToOne(entity=Parroquia)
     */
    public $parroquia_id;

    /**
     * @ManyToOne(entity=Semana)
     */
    public $semana_id;

    /**
     * @OneToMany(entity=Animal_has_Caso,mappedBy=caso_id)
     */
    public $animal_has_Caso;

    public function getFechaElaboracion() {
        return $this->fechaElaboracion;
    }

    public function getParroquia_id() {
        return $this->parroquia_id;
    }

    public function getSemana_id() {
        return $this->semana_id;
    }

    public function getAnimal_has_Caso() {
        return $this->animal_has_Caso;
    }

    public function setFechaElaboracion($fechaElaboracion) {
        $this->fechaElaboracion = $fechaElaboracion;
    }

    public function setParroquia_id($parroquia_id) {
        $this->parroquia_id = $parroquia_id;
    }

    public function setSemana_id($semana_id) {
        $this->semana_id = $semana_id;
    }

    public function setAnimal_has_Caso($animal_has_Caso) {
        $this->animal_has_Caso = $animal_has_Caso;
    }

}
