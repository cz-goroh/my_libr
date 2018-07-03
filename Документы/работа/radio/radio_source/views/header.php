<!DOCTYPE html>
<head>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="/js/mask.js" type="text/javascript"></script>
<script>
    <?php if(is_numeric($arg)||empty($arg)): ?>
    $(document).ready(function(){
    var cont_1=$('#d-1').html();
    var cont_2=$('#d-2').html();
    var cont_3=$('#d-3').html();
    var cont_4=$('#d-4').html();
    var cont_5=$('#d-5').html();
    var cont_6=$('#d-6').html();
    var cont_7=$('#d-7').html();
    <?php if(empty($arg)): $vkladka=3; else: $vkladka=$arg; endif; ?>
    $('#main-div').html(cont_<?php echo $vkladka; ?>);
    $('#a<?php echo $vkladka; ?>').css('background', '#AA94BA');
    $('#content').hide();
    
    $('#a1').click(function(){
        $('#main-div').html(cont_1);
        $('.a_style').css('background', '#F3C0C0');
//        $('.a_style').css('width', '100%');
//        $('#a1').css('width', '110%');
        $('#a1').css('background', '#AA94BA');
    });
    $('#a2').click(function(){
        $('#main-div').html(cont_2);
        $('.a_style').css('background', '#F3C0C0');
//        $('.a_style').css('width', '100%');
//        $('#a2').css('width', '110%');
        $('#a2').css('background', '#AA94BA');
    });
    $('#a3').click(function(){
        $('#main-div').html(cont_3);
        $('.a_style').css('background', '#F3C0C0');
//        $('.a_style').css('width', '100%');
//        $('#a3').css('width', '110%');
        $('#a3').css('background', '#AA94BA');
    });
    $('#a4').click(function(){
        $('#main-div').html(cont_4);
        $('.a_style').css('background', '#F3C0C0');
//        $('.a_style').css('width', '100%');
//        $('#a4').css('width', '110%');
        $('#a4').css('background', '#AA94BA');
    });
    $('#a5').click(function(){
        $('#main-div').html(cont_5);
        $('.a_style').css('background', '#F3C0C0');
//        $('.a_style').css('width', '100%');
//        $('#a5').css('width', '110%');
        $('#a5').css('background', '#AA94BA');
    });
    $('#a6').click(function(){
        $('#main-div').html(cont_6);
        $('.a_style').css('background', '#F3C0C0');
//        $('.a_style').css('width', '100%');
//        $('#a5').css('width', '110%');
        $('#a6').css('background', '#AA94BA');
    });
    $('#a7').click(function(){
        $('#main-div').html(cont_7);
        $('.a_style').css('background', '#F3C0C0');
//        $('.a_style').css('width', '100%');
//        $('#a5').css('width', '110%');
        $('#a7').css('background', '#AA94BA');
    });
    
});
<?php endif; ?>
jQuery(function($){   
    $(".phone").mask("+7(999)999-9999");   
});
</script>
<link type="text/css" rel="stylesheet" href="/views/cab_style.css" />
<script type="text/javascript">
jQuery(document).ready(function(){
    $('.boolit').hide();
jQuery('.spoiler-head').click(function(){
    $(this).parents('.spoiler-wrap').toggleClass("active").find('.spoiler-body').slideToggle();
});});
</script>
</head>
<body>
    <header>
    <?php 
    echo User::wiyn()['namestr'];
    ?>
    
</header>