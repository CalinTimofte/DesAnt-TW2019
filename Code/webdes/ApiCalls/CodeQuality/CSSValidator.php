 <?php
    require_once 'ApiCalls/request.php';

    class CSSValidator{

  public function get_stats($link) {


    $request = new HTTPRequest();
    $validator = 'http://jigsaw.w3.org/css-validator/validator?uri=';
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