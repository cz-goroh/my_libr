
<table border="1" cellpadding="2" style="width: 290mm">
    <thead>
    <tr>
    <th>Время</th>
    <?php foreach ($t_month as $mon_k=>$mon_t): ?>
    <th><?php echo $rus_week[date('N', $mon_t)].'<br>'.date('d m',$mon_t); ?></th>
    <?php endforeach; ?>
    <th>Всего <br>сек</th>
    <th>Общая<br> стоимость</th>
    </tr>
    </thead>
    <tbody>
   <?php
   $sl=Rman::MarkSort($r_str);
   $prom_dlit[$t_per]=array();
   $prom_sum[$t_per]=array();
 foreach ($d_arr as $t_per=>$tinf):        //перебираем временные промежутки ?>
        <tr>
    <td><?php echo $tinf;   //вывод названия промежутка в первом столбце ?></td>        
<?php foreach ($t_month as $mon_k=>$mon_t):                           //перебираем дни недели 
    $wd=date('N', $mon_t);
    $int_k=$wd.'%'.$t_per;
    if(array_key_exists($int_k, $sl[1]["$wd"])){
        $color='yellow';
    }elseif(array_key_exists($int_k, $sl[2]["$wd"])){
        $color='green';        
    }else{
        $color='inherit';
    }
    $timestamp=$mon_t+$t_hours["$t_per"];
    $nm_rol= date('h-d-m', $timestamp).'.mp3';
?>   <!-- цветовые маркеры  -->
    <td style=" background-color: <?php echo $color; ?>;">
<?php 
foreach ($r_str as $str_k=>$strinf):              //перебираем позиции структуры 
//    print_r($strinf);
//    echo '<br>';
if($strinf['week_d']==="$wd" && $strinf['time_p']==="$t_per"):
    ?>
<!-- ========================= содержимое ячейки =========================== -->
    <?php
    $fil_time=0;$fil_sum=0;
    
    foreach ($barr as $bidkey=>$bid): //перебираем заявки текущего 
        if((int)$bid['b_time']===(int)$timestamp)://если заявка на это время  
            //echo $bid['status'];
            if($bid['status']==='payd'):
                    
            $cur_dlit=(int)Dbq::AtomSel('dlit', 'rolik', 'id', $bid['rolik_id']);
            $fil_time=$fil_time + $cur_dlit;
            $cur_price=((int)$strinf['price']/30)*$cur_dlit;
            $fil_sum=$fil_sum+$cur_price;
            ?> <mark style="background-color: red;"><?php echo $bid['id'];
            ?></mark><?php
        endif;  endif; endforeach;
 if(!empty($fil_time)):
            $prom_dlit1[$t_per][$wd]=$fil_time;
            $prom_sum1[$t_per][$wd]=$fil_sum;
            echo $fil_time.'с,<br>на'.$fil_sum.'р.<br>';
     endif;
//<!-- ========================= содержимое ячейки ========================= -->
 endif;
endforeach;
?></td>
<?php endforeach; ?>
    <td id="kol<?php if(!empty($prom_dlit1[$t_per])){ echo array_sum($prom_dlit1[$t_per]);} ?>" >
        <?php if(!empty($prom_dlit1[$t_per])){ echo array_sum($prom_dlit1[$t_per]);} ?></td>
    <td id="pr<?php if(!empty($prom_dlit1[$t_per])){ echo array_sum($prom_sum1[$t_per]);} ?>" >
    <?php if(!empty($prom_dlit1[$t_per])){ echo array_sum($prom_sum1[$t_per]);} ?></td>
</tr>
<?php endforeach; ?>
        
    </tbody>
</table>
        