<?php
require 'config/autoloader.php';

class CareMonkeyPHP
{
    public $request;

    protected $module = array(
        'Carer',
        'Eform',
        'ExternalGroup',
        'ExternalProfileRequest',
        'Group',
        'ProfileRequest'
    );

    public function __construct($args){
        $this->classes($args);
    }

    public function classes($args){
        if(!in_array($args, $this->module)){
            throw new \Exception('Invalid Request', 404);
        }
        $class='CareMonkeyPHP\\classes\\'.$args;
        $this->request = new $class;
    }
}




