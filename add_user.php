<?php
//$students = array('120070001','120070002','120070003','120070004','120070005','120070006','120070007','120070008','120070009','120070010','120070011','120070012','120070013','120070014','120070015','120070016','120070017','120070018','120070019','120070020','120070021','120070022','120070023','120070024','120070025','120070026','120070027','120070028','120070029','120070030','120070031','120070032','120070033','120070034','120070035','120070036','120070037','120070038','120070039','120070040','120070041','120070042','120070043','120070044','120070045','120070046','120070047','120070048','120070049','120070050','120070051','120070052','120070053','120070054','120070055','120070056','120070057','120070058','120070059','120070060','120070061','12D070011');
$students = array('120040057','12D100007','120100001');
require(getcwd()."/include/MySQL_Admin.class.php");
require(getcwd()."/include/common/config.php");
$dbLink = new MySQL_Admin($dbName, $dbUsername, $dbPassword);
$ds   = ldap_connect("ldap.iitb.ac.in") or die("Could not connect to ldap.iitb.ac.in. Please try later.");
foreach($students as $student) {
  $sr   = ldap_search($ds, "dc=iitb,dc=ac,dc=in", "(employeenumber=$student)");
  $info = ldap_get_entries($ds, $sr);
  echo "INSERT INTO tbl_students values('".$info[0]['employeenumber'][0]."','".$info[0]['cn'][0]."',NULL,NULL,NULL,NULL,'".$info[0]['dn']."','".$info[0]['uid'][0]."',0,NULL,NULL,NULL,'btech',3,NULL,NULL,NULL,NULL,NULL)\n";
  $dbLink->query("INSERT INTO tbl_students values('".$info[0]['employeenumber'][0]."','".$info[0]['cn'][0]."',NULL,NULL,NULL,NULL,'".$info[0]['dn']."','".$info[0]['uid'][0]."',0,NULL,NULL,NULL,'btech',3,NULL,NULL,NULL,NULL,NULL)");
}
?>

