<?php
/**
 * Created by PhpStorm.
 * User: Master
 * Date: 19.02.2018
 * Time: 16:22
 */

namespace Virtualizor\Objects;


class IPPool {

    public $iptype, $serid, $ippool_name, $gateway, $netmask, $ns1, $ns2, $firstip, $lastip, $nat, $ips, $macs, $routing, $ipv6_1, $ipv6_2, $ipv6_3, $ipv6_4, $ipv6_5, $ipv6_6, $ipv6_num, $internal, $internal_bridge, $ippid , $editippool, $routed, $mtu;

    private $act;
    private $base;

    const LISTPOOLS = 1;
    const IPS = 2;
    const ADDIPPOOL = 3;
    const EDITPOOL = 4;
    const DELETEPOOL = 5;

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
            case IPPool::LISTPOOLS:
                $return = $this->base->__request("index.php?act=ippool", $post);
                break;
            case IPPool::IPS:
                $return = $this->base->__request("index.php?act=ips", $post);
                break;
            case IPPool::ADDIPPOOL:
                $return = $this->base->__request("index.php?act=addippool", $post);
                break;
            case IPPool::EDITPOOL:
                $return = $this->base->__request("index.php?act=editippool&ippid=" . $this->ippid, $post);
                break;
            case IPPool::DELETEPOOL:
                $return = $this->base->__request("index.php?act=ippools", $post);
        }
        return $return;
    }

    public function setAct($act) {
        $this->act = $act;
        return $this;
    }

    /**
     * @param mixed $iptype
     * @return IPPool
     */
    public function setIptype($iptype) {
        $this->iptype = $iptype;
        return $this;
    }

    /**
     * @param mixed $serid
     * @return IPPool
     */
    public function setSerid($serid) {
        $this->serid = $serid;
        return $this;
    }

    /**
     * @param mixed $ippool_name
     * @return IPPool
     */
    public function setIppoolName($ippool_name) {
        $this->ippool_name = $ippool_name;
        return $this;
    }

    /**
     * @param mixed $gateway
     * @return IPPool
     */
    public function setGateway($gateway) {
        $this->gateway = $gateway;
        return $this;
    }

    /**
     * @param mixed $netmask
     * @return IPPool
     */
    public function setNetmask($netmask) {
        $this->netmask = $netmask;
        return $this;
    }

    /**
     * @param mixed $ns1
     * @return IPPool
     */
    public function setNs1($ns1) {
        $this->ns1 = $ns1;
        return $this;
    }

    /**
     * @param mixed $ns2
     * @return IPPool
     */
    public function setNs2($ns2) {
        $this->ns2 = $ns2;
        return $this;
    }

    /**
     * @param mixed $firstip
     * @return IPPool
     */
    public function setFirstip($firstip) {
        $this->firstip = $firstip;
        return $this;
    }

    /**
     * @param mixed $lastip
     * @return IPPool
     */
    public function setLastip($lastip) {
        $this->lastip = $lastip;
        return $this;
    }

    /**
     * @param mixed $nat
     * @return IPPool
     */
    public function setNat($nat) {
        $this->nat = $nat;
        return $this;
    }

    /**
     * @param mixed $ips
     * @return IPPool
     */
    public function setIps($ips) {
        $this->ips = $ips;
        return $this;
    }

    /**
     * @param mixed $macs
     * @return IPPool
     */
    public function setMacs($macs) {
        $this->macs = $macs;
        return $this;
    }

    /**
     * @param mixed $routing
     * @return IPPool
     */
    public function setRouting($routing) {
        $this->routing = $routing;
        return $this;
    }
}