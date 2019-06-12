<?php
/* Erori count  code quality */

class EroriCSS {

	public function calculeaza($stats) {
		
		$errorCount =0;

		$text = explode("<li><a href=\"#errors\">Errors (", $stats);
		$text = explode(")", $text[1]);
		$errorCount = $text[0];

		$text = explode("<li><a href=\"#warnings\">Warnings (", $stats);
		$text = explode(")", $text[1]);
		$errorCount += $text[0];

$rez[2]=$errorCount;

		$text = explode("<table>", $stats);
		$text = explode("</table>", $text[1]);
		$rez[1]= "<table>" . $text[0] . "</table>";

		$text = explode("<table>", $stats);
		$text = explode("</table>", $text[1]);
		$rez[1].="<br>" . "<table>" . $text[0] ."</table>"."<br>";


		// acordam nota
		if($rez[2] <100 ) $rez[0] = 10;
		else if( $rez[2] < 150) $rez[0] = 9;
		else if( $rez[2] < 200) $rez[0] = 8;
		else if( $rez[2] < 250) $rez[0] = 7;
		else if( $rez[2] < 300) $rez[0] = 6;
		else if( $rez[2] < 350) $rez[0] = 5;
		else if( $rez[2] < 400) $rez[0] = 4;
		else if( $rez[2] < 450) $rez[0] = 3;
		else if( $rez[2] < 500) $rez[0] = 2;
		else  $rez[0] = 1;

		return $rez;
	}
}
?>