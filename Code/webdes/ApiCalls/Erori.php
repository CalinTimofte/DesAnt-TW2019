 
<?php 

class Erori{

    public function get_errors($stats, $err) {

//verifica daca apelul api a fost executat cu succes si a returnat codul 200
 if($stats['meta']['status']['code']!="200")
        {
        	$rezultat["nota"] = -1;
        	$rezultat["descriereEroare"] = $stats['meta']['status']['message'];
        	$rezultat["content"] = "";
        	$rezultat["numarErori"]=0;
        }
        else {
     
        	$rezErori = $err->calculeaza($stats['response']);

	// verifica daca testele au putut fi efectuate cu succes
        	if($rezErori[0]!=-1)
        	{
        		$rezultat["nota"] = $rezErori[0];
        		$rezultat["descriereEroare"]="";
        		$rezultat["content"] = $rezErori[1];
        		$rezultat["numarErori"]=$rezErori[2];
        }
        	
        	else {
        		$rezultat["nota"] = "-1";
        		$rezultat["descriereEroare"] ="<p>" . $rezErori[1] . "</p>";
        		$rezultat["content"] = "";
        		$rezultat["numarErori"]=0;
        	}
        }


        return $rezultat;
    }
}
    ?>