 <?php
    require_once 'ApiCalls/request.php';

    class CSSValidator{

  public function get_stats($link) {


    $request = new HTTPRequest();
    $validator = 'http://jigsaw.w3.org/css-validator/validator?uri=';
    $response = $request->get($validator . $link);

///////
$corpul = explode("<head>", $response->body);
          $corpul2 = explode("<li><strong>Jump to:</strong></li>", $response->body);
    $body = $corpul[0]. "<body>" .$corpul2[1] ;
//
    $corpul = explode("<p class=\"backtop\"><a href=\"#banner\">&uarr; Top</a></p>", $body);
 $corpul2 = explode(" <div id=\"warnings\">", $body);
  $body = $corpul[0] .$corpul2[1] ;

  //
    $corpul = explode("<p class=\"backtop\"><a href=\"#banner\">&uarr; Top</a></p>", $body);
    $body = $corpul[0] ."</body></html>";

     

    $message = array(
        'meta' => array(
            'error'  => $request->get_last_error(),
            'status' => array(
                'code'    => $response->status_code,
                'message' => $response->status_message,
            ),
            'headers' => $response->headers,
        ),
        'response' => $body,
    );

    return $message;
}}
 
?>