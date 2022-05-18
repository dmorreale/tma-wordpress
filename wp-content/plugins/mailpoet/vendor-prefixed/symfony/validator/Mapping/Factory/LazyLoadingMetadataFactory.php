<?php
 namespace MailPoetVendor\Symfony\Component\Validator\Mapping\Factory; if (!defined('ABSPATH')) exit; use MailPoetVendor\Symfony\Component\Validator\Exception\NoSuchMetadataException; use MailPoetVendor\Symfony\Component\Validator\Mapping\Cache\CacheInterface; use MailPoetVendor\Symfony\Component\Validator\Mapping\ClassMetadata; use MailPoetVendor\Symfony\Component\Validator\Mapping\Loader\LoaderInterface; class LazyLoadingMetadataFactory implements \MailPoetVendor\Symfony\Component\Validator\Mapping\Factory\MetadataFactoryInterface { protected $loader; protected $cache; protected $loadedClasses = []; public function __construct(\MailPoetVendor\Symfony\Component\Validator\Mapping\Loader\LoaderInterface $loader = null, \MailPoetVendor\Symfony\Component\Validator\Mapping\Cache\CacheInterface $cache = null) { $this->loader = $loader; $this->cache = $cache; } public function getMetadataFor($value) { if (!\is_object($value) && !\is_string($value)) { throw new \MailPoetVendor\Symfony\Component\Validator\Exception\NoSuchMetadataException(\sprintf('Cannot create metadata for non-objects. Got: "%s".', \gettype($value))); } $class = \ltrim(\is_object($value) ? \get_class($value) : $value, '\\'); if (isset($this->loadedClasses[$class])) { return $this->loadedClasses[$class]; } if (!\class_exists($class) && !\interface_exists($class, \false)) { throw new \MailPoetVendor\Symfony\Component\Validator\Exception\NoSuchMetadataException(\sprintf('The class or interface "%s" does not exist.', $class)); } if (null !== $this->cache && \false !== ($metadata = $this->cache->read($class))) { $this->mergeConstraints($metadata); return $this->loadedClasses[$class] = $metadata; } $metadata = new \MailPoetVendor\Symfony\Component\Validator\Mapping\ClassMetadata($class); if (null !== $this->loader) { $this->loader->loadClassMetadata($metadata); } if (null !== $this->cache) { $this->cache->write($metadata); } $this->mergeConstraints($metadata); return $this->loadedClasses[$class] = $metadata; } private function mergeConstraints(\MailPoetVendor\Symfony\Component\Validator\Mapping\ClassMetadata $metadata) { if ($metadata->getReflectionClass()->isInterface()) { return; } if ($parent = $metadata->getReflectionClass()->getParentClass()) { $metadata->mergeConstraints($this->getMetadataFor($parent->name)); } foreach ($metadata->getReflectionClass()->getInterfaces() as $interface) { if ('Symfony\\Component\\Validator\\GroupSequenceProviderInterface' === $interface->name) { continue; } if ($parent && \in_array($interface->getName(), $parent->getInterfaceNames(), \true)) { continue; } $metadata->mergeConstraints($this->getMetadataFor($interface->name)); } } public function hasMetadataFor($value) { if (!\is_object($value) && !\is_string($value)) { return \false; } $class = \ltrim(\is_object($value) ? \get_class($value) : $value, '\\'); return \class_exists($class) || \interface_exists($class, \false); } } 