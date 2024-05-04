<?php

class BaseController {
    
    public function __call($name, $arguments){
        $this->sendOutput('', array('HTTP/1.1 404 Not Founds'));
    }

    protected function getUriSegments(){
        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $uri = explode('/', $uri);

        return $uri;
    }

    protected function getQueryStringParams(){
        return parse_str($_SERVER['QUERY_STRING'], $query);
    }

    protected function sendOutput($data, $httpReaders=array()){
        header_remove('Set-Cookie');

        if(is_array($httpReaders) && count($httpReaders)){
            foreach($httpReaders as $httpReader){
                header($httpReader);
            }
        }

        echo $data;
        exit;
    }
}