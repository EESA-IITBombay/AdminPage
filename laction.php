<?php
//require("authenticate.php");
$HOME="/ug/misc/eesa/public_html/admin";

//switch ($_POST["submit"]) {
//  //--ADD VOTER TASK--//
//  case "add-voter":
//    if ((!isset($_GET["add-voters-rollno"])) || (trim($_GET["add-voters-rollno"])=="")) die("You have not entered any roll number. Please go back and fill it up.");
//    $ds = ldap_connect("ldap.iitb.ac.in") or die("Unable to connect to LDAP server. Please try again later.");

//    $sr = ldap_search($ds, "dc=iitb,dc=ac,dc=in", "(employeenumber=" . $_GET["add-voters-rollno"] . ")");
//    $info = ldap_get_entries($ds, $sr);
//    echo $info[0]['cn'][0] . "<br>\n" . $info[0]['mail'][0];
//    break;

  //--ADD NEWS TASK--//
//  case "add-news":
    $DATA="/ug/misc/eesa/public_html/site/news/data";
    //Open MySQL Connection
    require($HOME."/include/MySQL_Admin.class.php");
    require($HOME."/include/common/config.php");
    $dbLink = new MySQL_Admin($dbName, $dbUsername, $dbPassword);

    //Confirm payload
    if ( !isset($_POST['add-news-headline']) || strlen($_POST['add-news-headline']) < $NEWS_HEADLINE_LEN_MIN || strlen($_POST['add-news-headline']) > $NEWS_HEADLINE_LEN_MAX)
      die("News headline should be between ".$NEWS_HEADLINE_LEN_MIN." and ".$NEWS_HEADLINE_LEN_MAX." characters"."\n<br/>");
    if ( !isset($_POST['add-news-synopsis']) || strlen($_POST['add-news-synopsis']) < $NEWS_SYNOPSIS_LEN_MIN || strlen($_POST['add-news-synopsis']) > $NEWS_SYNOPSIS_LEN_MAX)
      die("News synopsis should be between ".$NEWS_SYNOPSIS_LEN_MIN." and ".$NEWS_SYNOPSIS_LEN_MAX." characters"."\n<br/>");
    if ( !isset($_POST['add-news-expiry']) )
      die("Please specify the number of days for which the news item will be displayed"."\n<br/>");
    if ( !isset($_POST['add-news-data']) || strlen($_POST['add-news-data']) < $NEWS_DATA_LEN_MIN || strlen($_POST['add-news-data']) > $NEWS_DATA_LEN_MAX)
      die("News body should be between ".$NEWS_DATA_LEN_MIN." and ".$NEWS_DATA_LEN_MAX." characters"."\n<br/>");
    if ($_FILES['add-news-banner']['error'] > 0)
      die("Error uploading image:".$_FILES['add-news-banner']['error']."\n<br/>");
    if (strpos($_FILES['add-news-banner']['type'],'image') === false)
      die("Unsupported image file!"."\n<br/>");

    //Add news item to database
    $id = $dbLink->AddNews($_POST['add-news-headline'],$_POST['add-news-expiry'],$_POST['add-news-synopsis']);

    //Save files
    if ( move_uploaded_file($_FILES['add-news-banner']["tmp_name"], $DATA."/images/".$id) === false )
      echo "Error uploading image. Upload it manually to the images folder with name=".$id." and no extension"."\n<br/>";
    if ( file_put_contents($DATA."/html/".$id, $_POST['add-news-data']) === false )
      die("Error writing news data to file"."\n<br/>");

    echo "News item successfully added :)";
//    break;

//  //--CONDUCT ELECTIONS TASK--//
//  case "conduct-elections":
//    break;

  //--UNKNOWN TASK--//
//  default:
//    echo "Can not ".$_GET["task"].". Task not defined!<br/>";
//}
?>
