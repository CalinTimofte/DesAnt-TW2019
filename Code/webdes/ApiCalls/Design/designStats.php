<?php 
/* Design stats -- apeleaza fiecare api de la design */
require_once 'ApiCalls/Design/Wave.php';

class StatsDesign{

public function calculeaza($link) {

$waveObj = new waveApi();
//$stats =$waveObj->get_stats($link); // l-am lasat in comentariu ca am nr limitat de requesturi, dar merge

// check for errors in header-ul de erori 
//sent to erori-count 
// erori-count returns erori+ nota specifica
// put them together in $rezultat
$rezultat = "Imagineaza-ti ca-s statistici de design";
return $rezultat;
}
}
?>


