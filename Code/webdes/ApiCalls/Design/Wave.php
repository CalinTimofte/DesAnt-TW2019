<?php
require_once 'ApiCalls/request.php';

class waveApi{

  public function get_stats($link) {
    $request = new HTTPRequest();
    $validator = 'http://wave.webaim.org/api/request?key=Exi9a9N41249&reporttype=2&url=';
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
}
}

?>