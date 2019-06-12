<?php 

/* client interaction */

require_once 'core/dbInteraction.php';
require_once 'ApiCalls/Design/designStats.php';
require_once 'ApiCalls/CodeQuality/codeQualityStats.php';
// require_once 'ApiCalls/Performance/performanceStats.php';


 if(!isset($_GET['url']) or $_GET['url'] == '') {
        header('Location: /webdes/userInterface/index.html');
    }

//parse url
if (isset($_GET['url'])) {
            $url = trim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);    
       }
// end parseer

//verifica daca link-ul e in baza de date sau e link nou
$db = new dbinteraction(); 
$oldLinks= $db->checklink($url); 
$response = array("link"=> $url, "count" => $db->get_count() , "results" => $oldLinks);

//daca count e 0 atunci e link nou, nu e in bd, altfel, cate intrari vechi a gasit 
if($response['count']!=0)
{
    // echo json_encode($response['results'][0]['reg_date'], JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
    echo '<form method="POST" action="/webdes/userInterface/statistici.html">';
    echo '<select name="versions">' . '</br>';
    foreach($response['results'] as $result)
    echo '<option value = "' . ($result['id']) . '">' . ($result['reg_date']) . '</option>' . "</br>";
    echo '</select>';
    echo '<input type="submit">';
    echo '</form>';
//	alege clientul cum vrea sa fie testat, cu comparare sau fara 
} //else echo "Nu s-a gasit in baza de date";



//Calculeaza statistici :
/* every category returns : nota pt categorie, nr erori, ststisticile specifice*/

// 1. Design 


/* -- ok
$statsDesign =new StatsDesign();
$statisticiDesgin = $statsDesign->calculeaza($url); 
if($statisticiDesgin["nota"]==-1)
{
	echo $statisticiDesgin["descriereEroare"];
}
else{ echo "Nota : " . $statisticiDesgin["nota"] ."<br>". $statisticiDesgin["content"] ."<br>". $statisticiDesgin["numarErori"];
}*/



//2. Code quality
$statsQuality =new StatsCodeQuality();
$statisticiCodeQuality = $statsQuality->calculeaza($url); 

if($statisticiCodeQuality["nota"]==-1)
{
	
	echo $statisticiCodeQuality["descriereEroare"];
}
else{ echo "Nota : " . $statisticiCodeQuality["nota"] ."<br>". $statisticiCodeQuality["content"] ."<br> Erori :". $statisticiCodeQuality["numarErori"] ."<br>";
}


//3.Performance

$statsPerformance =new StatsPerformance();
$statisticiPerformance = $statsPerformance->calculeaza($url);

if($statisticiPerformance["nota"]==-1)
{
	
	echo $statisticiPerformance["descriereEroare"];
}
else{ echo "Nota : " . $statisticiPerformance["nota"] ."<br>". $statisticiPerformance["content"] ."<br> Erori :". $statisticiPerformance["numarErori"] ."<br>";
}




// if(isset($_POST['versions'])){
//     $comparator = new Comparator();
//     $comparison_result = $comparator->compara($id, $statisticiDesgin["nota"], $statisticiDesgin["numarErori"], $statisticiPerformance["nota"], $statisticiPerformance["numarErori"], $statisticiCodeQuality["nota"], $statisticiCodeQuality["numarErori"]); //comparatorul comunica direct cu componenta care ia date din bd si ia erorile sa compare
// }

// Aici mai este nevoie de o functie care sa afiseze comparatiile cum trebuie
// De ex, -1 pe primul camp din $comparison_result inseamna : "Nota curenta este mai mica decat cea precedenta";

// $nota = $comparator->acordaNota(erori categorie 1, 2, 3);

// if(clientul vrea cu comparare a site-ului vechi)

// afiseaza() // stats design, quality,performance, nota, (rezultatul compararii)




?>