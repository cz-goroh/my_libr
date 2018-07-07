
<?php
$sl=Rman::MarkSort($r_str);
?>
<div id="d-5" class="hide-div" >
    <h4>Пики слушания</h4>
    
    <form action="/cabinet/rmanch/" method="post" >
<table border="1" border-collapsing="collapse"
       cellpadding="2" cellspacing="0">
    <thead>
        <tr>
            <th>Время</th>
            <th>Пн</th>
            <th>Вт</th>
            <th>Ср</th>
            <th>Чт</th>
            <th>Пт</th>
            <th>Сб</th>
            <th>Вс</th>
        </tr>
    </thead>
    <tbody>
   <?php
 foreach ($d_arr as $t_per=>$tinf):     //перебираем временные промежутки ?>
        <tr>
    <td><?php echo $tinf;   //вывод названия промежутка в первом столбце ?></td>        
<?php foreach ($w_arr as $wd):                     //перебираем дни недели 
    $int_k=$wd.'%'.$t_per;
    if(array_key_exists($int_k, $sl[1]["$wd"])){ $color='#ffff99';
    }elseif(array_key_exists($int_k, $sl[2]["$wd"])){ $color='#99CC66';        
    }else{ $color='inherit';}
?>   <!-- цветовые маркеры  -->
    <td style=" background-color: <?php echo $color; ?>; width: 4em; " >
        <input name="pic_<?php echo $ar_str["$int_k"]['id']; ?>" 
               value="<?php echo $ar_str["$int_k"]['aud_reach']; ?>"
               style="width: 3em;  " />
     </td>
<?php endforeach; ?></tr><?php endforeach; ?>
        
    </tbody>
</table>
        <button type="submit" name="pic_tab" value="cur" >Обновить</button>
    </form>
</div>
<div id="d-6" class="hide-div">
    <h4>Цены</h4>
<form action="/cabinet/rmanch/" method="post" >
<table border="1" border-collapsing="collapse"
       cellpadding="2" cellspacing="0">
    <thead>
        <tr>
            <th>Время</th>
            <th>Пн</th>
            <th>Вт</th>
            <th>Ср</th>
            <th>Чт</th>
            <th>Пт</th>
            <th>Сб</th>
            <th>Вс</th>
        </tr>
    </thead>
    <tbody>
   <?php
 foreach ($d_arr as $t_per=>$tinf):     //перебираем временные промежутки ?>
        <tr>
    <td><?php echo $tinf;   //вывод названия промежутка в первом столбце ?></td>        
<?php foreach ($w_arr as $wd):                     //перебираем дни недели 
    $int_k=$wd.'%'.$t_per;
    if(array_key_exists($int_k, $sl[1]["$wd"])){
        $color='#ffff99';
    }elseif(array_key_exists($int_k, $sl[2]["$wd"])){
        $color='#99CC66';        
    }else{
        $color='inherit';}
?>   <!-- цветовые маркеры  -->
    <td style=" background-color: <?php echo $color; ?>; width: 4em " >
        <input name="pr_<?php echo $ar_str["$int_k"]['id']; ?>" 
               value="<?php echo $ar_str["$int_k"]['price']; ?>"
               style="width: 3em;  " />
     </td><?php endforeach; ?></tr><?php endforeach; ?></tbody></table>
        <button type="submit" name="pr_tab" value="cur" >Обновить</button>
    </form>
  



<?php //exit(); ?>


</div>
<div id="d-3" class="hide-div">
    <?php if(!empty($bidatar)): ?>
    <div style="background-color: red;" > Уважаемый менеджер! обработайте заявки, поступившие неделю назад!</div>
    <?php endif; ?>
    <!--===============================перенос заявки========================-->
