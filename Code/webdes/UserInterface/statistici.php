
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
<p id="nota"> NOTA : 10 </p><br>


<!-- Tabelul cu sugestii.-->
 
<button class="butonStatistici" onclick="myFunction1()"><span>Sugestii design interfata</span></button><br>
  <div id="sugestii11">

ddd
</div>

  <button class="butonStatistici" onclick="myFunction2()"><span>Sugestii code quality</span></button><br>
  <div id="sugestii22">
aa
<?php 
echo 3;

if(isset($statisticiCodeQuality['nota']))
{
  if($statisticiCodeQuality["nota"]==-1)
{
echo $statisticiCodeQuality["descriereEroare"] ;
}
else{
echo "Nota : " . $statisticiCodeQuality["nota"] ."<br>". $statisticiCodeQuality["content"] ."<br>". $statisticiCodeQuality["numarErori"]; 
} } ?>

</div>

  <button class="butonStatistici" onclick="myFunction3()"><span>Sugestii performance</span></button>
<div id="sugestii3">
This is my DIV 3 element.<br>
This is my DIV 1 element.<br>
This is my DIV 1 element.<br>
This is my DIV 1 element.<br>
This is my DIV 3 element.<br>
This is my DIV 1 element.<br>
This is my DIV 1 element.<br>


This is my DIV 1 element.<br>
This is my DIV 1 element.This is my DIV 1 element<br>
This is my DIV 1 element.This is my DIV 1 element.This is my DIV 1 element.<br>
This is my DIV 1 element.This is my DIV 1 element.<br>
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