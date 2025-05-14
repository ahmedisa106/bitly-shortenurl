<?php

namespace Ahmedisa106\Shorturl;

class Bitly
{
    public static function getShortenUrl(string $url)
    {
        $curl = curl_init();
        $data = json_encode([
            'domain' => 'bit.ly',
            'long_url' => $url
        ]);
        $token = getBitlyToken();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api-ssl.bitly.com/v4/shorten',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => $data,
            CURLOPT_HTTPHEADER => array(
                'Authorization: Bearer ' . $token,
                'Content-Type: application/json'
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        return json_decode($response)->link;
    }
}
