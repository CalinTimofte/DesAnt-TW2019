<?php 

/* client interaction */

require_once 'ApiCalls/Design/designStats.php';
require_once 'ApiCalls/CodeQuality/codeQualityStats.php';
 require_once 'ApiCalls/Performance/performanceStats.php';
require_once 'core/dbInteraction.php';


 if(!isset($_GET['url']) or $_GET['url'] == '') {
        header('Location: /webdes/index.html');
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
   /* echo json_encode($response['results'][0]['reg_date'], JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
    echo '<form method="POST" action="/userInterface/statistici.php">';
    echo '<select name="versions">' . '</br>';
    foreach($response['results'] as $result)
    echo '<option value = "' . ($result['id']) . '">' . ($result['reg_date']) . '</option>' . "</br>";
    echo '</select>';
    echo '<input type="submit">';
    echo '</form>';*/
//	alege clientul cum vrea sa fie testat, cu comparare sau fara 
} //else echo "Nu s-a gasit in baza de date";



//Calculeaza statistici :
/* every category returns : nota pt categorie, nr erori, ststisticile specifice*/

// 1. Design 


$statsDesign =new StatsDesign();
$statisticiDesgin = $statsDesign->calculeaza($url); 


//2. Code quality
$statsQuality =new StatsCodeQuality();
$statisticiCodeQuality = $statsQuality->calculeaza($url); 

//3.Performance

$statsPerformance =new StatsPerformance();
$statisticiPerformance = $statsPerformance->calculeaza($url);





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


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title > DesAnt - Statistici </title>
     <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="newStyle.css">
    <link rel="stylesheet" type="text/css" media="screen" href="general.css">
   <!-- Added link for icons -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" 
    integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
</head>
<body>
<!-- Menu -->
    <a href=index.html><i class="fas fa-home"></i></a>
    <div class="dropDown">
        <i class="fas fa-bars dropbtn"></i>
        <div class="dropDownContent">
                <a href="statistici.html">Statistics</a>
                <a href="about.html">About</a>
        </div>
    </div>


<!-- Nota -->
<p id="nota"> NOTA : <?php
if(isset($statisticiDesgin['nota']) && isset($statisticiCodeQuality['nota']) &&isset($statisticiPerformance['nota']))
echo ($statisticiDesgin['nota'] +$statisticiCodeQuality['nota'] + $statisticiPerformance['nota'] )/3;

 ?> </p><br>


<!-- Tabelul cu sugestii.-->
 
<button class="butonStatistici" onclick="myFunction1()"><span>Sugestii design interfata</span></button><br>
  <div id="sugestii1">
    <?php
if(isset($statisticiDesgin['nota']))
{
  if($statisticiDesgin["nota"]==-1)
{
  echo $statisticiDesgin["descriereEroare"];
}
else{ echo "Nota : " . $statisticiDesgin["nota"] ."<br>". $statisticiDesgin["content"] ."<br>";
} } ?>
</div>

  <button class="butonStatistici" onclick="myFunction2()"><span>Sugestii code quality</span></button><br>
  <div id="sugestii2">

<?php 

if(isset($statisticiCodeQuality['nota']))
{
  if($statisticiCodeQuality["nota"]==-1)
{
echo $statisticiCodeQuality["descriereEroare"] ;
}
else{
echo "Nota : " . $statisticiCodeQuality["nota"] ."<br>". $statisticiCodeQuality["content"] ."<br>"; 
} } ?>

</div>
</div>

  <button class="butonStatistici" onclick="myFunction3()"><span>Sugestii performance</span></button>
<div id="sugestii3">
<?php
if(isset($statisticiPerformance['nota']))
{
if($statisticiPerformance["nota"]==-1)
{
  
  echo $statisticiPerformance["descriereEroare"];
}
else{ echo "Nota : " . $statisticiPerformance["nota"] ."<br>". $statisticiPerformance["content"] ."<br><br>";
}
}
?>
</div>

  <!-- JavaScript pentru a afisa statisticile in momentul in care apesi pe buton.-->
  <script>
function myFunction1() {
  var x = document.getElementById("sugestii1");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}
</script>
<script>
function myFunction2() {
  var x = document.getElementById("sugestii2");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}
</script>
<script>
function myFunction3() {
  var x = document.getElementById("sugestii3");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}
</script>
</body>
</html>