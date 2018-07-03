<!--регистрация пользователей-->
<!--форма входа-->
<!--<a href="#" >Я забыл пароль</a>
    восстановление пароля
    <div id="rest" >
    <input type="email" name="restore_mail" id="restore_mail" placeholder="Введите ваш email" />
    <br><button name="restore_pass" id="restore_pass" value="1" >Сбросить пароль</button>
    <br>На Ваш email будет отправлено сообщение с новым паролем
    </div>-->
<!--<form method="post" action="#">
    <input type="email" name="login" id="login" placeholder="Email"/>
    <input type="password" name="password" id="password" placeholder="password"/>
    <button name="income" type="button" value="1" >Войти</button>
</form>-->
<!--форма регистрации-->
<!--<link href="https://fonts.googleapis.com/css?family=Comfortaa:300,400,700|Neucha&amp;subset=cyrillic,cyrillic-ext" rel="stylesheet">-->
<?php if(empty($_SESSION['ush'])): ?>
<div class="grey-block" style="max-width: 40%; max-height: 40%;">
    <div id="first">
        <h2>Войдите или зарегистрируйтесь</h2><br><br><br><br><br>
<button id="let-inc" type="button" class="pink-but width-20">Войти</button><br>
<button id="let-reg" type="button" class="pink-but width-20">Зарегистрироваться</button>
    </div>
<div  id="incom">
    <h2>Вход</h2>
    <?php echo User::wiyn()['namestr'];  ?>
</div>

<div id="reg">
<h2>Регистрация</h2>
<!--<span id="test"></span>-->
    <input name="r_mail" id="r_mail" type="email" placeholder="Ваш Email" required />
    <br>
    <button name="snd_code" value="1" id="snd_code" class="red-but">Отправить</button>
    <div id="em_mes">На Ваш Email будет отправлен код подтверждения</div>
    <div id="rep_email" style="color: red;"></div>
</div>
    <div id="code_res">
        <p>Код отправлен на Ваш Email, проверьте почтовый ящик</p>
        <input name="conf_code" id="conf_code" type="text" placeholder="Код из письма" required />
        <button value="1" name="chk_cod" id="chk_code">Проверить</button>
    
    </div>
        <div id="chk_code_res" ></div>
        <div id="rol_block">
            
            <br>Ваша роль: 
            <input type="radio" name="rol" id="rekl" value="rekl" checked/>Рекламодатель
            <input type="radio" name="rol" id="radio_man" value="radio_man" />Менеджер
            радиостанции
        </div>
    
    <div id="radio_inf">
        <form action="/signup/registration/form" method="post" >
        <!--информация о радиостанции-->
        
        <br>
        <input type="password" name="new_pass" id="new_pass_r"
               placeholder="Придумайте пароль(минимум 8 символов)" required
               class="width-20" >
        <div id="lntp_r"></div>
        <input type="password" name="new_reppass" id="new_reppass_r"
               placeholder="Повторите придуманный Вами пароль" required 
               class="width-20"/>
        <div id="rpass_r"></div>
        <input type="hidden" name="r_mail_r"  id="r_mail_r" 
               class="width-20"/>
        
        <br><input name="radio_surname" id="radio_surname" type="text" 
               placeholder="Фамилия" required class="width-20" />
        <br><input name="radio_name" id="radio_name" type="text"
               placeholder="Имя"  required class="width-20" />
        <br><input name="radio_otch" id="radio_otch" type="text"
                   placeholder="Отчество"  required class="width-20"/>
        <br><input name="radio_position" id="radio_position" type="text" 
                   placeholder="Должность"  required class="width-20"/>
        <br><input name="radio_inn" id="radio_inn" type="number" 
                   placeholder="ИНН" required  class="width-20"/>
        <div id="radio_inn_res" ></div>
        
        
        <br><input name="radio_adr" id="radio_adrs" type="text" 
                   placeholder="Адрес"  class="adrs width-20" required />
        <br><input name="radio_phone" id="radio_phone" type="tel"  
                   placeholder="Телефон"  required class="width-20 phone" />
        <br><input name="radio_nm" id="radio_nm" type="text"
                   placeholder="Название станции"  required class="width-20"/>
        <span id="sndrinf">
            <button type="submit" name="send_radioinf" id="send_radioinf"
                value="send_radioinf" class="width-20 red-but">
                Зарегистрировать радиостанцию</button>
        </span>
        </form>
    </div>
    
    
    <div id="rekl_inf">
        <!-- информация о рекламодателе -->  
        <form action="/signup/registration/form" method="post" >
            
        <br>
        <input type="password" name="new_pass" id="new_pass_c"  required 
               class="width-20"
               placeholder="Придумайте пароль(минимум 8 символов)"/>
        <div id="lntp_c"></div>
        <input type="password" name="new_reppass" id="new_reppass_c" required  
               class="width-20"
               placeholder="Повторите придуманный Вами пароль"/>
        <div id="rpass_c"></div>
        <input type="hidden" name="r_mail_c" id="r_mail_c" />
        
    <br><input name="rekl_surname" id="rekl_surname" type="text" 
               placeholder="Фамилия"  required class="width-20"/>
        <br><input name="rekl_name" id="rekl_name" type="text"
               placeholder="Имя" required class="width-20"/>
        <br><input name="rekl_otch" id="rekl_otch" type="text"
                   placeholder="Отчество"  required class="width-20"/>
        <br><input name="rekl_position" id="rekl_position" type="text" 
                   placeholder="Должность" required class="width-20" />
        <br><input name="rekl_inn" id="rekl_inn" type="number" 
                   placeholder="ИНН" required class="width-20" />
        <div id="rekl_inn_res" ></div>
        
        <br><input name="rekl_adr" id="rekl_adrs" type="text" 
                   placeholder="Адрес"  class="adrs width-20"  required />
        <br><input name="rekl_phone" id="rekl_phone" type="tel"
                   class="phone width-20" placeholder="Телефон" required  />
        <br><button name="send_reklinf" type="submit" id="send_reklinf"
                    value="send_reklinf" class="width-20 red-but" >
            Зарегистрировать рекламодателя</button>
        </form>
    </div>
