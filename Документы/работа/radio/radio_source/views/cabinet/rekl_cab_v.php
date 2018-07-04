
<div class="layout">
    <div class="sidebar">
        <!--id="hidden_panel" -->
        
        <p class="a_style"  id="a4"><br> Профиль</p>
        <p class="a_style"  id="a5"><br> Реквизиты</p>
        <p class="a_style"  id="a1"><br> Счета</p>
        <p class="a_style"  id="a2"><br> Ролики</p>
        <p class="a_style"  id="a3"><br> Радиостанции</p>
        <p class="a_style"  id="a6"><br> Мои заявки</p>
        <p class="a_style"  id="a7"><br> Настройки</p>
        
    </div>
    <div id="main-div" class="content" ></div>
</div>
<div id="content">
    
<div id="d-6"> 

    <h1>Мои заявки</h1>
    
<?php foreach ($sat_inf as $s_i=>$s_inf):  
     //print_r($s_inf);     echo '<br>';
    if(!empty($my_bidarr[$s_i])): ?>
<h1><a onclick="$('#on<?php echo $s_i; ?>').slideToggle('slow');" href="javascript://">
        Мои заявки на радио <?php echo $s_inf['st_nm']; ?> </a></h1>
<div id="on<?php echo $s_i; ?>" style="display: none">
<?php foreach($my_bidarr[$s_i] as $b_k=>$b_inf):
    if($b_inf['status']!='del'):    ?>

    <p><mark ><?php echo $b_inf['id']; ?></mark>
        На <?php echo date('G:i d.m.Y',$b_inf['b_time']); ?>
        
        Статус 
        <?php 
        if($b_inf['status']==='payd'): echo 'Оплачена';
        elseif ($b_inf['status']==='man_ap'): echo 'Одобрена менеджером радио';
        elseif ($b_inf['status']==='cl_app'): echo 'Одобрена рекламодателем';
        elseif ($b_inf['status']==='rec'):    echo 'Подана';
        elseif ($b_inf['status']==='red'):    echo 'Изменена менеджером';
        elseif ($b_inf['status']==='compl'):  echo 'Выполнена';
        endif;
        ?>
        
        Стоимость <?php echo $b_inf['sum']; ?> р
</p>
<?php endif; endforeach; ?></div><?php endif; endforeach; ?>

</div>
    
    <div  id="d-1">
    <!--<div class="spoiler-head"></div>-->
    <h4>Счета</h4>
    <?php 
    if(!empty($sh_ind[$id])): ?>
    <h1>Новые счета</h1>
    <?php foreach ($sat_inf as $id_rch=> $radio_i):
     if(!empty($sh_ind[$id][$id_rch])): ?>
    <p> От радиостанции <?php echo $radio_i['st_nm']; ?>
        <a href="/cabinet/dnld/shcet_<?php echo $id_rch.'_'.$id; ?>" 
           target="_blank" id="sh_dnld<?php echo $id_rch; ?>">
            Скачать счёт</a></p>
        <script>
            $(document).ready(function(){
                $('sh_dnld<?php echo $id_rch; ?>').click(function(){
                    $('sh_dnld<?php echo $id_rch; ?>').hide(); }); });
        </script>  <?php endif;endforeach;endif;
    if(!empty($shcarr)):
    foreach ($shcarr as $shc): 
        $sh_arr= unserialize($shc['sh_ser']);
        $rekv_sh= unserialize($sh_arr['rman_ser']);
        $file_way=ROOT.'/doc/plat_'.$shc['id'].'.pdf'; ?>
        <br> <mark><?php echo $shc['id']; ?>  от <?php echo $sh_arr['date_sh']; ?>
            <?php   echo $rekv_sh['fname']; ?>
        <a href="/cabinet/dnld/arhsh_<?php echo $shc['id']; ?>" 
           target="_blank"a>Скачать</a>
        <?php if($shc['status']==='bill'): ?>
            <?php if(!file_exists($file_way)): ?>
        <form method="post" action="/cabinet/reclch/" enctype="multipart/form-data" >
            
            Загрузить платёжный документ(pdf)
            <input type="file" name="plat_<?php echo $shc['id']; ?>" />
            <button name="plat" value="<?php echo $shc['id']; ?>" type="submit">
            Отправить платёжку                                         </button>
        </form>  <?php
        else: echo 'платёжка отправлена';
        endif;
        
        endif;?>
        <?php if($shc['status']==='payd'): echo ' Оплачен'; endif; ?></mark>
    <?php endforeach;
    else:
        echo 'У Вас нет счетов';
    endif;
    ?> 
