<?php
/**
 * Created by PhpStorm.
 * User: florence.labrador
 * Date: 4/19/16
 * Time: 3:14 PM
 */
namespace CareMonkeyPHP\classes;

use CareMonkeyPHP\http\CurlRequest;

class ProfileRequest
{
    var $url;
    var $base;

    public function __construct()
    {
        $this->url=CM_API;
        $this->base = new CurlRequest();
    }

    public function retrieve_pf()
    {
        /*https://groups.caremonkey.com/api/v1/groups?api_access_token=API_ACCESS_TOKEN&profile_request=true*/

        $this->base->url = $this->url."groups".CM_TOKEN_KEY.'&profile_request=true';
        return $this->base->executeCurl();
    }

    public function retrieve__pf_with_private_notes(){
        /*https://groups.caremonkey.com/api/v1/groups?api_access_token=API_ACCESS_TOKEN&profile_request=true&private_notes=true*/

        $this->base->url = $this->url."groups".CM_TOKEN_KEY.'&profile_request=true&private_notes=true';
        return $this->base->executeCurl();
    }

    public function new_profile_request($params)
    {
        /*
        profile_request_parameters = {:first_name => "Jack", :last_name => "Swan", :request_email => "jack.swan@gmail.com", :request_mobile_number => "9494595495", :user_request_id => "433434" }
        create_url = "https://groups.caremonkey.com/api/v1/members?api_access_token=API_ACCESS_TOKEN"
        response = HTTParty.post(create_url, :body => {:member => profile_request_parameters}, :timeout => 55)
        */

        $this->base->url = $this->url."members".CM_TOKEN_KEY;
        return $this->base->executeCurl($params,"POST");
    }

    public function update_profile_request($member_id,$params=array())
    {
        /*
        profile_request_parameters = {:first_name => "John", :last_name => "Swan", :request_email => "john.swan@gmail.com", :request_mobile_number => "4455", :user_request_id => "43" }
        update_url = "https://groups.caremonkey.com/api/v1/members/1508?api_access_token=API_ACCESS_TOKEN"
        @response = HTTParty.patch(update_url, :body => {:member => profile_request_parameters}, :timeout => 55)
        */

        $this->base->url = $this->url."members"."/".$member_id.CM_TOKEN_KEY;
        return $this->base->executeCurl($params,"PATCH");
    }

    public function delete_profile_request($member_id)
    {
        /*
        delete_url = "https://groups.caremonkey.com/api/v1/members/member_id?api_access_token=API_ACCESS_TOKEN"
        response = HTTParty.delete(delete_url, :timeout => 55)
        */

        $this->base->url = $this->url."members"."/".$member_id.CM_TOKEN_KEY;
        return $this->base->executeCurl(null,"DELETE");
    }
}