<?php
/**
 * Created by PhpStorm.
 * User: Bennet
 * Date: 2/15/2018
 * Time: 11:32 PM
 */

namespace Virtualizor;


use Virtualizor\Objects\VirtualServer;

class Virtualizor {

    public $key;
    public $pass;
    public $ip;
    public $port;

    public function __construct($ip, $key, $pass, $port = ':80/') {
        $this->ip = $ip;
        $this->key = $key;
        $this->pass = $pass;
        $this->port = $port;
    }

    public function getKey() {
        return $this->key;
    }
    public function getPass() {
        return $this->pass;
    }
    public function getIp() {
        return $this->ip;
    }
    public function getPort() {
        return $this->port;
    }

    public function __request($url, $post) {
        $postData = '';
        //create name value pairs seperated by &
        foreach ($post as $k => $v) {
            $postData .= $k . '=' . $v . '&';
        }
        $postData = rtrim($postData, '&');

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, "http://" . Virtualizor::getIp() . Virtualizor::getPort() . $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_POST, count($postData));
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);

        $output = curl_exec($ch);

        curl_close($ch);
        return $output;
    }

    public function vps() {
        return new VirtualServer($this);
    }
}