</div>


<div id="d-2">
    <!--<div class="spoiler-head"></div>-->
    <h4>Ролики</h4>
<form method="post" action="/cabinet/reclch/">
<?php
foreach ($rolar as $rolkey=>$rolinf):
    if($rolinf['status']==='upl'):$rol_color='yellow';$rolst='Новый';         endif;
    if($rolinf['status']==='app'):$rol_color='green'; $rolst='Одобрен';       endif;
    if($rolinf['status']==='rej'):$rol_color='red';   $rolst='Отклонён';      endif;
    if($rolinf['status']==='red'):$rol_color='blue';  $rolst='Отредактирован';endif;
    ?>
    <div style="background-color:<?php echo $rol_color; ?>;">
    <?php echo $rolinf['id']; ?> 
    <?php echo $rolinf['name']; ?>
    Длительность <?php echo $rolinf['dlit']; ?> сек
    <audio controls style="background: blueviolet;">
        <source src="/audio/rolik_<?php echo $rolinf['id']; ?>.mp3" type="audio/mpeg">
        Прослушивание не поддерживается вашим браузером. 
        <a href="/audio/rolik_<?php echo $rolinf['id']; ?>.mp3">Скачайте музыку</a>
    </audio>
<button name="del_rol" value="<?php echo $rolinf['id']; ?>" type="submit">Удалить
</button>
    <textarea name="txt" id="txt<?php echo $rolinf['id']; ?>" ><?php 
        if(!empty($rolinf['txt'])): echo $rolinf['txt'];endif;
    ?></textarea>
    <button type="button" name="upd_txt<?php echo $rolinf['id']; ?>" 
            id="upd_txt<?php echo $rolinf['id']; ?>" >Обновить текст</button>
    <script type="text/javascript">
    $(document).ready(function(){
        $('#upd_txt<?php echo $rolinf['id']; ?>').click(function(){
            var n_txt=$('#txt<?php echo $rolinf['id']; ?>').val();
            $.ajax({
                type: "POST",
                url: "/cabinet/reclch",
                data: { 
                    n_txt: n_txt ,
                    txt: <?php echo $rolinf['id']; ?>
                }, 
                beforeSend: function() { 
                    $('#upd_txt<?php echo $rolinf['id']; ?>').attr('disabled',true);
                    
                },
                success: function(html){           
                    var inr=html;
                    $('#txt<?php echo $rolinf['id']; ?>').html(inr);
                    $('#upd_txt<?php echo $rolinf['id']; ?>').attr('disabled',false);
                    
                } }); return false; }); });
    </script>
<?php if($rolinf['status']==='rej'): ?>
    Требует доработки(<?php echo $rolinf['descr']; ?>)
    <input type="hidden" name="MAX_FILE_SIZE" value="30000000" />
    <input type="file" name="rolik" >(не более 30МБ)
    <button name="rolik_upd" type="submit" value="<?php echo $rolinf['id']; ?>"
            >Загрузить</button>
                <?php endif; ?></div><?php endforeach;  ?>
<!--<span id="testt"></span>-->
</form>
<br>Загрузка рекламного ролика
<form enctype="multipart/form-data" action="/cabinet/reclch/" method="POST">
    <input type="text"  name="rolik_nm" placeholder="имя ролика" required/>
    <input name="dlit" type="number" placeholder="длительность, сек" required/>
    <input type="hidden" name="MAX_FILE_SIZE" value="30000000" required />
    Вствавьте текст ролика<textarea name="ntxt" required ></textarea>
    <input type="file" name="rolik" >(не более 30МБ)
    <button name="rolik_upl" type="submit" value="rolik" >Загрузить</button>
