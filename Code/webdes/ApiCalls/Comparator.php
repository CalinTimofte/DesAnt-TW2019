<?php

require_once 'core/dbModel.php';

class Comparator extends dbModel {

    public function compara($id, $nota_design, $nrErr_design, $nota_performance, $nrErr_performance, $nota_codeQuality, $nrErr_codeQuality){
        $sql = "SELECT nota_design, erori_design, nota_performance, erori_performance, erori_quality, nota_quality FROM istoricpagini WHERE id = :id";
        $query = $this->connection->prepare($sql);
        $parameters = array(':id' => $id);
        $query->execute($parameters);

        $row = $query->fetch(PDO::FETCH_ASSOC);
        $nota_design2 = $row['nota_design'];
        $nrErr_design2 = $row['erori_design']; 
        $nota_performance2 = $row['nota_performance'];
        $nrErr_performance2 = $row['erori_performance'];
        $nota_codeQuality2 = $row['erori_quality'];
        $nrErr_codeQuality2 = $row['nota_quality'];

if($nota_design > $nota_design2 )
    $resultArr = "Design imbunatatit <br>";
else  $resultArr = "Design-ul a primit o nota mai mica decat in trecut : " . $nota_design2  ."<br>" ;

if($nota_codeQuality > $nota_codeQuality2 )
    $resultArr .= "Code quality imbunatatit <br>";
else  $resultArr .= "Categoria \"code quality\" a primit o nota mai mica decat in trecut :". $nota_codeQuality2 . "<br>";

if($nota_performance > $nota_performance2 )
    $resultArr .= "Performance imbunatatit <br>";
else  $resultArr .= "Categoria \"Performance\" a primit o nota mai mica decat in trecut:".$nota_performance2. "<br>";

        return $resultArr;
    }
}
?>