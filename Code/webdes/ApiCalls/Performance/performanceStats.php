<?php 
/* Performance stats -- apeleaza fiecare api de la performance */
require_once 'ApiCalls/Performance/Performance.php';

class StatsPerformance{

public function calculeaza($link) {

$performanceObj = new PerformanceChecker();
$stats =$performanceObj->get_stats($link); 


// check for errors in header-ul de erori 
//sent to erori-count 
// erori-count returns erori+ nota specifica
// put them together in $rezultat
$rezultat = $stats['response'];
return json_encode($rezultat, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);

}
}
?>