<?php
    require_once 'ApiCalls/request.php';

  class htmlValidator{

  public function get_stats($link) {
    $request = new HTTPRequest();
    $validator = 'https://validator.w3.org/nu/?doc=';
    $response = $request->get($validator . $link);

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