<?php 

/* client interaction */

require_once 'core/dbInteraction.php';
require_once 'ApiCalls/Design/designStats.php';
require_once 'ApiCalls/CodeQuality/codeQualityStats.php';
require_once 'ApiCalls/Performance/performanceStats.php';


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
//	echo json_encode($response['results'], JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
//	alege clientul cum vrea sa fie testat, cu comparare sau fara 
} else echo "Nu s-a gasit in baza de date";



//Calculeaza statistici :
/* every category returns : nota pt categorie, nr erori, ststisticile specifice*/

// 1. Design
$statsDesign =new StatsDesign();
$statisticiDesgin = $statsDesign->calculeaza($url); 
// din statsDesign se apeleaza functii de la componenta erori care numara erorile si le returneaza in stats si apoi aici

//2. Code quality
$statsQuality =new StatsCodeQuality();
$statisticiCodeQuality = $statsQuality->calculeaza($url); 

//3.Performance

$statsPerformance =new StatsPerformance();
$statisticiPerformance = $statsPerformance->calculeaza($url);


echo "DESIGN<hr>" .$statisticiDesgin ."<hr>CODE QUALITY : HTML+CSS<hr>". $statisticiCodeQuality . "<hr>PERFORMANCE<hr>". $statisticiPerformance;
/*

$comparator = new Comparator();
$nota = $comparator->acordaNota(erori categorie 1, 2, 3);

if(clientul vrea cu comparare a site-ului vechi)
$comparator->compara($id); //comparatorul comunica direct cu componenta care ia date din bd si ia erorile sa compare

afeseaza() // stats design, quality,performance, nota, (rezultatul compararii)



 */

?>