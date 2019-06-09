<?php 
/* Code quality stats -- apeleaza fiecare api de la code quality */
require_once 'ApiCalls/CodeQuality/HTMLValidator.php';
require_once 'ApiCalls/CodeQuality/CSSValidator.php';


class StatsCodeQuality{
	public function calculeaza($link) {

$htmlValidationObj = new htmlValidator();
$statsHTML =$htmlValidationObj->get_stats($link);
// check for errors in header-ul de erori 
//sent to erori-count 
// erori-count returns erori+ nota specifica


$cssValidationObj = new CSSValidator();
$statsCSS =$cssValidationObj->get_stats($link);
// check for errors in header-ul de erori 
//sent to erori-count 
// erori-count returns erori+ nota specifica
$rezultat = $statsHTML['response'] . "<br>" . $statsCSS['response'];


// put them together in $rezultat
return $rezultat;
}


}
?>
