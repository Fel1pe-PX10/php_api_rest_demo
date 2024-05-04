<?php

class UserController extends BaseController {
    
    public function listAction(){
        $strErrorDesc = '';
        $requestMethod = $_SERVER['REQUEST_METHOD'];
        $arrQuetyStringParams = $this->getQueryStringParams();

        if(strtoupper($requestMethod) == 'GET'){
            try {
                $userModel = new User();

                $intLimit = 10;
                if(isset($arrQuetyStringParams['limit']) && $arrQuetyStringParams['limit']) $intLimit = 10;

                $arrUsers = $userModel->getUsers($intLimit);
                $responseData = json_encode($arrUsers);

            } catch (Error $e) {
                $strErrorDesc = $e->getMessage().'Something went wrong! Please contact support.';
                $strErrorHeader = 'HTTP/1.1 500 Internal Server Error';
            }
        }
        else{
            $strErrorDesc = 'Method not supported';
            $strErrorHeader = 'HTTP/1.1 422 Unprocessable Entity';
        }

        if (!$strErrorDesc) {
            $this->sendOutput(
                $responseData,
                array('Content-Type: application/json', 'HTTP/1.1 200 OK')
            );
        } else {
            $this->sendOutput(json_encode(array('error' => $strErrorDesc)), 
                array('Content-Type: application/json', $strErrorHeader)
            );
        }
    }
}