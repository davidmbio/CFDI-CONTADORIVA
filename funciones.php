<?php

$path_Source = dirname(__FILE__) . "/facturas/";

$ivaSumatory = 0; 

$resultado = " ";
$valor = $_POST["weekNameText"];

getDataWeek($path_Source.$valor);

function getDataWeek($pathWeek){
    $numFiles =0;
    $ivaSumatory = 0 ;
    for ($i=0; $i < getCountContentDirectory($pathWeek); $i++) {
        $numFiles=$i+1;
        echo '<tr>';
        echo    '<td>'.$numFiles.'</td>';

        echo    '<td>'.getNameFiles($pathWeek)[$i+1].'</td>';

        echo    '<td>'.getDateCfdi('aaa').'</td>';
        echo    '<td>'.$this->getImportValue($pathWeek.getNameFiles($pathWeek)[$i+1]).'</td>';
        echo    '<td>'; 
                    $ivaSumatory = $ivaSumatory + getValueIva($pathWeek.getNameFiles($pathWeek)[$i+1]);
        echo        getValueIva($pathWeek.getNameFiles($pathWeek)[$i+1]);
        echo    '</td>';
        echo    '<td>0</td>';
        echo '</tr>';
    }
}


function getDateCfdi($aaa){

    print_r($aaa);exit();
    $RE_fecha='.*?((?:2|1)\d{3}(?:-|\/)(?:(?:0[1-9])|(?:1[0-2]))(?:-|\/)(?:(?:0[1-9])|(?:[1-2][0-9])|(?:3[0-1]))(?:T|\s)(?:(?:[0-1][0-9])|(?:2[0-3])):(?:[0-5][0-9]):(?:[0-5][0-9]))';

    print_r($aaa);exit();
    $xmlCont=file_get_contents($pathxml.".xml");

    preg_match_all("/".$RE_fecha."/is",$xmlCont, $matches);
    $fechaxmlunix=strtotime($matches[1][0]);
    $fechaxmlorig=$matches[1][0]; 
    unset($matches);

    return $fechaxmlorig;
}

function getImportValue($pathxml){

print_r($pathxml);exit();

    $RE_Importe='<.*?Concepto.*?importe="(.*?)".*?>';
    $xmlCont=file_get_contents($pathxml.".xml");
    
    preg_match_all('/'.$RE_Importe.'/is',$xmlCont, $matches); 
    $desxml=implode(", ",$matches[1]); // Descripciones de los conceptos separadas por comas
    unset($matches);

    $dataValue = explode(",", $desxml);
    $desxml = 0;

    for ($i=0; $i < count($dataValue); $i++) { 
        $desxml = $desxml+$dataValue[$i];
    }
    return $desxml;
}

function getValueIva($pathxml){
    $RE_Impuestos='<.*?Impuestos.*?totalImpuestosTrasladados="(.*?)"';
    $xmlCont=file_get_contents($pathxml.".xml");
    
    preg_match_all('/'.$RE_Impuestos.'/is',$xmlCont, $matches); 
    $impxml=implode(", ",$matches[1]); // Descripciones de los conceptos separadas por comas
    unset($matches);


    return $impxml;
}

function getCountContentDirectory($directorio){
    $filesCount = null;

    if(is_dir($directorio)){
        $dir = opendir($directorio);
        $nmark[] = null;
        $namesM[] = null;
        while (($nmark = readdir($dir)) !== false){
            if($nmark != "." && $nmark != ".."){
                if(eregi(".", $nmark)){                                       
                    $namesM[] = strtok($nmark, ".");
                }
            }
        }
        $filesCount = count($namesM)-1;
    }

    return $filesCount;
} 

function getNameFiles($directorio){
    $filesCount = null;
    if(is_dir($directorio)){
        $dir = opendir($directorio);
        $nmark[] = null;
        $namesM[] = null;
        while (($nmark = readdir($dir)) !== false){
            if($nmark != "." && $nmark != ".."){
                if(eregi("\.xml", $nmark)){                                       
                    $namesM[] = strtok($nmark, ".");
                }
            }
        }
        $filesNames = $namesM;
    }
    return $filesNames;
} 