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
require_once '/ServicesImport.php';

use Doctrine\Common\Collections\Collection,
    JMS\Serializer\Serializer,
    Doctrine\Common\Annotations\AnnotationReader;

/**
 * Description of Des
 *
 * @author angel.colina
 */
class Des {

    static function toJson($className, $object, $depht = 2) {
        if (!isset($object)) {
            return "{}";
        }
        $annotationReader = new AnnotationReader();
        $serializer = JMS\Serializer\SerializerBuilder::create()->build();
        $class = new \ReflectionClass($className);
        if (is_array($object) || ($object instanceof Collection)) {
            $json = "[%s";
            foreach ($object as $arrayObject) {
                $subJson = Des::map($class->getName(), $annotationReader, $serializer, $arrayObject, "{%s", $depht);
                $json = sprintf($json, $subJson . "},%s");
            }
            $result = sprintf(str_replace(",%s", "%s", $json), "]");
        } else {
            $result = Des::map($class->getName(), $annotationReader, $serializer, $object, "{%s", $depht);
            $result.= "}";
        }
        return $result;
    }

    private static function map($claseName, $annotationReader, Serializer $serializer, $object, $json, $depht) {
        $class = new \ReflectionClass($claseName);
        $publicProps = $class->getProperties();

        foreach ($publicProps as $prop) {
            $propName = $prop->name;

            if (isset($object->$propName) && $object->$propName != null) {
                $value = $object->$propName;
                if (is_object($value) && ($value instanceof Entidad)) {
                    $reflectionProperty = new ReflectionProperty($class->getName(), $propName);
                    $propertyAnnotations = $annotationReader->getPropertyAnnotation($reflectionProperty, 'JMS\Serializer\Annotation\Type');
                    try {
                        $relationObject = $serializer->deserialize($value, $propertyAnnotations->name, 'json');
                    } catch (\Exception $ex) {
                        $relationObject = Des::privateMap($propertyAnnotations->name, $value, $annotationReader, $depht);
                    }
                    $json = sprintf($json, "\"$propName\": $relationObject ,%s");
                } else if (is_array($value) || ($value instanceof Collection)) {
                    $reflectionProperty = new ReflectionProperty($class->getName(), $propName);
                    $propertyAnnotations = $annotationReader->getPropertyAnnotation($reflectionProperty, 'Doctrine\ORM\Mapping\OneToMany');
                    $relationClass = "";
                    if (isset($propertyAnnotations)) {
                        $relationClass = $propertyAnnotations->targetEntity;
                    } else {
                        $propertyAnnotations = $annotationReader->getPropertyAnnotation($reflectionProperty, 'JMS\Serializer\Annotation\Type');
                        $relationClass = $propertyAnnotations->name;
                    }

                    $json = sprintf($json, "\"$propName\" : [%s");

                    foreach ($value as $arrayObject) {
                        $subJson = Des::map($relationClass, $annotationReader, $serializer, $arrayObject, "{%s", $depht);
                        $json = sprintf($json, $subJson . "},%s");
                    }
                    $json = str_replace(",%s", "%s", $json);
                    $json = sprintf($json, "],%s");
                } else {

                    if ($value instanceof DateTime || (DateTime::createFromFormat('Y-m-d', $value) !== FALSE)) {
                        if (!($value instanceof DateTime)) {
                            $value = new DateTime($value);
                        }
                        $value = "\"" . date_format($value, 'd/m/Y') . "\"";
                    } else if (is_numeric($value)) {
                        $value = "$value";
                    } else {
                        $value = "\"$value\"";
                    }

                    $valor = "\"$propName\": $value ,%s";
                    $json = sprintf($json, $valor);
                }
            } else {
                $json = sprintf($json, "\"$propName\": null,%s");
            }
        }

        return substr($json, 0, strlen($json) - 3);
    }

    private static function privateMap($claseName, $object, $annotationReader, $depht, $acual = 1) {

        $class = new \ReflectionClass($claseName);
        $publicProps = $class->getProperties(ReflectionProperty::IS_PUBLIC);
        $json = "{";
        foreach ($publicProps as $prop) {
            $propName = $prop->name;
            $value = isset($object->$propName) ? $object->$propName : NULL;
            if (!(isset($value)) || $value == NULL || is_object($value) &&
                    ($value instanceof Entidad) || ($value instanceof Collection) || is_array($value)) {

                if ($acual < $depht && is_object($value) && ($value instanceof Entidad)) {
                    $reflectionProperty = new ReflectionProperty($class->getName(), $propName);
                    $propertyAnnotations = $annotationReader->getPropertyAnnotation($reflectionProperty, 'JMS\Serializer\Annotation\Type');
                    $value = Des::privateMap($propertyAnnotations->name, $value, $annotationReader, $acual++, $depht);
                } else {
                    $value = "null";
                }
            } else {
                if ($value instanceof DateTime || (DateTime::createFromFormat('Y-m-d', $value) !== FALSE)) {
                    if (!($value instanceof DateTime)) {
                        $value = new DateTime($value);
                    }
                    $value = "\"" . date_format($value, 'd/m/Y') . "\"";
                } else if (is_numeric($value)) {
                    $value = "$value";
                } else {
                    $value = "\"$value\"";
                }
            }
            $json .=" \"$propName\" : $value ,";
        }

        return substr($json, 0, strlen($json) - 1) . "}";
    }

}
