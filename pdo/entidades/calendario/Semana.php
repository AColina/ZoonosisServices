<?php

include_once ('/../Entidad.php');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Semana
 *
 * @author GustavoG
 */
class Semana extends Entidad {

    public $semana;
    public $year;

    /**
     * @OneToMany(entity=Novedades,mappedBy=semana_id)
     */
    public $vacunaciones;

    /**
     * @OneToMany(entity=Caso,mappedBy=semana_id)
     */
    public $casos;

    public function getSemana() {
        return $this->semana;
    }

    public function getYear() {
        return $this->year;
    }

    public function getVacunaciones() {
        return $this->vacunaciones;
    }

    public function getCasos() {
        return $this->casos;
    }

    public function setSemana($semana) {
        $this->semana = $semana;
    }

    public function setYear($year) {
        $this->year = $year;
    }

    public function setVacunaciones($vacunaciones) {
        $this->vacunaciones = $vacunaciones;
    }

    public function setCasos($casos) {
        $this->casos = $casos;
    }

}
