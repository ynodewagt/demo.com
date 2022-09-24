<?php
defined('ACCESS') or die();

	if(cfgSET('cfgWriteEntersIp') == 'on') {
	function getipu() {
	if(getenv("HTTP_CLIENT_IP")) {
		$ip = getenv("HTTP_CLIENT_IP");
	} elseif(getenv("HTTP_X_FORWARDED_FOR")) {
		$ip = getenv("HTTP_X_FORWARDED_FOR");
	} else {
		$ip = getenv("REMOTE_ADDR");
	}
$ip = htmlspecialchars(substr($ip,0,15), ENT_QUOTES);
return $ip;
}
if(!mysql_num_rows(mysql_query("SELECT * FROM ipwriter WHERE ip = '".getipu()."'"))) {
$sql = "INSERT INTO ipwriter (date, ip, last_page) VALUES ('".time()."', '".getipu()."', '".$_SERVER['HTTP_REFERER']."')";
mysql_query($sql);
} else {
mysql_query("UPDATE ipwriter SET date = ".time()." WHERE ip = '".getipu()."' AND (date + 600) < '".time()."' LIMIT 1");
}
	}

if($login) {
	print'<meta http-equiv="refresh" content="0;/enter/">';
	exit();
}

if(cfgSET('cfgOnOff') == "off" && $status != 1) {
	include "includes/errors/tehwork.php";
	exit();
} elseif(cfgSET('cfgOnOff') == "off" && $status == 1) {
	print '<p align="center" class="warn">—айт отключен и недоступен дл¤ остальных пользователей!</p>';
}
?>







<!DOCTYPE html>
<html lang="ru">
<head>
   <meta charset="windows-1251">
   <!--<meta http-equiv="Content-Type" content="text/html; charset=utf-8">-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>Avalon: Вход в личный кабинет </title>
    <link rel="icon" type="image/x-icon" href="/img/favicon.png""/>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <link href="/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="/assets/css/plugins.css" rel="stylesheet" type="text/css" />
    <link href="/assets/css/authentication/form-2.css?ver=1.5" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->
    <link rel="stylesheet" type="text/css" href="/assets/css/forms/theme-checkbox-radio.css">
    <link rel="stylesheet" type="text/css" href="/assets/css/forms/switches.css">
	<link rel="stylesheet" type="text/css" href="/assets/css/elements/alert.css">
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-6jHF7Z3XI3fF4XZixAuSu0gGKrXwoX/w3uFPxC56OtjChio7wtTGJWRW53Nhx6Ev" crossorigin="anonymous">
</head>
<body class="form">
<!-- RKN-BLOCK-URANUS-PLS -->
    
    <div class="form-container outer auth-page">
	<a href="/" class="logo"><img src="/img/avalon_color_light.svg"></a>
	<!--<a href="/" class="logo"><img src="/img/logo2-snow.svg" style="width: 295px;margin-top: -15px;"></a>-->
        <div class="form-form">
            <div class="form-form-wrap">
                <div class="form-container">
                    <div class="form-content">




									<?php
	defined('ACCESS') or die();
	if(!$page) {
		include "includes/index.php";
	} elseif(file_exists("../".$page."/index.php")) {

		include "../".$page."/".$page."_ru.php";
	} else {
		include "includes/errors/404.php";
	}
?>






  <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="/assets/js/libs/jquery-3.1.1.min.js"></script>
    <script src="/bootstrap/js/popper.min.js"></script>
    <script src="/bootstrap/js/bootstrap.min.js"></script>
    
    <!-- END GLOBAL MANDATORY SCRIPTS -->
    <script src="/assets/js/authentication/form-2.js"></script>


</body>
</html>
