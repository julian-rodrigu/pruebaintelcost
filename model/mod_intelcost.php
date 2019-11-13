<?php

include_once 'helper/utility.php';
include_once 'connect/connect.php';

class IntelCost {

    /* getGeneralDataFromJson: Get General Data From Json */
    public function getGeneralDataFromJson() {
        $dataFromJson = HelperData::getDataFromJsonFile("data-1.json");

        $html = '<div class="tituloContenido"><ul class="itemMostrado">';
          foreach ($dataFromJson as $row) {
              $html .= HelperData::getHtmlRow($row);
          }
        $html .= '</ul></div>';

        return $html;
    }

    /* getCities: Get Cities From Json */
    public function getCitiesFromJson() {
        $dataFromJson = HelperData::getDataFromJsonFile("data-1.json");
        $cities = array();

        foreach ($dataFromJson as $row) {
          array_push($cities, $row->Ciudad);
        }

        $cities = array_unique($cities);
        $htmlOption = '<option value="" selected>Elige una ciudad</option>';

        foreach ($cities as $city) {
          $htmlOption .= HelperData::getHtmlOption($city);
        }

        return $htmlOption;
    }

    /* getTypesFromJson: Get Types From Json */
    public function getTypesFromJson() {
        $dataFromJson = HelperData::getDataFromJsonFile("data-1.json");
        $types = array();

        foreach ($dataFromJson as $row) {
          array_push($types, $row->Tipo);
        }

        $types = array_unique($types);
        $htmlOption = '<option value="" selected>Elige una tipo</option>';

        foreach ($types as $type) {
          $htmlOption .= HelperData::getHtmlOption($type);
        }

        return $htmlOption;
    }

    /* getSearchFromJson: Get Search From Json */
    public function getSearchFromJson($city = "", $type = "") {
        $dataFromJson = HelperData::getDataFromJsonFile("data-1.json");
        $aSearch = array();

        foreach ($dataFromJson as $row) {
          if (!empty($city) && !empty($type)) {
              if ($row->Ciudad == $city && $row->Tipo == $type) {
                  array_push($aSearch, $row);
              }
          } elseif (empty($city) && !empty($type)) {
              if ($row->Tipo == $type) {
                  array_push($aSearch, $row);
              }
          } elseif (!empty($city) && empty($type)) {
              if ($row->Ciudad && $city) {
                  array_push($aSearch, $row);
              }
          }
        }

        $html = '<div class="tituloContenido"><ul class="itemMostrado">';
          foreach ($aSearch as $row) {
              $html .= HelperData::getHtmlRow($row);
          }
        $html .= '</ul></div>';

        return $html;
    }

    /* insertData: Insert in DB - Table */
    public function insertData($address = "", $city = "", $phone = "", $postal = "", $type = "", $price = "") {
        $result = DataBase::insertDataBien($address, $city, $phone, $postal, $type, $price);

        return $result;
    }

    /* showData: Show in DB - Table */
    public function showData() {
        $result = DataBase::showDataBien();

        $html = '<div class="tituloContenido"><ul class="itemMostrado">';
          foreach ($result as $row) {
              $html .= HelperData::getHtmlDbRow($row);
          }
        $html .= '</ul></div>';

        return $html;
    }
}