</form>
</div>
<?php endif; ?>
<!--<button id="jsn" type="button">jsn</button>-->
<!--<span id="test1"></span>
<span id="test2"></span>
<span id="test3"></span>
<span id="test4"></span>
<div id="t"></div>-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="/js/mask.js" type="text/javascript"></script>
<link href="https://cdn.jsdelivr.net/npm/suggestions-jquery@17.5.0/dist/css/suggestions.min.css" type="text/css" rel="stylesheet" />
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-ajaxtransport-xdomainrequest/1.0.1/jquery.xdomainrequest.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/suggestions-jquery@17.5.0/dist/js/jquery.suggestions.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    $('#incom').hide();
    $('#reg').hide();
    $('#code_res').hide();
    $('#radio_inf').hide();
    $('#rol_block').hide();
    $('#rekl_inf').hide();
    $('#send_radioinf').attr('disabled',true);
    
    $('#new_pass_c').blur(function(){ 
        var pass=$('#new_pass_c').val();
        var count=pass.length;
        $('#lntp_c').html(count);
                if(count<8){
                    $('#lntp_c').html('слишком короткий пароль');
                    $('#new_pass_c').css('border-color', 'red');
                    $('#send_reklinf').attr('disabled',true);  }
                if(count>=8){
                    $('#send_reklinf').attr('disabled',false);
                    $('#lntp_c').html('');
                    $('#new_pass_c').css('border-color', 'inherit'); } });
    $('#new_pass_r').blur(function(){ 
        var pass=$('#new_pass_r').val();
        var count=pass.length;
        $('#lntp_r').html(count);
                if(count<8){
                    $('#lntp_r').html('слишком короткий пароль(не менее 8 символов)');
                    $('#new_pass_r').css('border-color', 'red');
                    $('#send_radioinf').attr('disabled',true);  }
                if(count>=8){
                    $('#send_radioinf').attr('disabled',false);
                    $('#lntp_r').html('');
                    $('#new_pass_r').css('border-color', 'inherit'); } });
            
    $('#new_reppass_c').blur(function(){ 
        var pass1=$('#new_reppass_c').val();
        var pass2=$('#new_pass_c').val();
                if(pass1!==pass2){
                    $('#rpass_c').html('Пароли не совпадают');
                    $('#new_reppass_c').css('border-color', 'red');
                    $('#new_pass_c').css('border-color', 'red');
                    $('#send_reklinf').attr('disabled',true);
                }
                if(pass1===pass2){
                    $('#send_reklinf').attr('disabled',false);
                    $('#rpass_c').html('');
                    $('#new_reppass_c').css('border-color', 'inherit');
                    $('#new_pass_c').css('border-color', 'inherit');
                }
                  });
    $('#new_reppass_r').blur(function(){ 
        var pass1=$('#new_reppass_r').val();
        var pass2=$('#new_pass_r').val();
                if(pass1!==pass2){
                    $('#rpass_r').html('Пароли не совпадают');
                    $('#new_reppass_r').css('border-color', 'red');
                    $('#new_pass_r').css('border-color', 'red');
                    $('#send_radioinf').attr('disabled',true);
                }
                if(pass1===pass2){
                    $('#send_radioinf').attr('disabled',false);
                    $('#rpass_r').html('');
                    $('#new_reppass_r').css('border-color', 'inherit');
                    $('#new_pass_r').css('border-color', 'inherit');
                }
                  });
    
    $('#income').click(function(){                     //проверка кода
        var login=$('#login').val();
        var password=$('#password').val();
        $.ajax({
            type: "POST",
            url: "/signup/registration/",
            data: { 
                login:    login,
                password: password,
                income:   1
            },
            beforeSend: function() { 
                $('#income').html('Авторизация'); 
                $('#income').attr('disabled',true);
            },
            success: function(html){           
                var inr=html;
//                $('#wrong_pass').html(inr);
//                $('chk_code_res').html(inr);
                if(inr==='wrong'){
                    $('#login').css('border-color', 'red');
                    $('#password').css('border-color', 'red');
                    $('#wrong_pass').html('Неверное сочетание логин-пароль');
                    $('#income').attr('disabled',false);
                    $('#income').html('Войти'); 
                }
                if(inr!=='wrong'){
                    var url = "/";
                    $(location).attr('href',url);
                }
            } }); return false; });
    
    $('#let-inc').click(function(){
        $('#incom').show();
        $('#first').hide();
    });
    $('#let-reg').click(function(){
        $('#reg').show();
        $('#first').hide();
    });
    $('#radio_inn').blur(function(){ 
        var radio_inn=$('#radio_inn').val();
        $.ajax({
            type: "POST",
//            dataType: 'json',
            url: "/signup/registration/",
            data: { radio_inn_chk:  radio_inn },
            success: function(html){           
                var inr=html;
                if(inr==='emp'){
                    $('#radio_inn_res').html('Некорректный ИНН');
                    $('#radio_inn').css('border-color', 'red');
                    $('#send_radioinf').attr('disabled',true);
                }
                if(inr==='ok'){
                    $('#send_radioinf').attr('disabled',false);
                    $('#radio_inn_res').html('');
                    $('#radio_inn').css('border-color', 'inherit');
                }
                } }); return false; });
        
    $('#rekl_inn').blur(function(){ 
        var radio_inn=$('#rekl_inn').val();
        $.ajax({
            type: "POST",
//            dataType: 'json',
            url: "/signup/registration/",
            data: { radio_inn_chk:  radio_inn },
            success: function(html){           
                var inr=html;
                if(inr==='emp'){
                    $('#rekl_inn_res').html('Некорректный ИНН');
                    $('#rekl_inn').css('border-color', 'red');
                    $('#send_reklinf').attr('disabled',true);
                }
                if(inr==='ok'){
                    $('#send_reklinf').attr('disabled',false);
                    $('#rekl_inn_res').html('');
                    $('#rekl_inn').css('border-color', 'inherit');
                }
                } }); return false; });
        
    $('#chk_code').click(function(){                     //проверка кода
        var conf_code=$('#conf_code').val();
        $.ajax({
            type: "POST",
            url: "/signup/registration/",
            data: { conf_code:  conf_code },
            success: function(html){           
                var inr=html;
                $('chk_code_res').html(inr);
                if(inr==='ok'){
                    $('#rol_block').show();
                    $('#rekl_inf').show();
                            } } }); return false; });
    
    $('input:radio[name=rol]').on('change', function () {
        var rol= $('input[name=rol]:checked').val();
        if(rol==='radio_man'){
            $('#radio_inf').show();
            $('#rekl_inf').hide();
        }
        if(rol==='rekl'){
            $('#rekl_inf').show();
            $('#radio_inf').hide();
        }
    });

