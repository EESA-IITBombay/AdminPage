<?php
require(getcwd()."/include/common/MySQL_CORE.class.php");
class MySQL_Admin extends MySQL_CORE {
	function AddNews($head,$dur,$syn) {
		$head=$this->dbLink->real_escape_string($head);
		$syn =$this->dbLink->real_escape_string($syn );
		$sql="INSERT INTO if_news (`headline`,`start_time`,`end_time`,`synopsis`) VALUES ('".$head."',".time().",".(time()+($dur*24*60*60)).",'".$syn."')";
		user_error($sql);
		if ($this->query($sql,array()) )
			return $this->dbLink->insert_id;
		else
			return false;
	}
}
?>
