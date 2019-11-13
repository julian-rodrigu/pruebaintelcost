<?php
require_once "config.php";

class DataBase
{
   /* Conexión a la DB */
    public function conectar(){
        $con = mysqli_connect(HOST, USER, PASS, DBNAME);
        if (!$con) DIE("Lo sentimos, no se ha podido conectar con la base datos: " . DBNAME);

        return $con;
    }

    /* insertDataBien: Insert Data in bien table  */
    public function insertDataBien($address = "", $city = "", $phone = "", $postal = "", $type = "", $price = ""){
      $con = self::conectar();
      $sql = "INSERT INTO bien (Address, City, Phone, Postal, Type, Price) VALUES ('$address', '$city', '$phone', '$postal', '$type', '$price')";
      $res = mysqli_query( $con, $sql );

      if($res){
        $res = "Los datos fueron almacenados satisfactoriamente";
      }else{
        $res = "Los datos No fueron ingresados";
      }

      return $res;
    }

    /* showDataBien: Show Data from bien table */
    public function showDataBien(){
      $con = self::conectar();
      $sql = "SELECT * FROM bien";
      $res = mysqli_query( $con, $sql );
      $results = array();

      while ($row = mysqli_fetch_assoc($res)) {
        array_push($results, $row);
      }

      return $results;
    }
}
