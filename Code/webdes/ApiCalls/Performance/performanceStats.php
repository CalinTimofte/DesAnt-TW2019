<?php 
/* Performance stats -- apeleaza fiecare api de la performance */
require_once 'ApiCalls/Performance/Performance.php';
require_once 'ApiCalls/Performance/EroriPerformance.php';
require_once 'ApiCalls/Erori.php';

class StatsPerformance{

public function calculeaza($link) {

$err = new EroriPerformance();
$performanceObj = new PerformanceChecker();
$stats =$performanceObj->get_stats($link); 


 $erori = new Erori();
 return $erori->get_errors($stats,$err);

}
}
?>