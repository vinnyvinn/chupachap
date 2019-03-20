<?php
/**
 * Created by PhpStorm.
 * User: vinnyvinny
 * Date: 10/29/18
 * Time: 10:51 AM
 */

namespace App\chupa\OAuth;


class OAuthSignatureMethod
{

    public function check_signature(&$request, $consumer, $token, $signature) {
        $built = $this->build_signature($request, $consumer, $token);
        return $built == $signature;
    }
}
