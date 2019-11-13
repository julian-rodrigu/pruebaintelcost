<?php

class HelperData {

    /* getDataFromJsonFile: Get Data From Json File*/
    function getDataFromJsonFile($nameFile) {
      return json_decode(file_get_contents($nameFile));
    }

    /* getHtmlRow: Get Html Row From Json */
    function getHtmlRow($row) {
        $htmlRow  = '<li><img src="img/home.jpg" width="100px"></li>';
        $htmlRow .= '<li>'.$row->Direccion.'</li>';
        $htmlRow .= '<li>'.$row->Ciudad.'</li>';
        $htmlRow .= '<li>'.$row->Telefono.'</li>';
        $htmlRow .= '<li>'.$row->Codigo_Postal.'</li>';
        $htmlRow .= '<li>'.$row->Tipo.'</li>';
        $htmlRow .= '<li class="precioTexto">'.$row->Precio.'</li>';
        $htmlRow .= '<li><input type="button" class="saveButton" name="save'.$row->Id.'" id="save'.$row->Id.'" value="Guardar" name="save" data-address="'.$row->Direccion.'" data-city="'.$row->Ciudad.'" data-phone="'.$row->Telefono.'" data-postal="'.$row->Codigo_Postal.'" data-type="'.$row->Tipo.'" data-price="'.$row->Precio.'" onclick="SaveButton('.$row->Id.');"></li>';
        $htmlRow .= '<div class="divider"></div>';

      return $htmlRow;
    }

    /* getHtmlRow: Get Html Row From Json */
    function getHtmlDbRow($row) {
        $htmlRow  = '<li><img src="img/home.jpg" width="100px"></li>';
        $htmlRow .= '<li>'.$row['Address'].'</li>';
        $htmlRow .= '<li>'.$row['City'].'</li>';
        $htmlRow .= '<li>'.$row['Phone'].'</li>';
        $htmlRow .= '<li>'.$row['Postal'].'</li>';
        $htmlRow .= '<li>'.$row['Type'].'</li>';
        $htmlRow .= '<li class="precioTexto">'.$row['Price'].'</li>';
        $htmlRow .= '<div class="divider"></div>';

      return $htmlRow;
    }

    /* getHtmlOption: Get Html Option From Json */
    function getHtmlOption($option) {
        $htmlOption = '<option value="'.$option.'">'.$option.'</option>';

      return $htmlOption;
    }
}