<form method="post" action="/cabinet/rmanch/">
    Перенести заявку
    <select name="fr_bid">
        <?php foreach ($bidar as $chbk=>$chbid): ?>
        <?php if($chbid['status']==='rec'&&$chbid['b_time']> (time()+172800)): ?>
        <option value="<?php echo $chbid['id']; ?>">
            <?php echo '№'.$chbid['id'].date(' в g, d.m',$chbid['b_time']); ?>
        </option>
        
        <?php endif; ?>
        <?php endforeach; ?>
    </select>
    на
    <select name="to_day">
        <?php foreach ($t_week1 as $w_time1): if($w_time1>(time()+172800)): ?>
        <option value="<?php echo $w_time1; ?>" >
            <?php echo date('d.m',$w_time1); ?>
        </option>
        <?php endif; endforeach; ?>
        <?php foreach ($t_week2 as $w_time2): if($w_time2>(time()+172800)): ?>
        <option value="<?php echo $w_time2; ?>" >
            <?php echo date('d.m',$w_time2); ?>
        </option>
        <?php endif; endforeach; ?>
    </select>
    <select name="to_time">
        <?php foreach ($t_hours as $thk=>$tht): ?>
        <option value="<?php echo $tht; ?>" ><?php echo $d_arr[$thk]; ?></option>
        <?php endforeach; ?>
    </select>
    <button name="retime" value="1" type="submit" >Перенести</button>
</form>
    
<!--=======================================МЕДИАПЛАН=========================-->
<h4>Медиаплан </h4>
<!--<button onclick="FixAction(this)">Зафиксировать</button>-->
 <!-- <div style="width: 100%; height: 800px; overflow-y: auto;
             overflow-x: auto;"> -->
        
<form action="/cabinet/rmanch/" method="post" >
    <table  border-collapsing="collapse"  id="t1">
    <thead>
    <tr>
        <th><div class="in_tab">Время</div></th>
    <?php foreach ($t_month as $mon_k=>$mon_t): ?>
        <th><div class="in_tab"><?php echo $rus_week[date('N', $mon_t)].'<br>'.date('d m',$mon_t); ?></div></th>
    <?php endforeach; ?>
        <th><div class="in_tab">Всего <br>сек</div></th>
        <th><div class="in_tab">Общая<br> стоимость</div></th>
    </tr>
    </thead>
    <tbody>
    <col width="80px" >
   <?php
   $prom_dlit[$t_per]=array();
   $prom_sum[$t_per]=array();
 foreach ($d_arr as $t_per=>$tinf):        //перебираем временные промежутки ?>
        <tr>
    <td><?php echo $tinf;   //вывод названия промежутка в первом столбце ?></td>
    
<?php foreach ($t_month as $mon_k=>$mon_t):              //перебираем дни месяца 
    $wd=date('N', $mon_t);
    $int_k=$wd.'%'.$t_per;
    if(array_key_exists($int_k, $sl[1]["$wd"])){
        $color='#ffff99';
    }elseif(array_key_exists($int_k, $sl[2]["$wd"])){
        $color='#99CC66';        
    }else{
        $color='inherit';
    }
    $timestamp=$mon_t+$t_hours["$t_per"];
    $nm_rol= date('h-d-m', $timestamp).'.mp3';
?>   <!-- цветовые маркеры  -->
    <td style=" background-color: <?php echo $color; ?>;"><div class="in_tab">
<?php 
foreach ($r_str as $str_k=>$strinf):              //перебираем позиции структуры 
    //echo 'str';
//    print_r($strinf);
//    echo '<br>';
if($strinf['week_d']==="$wd" && $strinf['time_p']==="$t_per"):
    ?>
<!-- ========================= содержимое ячейки =========================== -->
    <?php
    $fil_time=0;$fil_sum=0;
    
    foreach ($bidar as $bidkey=>$bid): //перебираем заявки текущего 
        if((int)$bid['b_time']===(int)$timestamp)://если заявка на это время  
            //echo $bid['status'];
if($bid['status']==='cl_app'||$bid['status']==='man_ap'):
                    
            $cur_dlit=(int)Dbq::AtomSel('dlit', 'rolik', 'id', $bid['rolik_id']);
            $fil_time=$fil_time + $cur_dlit;
            $cur_price=((int)$strinf['price']/30)*$cur_dlit;
            $fil_sum=$fil_sum+$cur_price;
            ?><mark style="background-color: red;"><?php echo $bid['id'];
            ?></mark><br><?php
            
if($bid['status']==='cl_app'): echo 'утверждена клиентом<br>поторопите юриста';        ?>
            <a href="/cabinet/dnld/rolik_<?php echo $bid['rolik_id'].'_'.
                date('G-j-m-y',(int)$timestamp); ?>">
            Ролик<?php echo $cur_dlit; ?>сек </a><br>
            
             <?php  endif;
