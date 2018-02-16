<?php
/**
 * Created by PhpStorm.
 * User: Bennet
 * Date: 2/15/2018
 * Time: 11:32 PM
 */

namespace Virtualizor;


class Virtualizor {

    private $key;
    private $pass;
    private $ip;

    public function __construct($ip, $key, $pass, $port = ':80/') {
        $this->ip = $ip;
        $this->key = $key;
        $this->pass = $pass;
        $this->port = $port;
    }

    public function __request($url, $post) {
        $postData = '';
        //create name value pairs seperated by &
        foreach ($post as $k => $v) {
            $postData .= $k . '=' . $v . '&';
        }
        $postData = rtrim($postData, '&');

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, "http://" . $this->ip . $this->port . $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_POST, count($postData));
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);

        $output = curl_exec($ch);
        echo "http://" . $this->ip . $this->port . $url;
        curl_close($ch);
        return $output;
    }
}