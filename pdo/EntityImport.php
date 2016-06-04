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
require_once '/entidades/Entidad.php';
require_once '/entidades/EntidadAdministrativa.php';
require_once '/entidades/administracion/Cliente.php';
require_once '/entidades/administracion/Municipio.php';
require_once '/entidades/administracion/Parroquia.php';
require_once '/entidades/administracion/Permiso.php';
require_once '/entidades/administracion/Persona.php';
require_once '/entidades/administracion/Usuario.php';
require_once '/entidades/calendario/Semana.php';
require_once '/entidades/funcionales/Animal.php';
require_once '/entidades/funcionales/Especie.php';
require_once '/entidades/proceso/Animal_has_Caso.php';
require_once '/entidades/proceso/Caso.php';
require_once '/entidades/proceso/Novedades.php';
require_once '/entidades/proceso/RegistroVacunacion.php';
require_once '/entidades/proceso/RegistroVacunacion_has_Animal.php';
require_once '/entidades/proceso/Vacunacion.php';

/**
 * Interfas que importa automaticamente todas las entidades
 *
 * @author angel.colina
 */
interface EntityImport {
    
}
