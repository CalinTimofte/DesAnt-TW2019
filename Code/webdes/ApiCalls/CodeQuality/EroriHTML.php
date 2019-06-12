<?php
/* Erori count  code quality */

class EroriHTML {
	public function calculeaza($stats) {
		
		$text = explode("<div id=\"results\">", $stats);
		$text = explode("</ol>", $text[1]);
		$rez[1]="<div id=\"results\">" . $text[0] . "</ol>";
		$rez[2]=substr_count($rez[1],"</li>");

		// acordam nota
		if($rez[2] <50 ) $rez[0] = 10;
		else if( $rez[2] < 100) $rez[0] = 9;
		else if( $rez[2] < 150) $rez[0] = 8;
		else if( $rez[2] < 200) $rez[0] = 7;
		else if( $rez[2] < 250) $rez[0] = 6;
		else if( $rez[2] < 300) $rez[0] = 5;
		else if( $rez[2] < 350) $rez[0] = 4;
		else if( $rez[2] < 400) $rez[0] = 3;
		else if( $rez[2] < 450) $rez[0] = 2;
		else  $rez[0] = 1;

		return $rez;
	}
}
?>
