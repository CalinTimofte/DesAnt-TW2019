<?php 
/* Code quality stats -- apeleaza fiecare api de la code quality */
require_once 'ApiCalls/CodeQuality/HTMLValidator.php';
require_once 'ApiCalls/CodeQuality/CSSValidator.php';
require_once 'ApiCalls/CodeQuality/EroriHTML.php';
require_once 'ApiCalls/CodeQuality/EroriCSS.php';


class StatsCodeQuality{
	public function calculeaza($link) {

$htmlValidationObj = new htmlValidator();
$statsHTML =$htmlValidationObj->get_stats($link);

$erori = new Erori();
 $err = new EroriHTML();
  $rezultat1= $erori->get_errors($statsHTML,$err);

$cssValidationObj = new CSSValidator();
$statsCSS =$cssValidationObj->get_stats($link);
 $err = new EroriCSS();
   $rezultat2= $erori->get_errors($statsCSS,$err);


$rezultat["nota"] = ($rezultat1["nota"] + $rezultat2["nota"] ) /2;
$rezultat["descriereEroare"]=$rezultat1["descriereEroare"] . " <br>" .$rezultat2["descriereEroare"];
$rezultat["content"] = $rezultat1["content"] . " <br>" . $rezultat2["content"];
$rezultat["numarErori"]=$rezultat1["numarErori"] + $rezultat2["numarErori"] ;


return $rezultat;
}


}
?>
