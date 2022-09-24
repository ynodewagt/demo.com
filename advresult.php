<?php
include "cfg.php";
include "ini.php";

if(isset($_POST["ac_transfer"]) && isset($_POST["ac_hash"])) {

	$hash = $_POST["ac_transfer"].":".$_POST["ac_start_date"].":".cfgSET('cfgADVsciName').":".$_POST["ac_src_wallet"].":".$_POST["ac_dest_wallet"].":".$_POST["ac_order_id"].":".$_POST["ac_amount"].":USD:".cfgSET('cfgADVpass');

	$sign_hash = hash('sha256', $hash);

	if($_POST["ac_hash"] == $sign_hash) {

			$get_info	= mysql_query("SELECT * FROM enter WHERE id = ".intval($_POST['ac_order_id'])." AND status != 2 LIMIT 1");
			$row		= mysql_fetch_array($get_info);

			$date = date("d.m.Y");

			if($row['sum'] == $_POST["ac_amount"]) {
				mysql_query('UPDATE users SET pm_balance = pm_balance + '.$row['sum'].' WHERE login = "'.$row['login'].'" LIMIT 1');
				mysql_query("UPDATE enter SET status = 2, purse = 'ADVcash' WHERE id = ".intval($_POST['ac_order_id'])." LIMIT 1");
			}

		echo $_POST['ac_order_id']."|success";
		exit();

	} else {
		echo $_POST['ac_order_id']."|error";
	}
}

?>