</form></div>
<div id="d-3" >
    <h1>Радиостанции</h1>
    <?php if(!empty($_SESSION['snt'])): ?>
    <div > 
       <?php echo $_SESSION['snt']; unset($_SESSION['snt']); ?>
    </div>
      <?php  endif; ?>
    <form method="post" action="#" >
        <input type="search" name="tag" placeholder="Аудитория" >
        <button name="tags" value="t" type="submit" >Искать</button>
    </form>

    <!--<h1>Отметьте галочкой станции, на которых планируете разместить рекламу</h1>-->
    <form method="post" action="/cabinet/reclch">
<?php
//include ROOT.'/views/rekl/rekl_plan.php'; //вставка плана-заявки
if(!empty($sat_inf)): 
     if(isset($_POST['tags'])): echo 'Выборка по запросу '.$post['tag']; endif; ?>
        <h1>Отметьте галочкой станции, на которых планируете разместить рекламу</h1>
<?php
foreach ($sat_inf as $satk=>$satc):
    $satusk=$satc['us_id'];
?>
   <div><input name="zaj_<?php echo $satk; ?>" type="checkbox" value="<?php echo $satk; ?>"/>
<a onclick="$('#sat<?php echo $satk; ?>').slideToggle('slow');"
           href="javascript://">
              <?php echo $satc['st_nm']; ?> </a> 
       <a href="/cabinet/clientrcab/media_<?php echo $satk; ?>" >Медиаплан</a>
    <div id="sat<?php echo $satk; ?>" style="display: none;">
        <?php // print_r($satuser); ?>
        <br>E-mail                             <?php echo $satuser[$satusk]['login']; ?>
        <br>Телефон                            <?php echo $satuser[$satusk]['tel']; ?>
        <br>Регион                             <?php echo $satc['region']; ?>
        <br>Город                              <?php echo $satc['city']; ?>
        <br>Ссылки на соцсети и онлайн вещание <?php echo $satc['links']; ?>
        <br>Зона охвата                        <?php echo $satc['zone']; ?>
        <br>Интересы целевой  аудитории        <?php echo $satc['aud_desc']; ?>
        <br>Охват аудитории                    <?php echo $satc['oxv_aud']; ?>
        <br>Сайт                               <?php echo $satc['site']; ?>
        
    </div></div>
<?php endforeach; ?>
    <button name="zaj_stek" type="submit" value="1" >Перейти к планированию</button>
    
    </form>
    <?php 
    
if(isset($_POST['tags'])): ?>
<a href="/cabinet/clientrcab/"> к полному списку радиостанций</a>
<?php endif; else:    ?>
<div style="text-align: center;"><mark><h2>По Вашему запросу ничего не найдено, 
            <a href="/cabinet/clientrcab/3"> вернуться к списку радиостанций</a></h2></mark>
    <image src="/views/img/kotenok.png" />   
        </div>
    <?php
endif; ?>
</div>
    
    
<div id="d-4">
    <h4>Профиль</h4>
<form method="post" action="/cabinet/reclch/" enctype="multipart/form-data">
    <?php 
    $rkar=unserialize($rekl_inf[0]['rekv']);
    foreach ($user_inf as $usk=>$usinf):
    ?>
    <?php echo $usinf['login']; ?>
    <p><span class="prof_nam">Имя</span><input name="name" type="text"  class="left-30"
                 value="<?php if(!empty($usinf['name'])): echo $usinf['name'];endif; ?>" /></p>
    <p><span class="prof_nam">Телефон</span><input name="tel" type="text" class="left-30"
                     value="<?php if(!empty($usinf['tel'])): echo $usinf['tel'];endif; ?>" /></p>
    
    <p><span class="prof_nam">Регион</span><input name="region" type="text" 
             class="left-30" value="<?php if(!empty($rekl_inf[0]['region'])){
                 echo $rekl_inf[0]['region'];} ?>" /></p>
    
    <p><span class="prof_nam">Город</span><input name="city" type="text"
             class="left-30" value="<?php if(!empty($rekl_inf[0]['city'])){
                 echo $rekl_inf[0]['city'];} ?>" /></p>
    
    <p><span class="prof_nam">Адрес</span><input name="adrs" type="text"
             class="left-30" value="<?php if(!empty($rekl_inf[0]['adrs'])){
                 echo $rekl_inf[0]['adrs'];} ?>" /></p>
    
    <p><span class="prof_nam">Должность</span><input name="position" type="text"
             class="left-30" value="<?php if(!empty($rekl_inf[0]['position'])){
                 echo $rekl_inf[0]['position'];} ?>" /> </p>
    <p><span class="prof_nam">Плательщик ИНН</span><input name="nds" type="checkbox"
             <?php if($rekl_inf[0]['nds']==='yes'){ echo 'checked';} ?> value="yes" /> </p>
    <p><button name="profile_ch" value="<?php echo $id; ?>" type="submit">Обновить</button></p>
    