$('#chk_code').click(function(){                     //проверка кода
    var conf_code=$('#conf_code').val();   

    $.ajax({
        type: "POST",
        url: "/signup/registration/",
        data: { confs_code:  conf_code },
        success: function(html){           
            var inr=html;
            $('chk_code_res').html(inr);
            if(inr==='ok'){
                $('#rol_block').show();
                $('#rekl_inf').show(); } } }); return false; });

$('#snd_code').click(function(){            //отправка кода на почту
    var r_mail=$('#r_mail').val();  
    $('#r_mail_r').val(r_mail);
    $('#r_mail_c').val(r_mail);
    $.ajax({
        type: "POST",
        url: "/signup/registration/",
        data: { rs_mail:  r_mail },
        beforeSend: function() {
            $('#snd_code').attr('disabled',true);
            $('#snd_code').html('Отправляем');
        },
        success: function(html){
            var inr=html;
            if(inr==='ok'){
                $('#code_res').show(); 
                $('#rep_email').hide();
                $('#em_mes').hide();
                $('#snd_code').html('Проверьте почту');
            }
            if(inr==='rep'){
                $('#rep_email').html('Такой Email уже существует, войдите в свою учётную запись');
                $('#em_mes').hide();
                $('#code_res').hide(); 
                $('#snd_code').attr('disabled',false);
                $('#snd_code').html('Отправить');
            }
            }});return false; }); 
});
            
