<?php
//if ((!isset($_GET["srchstring"]))||(!isset($_GET["criteria"]))) die("Insufficient parameters!");
$ds   = ldap_connect("ldap.iitb.ac.in") or die("Could not connect to ldap.iitb.ac.in. Please try later.");
//$sr   = ldap_search($ds, "dc=iitb,dc=ac,dc=in", "(" . $_GET["criteria"] . "=" . $_GET["srchstring"] . ")");
$sr   = ldap_search($ds, "dc=iitb,dc=ac,dc=in", "(employeenumber=12D070011)");
$info = ldap_get_entries($ds, $sr);
print_r($info);
//if (isset($info[0])) echo $info[0]['employeenumber'][0] . "\n" . $info[0]['cn'][0] . "\n" . $info[0]['uid'][0];
//else echo "No record found!";
?>
