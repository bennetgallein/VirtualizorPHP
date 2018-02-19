<?php
/**
 * Created by PhpStorm.
 * User: Bennet
 * Date: 2/16/2018
 * Time: 2:54 PM
 */

namespace Virtualizor\Objects;


/**
 * Class VirtualServer
 * @package Virtualizor\Objects
 * @see http://virtualizor.com/admin-api/#create-vps
 */
class VirtualServer {

    public $page_number, $count, $rootpass, $virt, $plid, $hostname, $space, $ram, $bandwidth, $network_speed, $cores, $mgs, $priority, $cpu, $burst, $cpu_percent, $osid, $iso, $stid, $vnc, $vncpass, $swapram, $shadow, $hvm, $boot, $ips, $num_ips6, $numips6_subnet, $noemail, $add_user, $user_email, $user_pass, $add_ip, $vnc_keymap, $cpunit, $uid, $dnsplan_id, $addvs, $band_suspend, $osreinstall_limit, $tuntap, $vif_type, $nic_type, $ips_int, $virio;


    private $act;
    private $base;

    const LISTVS = 'vs';
    const CREATE = 'addvs';
    const DELETE = 'vs';
    const EDIT = 'editvs';
    const MANAGE = 'managevps';
    const START = 'vs';
    const STOP = 'vs';
    const RESTART = 'vs';
    const POWEROFF = 'vs';
    const SUSPEND = 'vs';
    const UNSUSPEND = 'vs';
    const NETWORK_SUSPEND = 'vs';
    const NETWORK_UNSUSPEND = 'vs';
    const REBUILD = 'rebuild';
    const MIGRATE = 'migrate';
    const CLONEIT = 'clone';

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
        switch ($this->act) {
            case VirtualServer::LISTVS:
                $return = $this->base->__request("index.php?act=" . $this->act, $post);
                break;
            case VirtualServer::CREATE:
                $return = $this->base->__request("index.php?act=" . $this->act, $post);
                break;
            case VirtualServer::DELETE:
                $return = $this->base->__request("index.php?act=" . $this->act . "&delete=" . $this->uid, $post);
                break;
            case VirtualServer::EDIT:
                $return = $this->base->__request("index.php?act=" . $this->act . "&delete=" . $this->uid, $post);
                break;
            case VirtualServer::MANAGE:
                $return = $this->base->__request("index.php?act=" . $this->act . "&vpsid=" . $this->uid, $post);
                break;
            case VirtualServer::START:
                $return = $this->base->__request("index.php?act=" . $this->act . "&action=start&vpsid=" . $this->uid, $post);
                break;
            case VirtualServer::STOP:
                $return = $this->base->__request("index.php?act=" . $this->act . "&action=stop&vpsid=" . $this->uid, $post);
                break;
            case VirtualServer::RESTART:
                $return = $this->base->__request("index.php?act=" . $this->act . "&action=restart&vpsid=" . $this->uid, $post);
                break;
            case VirtualServer::POWEROFF:
                $return = $this->base->__request("index.php?act=" . $this->act . "&action=poweroff&vpsid=" . $this->uid, $post);
                break;
            case VirtualServer::SUSPEND:
                $return = $this->base->__request("index.php?act=" . $this->act . "&suspend=" . $this->uid, $post);
                break;
            case VirtualServer::UNSUSPEND:
                $return = $this->base->__request("index.php?act=" . $this->act . "&unsuspend=" . $this->uid, $post);
                break;
            case VirtualServer::NETWORK_SUSPEND:
                $return = $this->base->__request("index.php?act=" . $this->act . "&suspend_net=" . $this->uid, $post);
                break;
            case VirtualServer::NETWORK_UNSUSPEND:
                $return = $this->base->__request("index.php?act=" . $this->act . "&unsuspend_net=" . $this->uid, $post);
                break;
            case VirtualServer::REBUILD:
                $return = $this->base->__request("index.php?act=" . $this->act, $post);
                break;
            case VirtualServer::MIGRATE:
                $return = $this->base->__request("index.php?act=" . $this->act, $post);
                break;
            case VirtualServer::CLONEIT:
                $return = $this->base->__request("index.php?act=" . $this->act, $post);
                break;
        }
        return $return;
    }

    /**
     * @param mixed $page_number
     * @return VirtualServer
     */
    public function setPageNumber($page_number) {
        $this->page_number = $page_number;
        return $this;
    }

    /**
     * @param mixed $count
     * @return VirtualServer
     */
    public function setCount($count) {
        $this->count = $count;
        return $this;
    }

    /**
     * @param mixed $act
     * @return VirtualServer
     */
    public function setAct($act) {
        $this->act = $act;
        return $this;
    }

    /**
     * @param mixed $rootpass
     * @return VirtualServer
     */
    public function setRootpass($rootpass) {
        $this->rootpass = $rootpass;
        return $this;
    }

    /**
     * @param mixed $virt
     * @return VirtualServer
     */
    public function setVirt($virt) {
        $this->virt = $virt;
        return $this;
    }

    /**
     * @param mixed $plid
     * @return VirtualServer
     */
    public function setPlid($plid) {
        $this->plid = $plid;
        return $this;
    }

    /**
     * @param mixed $hostname
     * @return VirtualServer
     */
    public function setHostname($hostname) {
        $this->hostname = $hostname;
        return $this;
    }

    /**
     * @param mixed $space
     * @return VirtualServer
     */
    public function setSpace($space) {
        $this->space = $space;
        return $this;
    }

    /**
     * @param mixed $ram
     * @return VirtualServer
     */
    public function setRam($ram) {
        $this->ram = $ram;
        return $this;
    }

    /**
     * @param mixed $bandwidth
     * @return VirtualServer
     */
    public function setBandwidth($bandwidth) {
        $this->bandwidth = $bandwidth;
        return $this;
    }

    /**
     * @param mixed $network_speed
     * @return VirtualServer
     */
    public function setNetworkSpeed($network_speed) {
        $this->network_speed = $network_speed;
        return $this;
    }

    /**
     * @param mixed $cores
     * @return VirtualServer
     */
    public function setCores($cores) {
        $this->cores = $cores;
        return $this;
    }

    /**
     * @param mixed $mgs
     * @return VirtualServer
     */
    public function setMgs($mgs) {
        $this->mgs = $mgs;
        return $this;
    }

    /**
     * @param mixed $priority
     * @return VirtualServer
     */
    public function setPriority($priority) {
        $this->priority = $priority;
        return $this;
    }

    /**
     * @param mixed $cpu
     * @return VirtualServer
     */
    public function setCpu($cpu) {
        $this->cpu = $cpu;
        return $this;
    }

    /**
     * @param mixed $burst
     * @return VirtualServer
     */
    public function setBurst($burst) {
        $this->burst = $burst;
        return $this;
    }

    /**
     * @param mixed $cpu_percent
     * @return VirtualServer
     */
    public function setCpuPercent($cpu_percent) {
        $this->cpu_percent = $cpu_percent;
        return $this;
    }

    /**
     * @param mixed $osid
     * @return VirtualServer
     */
    public function setOsid($osid) {
        $this->osid = $osid;
        return $this;
    }

    /**
     * @param mixed $iso
     * @return VirtualServer
     */
    public function setIso($iso) {
        $this->iso = $iso;
        return $this;
    }

    /**
     * @param mixed $stid
     * @return VirtualServer
     */
    public function setStid($stid) {
        $this->stid = $stid;
        return $this;
    }

    /**
     * @param mixed $vnc
     * @return VirtualServer
     */
    public function setVnc($vnc) {
        $this->vnc = $vnc;
        return $this;
    }

    /**
     * @param mixed $vncpass
     * @return VirtualServer
     */
    public function setVncpass($vncpass) {
        $this->vncpass = $vncpass;
        return $this;
    }

    /**
     * @param mixed $swapram
     * @return VirtualServer
     */
    public function setSwapram($swapram) {
        $this->swapram = $swapram;
        return $this;
    }

    /**
     * @param mixed $shadow
     * @return VirtualServer
     */
    public function setShadow($shadow) {
        $this->shadow = $shadow;
        return $this;
    }

    /**
     * @param mixed $hvm
     * @return VirtualServer
     */
    public function setHvm($hvm) {
        $this->hvm = $hvm;
        return $this;
    }

    /**
     * @param mixed $boot
     * @return VirtualServer
     */
    public function setBoot($boot) {
        $this->boot = $boot;
        return $this;
    }

    /**
     * @param mixed $ips
     * @return VirtualServer
     */
    public function setIps($ips) {
        $this->ips = $ips;
        return $this;
    }

    /**
     * @param mixed $num_ips6
     * @return VirtualServer
     */
    public function setNumIps6($num_ips6) {
        $this->num_ips6 = $num_ips6;
        return $this;
    }

    /**
     * @param mixed $numips6_subnet
     * @return VirtualServer
     */
    public function setNumips6Subnet($numips6_subnet) {
        $this->numips6_subnet = $numips6_subnet;
        return $this;
    }

    /**
     * @param mixed $noemail
     * @return VirtualServer
     */
    public function setNoemail($noemail) {
        $this->noemail = $noemail;
        return $this;
    }

    /**
     * @param mixed $add_user
     * @return VirtualServer
     */
    public function setAddUser($add_user) {
        $this->add_user = $add_user;
        return $this;
    }

    /**
     * @param mixed $user_email
     * @return VirtualServer
     */
    public function setUserEmail($user_email) {
        $this->user_email = $user_email;
        return $this;
    }

    /**
     * @param mixed $user_pass
     * @return VirtualServer
     */
    public function setUserPass($user_pass) {
        $this->user_pass = $user_pass;
        return $this;
    }

    /**
     * @param mixed $add_ip
     * @return VirtualServer
     */
    public function setAddIp($add_ip) {
        $this->add_ip = $add_ip;
        return $this;
    }

    /**
     * @param mixed $vnc_keymap
     * @return VirtualServer
     */
    public function setVncKeymap($vnc_keymap) {
        $this->vnc_keymap = $vnc_keymap;
        return $this;
    }

    /**
     * @param mixed $cpunit
     * @return VirtualServer
     */
    public function setCpunit($cpunit) {
        $this->cpunit = $cpunit;
        return $this;
    }

    /**
     * @param mixed $uid
     * @return VirtualServer
     */
    public function setUid($uid) {
        $this->uid = $uid;
        return $this;
    }

    /**
     * @param mixed $dnsplan_id
     * @return VirtualServer
     */
    public function setDnsplanId($dnsplan_id) {
        $this->dnsplan_id = $dnsplan_id;
        return $this;
    }

    /**
     * @param mixed $addvs
     * @return VirtualServer
     */
    public function setAddvs($addvs) {
        $this->addvs = $addvs;
        return $this;
    }

    /**
     * @param mixed $band_suspend
     * @return VirtualServer
     */
    public function setBandSuspend($band_suspend) {
        $this->band_suspend = $band_suspend;
        return $this;
    }

    /**
     * @param mixed $osreinstall_limit
     * @return VirtualServer
     */
    public function setOsreinstallLimit($osreinstall_limit) {
        $this->osreinstall_limit = $osreinstall_limit;
        return $this;
    }

    /**
     * @param mixed $tuntap
     * @return VirtualServer
     */
    public function setTuntap($tuntap) {
        $this->tuntap = $tuntap;
        return $this;
    }

    /**
     * @param mixed $vif_type
     * @return VirtualServer
     */
    public function setVifType($vif_type) {
        $this->vif_type = $vif_type;
        return $this;
    }

    /**
     * @param mixed $nic_type
     * @return VirtualServer
     */
    public function setNicType($nic_type) {
        $this->nic_type = $nic_type;
        return $this;
    }

    /**
     * @param mixed $ips_int
     * @return VirtualServer
     */
    public function setIpsInt($ips_int) {
        $this->ips_int = $ips_int;
        return $this;
    }

    /**
     * @param mixed $virio
     * @return VirtualServer
     */
    public function setVirio($virio) {
        $this->virio = $virio;
        return $this;
    }
}