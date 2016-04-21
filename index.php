<?php
require 'CareMonkeyPHP.php';

$obj=new CareMonkeyPHP('Eform');

$parameters =  array("group_carer"=> array(
    "name" => "Simba d",
    "email" => "simba.josh@gmail.com",
    "mobile_number" => "9494595495"
));

$obj->request->delete_carer('13648');