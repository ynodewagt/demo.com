<?php
include "cfg.php";
include "ini.php";

$string = $_REQUEST['PAYMENT_ID'].':'.$_REQUEST['PAYEE_ACCOUNT'].':'.$_REQUEST['PAYMENT_AMOUNT'].':'.$_REQUEST['PAYMENT_UNITS'].':'.$_REQUEST['PAYMENT_BATCH_NUM'].':'.$_REQUEST['PAYER_ACCOUNT'].':'.$ALTERNATE_HASH.':'.$_REQUEST['TIMESTAMPGMT'];

$hash = strtoupper(md5($string));

if($hash==$_REQUEST['V2_HASH']) {

	$query	= "SELECT * FROM enter WHERE id = ".intval($_REQUEST['PAYMENT_ID'])." LIMIT 1";
	$result	= mysql_query($query);
	$row	= mysql_fetch_array($result);
	if($row['id'] && $row['status'] != 2) {

		if(sprintf("%01.2f", $_REQUEST['PAYMENT_AMOUNT'])==$row['sum'] && $_REQUEST['PAYEE_ACCOUNT']==$cfgPerfect && $_REQUEST['PAYMENT_UNITS']=='USD'){

			$get_ps	= mysql_query("SELECT * FROM `paysystems` WHERE id = 1 LIMIT 1");
			$rowps	= mysql_fetch_array($get_ps);

			mysql_query('UPDATE users SET pm_balance = pm_balance + '.sprintf("%01.2f", $row['sum'] * $rowps['percent']).' WHERE login = "'.$row['login'].'" LIMIT 1');
			mysql_query("UPDATE enter SET status = 2, purse = '".htmlspecialchars($_REQUEST['PAYER_ACCOUNT'], ENT_QUOTES, '')."' WHERE id = ".intval($_REQUEST['PAYMENT_ID'])." LIMIT 1");

			// ���������� ������ ������ ���� �����
			if(cfgSET('cfgOutAdminPercent') != 0 && cfgSET('AdminPMpurse')) {
				$sum	= sprintf ("%01.2f", $row['sum'] / 100 * cfgSET('cfgOutAdminPercent'));
				fopen('https://perfectmoney.is/acct/confirm.asp?AccountID='.$cfgPMID.'&PassPhrase='.$cfgPMpass.'&Payer_Account='.$cfgPerfect.'&Payee_Account='.cfgSET('AdminPMpurse').'&Amount='.$sum.'&PAY_IN=1&PAYMENT_ID='.rand(100000,999999).'&Memo='.$cfgURL, 'rb');
			}

		} else {
			print "ERROR";
			mail($adminmail, "Status", "�� �� ������");
		}

	} else {
		print "ERROR";
		mail($adminmail, "Status", "��� ������ � �� ��� ������ �������� ".$_REQUEST['PAYMENT_ID']);
	}

} else {
	print "ERROR";
	mail($adminmail, "Status", "�� ������ ���");
}
?>