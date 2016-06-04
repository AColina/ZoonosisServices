<?php

include_once ('/../Entidad.php');

/**
 * Created by PhpStorm.
 * User: GustavoG
 * Date: 21/04/2016
 * Time: 06:58 PM
 */
class Usuario extends Entidad {

    public $usuario;
    public $contrasena;
    public $fechaNacimiento;

    /**
     * @OneToOne(entity=Persona)
     */
    public $persona_id;

    /**
     * @OneToMany(entity=Novedades,mappedBy=usuario_id)
     */
    public $novedades;

    /**
     * @ManyToOne(entity=Permiso)
     */
    public $permiso_id;

    /**
     * @OneToMany(entity=RegistroVacunacion,mappedBy=usuario_id)
     */
    public $registroVacunacion;

    public function getUsuario() {
        return $this->usuario;
    }

    public function getContrasena() {
        return $this->contrasena;
    }

    public function getFechaNacimiento() {
        return $this->fechaNacimiento;
    }

    public function getPersona_id() {
        return $this->persona_id;
    }

    public function getNovedades() {
        return $this->novedades;
    }

    public function getPermiso_id() {
        return $this->permiso_id;
    }

    public function getRegistroVacunacion() {
        return $this->registroVacunacion;
    }

    public function setUsuario($usuario) {
        $this->usuario = $usuario;
    }

    public function setContrasena($contrasena) {
        $this->contrasena = $contrasena;
    }

    public function setFechaNacimiento($fechaNacimiento) {
        $this->fechaNacimiento = $fechaNacimiento;
    }

    public function setPersona_id($persona_id) {
        $this->persona_id = $persona_id;
    }

    public function setNovedades($novedades) {
        $this->novedades = $novedades;
    }

    public function setPermiso_id($permiso_id) {
        $this->permiso_id = $permiso_id;
    }

    public function setRegistroVacunacion($registroVacunacion) {
        $this->registroVacunacion = $registroVacunacion;
    }

}
