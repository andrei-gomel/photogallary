<?php

function getImageName()
{

  $items = [];

  $handle = opendir('img/');

  if ($handle != false)
  {

    while (($name = readdir($handle)) !== false) {

      if ($name == '.' or $name == '..') continue;

      if (!is_dir($name))
      {
        $items[] = $name;
      }
    }
  }
  closedir($handle);

  return $items;
}

function displayImage($imagename)
{
  foreach ($imagename as $item) {

    echo '<div style="width:160px; float: left; margin: 5px 10px;
         padding: 10px 10px 10px 10px; border: 1px dotted #1E90FF;
         padding: 10px;	margin-bottom: 5px;">';

    echo '<a href="img/' . $item . '"><img src="img/' . $item . '" width=150 height=100>
    </a>' . $item . '</div>';
  }
}

function uplode_file($file)
{
  $a_type = ['image/jpeg', 'image/jpg', 'image/gif', 'image/bmp', 'image/png',];

  if (in_array($file['type'], $a_type))
  {
      if (move_uploaded_file($file['tmp_name'], 'img/' . $file['name']))
      {
        return 1;
      }
      else {
        return 2;
      }
  }
  else {
    return 3;
  }
}
