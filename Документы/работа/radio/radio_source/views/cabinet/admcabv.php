<?php
//echo User::wiyn()['namestr'];
include ROOT.'/views/header.php';
?>
<div class="layout">
    <div class="sidebar">
        <!--id="hidden_panel" -->
        
        <p class="a_style"  id="a4"><br> Станции</p>
        <p class="a_style"  id="a5"><br> Заявки</p>
        <p class="a_style"  id="a1"><br> Счета</p>
        <p class="a_style"  id="a2"><br> Ролики</p>
        <p class="a_style"  id="a3"><br> Рекламодатели</p>
        
        
    </div>
    <div id="main-div" class="content" ></div>
</div>
<div id="content">
    <div id="d-1">Счета</div>
    
    <div id="d-2">Ролики</div>
    
    <div id="d-3">
        <h1>Рекламодатели</h1>
    <?php foreach ($arekl_inf as $rekk=>$rekl): 
    if(!empty($rekl['rekv'])):
        $rekstr=$rekl['rekv'];
        $rekv= unserialize($rekstr);
    endif;
    ?>
    <p>
    <mark><?php echo $rekl['id']; ?></mark>
    <?php echo $rekv['fname']; ?>
    <a href="/cabinet/admincab/reklcab_<?php echo $rekl['id']; ?>">Обзор</a>
    </p>
    <?php endforeach; ?>
    </div>
    
    <div id="d-4">Станции</div>
    
    <div id="d-5">Заявки</div>
    
</div>