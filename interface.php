<?php
require_once("authenticate.php");
?>

<!DOCTYPE html>
<html>
<head>
    <title>EESA Administrative Interface</title>
    <meta name="keywords" content="EESA Administrative Interface"/>
    <meta name="description" content="Administrative interface for EESA website"/>
    <meta name="author" content="Kamal Galrani">

    <meta name="viewport " content="width=device-width,initial-scale=1.0">
    <link rel="stylesheet" href="css/cyborg.css">
    <link rel="stylesheet" href="css/style.css">
    <link href="css/bootstrap-responsive.css" rel="stylesheet">
    <script src="js/jquery-1.7.2.min.js" type="text/javascript" charset="utf-8"></script>
    <script src="js/bootstrap.min.js" type="text/javascript" charset="utf-8"></script>
    <script src="ckeditor/ckeditor.js"></script>
    <style>
      div.editable
      {
        border: solid 2px transparent;
        padding-left: 15px;
        padding-right: 15px;
      }
      div.editable:hover
      {
        border-color: black;
      }
    </style>

    <script type="text/javascript" charset="utf-8">
      function prog_onChange() {
        var sel_prog = $("#add-voters-prog option:selected").val();
        if (sel_prog == 'phd') {
          document.getElementById("add-voters-yr").required = false;
        }
        else {
          document.getElementById("add-voters-yr").required = true;
        }
      }
      function nav_onClick(sender) {
        if (sender == 'log-out') {
          document.cookie = 'auth=; expires=Thu, 01 Jan 1970 00:00:01 GMT;';
          document.cookie = 'user=; expires=Thu, 01 Jan 1970 00:00:01 GMT;';
          window.location = "index.php";
        }
        else {
          $("[id^='page-']").fadeOut("fast");
          $("[id^='nav-li-']").removeClass("active");
        }
        $("#page-" + sender).fadeIn("fast");
        $("#nav-li-" + sender).addClass("active");
      }
      function search_ldap(srchstring, criteria, callback, name, uid, roll) {
        if (roll) document.getElementById(roll).value           = "";
        if (name) document.getElementById(name).value           = "";
        if (uid)  document.getElementById(uid).value            = "";
        document.getElementById(callback).innerHTML             = "Searching...";
        document.getElementById(callback).style.fontWeight      = "lighter";
        document.getElementById(callback).style.color           = "";
        $.get( "ldap.php", {'srchstring': srchstring, 'criteria':criteria} )
         .done(function(data) {
           data = data.trim().replace(/\n/g, '<br>');
           document.getElementById(callback).innerHTML          = data;
           if (data.indexOf("<br>") != -1) {
             document.getElementById(callback).style.color      = "";
             document.getElementById(callback).style.fontWeight = "";
             var info = data.split("<br>");
             if (roll) document.getElementById(roll).value      = info[0];
             if (name) document.getElementById(name).value      = info[1];
             if (uid)  document.getElementById(uid).value       = info[2];
           }
           else {
           document.getElementById(callback).style.color        = "red";
           document.getElementById(callback).style.fontWeight   = "lighter";
           }
         })
         .fail(function() {
           document.getElementById(callback).innerHTML          = "Could not connect to the server!";
           document.getElementById(callback).style.color        = "red";
           document.getElementById(callback).style.fontWeight   = "lighter";
         });
      }
      function submit_onClick(fields, error) {
        var flag = true;
        if (fields) {
          for(i=0;i<fields.length;i++){
            if(!document.getElementById(fields[i]).value.trim().length) {
              alert(error);
              flag = false;
              break;
            }
          }
        }
        return flag;
      }

      window.onload = function() {
        CKEDITOR.replace(document.getElementById("add-news-data"));
      };
    </script>
</head>
<body>
<div class="container">
  <div style="width:20%; padding:20px;">
    <h3>Tasks...</h3>
    <ul class="nav nav-pills nav-stacked" style="top:30%">
      <li id="nav-li-add-news" class="active" onClick="nav_onClick('add-news')"    ><a id="add-news-btn"     style="cursor: pointer;">Add news item</a></li>
      <li id="nav-li-del-news"                onClick="nav_onClick('del-news')"    ><a id="del-news-btn"     style="cursor: pointer;">Remove news item</a></li>
      <li id="nav-li-add-election"            onClick="nav_onClick('add-election')"><a id="add-election-btn" style="cursor: pointer;">Conduct election</a></li>
      <li id="nav-li-mon-election"            onClick="nav_onClick('mon-election')"><a id="mon-election-btn" style="cursor: pointer;">Monitor election</a></li>
      <li id="nav-li-add-voters"              onClick="nav_onClick('add-voters')"  ><a id="add-voters-btn"   style="cursor: pointer;">Add voters</a></li>
      <li id="nav-li-brow-voters"             onClick="nav_onClick('brow-voters')" ><a id="brow-voters-btn"  style="cursor: pointer;">Browse voter list</a></li>
      <li id="nav-li-log-out"                 onClick="nav_onClick('log-out')"     ><a id="log-out-btn"      style="cursor: pointer;">Log out</a></li>
    </ul>
  </div>
  <!------------------ADD NEWS # PAGE-------------------->
  <?php include("page-includes/add-news-page.php"); ?>
  <!------------------ADD NEWS # PAGE-------------------->
  <?php include("page-includes/del-news-page.php"); ?>
  <!------------------ADD VOTERS # PAGE-------------------->
  <?php include("page-includes/add-voters-page.php"); ?>

</div> 
</body>
</html>
