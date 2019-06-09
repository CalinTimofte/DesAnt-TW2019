



<!-- doar pentru poze -->



<?php 
$URL = "https://api.shortpixel.com/v2/reducer.php";
$APIKey = "o6qFM34fO5qiPdKWhkya";
$Lossy = "1";
$Resize = "0";
$ImagesList = array(
    "https://www.livescience.com/65030-usda-kitten-cannibalism-research.html",
);
$ImagesList = array_map('rawurlencode', $ImagesList);
$Data = json_encode(array(
    "plugin_version" => "XY123", //5 chars max - choose a code for your app
    "key" => $APIKey,
    "wait" => 30,
    "lossy" => $Lossy,
    "urllist" => $ImagesList
));
$POSTArray = array(
    'http' => array(
        'method' => 'POST',
        'header' => "Content-Type: application/json\r\n" . "Accept: application/json\r\n" . "Content-Length: " . strlen($Data) ,
        'content' => $Data
    )
);
$Context = stream_context_create($POSTArray);
$Result = file_get_contents($URL, false, $Context); 
 header('Content-type: text/json');
 while($Result['Status']['Code']==1)
 {
    echo "please wait";
 }
echo ($Result); 

?>