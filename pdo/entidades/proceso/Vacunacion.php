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
 * Description of Vacunacion
 *
 * @author GustavoG
 * @author Angel Colina
 */
class Vacunacion extends Entidad {

    public $fechaElaboracion;

    /**
     * @ManyToOne(entity=Semana)
     */
    public $semana_id;

    /**
     * @ManyToOne(entity=Parroquia)
     */
    public $parroquia_id;

    /**
     * @OneToMany(entity=RegistroVacunacion,mappedBy=vacunacion_id)
     */
    public $registroVacunacion;

    public function getFechaElaboracion() {
        return $this->fechaElaboracion;
    }

    public function getSemana_id() {
        return $this->semana_id;
    }

    public function getParroquia_id() {
        return $this->parroquia_id;
    }

    public function getRegistroVacunacion() {
        return $this->registroVacunacion;
    }

    public function setFechaElaboracion($fechaElaboracion) {
        $this->fechaElaboracion = $fechaElaboracion;
    }

    public function setSemana_id($semana_id) {
        $this->semana_id = $semana_id;
    }

    public function setParroquia_id($parroquia_id) {
        $this->parroquia_id = $parroquia_id;
    }

    public function setRegistroVacunacion($registroVacunacion) {
        $this->registroVacunacion = $registroVacunacion;
    }

}