if($bid['status']==='man_ap'): echo 'ожидает оплаты<br>';  ?>            
            <a href="/cabinet/dnld/rolik_<?php echo $bid['rolik_id'].'_'.
                date('G-j-m-y',(int)$timestamp); ?>">
                Ролик<?php echo $cur_dlit; ?>сек </a><br>
            
  <?php  endif; endif;
if($bid['status']==='payd'): echo $bid['id'].'Оплата подтверждена'; ?>
            <a href="/cabinet/dnld/rolik_<?php echo $bid['rolik_id']; ?>_<?php echo $nm_rol; ?>">
        <?php echo Dbq::AtomSel('dlit', 'rolik', 'id', $bid['rolik_id']); ?>сек</a>
                <br><span id="complsp<?php echo $bid['id']; ?>">
                <button name="acc_compl" type="button" 
                        id="compl<?php echo $bid['id']; ?>"
                        value="<?php echo $bid['id']; ?>">
                    выход</button></span><br>
            <script type="text/javascript">
                $(document).ready(function(){
                    $('#compl<?php echo $bid['id']; ?>').click(function(){
                        var compl=$('#compl<?php echo $bid['id']; ?>').val();
                            $.ajax({
                            type: "POST",
                            url: "/cabinet/rmanch",
                            data: { compl: compl },
                            success: function(html){           
                                var inr=html;
                                $('#complsp<?php echo $bid['id']; ?>').html(inr);
                            } }); return false; }); }); </script> <?php  endif;
if($bid['status']==='compl'): echo $bid['id'].'вышла в эфир<br>';  ?>
            <a href="/cabinet/dnld/rolik_<?php echo $bid['rolik_id']; ?>_<?php echo $nm_rol; ?>">
        <?php echo Dbq::AtomSel('dlit', 'rolik', 'id', $bid['rolik_id']); ?>сек</a>
<?php endif;
if($bid['status']==='red'): echo $bid['id'].'перенесена, ждём<br> подтверждения<br>';  ?>
            <a href="/cabinet/dnld/rolik_<?php echo $bid['rolik_id']; ?>_<?php echo $nm_rol; ?>">
        <?php echo Dbq::AtomSel('dlit', 'rolik', 'id', $bid['rolik_id']); ?>сек</a>
<?php endif;
if($bid['status']==='rec'): ?>
            Заявка <mark style="background-color: red;">
                
                <?php echo $bid['id']; ?></mark>, 
    <a href="/cabinet/dnld/rolik_<?php echo $bid['rolik_id']; ?>_<?php echo $nm_rol; ?>">
        <?php echo Dbq::AtomSel('dlit', 'rolik', 'id', $bid['rolik_id']); ?>сек</a>
        <br><select name="bidstat_<?php echo $bid['id']; ?>">
            <option value="accept" >Принять</option>
            <option value="reject" >Отклонить</option>
        </select>
        <?php endif;  endif; endforeach;
 if(!empty($fil_time)):
            $prom_dlit2[$t_per][$wd]=$fil_time;
            $prom_sum1[$t_per][$wd]=$fil_sum;
            echo 'принято: '.$fil_time.'сек,<br>на'.$fil_sum.'руб.<br>';
     endif;
//<!-- ========================= содержимое ячейки ========================= -->
 endif;
 endforeach; ?></div></td>
<?php endforeach; ?>
    <td id="kol<?php if(!empty($prom_dlit2[$t_per])){ echo array_sum($prom_dlit2[$t_per]);} ?>" >
        <?php if(!empty($prom_dlit2[$t_per])){ echo array_sum($prom_dlit2[$t_per]);} ?></td>
    
    <td id="pr<?php if(!empty($prom_dlit2[$t_per])){ echo array_sum($prom_sum1[$t_per]);} ?>" >
    <?php if(!empty($prom_dlit2[$t_per])){ echo array_sum($prom_sum1[$t_per]);} ?></td>
</tr>
<?php endforeach; ?>
        
    </tbody>
</table>
        <button type="submit" name="media" value="cur" >Обновить</button>
    </form>
</div>
</div>
<script type="text/javascript">
    jQuery(document).ready(function(){
    jQuery('.spoiler-head').click(function(){
            $(this).parents('.spoiler-wrap').toggleClass("active").find('.spoiler-body').slideToggle();
    });});
</script>
<?php  