jQuery(function($){   
    $(".phone").mask("+7(999) 999-9999");   
});
$(".city").suggestions({
    token: "2ae95ed1cef9323717fbc91c75aa0904c7a4cdeb",
    type: "ADDRESS",
    hint: false,
    bounds: "city",
    constraints: {
        label: "",
        locations: { city_type_full: "город" }
    },
    /* Вызывается, когда пользователь выбирает одну из подсказок */
    onSelect: function(suggestion) {
        console.log(suggestion);
    }
});
$(".region").suggestions({
    token: "2ae95ed1cef9323717fbc91c75aa0904c7a4cdeb",
    type: "ADDRESS",
    hint: false,
    bounds: "region",
    constraints: {
        label: "",
        locations: { city_type_full: "город" }
    },
    /* Вызывается, когда пользователь выбирает одну из подсказок */
    onSelect: function(suggestion) {
        console.log(suggestion);
    }
});
$(".adrs").suggestions({
token: "2ae95ed1cef9323717fbc91c75aa0904c7a4cdeb",
type: "ADDRESS",
count: 5,
/* Вызывается, когда пользователь выбирает одну из подсказок */
onSelect: function(suggestion) {
console.log(suggestion);
}
});
</script>
<?php
//    $('#income').click(function(){                     //проверка кода
//    var login=     $('#login').val();
//    var password=  $('#password').val();
//    
//    $.ajax({
//        type: "POST",
//        url: "/signup/registration/",
//        data: { 
//            login:  login,
//            password: password
//        },
//        success: function(html){           
//            var inr=html;
//           // $('#wrong_pass').html('неверное сочетание логин-пароль');
//            $('#wrong_pass').html(inr);    
//            if(inr !=='wrong'){                
//                $('#wrong_pass').text(inr);  
//            }
//            if(inr ==='wrong'){
//                $('#wrong_pass').html('неверное сочетание логин-пароль');
//            }
//        }
//    });
//    return false;    
//    });