<?php
/* Erori count  design */

class EroriDesign {

	public function calculeaza($stats) {

		$stats = json_decode($stats,true);

		//verifica daca testele au putut fi efectuate cu succes 
		foreach ($stats as $val )
			if( json_encode($val) == "false")	{
				$rez[0] = -1;
				$rez[1] =$stats['error']['details'];
				return $rez;
			}
			else {
				return $this->calcErori($stats);
			}
		}


		private function calcErori($stats)
		{
			$errorsCount = 0;
			$rez[0] = -1;
			$list = "";

			foreach ($stats["categories"] as $categories) {
				if( $categories["count"] != 0)
					{ $errorsCount += $categories["count"];
				$list .="<p><b>" . $categories["description"] . "</b></p>";
				foreach ($categories["items"] as $item)
					$list .="<li>" . $item["description"] ." : " . $item["count"] . "</li><br>";
			}

		}
		$rez[1] = "Problems : " . $errorsCount . "<br>" ;
		if($errorsCount>0)
			$rez[1] .= "<ul>".  $list . "</ul><br>";


// acordam nota
		if($errorsCount <50 ) $rez[0] = 10;
		else if( $errorsCount < 100) $rez[0] = 9;
		else if( $errorsCount < 150) $rez[0] = 8;
		else if( $errorsCount < 200) $rez[0] = 7;
		else if( $errorsCount < 250) $rez[0] = 6;
		else if( $errorsCount < 300) $rez[0] = 5;
		else if( $errorsCount < 350) $rez[0] = 4;
		else if( $errorsCount < 400) $rez[0] = 3;
		else if( $errorsCount < 450) $rez[0] = 2;
		else  $rez[0] = 1;

$rez[2]=$errorsCount;
  	// return  vector cu nota si content (erori link in html sau descrierea erorii ) + numar erori
		return $rez;
	}
}
?>