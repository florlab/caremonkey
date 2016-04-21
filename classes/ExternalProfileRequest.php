<?php
/**
 * Created by PhpStorm.
 * User: rommel.semira
 * Date: 4/19/16
 * Time: 3:14 PM
 */
namespace CareMonkeyPHP\classes;

use CareMonkeyPHP\http\CurlRequest;
class ExternalProfileRequest {
    var $base;


    public function __construct()
    {
        $this->base = new CurlRequest();
    }

    /**
     * @funtion executeCurl ( @params, @method, @headers )
     *
    */

    public function retrieve_external_profile( $id ){
        $this->base->url = CM_API_EXTERNAL_PROFILE.'/'.$id.CM_TOKEN_KEY;
        $response =  $this->base->executeCurl();
        return $response ;
    }


    public function retrieve_all_external_profile(){
        $this->base->url = CM_API_GROUPS.CM_TOKEN_KEY.'&external_profile_request=true';
        $response =  $this->base->executeCurl();
        return $response ;
    }

    public function create_external_profile( $params = array() )
    {
        $this->base->url = CM_API_EXTERNAL_PROFILE.CM_TOKEN_KEY;
        return $this->base->executeCurl( $params, 'POST' );
    }

    public function delete_external_profile($id)
    {
        $this->base->url = CM_API_EXTERNAL_PROFILE.'/'.$id.CM_TOKEN_KEY;
        return $this->base->executeCurl( null , 'DELETE' );
    }

    public function update_external_profile($id ,  $params)
    {
        $this->base->url = CM_API_EXTERNAL_PROFILE.'/'.$id.CM_TOKEN_KEY;
        return $this->base->executeCurl( http_build_query( $params ), 'PATCH' );
    }
}