<?php
/**
 * Created by PhpStorm.
 * User: florence.labrador
 * Date: 4/19/16
 * Time: 3:14 PM
 */
namespace CareMonkeyPHP\classes;

use CareMonkeyPHP\http\CurlRequest;

class Eform
{
    var $url;
    var $base;

    public function __construct()
    {
        $this->url=CM_API."enquiries";
        $this->base = new CurlRequest();
    }

    public function retrieve_eform()
    {
        /*https://groups.caremonkey.com/api/v1/enquiries?api_access_token=API_ACCESS_TOKEN*/

        $this->base->url = $this->url.CM_TOKEN_KEY;
        return $this->base->executeCurl();
    }

    public function retrieve_eform_details($enquiry_id)
    {
        /*https://groups.caremonkey.com/api/v1/enquiries/#{enquiry_id}?api_access_token=#{API_ACCESS_TOKEN}*/

        $this->base->url = $this->url.'/'.$enquiry_id .CM_TOKEN_KEY;
        return $this->base->executeCurl();
    }

    public function update_eform($enquiry_id,$params=array())
    {
        /*patch_params = {member_id: 2}
        patch_url = "https://groups.caremonkey.com/api/v1/enquiries/#{enquiry_id}?api_access_token=#{API_ACCESS_TOKEN}"
        response = HTTParty.patch(patch_url, body: patch_params, timeout: 55)*/

        $this->base->url =$this->url.'/'. $enquiry_id .CM_TOKEN_KEY;
        return $this->base->executeCurl($params,"PATCH");
    }

    public function new_eform($params)
    {
        /*create_request_parameters = {name: "Year 7 Camp", enquiryType: "excursion"}
        create_url = "https://groups.caremonkey.com/api/v1/enquiries?api_access_token=#{API_ACCESS_TOKEN}"
        response = HTTParty.post(create_url, body: create_request_parameters, timeout: 55)*/

        $this->base->url = $this->url.CM_TOKEN_KEY;
        return $this->base->executeCurl($params,"POST");
    }

    public function delete_eform($enquiry_id)
    {
        /*delete_url = "https://groups.caremonkey.com/api/v1/enquiries/#{enquiry_id}?api_access_token=#{API_ACCESS_TOKEN}"
        response = HTTParty.delete(delete_url, :timeout => 55)*/

        $this->base->url =$this->url.'/'. $enquiry_id .CM_TOKEN_KEY;
        return $this->base->executeCurl(null,"DELETE");
    }
}