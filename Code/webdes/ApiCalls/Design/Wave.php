<!-- $key = g7t4Zdn41245 , am un numar limitat de credite pe care le pot folosi in toatal ca sa fac apeluri (1 apel = 2 credite), dupa trebuie sa-mi fac cont nou ca nu platesc :)) -->

<?php
require_once 'ApiCalls/request.php';

class waveApi{

  public function get_stats($link) {
    $request = new HTTPRequest();
    $validator = 'http://wave.webaim.org/api/request?key=g7t4Zdn41245&reporttype=2&url=';
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