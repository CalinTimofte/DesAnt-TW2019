<?php
/* Erori count  performance */

class EroriPerformance {

	public function calculeaza($stats) {
		$count=0;
$rez[0]=-1; // nota
$rez[1]=""; // content
$rez[2]=0; //numar erori
$stats = json_decode($stats, true);

foreach ( $stats["lighthouseResult"]['audits'] as $test )
{
	if($test["scoreDisplayMode"]=="numeric" or$test["scoreDisplayMode"]=="binary")
		{
			$rez[1].= "<b>".$test["title"]."<br> Score : ". $test["score"] ."</b>"."<br>" . $test["description"] ."<br>";
			if($test["score"] !=1)
				$count++;

	switch($test["id"])
	{
		case "dom-size" :
		foreach($test["details"]["items"] as $item)
			$rez[1].= "statistic" . $item["statistic"] . " : <b>" . $item["value"]. "</b><br>";
		break;
		case "font-display":
		if($test["score"] ==0)
		{

			foreach($test["details"]["items"] as $imag)
				$rez[1] .="<b> url: </b>" . $imag["url"] . "<br><b> wastedMs: </b>". $imag["wastedMs"] . " <br>";
		}
		break;
		case "uses-long-cache-ttl" :
		$rez[1] .= "<b>" . $test["displayValue"] . " : </b>";
		$rez[1] .= $test[ "details"]["summary"]["wastedBytes"]. "<br>";
		break;
		case "bootup-time" :
		$rez[1] .= "<b> wastedMs : </b>". $test["details"]["summary"]["wastedMs"];
		break;
		case "unused-css-rules" :
		case "uses-responsive-images" :
		case "offscreen-images" :
		case "uses-optimized-images" :
		if($test["score"] !=1)
		{
			$rez[1].= "<b>Imagini care pot fi optimizate : </b> <br> ";
		foreach($test["details"]["items"] as $img)
		$rez[1].= "<b> url : </b>". $img["url"] . "<br>" . "<b> wastedBytes : </b>". $img["wastedBytes"] . "<br>";
	   }
	   
		case "uses-text-compression" :
		case "uses-rel-preconnect" :
		case "unminified-css" :
		case "render-blocking-resources" :
		case "efficient-animated-content" ;
		case "redirects" :
		case "unminified-javascript" :
		case "uses-rel-preload" :
		$rez[1].= "overallSavingsMs : " . $test["details"]["overallSavingsMs"] . " <br>";
		break;

		default:
	}

	$rez[1] .= "<br>";
}

}

$test = $stats["lighthouseResult"]["audits"]["metrics"]["details"]["items"][0] ;
$rez[1] .= "<b>Metrics : </b><br>";
$rez[1].= "observedSpeedIndex : " . $test[ "observedSpeedIndex"] . "<br>" .
"estimatedInputLatency : " .  $test[ "estimatedInputLatency"] . "<br>" .
"observedFirstPaint : " .  $test[ "observedFirstPaint"] . "<br>" .
"observedLastVisualChange : " .  $test[  "observedLastVisualChange"] ."<br>" .
"firstContentfulPaint : " .  $test[  "firstContentfulPaint"] . "<br>" .
"speedIndex : " . $test["speedIndex"] . "<br>" . 
"observedFirstContentfulPaint : " . $test[ "observedFirstContentfulPaint"]."<br>" .     
"firstMeaningfulPaint : " . $test[ "firstMeaningfulPaint"]   . "<br>" . 
"firstCPUIdle : " .  $test["firstCPUIdle"]. "<br>" .
"observedDomContentLoaded : " . $test[ "observedDomContentLoaded"]. "<br>" .
"observedNavigationStart : ".$test["observedNavigationStart"]. "<br>" .
"interactive : " .$test[ "interactive"]   . "<br>" .
"observedLoad : " . $test["observedLoad"]. "<br>" ; 


$rez[0] =  $stats["lighthouseResult"]["categories"]["performance"]["score"] *10;
$rez[2]=$count;

return $rez;
}

}
?>