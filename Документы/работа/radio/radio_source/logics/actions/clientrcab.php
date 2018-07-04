<?php 
$expl_arg= explode('_', $arg);
//echo $expl_arg;
include_once ROOT.'/views/header.php';  
if(is_numeric($arg) || empty($arg)){
    include ROOT.'/views/cabinet/rekl_cab_v.php';
}elseif ($arg==='plan') {
    include ROOT.'/views/rekl/rekl_plan.php'; //вставка плана-заявки
}
if($expl_arg[0]==='media'){
    $mediakey=$expl_arg[1];
    $mediaar=$r_str[$mediakey];
    unset($r_str);
    $r_str[$mediakey]=$mediaar;//оставляем в массиве только один элемент
    include ROOT.'/views/rekl/rekl_plan.php'; //вставка плана-заявки
}