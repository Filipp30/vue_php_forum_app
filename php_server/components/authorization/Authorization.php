<?php

namespace Authorization;
use \Firebase\JWT\JWT;
class Authorization{

    private string $controllerName;
    private string $functionName;
    private string $jwt_authorization;

    function __construct($controllerName,$functionName,$jwt_authorization=null){
        $this->controllerName = $controllerName;
        $this->functionName = $functionName;
        if ($jwt_authorization !=null){
            $this->jwt_authorization = $jwt_authorization;
        }

    }

    function get_permission(): bool{
        if(($this->controllerName == 'identityController'
            && ($this->functionName == 'user_authentication' || $this->functionName == 'user_registration'))
        ||$this->controllerName == 'mainController' && $this->functionName == 'send_mail'){
            return true;
        }else{
        try{
            $user_jwt_decoded = JWT::decode($this->jwt_authorization,$_ENV['JWT_SECRET_KEY'], array('HS256'));
            $user_id = $user_jwt_decoded->id;
            return true;
            }catch (\Exception $e){
                if ($this->handleException($e)){
                    return true;
                }else{
                    return false;
                }
            }
        }
    }

    private function handleException($e): bool{
        if ($e->getMessage() == 'Expired token' && $this->jwt_refresh()){
            return true;
        }else{
            return false;
        }
    }

    private function jwt_refresh(): bool{
        return false;
    }
}