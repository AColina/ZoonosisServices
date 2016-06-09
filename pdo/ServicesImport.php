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
require_once '/PDOManager.php';

require_once '/../Doctrine/Common/Annotations/PhpParser.php';
require_once '/../Doctrine/Common/Annotations/AnnotationReader.php';
require_once '/../PhpCollection/SortableInterface.php';
require_once '/../PhpCollection/CollectionInterface.php';
require_once '/../PhpCollection/AbstractCollection.php';
require_once '/../PhpCollection/MapInterface.php';
require_once '/../PhpCollection/AbstractMap.php';
require_once '/../PhpCollection/Map.php';
require_once '/../Metadata/MergeableInterface.php';
require_once '/../Metadata/ClassMetadata.php';
require_once '/../Metadata/MetadataFactoryInterface.php';
require_once '/../Metadata/MergeableClassMetadata.php';
require_once '/../Metadata/AdvancedMetadataFactoryInterface.php';
require_once '/../Metadata/MetadataFactory.php';
require_once '/../Metadata/PropertyMetadata.php';
require_once '/../Metadata/Driver/DriverInterface.php';
require_once '/../JMS/Parser/AbstractLexer.php';
require_once '/../JMS/Parser/SimpleLexer.php';
require_once '/../JMS/Parser/AbstractParser.php';
require_once '/../JMS/Serializer/VisitorInterface.php';
require_once '/../JMS/Serializer/AbstractVisitor.php';
require_once '/../JMS/Serializer/XmlSerializationVisitor.php';
require_once '/../JMS/Serializer/YamlSerializationVisitor.php';
require_once '/../JMS/Serializer/Util/Writer.php';
require_once '/../JMS/Serializer/GenericSerializationVisitor.php';
require_once '/../JMS/Serializer/GenericDeserializationVisitor.php';
require_once '/../JMS/Serializer/JsonDeserializationVisitor.php';
require_once '/../JMS/Serializer/JsonSerializationVisitor.php';
require_once '/../JMS/Serializer/XmlDeserializationVisitor.php';
require_once '/../JMS/Serializer/SerializerInterface.php';
require_once '/../JMS/Serializer/Serializer.php';
require_once '/../JMS/Serializer/Context.php';
require_once '/../JMS/Serializer/SerializationContext.php';
require_once '/../JMS/Serializer/DeserializationContext.php';
require_once '/../JMS/Serializer/TypeParser.php';
require_once '/../JMS/Serializer/Annotation/Type.php';
require_once '/../JMS/Serializer/Metadata/Driver/AnnotationDriver.php';
require_once '/../JMS/Serializer/Builder/DriverFactoryInterface.php';
require_once '/../JMS/Serializer/Builder/DefaultDriverFactory.php';
require_once '/../JMS/Serializer/SerializerBuilder.php';
require_once '/../JMS/Serializer/GraphNavigator.php';
require_once '/../JMS/Serializer/Annotation/ExclusionPolicy.php';
require_once '/../JMS/Serializer/Metadata/ClassMetadata.php';
require_once '/../JMS/Serializer/Metadata/PropertyMetadata.php';
require_once '/../JMS/Serializer/Handler/HandlerRegistryInterface.php';
require_once '/../JMS/Serializer/Handler/HandlerRegistry.php';
require_once '/../JMS/Serializer/Handler/SubscribingHandlerInterface.php';
require_once '/../JMS/Serializer/Handler/DateHandler.php';
require_once '/../JMS/Serializer/Handler/PhpCollectionHandler.php';
require_once '/../JMS/Serializer/Handler/ArrayCollectionHandler.php';
require_once '/../JMS/Serializer/Handler/PropelCollectionHandler.php';
require_once '/../JMS/Serializer/EventDispatcher/Event.php';
require_once '/../JMS/Serializer/EventDispatcher/ObjectEvent.php';
require_once '/../JMS/Serializer/EventDispatcher/PreSerializeEvent.php';
require_once '/../JMS/Serializer/EventDispatcher/EventDispatcherInterface.php';
require_once '/../JMS/Serializer/EventDispatcher/EventDispatcher.php';
require_once '/../JMS/Serializer/EventDispatcher/EventSubscriberInterface.php';
require_once '/../JMS/Serializer/EventDispatcher/Subscriber/DoctrineProxySubscriber.php';
require_once '/../JMS/Serializer/Naming/PropertyNamingStrategyInterface.php';
require_once '/../JMS/Serializer/Naming/SerializedNameAnnotationStrategy.php';
require_once '/../JMS/Serializer/Naming/CamelCaseNamingStrategy.php';
require_once '/../JMS/Serializer/Construction/ObjectConstructorInterface.php';
require_once '/../JMS/Serializer/Construction/UnserializeObjectConstructor.php';
require_once '/../JMS/Serializer/Exception/Exception.php';
require_once '/../JMS/Serializer/Exception/LogicException.php';
require_once '/../JMS/Serializer/Exception/RuntimeException.php';
require_once '/../JMS/Serializer/Exception/InvalidArgumentException.php';
require_once '/../JMS/Serializer/Exception/UnsupportedFormatException.php';
require_once '/../JMS/Parser/SyntaxErrorException.php';
require_once '/../PhpOption/Option.php';
require_once '/../PhpOption/Some.php';

require_once '/EntityImport.php';

/**
 * Description of ServicesImport
 *
 * @author angel.colina
 */
interface ServicesImport {
    //put your code here
}
