<?php
  include_once 'model/mod_intelcost.php';
  $result = "";

  switch ($_GET['Action']) {
      case "getGeneralData": {
            $result = IntelCost::getGeneralDataFromJson();
            break;
      }
      case "getCities": {
            $result = IntelCost::getCitiesFromJson();
            break;
      }
      case "getTypes": {
            $result = IntelCost::getTypesFromJson();
            break;
      }
      case "getSearch": {
            $result = IntelCost::getSearchFromJson($_GET['City'], $_GET['Type']);
            break;
      }
      case "insertData": {
            $result = IntelCost::insertData($_GET['Address'], $_GET['City'], $_GET['Phone'], $_GET['Postal'], $_GET['Type'], $_GET['Price']);
            break;
      }
      case "showData": {
            $result = IntelCost::showData();
            break;
      }
  }

  echo $result;
