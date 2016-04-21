<?php
/**
 * Created by PhpStorm.
 * User: florence.labrador
 * Date: 4/19/16
 * Time: 3:14 PM
 */
namespace CareMonkeyPHP\classes;

use CareMonkeyPHP\http\CurlRequest;

class Carer
{
    var $url;
    var $base;

    public function __construct()
    {
        $this->url=CM_API."group_carers";
        $this->base = new CurlRequest();
    }

    public function retrieve()
    {
        /*https://groups.caremonkey.com/api/v1/group_carers?api_access_token=API_ACCESS_TOKEN*/

        $this->base->url = $this->url.CM_TOKEN_KEY;
        return $this->base->retrieve_request();
    }

    public function new_carer($params)
    {
        /*
          group_parameters = {:name => "Simba Josh", :email => "simba.josh@gmail.com", :mobile_number => "9494595495" }
          create_url = "https://groups.caremonkey.com/api/v1/group_carers?api_access_token=API_ACCESS_TOKEN"
          response = HTTParty.post(create_url, :body => {:group_carer => group_parameters}, :timeout => 55)
        */

        $this->base->url = $this->url.CM_TOKEN_KEY;
        return $this->base->executeCurl($params, "POST");
    }

    public function update_carer($group_carer_id,$params=array())
    {
        /*
        group_parameters = {:name => "Simba Joe", :email => "simba.josh@gmail.com", :mobile_number => "5244233" }
        update_url = "https://groups.caremonkey.com/api/v1/group_carers/group_carer_id?api_access_token=API_ACCESS_TOKEN"
        response = HTTParty.patch(update_url, :body => {:group_carer => group_parameters}, :timeout => 55)
        */

        $this->base->url =$this->url.'/'. $group_carer_id .CM_TOKEN_KEY;
        return $this->base->executeCurl($params, "PATCH");
    }

    public function delete_carer($group_carer_id)
    {

        /*
        delete_url = "https://groups.caremonkey.com/api/v1/group_carers/group_carer_id?api_access_token=API_ACCESS_TOKEN"
        response = HTTParty.delete(delete_url, :timeout => 55)
        */

        $this->base->url =$this->url.'/'. $group_carer_id .CM_TOKEN_KEY;
        return $this->base->executeCurl(null,"DELETE");
    }
}