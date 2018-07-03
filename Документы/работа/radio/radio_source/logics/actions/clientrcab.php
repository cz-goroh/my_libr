<?php 

include_once ROOT.'/views/header.php';  
if(is_numeric($arg) || empty($arg)){
    include ROOT.'/views/cabinet/rekl_cab_v.php';
}elseif ($arg==='plan') {
    include ROOT.'/views/rekl/rekl_plan.php'; //вставка плана-заявки
}

