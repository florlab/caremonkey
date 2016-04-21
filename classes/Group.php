<?php
/**
 * Created by PhpStorm.
 * User: rommel.semira
 * Date: 4/19/16
 * Time: 3:14 PM
 */
namespace CareMonkeyPHP\classes;

use CareMonkeyPHP\http\CurlRequest;
 class Group {
     var $base;
    public function __construct()
     {
         $this->base = new CurlRequest();
    }


     /**
      * @return
      */

     public function retrieve_group(){
        $this->base->url = CM_API_GROUPS.CM_TOKEN_KEY.'&group=true';
        $response =  $this->base->executeCurl();
        return  $response ;
    }
     public function retrieve_group_details( $id ){
        $this->base->url = CM_API_GROUPS.'/'.$id.CM_TOKEN_KEY;
         echo CM_API_GROUPS.'/'.$id.CM_TOKEN_KEY;
        $response =  $this->base->executeCurl();
        return  $response ;
    }

     public function create_group( $params = array() )
     {
         $this->base->url = CM_API_GROUPS.CM_TOKEN_KEY;
         return $this->base->executeCurl( $params, 'POST' );
     }

     public function delete_group($id)
     {
         $this->base->url = CM_API_GROUPS.'/'.$id.CM_TOKEN_KEY;
         return $this->base->executeCurl( null, 'DELETE');
     }

     public function update_group($id ,  $params)
     {
         $this->base->url = CM_API_GROUPS.'/'.$id.CM_TOKEN_KEY;
         return $this->base->executeCurl(  $params , 'PATCH' );
     }
}