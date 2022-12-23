<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Versions</title>
		<link href="../version/styles.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
	</head>

<?php


$db = mysqli_connect("localhost", "root", "", "phplogin");
$er = mysqli_select_db($db, "phplogin");

$result = mysqli_query($db, "SELECT * FROM versions");

?>

<table border="2">
  <tr>
    <th>Version</th>
    <th>channel</th>
    <th>patchnotes</th>
    <th>files</th>
    <th>dates</th>
  </tr>
  <?php

$num = 0;
  while ($array = mysqli_fetch_array($result, MYSQLI_NUM)) {
    $num++;
    if ($array[1] == 1)
      $array[1] = "Experimental";
    if ($array[1] == 2)
      $array[1] = "Stable";

    // print "<tr> <td>";
    // echo $array[0]; 
    print "</td> <td>";
    echo $array[0];
    print "</td> <td>";
    echo $array[1];
    print "</td> <td>";
    $r = str_replace('-','<br>- ', $array[2]);
    echo $r;
    print "</td> <td>";
    // print' <button <a href="../releases/'.$array[0].'/archivio-'.$array[0].' Setup.exe" class="btns" id="'.$array[0].'" name="'.$array[0].'" value="'.$array[0].'" type="button" onclick="reply_click(this.id)" onclick="focusMe(this)">DOWNLOAD</button>';
    print' <a href="../releases/'.$array[0].'/archivio-'.$array[0].' Setup.exe"><button>DOWNLOAD</button></a>';
    print "</td> <td>";
    echo $array[3];
    print "</td> </tr>";
  }

  ?>
