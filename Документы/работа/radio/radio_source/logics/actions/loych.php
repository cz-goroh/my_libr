<?php

if(isset($_POST['acp'])): 
    $id_rol= Secure::PostText($_POST)['acp'];
    $acq="UPDATE rolik SET `status`='app' WHERE `id`=$id_rol";
    Dbq::InsDb($acq);
    $apq="UPDATE bid SET `status`='man_ap' WHERE `rolik_id`=$id_rol AND "
            . "`status`='cl_app'";
    Dbq::InsDb($apq);
    echo 'Одобрена';
    exit();
endif;
if(isset($_POST['rj'])):
//    $post= Secure::PostText($_POST);
    $rj=$post['rj'];
    $des=$post['des'];
    $rjq="UPDATE rolik SET `status`='rej',`descr`='$des' WHERE `id`=$rj";
    Dbq::InsDb($rjq);
    echo 'отправлено';
    exit();
endif;
//header(' Location: /cabinet/loycab/');
