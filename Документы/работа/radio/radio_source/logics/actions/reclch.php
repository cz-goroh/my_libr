<?php

if(isset($_POST['zaj_stek'])){
    $rad_stak_arr=$post;
    
}

if(isset($_POST['change_pass'])){
    $hashpass= Dbq::AtomSel('pass', 'users', 'id', $usid);
    if($post['new_pass']===$post['new_reppass']){
        if(password_verify($post['curr_pass'], $hashpass)){
            $new_pass=password_hash($post['new_pass'],PASSWORD_BCRYPT);
            $npq="UPDATE users SET `pass`='$new_pass' WHERE `id`=$usid";
            Dbq::InsDb($npq);
            echo 'Пароль обновлён';
        } else { echo 'Неверный текущий пароль'; }
    } else { echo 'Новые пароли не совпадают'; }
    exit();
    }

if(isset($_POST['plat'])){
    $id_sh=$post['plat'];
    $d_way=ROOT.'/doc/plat_'.$id_sh.'.pdf';
    move_uploaded_file($_FILES["plat_$id_sh"]['tmp_name'], $d_way);
    header('Location: /cabinet/clientrcab/1');
}

if(isset($_POST['count'])){
    print_r($post);
    exit();
}
if(isset($_POST['pay_upl'])){
    $id_bid=$post['paydoc'];
    $d_way=ROOT.'/doc/pay_'.$id_bid.'.pdf';
    move_uploaded_file($_FILES['pay_file']['tmp_name'], $d_way);
    header('Location: /cabinet/clientrcab/1');
}
if(isset($_POST['txt'])){
    $id_txt=$post['txt'];
    $txt=$post['n_txt'];
    $txq="UPDATE rolik SET `txt`='$txt' WHERE `id`=$id_txt";
    Dbq::InsDb($txq);
    exit();
}

if(isset($_POST['del_bid'])){
    $bid_id=$post['del_bid'];
    $delq="UPDATE bid SET `status`='del' WHERE `id`=$bid_id";
    Dbq::InsDb($delq);
    echo 'Отменена';
    exit();
}

if(isset($_POST['accept_bid'])){
    $bid_id=$post['accept_bid'];
    $id_rol= Dbq::AtomSel('rolik_id', 'bid', 'id', $bid_id);
    $rol_st= Dbq::AtomSel('status', 'rolik', 'id', $id_rol);
    if($rol_st==='app'){$n_st='man_ap';} else {$n_st='cl_app';}
    $delq="UPDATE bid SET `status`='$n_st' WHERE `id`=$bid_id";
    Dbq::InsDb($delq);
    echo 'Принята';
    exit();
}

if(isset($_POST['del_rol'])){
    $rol_id=$post['del_rol'];
    $delq="DELETE FROM rolik WHERE `id`=$rol_id";
    Dbq::InsDb($delq);
    if(file_exists(ROOT.'/audio/rolik_'.$rol_id.'.mp3'));
    unlink(ROOT.'/audio/rolik_'.$rol_id.'.mp3');
    header('Location: /cabinet/clientrcab/2');
}
if(isset($_POST['rolik_upl'])){
    $name=$post['rolik_nm'];
    $t= time();
    $dlit=$post['dlit'];
    $size=$_FILES['rolik']['size'];
    $txt=$post['ntxt'];
    $rolq="INSERT INTO rolik "
            . "(`name`,`t_ins`,`size`,`rekl_id`,`status`,`dlit`,`txt`) "
            . "VALUES ('$name',$t,$size,$id,'upl',$dlit,'$txt')";
    Dbq::InsDb($rolq);
    $lastq="SELECT HIGH_PRIORITY max(id) FROM `rolik`";
    $rolik_id= Dbq::SelDb($lastq)[0]["max(id)"];// id текущей позиции
    $way=ROOT.'/audio/rolik'.'_'.$rolik_id.'.mp3';
    move_uploaded_file($_FILES['rolik']['tmp_name'], $way);
    header('Location: /cabinet/clientrcab/2');
}
if(isset($_POST['rolik_upd'])){
    $rolik_id=$post['rolik_upl'];
    $upq="UPDATE rolik SET `status`='red' WHERE `id`=$rolik_id";
    Dbq::InsDb($upq);
    $way=ROOT.'/audio/rolik'.'_'.$rolik_id.'.mp3';
    unlink($way);
    move_uploaded_file($_FILES['rolik']['tmp_name'], $way);
    header('Location: /cabinet/clientrcab/2');
}

if(isset($_POST['bid'])){
//    $radio_id=$post['bid'];
    unset($post['bid']);
    $t= time();
    foreach ($post as $ts_k=>$b_time){
        $tsarr= explode('_', $ts_k);
        if($tsarr[0]==='ts'){
            $ts=$tsarr[1];//timestamp
            $rolik_key='rol_'.$ts;//ключ элемента с роликом
            $bid_k_i=$post["$ts_k"];
            $bid_k_e= explode('_', $bid_k_i);
            $bid_k=$bid_k_e[0];
            $radio_id= $bid_k_e[1];
            $rolik_id=$post["$rolik_key"]; 
            $dlit= Dbq::AtomSel('dlit', 'rolik', 'id', $rolik_id);
            $pr= Dbq::AtomSel('price', 'struct', 'id', $bid_k);
            $price=($pr/30)*$dlit;
            $_SESSION['snt']='Ваши заявки успешно отправлены менеджерам радиостанций';
        $bidq="INSERT INTO bid ("
    ."`radio_id`,`rekl_id`,`struct_id`,`ins_time`,`b_time`,`status`,`rolik_id`,"
                . "`sum`) VALUES ('$radio_id','$id','$bid_k',$t,$ts,'rec',"
                . "$rolik_id,$price)";
        Dbq::InsDb($bidq);
        }
    }
    header('Location: /cabinet/clientrcab/6');
}
if(isset($_POST['profile_ch'])&&($_POST['profile_ch']===$id)){
    $name=$post['name'];
    $tel=$post['tel'];
    
    $usq="UPDATE users SET `name`='$name',`tel`='$tel'"
            . "WHERE `id`='$usid'";
    Dbq::InsDb($usq);
    $position=  $post['position'];
    $region=    $post['region'];
    $city=      $post['city'];
    $adrs=      $post['adrs'];
    if(!empty($post['nds'])){
        $nds=       $post['nds'];
    } else {
    $nds=    'no';
    }
    $rmq="UPDATE rekl SET `position`='$position',`region`='$region',"
            . "`city`='$city',`adrs`='$adrs',`nds`='$nds'"
            . " WHERE `id`='$id'";
//    echo $rmq;
    Dbq::InsDb($rmq);
    header('Location: /cabinet/clientrcab/4');
    }
if(isset($_POST['rekv_ch'])){
    $rekv['kpp'] = $post['kpp'];
        $rekv['fname']=$post['fname'];
        $rekv['ogrn']= $post['ogrn'];
        $rekv['jradr']=$post['jradr'];
        $rekv['inn']=  $post['inn'];
        $rekv['rs']=   $post['rs'];
        $rekv['ks']=   $post['ks'];
        $rekv['bik']=  $post['bik'];
        $rekv['bank']= $post['bank'];
    $reks= serialize($rekv);
    $rekq="UPDATE rekl SET `rekv`='$reks' WHERE `id`='$id'";
    Dbq::InsDb($rekq);
    header('Location: /cabinet/clientrcab/5');
}
//`rekv`='$reks',
header('Location: /cabinet/clientrcab');
