<?php

namespace CareMonkeyPHP\http;

class CurlRequest
{
    var $url;
    var $curl;

    public function __construct()
    {
        $this->curl=curl_init();
    }

    public function post_request($params=null){
        curl_setopt_array($this->curl, array(
            CURLOPT_URL => $this->url,
            CURLOPT_SSL_VERIFYHOST => false,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_HTTPHEADER => array('Content-type: multipart/form-data'),
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => $params
        ));

        if (curl_errno($this->curl)) {
            throw new Exception(curl_error($this->curl));
        }

        return curl_exec($this->curl);
    }

    public function delete_request(){
        curl_setopt_array($this->curl, array(
            CURLOPT_URL => $this->url,
            CURLOPT_SSL_VERIFYHOST => false,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_HTTPHEADER => array(
                'Content-type: multipart/form-data'
            ),
            CURLOPT_CUSTOMREQUEST => 'DELETE'
        ));

        if (curl_errno($this->curl)) {
            throw new Exception(curl_error($this->curl));
        }

        return curl_exec($this->curl);
    }

    public function retrieve_request(){
        curl_setopt_array($this->curl, array(
            CURLOPT_URL => $this->url,
            CURLOPT_SSL_VERIFYHOST => false,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_HTTPHEADER => array(
                'Content-type: multipart/form-data'
            ),
            CURLOPT_CUSTOMREQUEST => 'GET'
        ));

        if (curl_errno($this->curl)) {
            throw new Exception(curl_error($this->curl));
        }

        return curl_exec($this->curl);
    }

    public function patch_request($params=array()){
        curl_setopt_array($this->curl, array(
            CURLOPT_URL => $this->url,
            CURLOPT_SSL_VERIFYHOST => false,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_HTTPHEADER => array(
                'Content-type: multipart/form-data'
            ),
            CURLOPT_CUSTOMREQUEST => 'PATCH',
            CURLOPT_POSTFIELDS => $params
        ));

        if (curl_errno($this->curl)) {
            throw new Exception(curl_error($this->curl));
        }

        return curl_exec($this->curl);
    }

    public function executeCurl( $params = array(), $method = 'GET' , $headers = array( 'Content-type: multipart/form-data' ) ){
        $method = strtoupper( $method );
        if ( !is_array( $params ) )
        {
            $param = array();
            array_push($param, $params);
            $params = $param;
        }
        curl_setopt_array($this->curl, array(
            CURLOPT_URL => $this->url,
            CURLOPT_SSL_VERIFYHOST => false,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_HTTPHEADER => $headers,
            CURLOPT_CUSTOMREQUEST => $method,
            CURLOPT_POSTFIELDS => http_build_query( $params )
        ));

        if (curl_errno($this->curl)) {
            throw new Exception(curl_error($this->curl));
        }

        return json_decode( curl_exec($this->curl) );
    }
}
