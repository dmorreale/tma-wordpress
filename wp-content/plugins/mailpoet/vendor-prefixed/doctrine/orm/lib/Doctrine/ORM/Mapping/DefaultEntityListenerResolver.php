<?php
 namespace MailPoetVendor\Doctrine\ORM\Mapping; if (!defined('ABSPATH')) exit; class DefaultEntityListenerResolver implements \MailPoetVendor\Doctrine\ORM\Mapping\EntityListenerResolver { private $instances = array(); public function clear($className = null) { if ($className === null) { $this->instances = array(); return; } if (isset($this->instances[$className = \trim($className, '\\')])) { unset($this->instances[$className]); } } public function register($object) { if (!\is_object($object)) { throw new \InvalidArgumentException(\sprintf('An object was expected, but got "%s".', \gettype($object))); } $this->instances[\get_class($object)] = $object; } public function resolve($className) { if (isset($this->instances[$className = \trim($className, '\\')])) { return $this->instances[$className]; } return $this->instances[$className] = new $className(); } } 