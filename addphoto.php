<?php

//session_start();

// Если в сессии имя пользователя не установлено, пытаемся его достать из куки
/*
if(!isset($_SESSION['username']) and isset($_COOKIE['username']))
{
  $_SESSION['username'] = $_COOKIE['username'];
}*/

// Ещё раз ищем имя пользователя в сессии.
//$username = $_SESSION['username'];

// Неавторизированных пользователей отправляем на страницу авторизации.
/*
if ($username == null)
{
  header('Location: login.php');
}*/

include_once 'imagefunction.php';

?>

<!--
<div style="width:350px; float: left; padding-left: 1200px;">
  <b>Привет, <? //=$username;?></b> | <a href="login.php">Выход</a>
<hr>
</div>-->

<?php
$res = false;
$a_mes = [
  '1' =>' <b>Картинка загружена!</b>',
  '2' =>' <b>Ошибка загрузки!</b>',
  '3' =>' <b>Загружаемый файл не является картинкой!</b>',
  '4' => '<b>ОШИБКА! Файл не выбран!</b>',
];

if (isset($_FILES['filename']))
{
  $file = $_FILES['filename'];
  //var_dump($file);

  if ($file['name'] != '')
  {

    $res = uplode_file($file);

  }
  else {
     $res = 4;
    }
}

?>

<div style="width:400px; float: left; padding-left: 500px;">
  <br><br><h3><center>Добавление новой фотографии</h3><br><br>
    <?php if ($res) echo $a_mes[$res];?>
    <br><br>
  <form action="addphoto.php" method="post" enctype="multipart/form-data">
  <input type="file" name="filename">
  <input type="submit" value="Загрузить!">
</form>
</div>

<?php

if ($res == 1)
{
  echo '<div style="width:1000px; float: left; padding-left: 300px;">
  <hr></div><br>
  <div style="width:1200px; float: left; padding-left: 300px;">';

  $imagename = getImageName();

  displayImage($imagename);

  echo '</div>';
}

?>