</form>
    ____________________________________________________________________________
<?php endforeach; 
 foreach ($rekl_inf as $rik=>$rinf):
     $rekv= unserialize($rinf['rekv']);
?>
    <h4>Смена пароля</h4>
    <p><span class="prof_nam">Введите текущий пароль</span>
        <input name="curr_pass" id="curr_pass" type="password" class="left-30"/></p>
    <p><span class="prof_nam">Введите новый пароль</span>
        <input name="new_pass" id="new_pass" type="password" class="left-30" /></p>
    <p><span class="prof_nam">Повторите новый пароль</span>
        <input name="new_reppass" id="new_reppass" type="password" class="left-30" /></p>
    <p><button name="change_pass" value="1" type="button" id="change_pass">
            Отправить</button><span id="res_pass" ></span></p>
    <script type="text/javascript">
                $(document).ready(function(){
                    $('#change_pass').click(function(){
                        var curr_pass=$('#curr_pass').val();
                        var new_pass=$('#new_pass').val();
                        var new_reppass=$('#new_reppass').val();
                            $.ajax({
                            type: "POST",
                            url: "/cabinet/reclch",
                            data: { 
                                curr_pass:   curr_pass ,
                                new_pass:    new_pass,
                                new_reppass: new_reppass,
                                change_pass: 1
                            },
                            beforeSend: function() { 
                                $('#change_pass').attr('disabled',true);
                    
                            },
                            success: function(html){           
                                var inr=html;
                                $('#res_pass').html(inr);
                            } }); return false;    }); });</script>
</div>
    <div id="d-5">
   
<h4>Реквизиты</h4>

<form method="post" action="/cabinet/reclch/" enctype="multipart/form-data">
        <!--=====================================================================-->
    <p><span class="prof_nam">Название</span>
    <input name="fname" type="text" class="left-30"
           value="<?php if(!empty($rekv['fname'])){ echo $rekv['fname'];} ?>" /></p>
    <p><span class="prof_nam">ИНН</span>
    <input name="inn" type="text" class="left-30"
           value="<?php if(!empty($rekv['inn'])){ echo $rekv['inn'];} ?>" /> </p>
    <p><span class="prof_nam">КПП</span>
        <input name="kpp" type="number" class="left-30"
                 value="<?php if(!empty($rekv['kpp'])){ echo $rekv['kpp'];}  ?>" /></p>
    
    <p><span class="prof_nam">ОГРН</span>
    <input name="ogrn" type="text" class="left-30"
           value="<?php if(!empty($rekv['ogrn'])){ echo $rekv['ogrn'];} ?>" /></p>
    <p><span class="prof_nam">Юр.Адрес</span>
    <input name="jradr" type="text" class="left-30"
           value="<?php if(!empty($rekv['jradr'])){ echo $rekv['jradr'];} ?>" /></p>
     
    
    <p><span class="prof_nam">РС</span>
    <input name="rs" type="text" class="left-30"
           value="<?php if(!empty($rekv['rs'])){ echo $rekv['rs'];} ?>" /></p>
    <p><span class="prof_nam">КС</span>
    <input name="ks" type="text" class="left-30"
           value="<?php if(!empty($rekv['ks'])){ echo $rekv['ks'];} ?>" /></p>
    <p><span class="prof_nam">БИК</span>
    <input name="bik" type="text" class="left-30"
           value="<?php if(!empty($rekv['bik'])){ echo $rekv['bik'];} ?>" /></p>
    <p><span class="prof_nam">Банк</span>
    <input name="bank" type="text" class="left-30"
           value="<?php if(!empty($rekv['bank'])){ echo $rekv['bank'];} ?>" /></p>
<?php endforeach; ?>
    
    <p><button name="rekv_ch" value="<?php echo $id; ?>" type="submit">Обновить</button></p>
</form>
</div>
</div>


</body>
