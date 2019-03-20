<?php
/**
 * Created by PhpStorm.
 * User: vinnyvinny
 * Date: 11/3/18
 * Time: 11:44 AM
 */

namespace App\chupa\Aft;


abstract class Service
{
    protected $client;

    protected $username;

    protected $apiKey;

    public function __construct($client, $username, $apiKey)
    {
        $this->client 	= $client;
        $this->username = $username;
        $this->apiKey 	= $apiKey;
    }

    protected static function error($data) {
        return [
            'status' 	=> 'error',
            'data'		=> $data
        ];
    }


    protected static function success($data) {
        return [
            'status' 	=> 'success',
            'data'		=> json_decode($data->getBody()->getContents())
        ];
    }
}
