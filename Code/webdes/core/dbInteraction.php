<?php

// comunicarea cu baza de date

require 'core/dbModel.php';


class dbInteraction extends dbModel {

    private $count=-1;

// verifica daca un link e in baza de date(e apelat din indexMain.php)
    public function checklink($link) {
       $sql = "SELECT id, reg_date FROM istoricpagini WHERE link = :link";
       $query = $this->connection->prepare($sql);
       $parameters = array(':link' => $link);
       $query->execute($parameters);
       $this->count = $query->rowcount();
       return $query->fetchAll(PDO::FETCH_ASSOC);
   }


    /*retureaza cate link-uri a gasit in baza de date, 
    variabila e initializata in functia anterioara checklink
    */
    public function get_count(){
        return $this->count;
    }

    /*dupa ce calculam statisticile, salvam intrarea (apelata din comparator)*/
    public function add_entry($link, $erori_design, $nota_design , $erori_quality  ,  $nota_quality,$erori_performance ,   $nota_performance  ) {
        $sql = "INSERT INTO istoricpagini (link, erori_design, nota_design, erori_quality, nota_quality, erori_performance, nota_performance) VALUES ( :link, :erori_design, :nota_design, :erori_quality, :nota_quality, :erori_performance, :nota_performance)";
        $query = $this->connection->prepare($sql);
        $parameters = array( ':link' => $link, ':erori_design' => $erori_design, ':nota_design'=> $nota_design, ':erori_quality'=>$erori_quality ,' :nota_quality'=>$nota_quality, ':erori_performance'=>$erori_performance, ':nota_performance'=>$nota_performance);
        $query->execute($parameters);
        return $this->connection->lastInsertId();
    }


/*daca un utilizator vrea sa compare cu nota anterioara, functia returneaza intrarea din baza de date 
(apelata din comparator) */
public function get_entry($id)
{
    $sql = "SELECT erori_design, nota_design, erori_quality, nota_quality, erori_performance, nota_performance FROM istoricpagini WHERE id = :id LIMIT 1";
    $query = $this->connection->prepare($sql);
    $parameters = array(':id' => $id);
    $query->execute($parameters);
    return ($query->rowcount() ? $query->fetch(PDO::FETCH_ASSOC) : false);
}


}