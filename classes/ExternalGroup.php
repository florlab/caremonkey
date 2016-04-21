<?php
/**
 * Created by PhpStorm.
 * User: florence.labrador
 * Date: 4/19/16
 * Time: 3:14 PM
 */
namespace CareMonkeyPHP\classes;

use CareMonkeyPHP\http\CurlRequest;

class ExternalGroup
{
    var $url;
    var $base;

    public function __construct()
    {
        $this->url=CM_API;
        $this->base = new CurlRequest();
    }

    public function retrieve_external_group()
    {
        /*https://groups.caremonkey.com/api/v1/groups?api_access_token=API_ACCESS_TOKEN&external_group=true*/

        $this->base->url = $this->url.'groups'.CM_TOKEN_KEY.'&external_group=true';
        return $this->base->executeCurl();
    }

    public function new_external_group($params)
    {
        /*create_url = "https://groups.caremonkey.com/api/v1/external_groups?api_access_token=API_ACCESS_TOKEN"
        response = HTTParty.post(create_url, :body => {:external_group_params => {:group_name => "External Group"}})*/

        $this->base->url = $this->url."external_groups".CM_TOKEN_KEY;
        return $this->base->executeCurl($params,"POST");
    }

    public function update_profile_request($external_group_id ,$params=array())
    {
        /*update_url = "https://groups.caremonkey.com/api/v1/external_groups/2?api_access_token=API_ACCESS_TOKEN"
        response = HTTParty.patch(update_url, :body => {:external_group_params => {:group_name => "My Testing external Group"}})*/

        $this->base->url = $this->url."external_groups"."/".$external_group_id.CM_TOKEN_KEY;
        return $this->base->executeCurl($params,"PATCH");
    }

    public function delete_profile_request($external_group_id)
    {
        /*delete_url = "https://groups.caremonkey.com/api/v1/external_groups/22?api_access_token=API_ACCESS_TOKEN"
        response = HTTParty.delete(delete_url, :timeout => 55)*/

        $this->base->url = $this->url."external_groups"."/".$external_group_id.CM_TOKEN_KEY;
        return $this->base->executeCurl(null,"DELETE");
    }
}