<!DOCTYPE html>
<!--<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en"><head>-->
    <title>Реклама на радио</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="description" content="Реклама на радио"/>
    <meta content="yes" name="apple-mobile-web-app-capable" />
    <meta name="viewport" content="minimum-scale=1.0, width=device-width, maximum-scale=1, user-scalable=no" />
    <style type="text/css">
        body {font-size:10px; color:#777777; font-family:arial; text-align:center;}
        h1 {font-size:64px; color:#555555; margin: 70px 0 50px 0;}
        p {width:320px; text-align:center; margin-left:auto;margin-right:auto; margin-top: 30px }
        /*div {width:320px; text-align:center; margin-left:auto;margin-right:auto;}*/
        a:link {color: #34536A;}
        a:visited {color: #34536A;}
        a:active {color: #34536A;}
        a:hover {color: #34536A;}
    </style>
</head>
<table>
<thead><tr>  <th>ID</th> <th>Выход</th> <th>Ролик</th></tr></thead>
<tbody> 
<?php foreach ($barr as $bin): ?>
<tr>
    <td>
        <?php echo $bin['id']; ?>
    </td>
    <td>
        <?php echo date('d.m.Y',$bin['b_time']);?><br>
        <?php echo date('H',$bin['b_time']);?> - 
        <?php echo date('H',$bin['b_time']+3600);?>
    </td>
    <td>
        <a href="http://r.lanseal.ru/out/file/rolik_<?php 
        echo $bin['rolik_id']; ?>">Скачать</a>
    </td>
</tr> <?php endforeach; ?>
</tbody>
</table>


