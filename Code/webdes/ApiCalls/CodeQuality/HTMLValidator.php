<?php
    require_once 'ApiCalls/request.php';

  class htmlValidator{

  public function get_stats($link) {
    $request = new HTTPRequest();
    $validator = 'https://validator.w3.org/nu/?doc=';
    $response = $request->get($validator . $link);

//returneaza html si am mai scos titlul paginii si alte chestii inutile
 $corpul = explode("</form>", $response->body);
          $corpul2 = explode("<p class=\"msgschema\">", $corpul[1]);
    $body = "<!DOCTYPE html><html lang=\"en\"><body>". $corpul2[0] . "</body></html>" ;
//pana aici

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