<?php
/**
 * Created by PhpStorm.
 * User: vinnyvinny
 * Date: 10/29/18
 * Time: 10:52 AM
 */

namespace App\chupa\OAuth;


class OAuthSignatureMethodHMACSHA1 extends OAuthSignatureMethod{

    function get_name() {
        return "HMAC-SHA1";
    }

    public function build_signature($request, $consumer, $token) {
        $base_string = $request->get_signature_base_string();
        $request->base_string = $base_string;

        $key_parts = array(
            $consumer->secret,
            ($token) ? $token->secret : ""
        );

        $key_parts = OAuthUtil::urlencode_rfc3986($key_parts);
        $key = implode('&', $key_parts);

        return base64_encode(hash_hmac('sha1', $base_string, $key, true));
    }
}
