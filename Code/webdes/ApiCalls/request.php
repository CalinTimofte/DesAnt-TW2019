<?php

class HTTPResponse {
    public $body;
    public $headers;
    public $status_code;
    public $status_message;
    protected $raw_response;

    function __construct($response) {
        $this->raw_response = $response;
        $this->headers = array();
        $this->status_code = '';
        $this->status_message = '';
        $this->body = '';

        $this->parse();
    }

    private function parse_headers($raw_headers){
        $headers = explode("\r\n", $raw_headers);
        
        $status = array_shift($headers);
        preg_match('#HTTP/(\d\.\d)\s(\d\d\d)\s(.*)#', $status, $matches);
        $this->status_code = $matches[2];
        $this->status_message = $matches[3];

        foreach($headers as $raw_header){
            $header = explode(':', $raw_header);
            $this->headers[trim($header[0])] = trim($header[1]);
        }
        
    }

    private function parse(){
        $response = explode("\r\n\r\n", $this->raw_response);
        $this->parse_headers($response[0]);
        $this->body = $response[1] ;
    }
    
}


class HTTPRequest {
    
    protected $user_agent;
    protected $error;
    protected $request;
    protected $headers;

    function __construct() {
        $this->user_agent = 'Curl/Proiect Tehnologii Web';
        if(isset($_SERVER['HTTP_USER_AGENT'])){
            $this->user_agent = $_SERVER['HTTP_USER_AGENT'];    
        }
        $this->headers = array();
        $this->error = '';
    }

    private function set_method($method){
        switch (strtoupper($method)) {
            case 'GET':
                curl_setopt($this->request, CURLOPT_HTTPGET, true);
                break;
            case 'POST':
                curl_setopt($this->request, CURLOPT_POST, true);
                break;
            default:
                curl_setopt($this->request, CURLOPT_CUSTOMREQUEST, $method);
        }
    }

    private function set_options(){
        curl_setopt($this->request, CURLOPT_HTTPHEADER, $this->headers);
        curl_setopt($this->request, CURLOPT_HEADER, true);
        curl_setopt($this->request, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($this->request, CURLOPT_USERAGENT, $this->user_agent); 

    }

    function request($method, $url, $vars = array()) {
        $this->error = '';
        $this->request = curl_init();
        $this->set_method($method);
        $this->set_options();

        curl_setopt($this->request, CURLOPT_URL, $url);
        if(is_array($vars) and !empty($vars)){
            $vars = http_build_query($vars, '', '&');
            curl_setopt($this->request, CURLOPT_POSTFIELDS, $vars);
        }
       
        $response = curl_exec($this->request);
        if ($response) {
            $response = new HTTPResponse($response);
        } else {
            $this->error = curl_error($this->request);
        }
        
        curl_close($this->request);
        return $response;
    }

    function get_last_error() {
        return $this->error;
    }    

    function get($url, $vars = array()) {
        if (!empty($vars)) {
            $url .= (stripos($url, '?') !== false) ? '&' : '?';
            $url .= (is_string($vars)) ? $vars : http_build_query($vars, '', '&');
        }
        return $this->request('GET', $url);
    }
    
    function post($url, $vars = array()) {
        return $this->request('POST', $url, $vars);
    }

}