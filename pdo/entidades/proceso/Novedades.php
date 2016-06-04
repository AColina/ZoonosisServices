<?php

include_once ('/../Entidad.php');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Novedades
 *
 * @author GustavoG
 */
class Novedades extends Entidad {

    public $fechaElaboracion;
    public $nombre;
    public $descripcion;

    /**
     * @ManyToOne(entity=Cliente)
     */
    public $cliente_id;

    /**
     * @ManyToOne(entity=Usuario)
     */
    public $usuario_id;

    public function getFechaElaboracion() {
        return $this->fechaElaboracion;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getDescripcion() {
        return $this->descripcion;
    }

    public function getCliente_id() {
        return $this->cliente_id;
    }

    public function getUsuario_id() {
        return $this->usuario_id;
    }

    public function setFechaElaboracion($fechaElaboracion) {
        $this->fechaElaboracion = $fechaElaboracion;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    public function setCliente_id($cliente_id) {
        $this->cliente_id = $cliente_id;
    }

    public function setUsuario_id($usuario_id) {
        $this->usuario_id = $usuario_id;
    }

}
