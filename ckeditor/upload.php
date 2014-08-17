<?php
  if ($_FILES['upload']['error'] > 0)
    die("Error uploading image:".$_FILES['upload']['error']."\n<br/>");
  if (strpos($_FILES['upload']['type'],'image') === false)
    die("Unsupported image file!"."\n<br/>");
  $nme = date('_dmyHis').$_FILES['upload']['name'];
  if ( move_uploaded_file($_FILES['upload']['tmp_name'], "/ug/misc/eesa/public_html/site/news/data/images/".$nme) === false )
    die("Errorr uploading file");
  echo "Done: ".$_FILES['upload']['name'];
?>
