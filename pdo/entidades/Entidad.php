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

require_once '/../../Doctrine/Custom/CustomGenerator.php';
require_once '/../ReflectionUtils.php';

use Doctrine\Common\Annotations\AnnotationReader,
    Doctrine\ORM\Mapping\MappedSuperclass,
    Doctrine\ORM\Mapping\Id,
    Doctrine\ORM\Mapping\Column,
    Doctrine\ORM\Mapping\GeneratedValue,
    JMS\Serializer\Annotation\Type,
    JMS\Parser\SyntaxErrorException;

/** @MappedSuperclass */
abstract class Entidad {

    /**
     * @var int
     * @Type("integer")
     * @Id 
     * @Column(type="integer") 
     * @GeneratedValue(strategy="IDENTITY")
     */
    public $id;

    public function getId() {

        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function __toString() {
        return "Entidad{ id= $this->id }";
    }

    /**
     * 
     * @param string $json
     * @return <Entidad>
     */
    static function fromJson($json) {
        $annotationReader = new AnnotationReader();
        $serializer = JMS\Serializer\SerializerBuilder::create()->build();
        $objJson = json_decode($json);
        $class = new \ReflectionClass(new static());
        $em = PDOManager::inicializarEntityManager();
        $result = Entidad::map($class->getName(), $annotationReader, $serializer, $objJson, $em);

        return $result;
    }

    private static function map($claseName, $annotationReader, $serializer, $objJson, $em) {
        $class = new \ReflectionClass($claseName);
        $result = $class->newInstanceWithoutConstructor();

        $publicProps = $class->getProperties();
        foreach ($publicProps as $prop) {
            $propName = $prop->name;
            if (isset($objJson->$propName)) {
                $value = $objJson->$propName;
                if (is_object($value)) {
                    $reflectionProperty = new ReflectionProperty($class->getName(), $propName);
                    $propertyAnnotations = $annotationReader->getPropertyAnnotation($reflectionProperty, 'JMS\Serializer\Annotation\Type');
                    $relationJson = json_encode($value, true);
                    try {
                        $relationObject = $serializer->deserialize($relationJson, $propertyAnnotations->name, 'json');
                    } catch (SyntaxErrorException $ex) {
                        $relationObject = Entidad::privateMap($propertyAnnotations->name, $annotationReader, $serializer, $relationJson, $em);
                    }
                    $prop->setValue($result, $relationObject);
                } elseif (is_array($value)) {
                    $r = array();
                    $reflectionProperty = new ReflectionProperty($class->getName(), $propName);
                    $propertyAnnotations = $annotationReader->getPropertyAnnotation($reflectionProperty, 'Doctrine\ORM\Mapping\OneToMany');

                    foreach ($value as $arrayObject) {
                        $r[] = Entidad::map($propertyAnnotations->targetEntity, $annotationReader, $serializer, $arrayObject, $em);
                    }
                    $persistColl = new Doctrine\Common\Collections\ArrayCollection($r);

                    $prop->setValue($result, $persistColl);
                } else {
                    $prop->setValue($result, $value);
                }
            } else {
                $prop->setValue($result, null);
            }
        }
        return $result;
    }

    private static function privateMap($claseName, $annotationReader, $serializer, $json, $em) {
        $ref = new \ReflectionUtils();
        $class = new \ReflectionClass($claseName);
        $result = $class->newInstanceWithoutConstructor();
        $value = json_decode($json, TRUE);
        foreach ($value as $key => $field) {
            if (is_array($field)) {
                $reflectionProperty = new ReflectionProperty($claseName, $key);
                $propertyAnnotations = $annotationReader->getPropertyAnnotation($reflectionProperty, 'JMS\Serializer\Annotation\Type');
                $r = Entidad::map($propertyAnnotations->name, $annotationReader, $serializer, $field, $em);
                $ref->setValor($result, $key, $r);
            } else {
                $ref->setValor($result, $key, $field);
            }
        }
        return $result;
    }

    static function toJson() {
        return json_encode($this);
    }

}
