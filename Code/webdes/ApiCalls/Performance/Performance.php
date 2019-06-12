<?php
    require_once 'ApiCalls/request.php';


  class PerformanceChecker{

  public function get_stats($link) {
    $request = new HTTPRequest();
    $key = "&key=AIzaSyA98doazfm1yDhtnTwHeM81PQQNCdTWKGk";


    $response = $request->get('https://www.googleapis.com/pagespeedonline/v5/runPagespeed?url='.$link.$key);

    $message = array(
        'meta' => array(
            'error'  => $request->get_last_error(),
            'status' => array(
                'code'    => $response->status_code,
                'message' => $response->status_message,
            ),
            'headers' => $response->headers,
        ),
        'response' => $response->body,
    );

    return $message;
}}
    
?>