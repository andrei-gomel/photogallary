<?php

include_once 'imagefunction.php';

/*
if (isset($_COOKIE['name']))
{
  echo '<right>Привет, ' . $_COOKIE['name'] . '</right>';
}*/

if (!isset($_GET['mode']))
{
    echo '<br><h3><center>ФОТОГАЛЕРЕЯ</h3>&nbsp;&nbsp;&nbsp;&nbsp;
    <a href="./?mode=add">Добавить фото</a><br><br>
        <div style="width:1200px; float: left; padding-left: 300px;">';

    $imagename = getImageName();

    displayImage($imagename);

    echo '</div>';

}
else {
  // code...

  header('Location: addphoto.php');
}

?>
