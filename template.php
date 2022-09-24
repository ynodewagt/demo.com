<?php
defined('ACCESS') or die();
if(cfgSET('cfgOnOff') == "off" && $status != 1) {
	include "includes/errors/tehwork.php";
	exit();
} elseif(cfgSET('cfgOnOff') == "off" && $status == 1) {
	print '<p align="center" class="warn">Сайт отключен и недоступен для остальных пользователей!</p>';
}
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251" />
<link href="/files/favicon.ico" type="image/x-icon" rel="shortcut icon" />
<title><?php print $title; ?></title>
<meta name="keywords" content="<?php print $keywords; ?>" />
<meta name="description" content="<?php print $description; ?>" />
<link href="/files/styles.css" type="text/css" rel="stylesheet" />
<script language="javascript" src="/files/scripts.js"></script>
<link rel="alternate" type="application/rss+xml" title="RSS-лента новостей" href="/rss.xml">
<meta name="generator" content="www.AdminStation.ru" />
<!--[if lte IE 6]>
	<script type="text/javascript" src="/files/pngfix.js"></script>
	<script type="text/javascript">
		DD_belatedPNG.fix('img, .fix-PNG-background');
	</script>
<![endif]-->
</head>
<body>
<div class="main">
	<div id="wrapper">
		<div style="height: 95px;">
		<div style="float: left; padding-top: 15px; padding-bottom: 15px;"><a href="/"><img src="/images/logo.png" border="0" alt="" /></a></div>
		<div style="float: right; padding-top: 40px; padding-right: 15px;"><a href="?lang=en"><img src="/images/en.png" width="24" height="24" border="0" alt="English" title="English" /></a> <a href="?lang=ru"><img src="/images/ru.png" width="24" height="24" border="0" alt="Русский" title="Русский" /></a></div>
		</div>
		<div class="menu">
			<table width="100%" height="34">
				<tr>
					<td width="145"><a class="m" href="/"><center>Home</center></a></td>
					<td class="sep"></td>
					<td width="140"><a class="m" href="/about/"><center>About us</center></a></td>
					<td class="sep"></td>
					<td width="140"><a class="m" href="/news/"><center>News</center></a></td>
					<td class="sep"></td>
					<td width="140"><a class="m" href="/faq/"><center>FAQ</center></a></td>
					<td class="sep"></td>
					<td width="140"><a class="m" href="/answers/"><center>Reviews</center></a></td>
					<td class="sep"></td>
					<td width="140"><a class="m" href="/top/"><center>Our rating</center></a></td>
					<td class="sep"></td>
					<td width="138"><a class="m" href="/contacts/"><center>Support</center></a></td>
				</tr>
			</table>
		</div>
		<div style="clear: both;"></div>
<table width="100%">
	<tr>
		<td width="250" valign="top">
			<div class="content">
			<h2>Authorization</h2><hr />
<?php
	include "includes/auth.php";
?>
			</div>
			<div class="content">
			<h2>Statistics</h2><hr />
<?php
	include "includes/left.php";
?>
			</div>
		</td>
		<td width="10">&nbsp;</td>
		<td valign="top">
		<div class="content">
<?php
	if(!$page) {
		include "includes/index.php";
	} elseif(file_exists("../".$page."/index.php")) {
		print "<h1>".$title."</h1><hr />";
		include "../".$page."/".$file;
	} else {
		include "includes/errors/404.php";
	}
?>
		</div>
		</td>
	</tr>
</table>

	</div>
	<div class="hFooter"></div>
</div>
<div class="footer" align="center">

<table width="960" height="100%">
	<tr>
		<td>
			<table align="center">
				<tr align="center">
					<td><a href="/"><center>Home</center></a></td>
					<td width="30">|</td>
					<td><a href="/about/"><center>About us</center></a></td>
					<td width="30">|</td>
					<td><a href="/news/"><center>News</center></a></td>
					<td width="30">|</td>
					<td><a href="/faq/"><center>FAQ</center></a></td>
					<td width="30">|</td>
					<td><a href="/answers/"><center>Reviews</center></a></td>
					<td width="30">|</td>
					<td><a href="/top/"><center>Our rating</center></a></td>
					<td width="30">|</td>
					<td><a href="/banners/"><center>Banners</center></a></td>
					<td width="30">|</td>
					<td><a href="/contacts/"><center>Support</center></a></td>
				</tr>
			</table>
			<p align="center"><font color="#ffffff">&copy; <?php print date(Y); ?> <a href="http://<?php print $cfgURL; ?>"><?php print $cfgURL; ?></a>. All Rights Reserved!</font></p>
		</td><td width="32">
			<a href="http://adminstation.ru/verification/?url=<?php print $cfgURL; ?>" target="_blank"><img src="/images/adminstation.png" width="32" height="32" border="0" alt="License script CMS AdminStation" title="License script CMS AdminStation" /></a>
		</td>
	</tr>
</table>
</div>
</body>
</html>