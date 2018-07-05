<?php
if(empty($arg)){
    include_once ROOT.'/views/cabinet/admcabv.php';
} else {
    $exarg= explode('_', $arg);
    if($exarg[0]==='reklcab'){
        $id=$exarg[1];
//        echo $id_rekl;
        
    }
}