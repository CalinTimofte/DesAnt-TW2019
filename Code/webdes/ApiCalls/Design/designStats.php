<?php 
/* Design stats -- apeleaza fiecare api de la design */
require_once 'ApiCalls/Design/Wave.php';
require_once 'ApiCalls/Design/EroriDesign.php';
require_once 'ApiCalls/Erori.php';


class StatsDesign{

	public function calculeaza($link) {

		$err = new EroriDesign();
		$waveObj = new waveApi();
        $stats = $waveObj->get_stats($link); //  nr limitat de requesturi

        $erori = new Erori();
        return $erori->get_errors($stats,$err);
    }
}
?>


