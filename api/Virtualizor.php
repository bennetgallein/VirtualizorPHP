<?php
/**
 * Created by PhpStorm.
 * User: Bennet
 * Date: 2/15/2018
 * Time: 11:32 PM
 */

namespace Virtualizor;

use Virtualizor\Objects\IPPool;
use Virtualizor\Objects\VirtualServer;

class Virtualizor {

    public $key;
    public $pass;
    public $ip;
    public $port;

    private $apik;

    public function __construct($ip, $key, $pass, $port = '4085') {
        $this->ip = $ip;
        $this->key = $key;
        $this->pass = $pass;
        $this->port = $port;
    }

    private function getAPIK($key, $pass) {
        return $key . md5($pass . $key);
    }

    private function generateRandStr($length) {
        $randstr = "";
        for ($i = 0; $i < $length; $i++) {
            $randnum = mt_rand(0, 61);
            if ($randnum < 10) {
                $randstr .= chr($randnum + 48);
            } elseif ($randnum < 36) {
                $randstr .= chr($randnum + 55);
            } else {
                $randstr .= chr($randnum + 61);
            }
        }
        return strtolower($randstr);
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

    public function __request($path, $post = array(), $cookies = array()) {

        $ch = curl_init();

        $key = $this->generateRandStr(8);
        $apikey = $this->getAPIK($key, $this->pass);

        $url = 'https://' . $this->ip . ':' . $this->port . '/' . $path;
        $url .= (strstr($url, '?') ? '' : '?');
        $url .= '&api=json&apikey=' . rawurlencode($apikey);

        curl_setopt($ch, CURLOPT_URL, $url);

        // Time OUT
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 3);

        // Turn off the server and peer verification (TrustManager Concept).
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);

        // UserAgent
        curl_setopt($ch, CURLOPT_USERAGENT, 'Softaculous');

        // Cookies
        if (!empty($cookies)) {
            curl_setopt($ch, CURLOPT_COOKIESESSION, true);
            curl_setopt($ch, CURLOPT_COOKIE, http_build_query($cookies, '', '; '));
        }

        if (!empty($post)) {
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post));
        }

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        // Get response from the server.
        $resp = curl_exec($ch);
        curl_close($ch);

        //echo $url . "<br>";
        //echo $postData;
        return $resp;
    }

    public function serverInfo() {
        return $this->__request("index.php?act=" . $this->act);
    }

    public function vps() {
        return new VirtualServer($this);
    }
    public function ippool() {
        return new IPPool($this);
    }
}