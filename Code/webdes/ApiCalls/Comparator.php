<?php

require 'core/dbModel.php';

class Comparator extends dbModel {

    public function compara($id, $nota_design, $nrErr_design, $nota_performance, $nrErr_performance, $nota_codeQuality, $nrErr_codeQuality){
        $sql = "SELECT nota_design, erori_design, nota_performance, erori_performance, erori_quality, nota_quality FROM istoricpagini WHERE id = :id";
        $query = $this->connection->prepare($sql);
        $parameters = array(':link' => $id);
        $query->execute($parameters);

        $row = $query->fetch(PDO::FETCH_ASSOC);
        $nota_design2 = $row['nota_design'];
        $nrErr_design2 = $row['erori_design']; 
        $nota_performance2 = $row['nota_performance'];
        $nrErr_performance2 = $row['erori_performance'];
        $nota_codeQuality2 = $row['erori_quality'];
        $nrErr_codeQuality2 = $row['nota_quality'];

        $resultArr = array(
            ($nota_design <=> $nota_design2)
            ($nrErr_design <=> $nrErr_design2)
            ($nota_performance <=> $nota_performance2)            
            ($nrErr_performance <=> $nrErr_performance2)
            ($nota_codeQuality <=> $nota_codeQuality2)
            ($nrErr_codeQuality <=> $nrErr_codeQuality2)
                        );
    }
}
?>