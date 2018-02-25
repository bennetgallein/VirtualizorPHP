<?php
/**
 * Created by PhpStorm.
 * User: Bennet
 * Date: 2/25/2018
 * Time: 4:32 PM
 */

namespace Virtualizor\Objects;


class OSTemplates {

    private $act;

    const LISTOS = 1;

    public function __construct($baseObject) {
        $this->base = $baseObject;
        return $this;
    }

    public function exec() {
        $post = array();
        $reflect = new \ReflectionClass($this);
        $props = $reflect->getProperties(\ReflectionProperty::IS_PUBLIC | \ReflectionProperty::IS_PROTECTED);

        foreach ($props as $prop) {
            $prop->setAccessible(true);
            if ($prop->getValue($this) !== null) {
                $post[$prop->getName()] = $prop->getValue($this);
            }
        }
        switch (($this->act)) {
            case OSTemplates::LISTOS:
                $return = $this->base->__request("index.php?act=ostemplates", $post);
                break;
        }
        return $return;
    }
}