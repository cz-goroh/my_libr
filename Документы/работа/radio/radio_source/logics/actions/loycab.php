<?php
include_once ROOT.'/views/header.php';
echo User::wiyn()['namestr']; ?>
<form action="#" method="post">
<?php
if(!empty($rarr)):
foreach ($rarr as $infrk=>$infr):
    if($infr['status']==='upl'):$rol_color='yellow';$rolst='Новый';         endif;
    if($infr['status']==='app'):$rol_color='green'; $rolst='Одобрен';       endif;
    if($infr['status']==='rej'):$rol_color='red';   $rolst='Отклонён';      endif;
    if($infr['status']==='red'):$rol_color='blue';  $rolst='Отредактирован';endif;
    ?>
    <!--===================================ПЛЕЕР=============================-->
    <mark style="background-color: <?php echo $rol_color; ?>"><?php echo $infr['id']; ?> </mark>
    <?php echo $infr['name']; ?>
    Длительность <?php echo $infr['dlit']; ?> сек
    <audio controls>
        <source src="/audio/rolik_<?php echo $infr['id']; ?>.mp3" type="audio/mpeg">
        Прослушивание не поддерживается вашим браузером. 
        <a href="/audio/rolik_<?php echo $infr['id']; ?>.mp3">Скачайте музыку</a>
    </audio>
<!--=========================================================================-->
<span id="res"></div>
<?php if($infr['status']!='app'): ?>
    <button name="accept" value="<?php echo $infr['id']; ?>" type="button" 
            id="acp<?php echo $infr['id']; ?>" >Одобрить</button>
<?php if($infr['status']!='rej'): ?>  
    <span id="ac<?php echo $infr['id']; ?>" >
    <button name="reject" value="<?php echo $infr['id']; ?>" type="button" 
            id="rjc<?php echo $infr['id']; ?>" >Отклонить
    </button></span>
    <div id="rjd<?php echo $infr['id']; ?>">
        <input name="descr" id="dsc<?php echo $infr['id']; ?>" 
               placeholder="Ваш комментарий" /> 
        <button name="rej" value="<?php echo $infr['id']; ?>" type="button" 
            id="rj<?php echo $infr['id']; ?>" >Отправить</button>
<?php if($infr['status']==='red'): ?>
        <mark style="background-color: red;">Ролик доработан</mark>
<?php endif; ?>
    </div>
<?php else : ?>
    На доработке (<?php echo $infr['descr']; ?>)
<?php endif; ?>
    <?php else: echo 'Одобрен';    endif; ?>
    <div class="spoiler-wrap disabled">
        <div class="spoiler-head"> Текст <?php echo $infr['id']; ?></div>
        <div class="spoiler-body" >
            <?php if(!empty($infr['txt'])):
     echo $infr['txt'];
            endif; ?>
        </div>
    </div>
<script type="text/javascript">
$(document).ready(function(){//
    $('#rjd<?php echo $infr['id']; ?>').hide();
    
    $('#acp<?php echo $infr['id']; ?>').click(function(){
    var acp=$('#acp<?php echo $infr['id']; ?>').val();
        $.ajax({
        type: "POST",
        url: "/cabinet/loych",
        data: { acp: acp },
        success: function(html){           
            var inr=html;
            $('#res').html(inr);
        } }); return false; }); 
        
        $('#rjc<?php echo $infr['id']; ?>').click(function(){
            $('#rjd<?php echo $infr['id']; ?>').show(); });
        
        $('#rj<?php echo $infr['id']; ?>').click(function(){
    var rj= $('#rj<?php echo $infr['id']; ?>').val();
    var des=$('#dsc<?php echo $infr['id']; ?>').val();
        $.ajax({
        type: "POST",
        url: "/cabinet/loych/",
        data: { 
            rj:  rj ,
            des: des
        },
        success: function(html){           
            var inr=html;
            $('#ac<?php echo $infr['id']; ?>').html(inr);
        } }); return false; }); 
        });
</script>
    </div>
<br>
<?php endforeach; endif; ?>
</form>
<?php 
