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


if(cfgSET('cfgOnOff') == "off" && $status != 1) {
	include "includes/errors/tehwork.php";
	exit();
} elseif(cfgSET('cfgOnOff') == "off" && $status == 1) {
	print '<p align="center" class="warn">Сайт отключен и недоступен для остальных пользователей!</p>';
}
$sql8	= 'SELECT * FROM users WHERE login = "'.$login.'" LIMIT 1';
$rs8		= mysql_query($sql8);
$a8		= mysql_fetch_array($rs8);

$resultd	= mysql_query("SELECT * FROM deposits WHERE user_id = ".$user_id." ORDER BY id ASC");
while($rowd = mysql_fetch_array($resultd)) {
	$alldep = $alldep + $rowd['sum'];
	}

$resulto	= mysql_query("SELECT * FROM `output` WHERE `login` = '".$login."' AND status = '2' ORDER BY id ASC");
while($rowo = mysql_fetch_array($resulto)) {
	$allout = $allout + $rowo['sum'];
	}
?>

<?php
$cusers		= mysql_num_rows(mysql_query("SELECT id FROM users")) + cfgSET('fakeusers');
$cwm		= mysql_num_rows(mysql_query("SELECT id FROM users WHERE pm_balance != 0 OR lr_balance != 0")) + cfgSET('fakeactiveusers');

$money	= cfgSET('fakewithdraws');
$query	= "SELECT sum FROM output WHERE status = 2";
$result	= mysql_query($query);
while($row = mysql_fetch_array($result)) {
	$money = $money + $row['sum'];
}

$depmoney	= cfgSET('fakedeposits');
$query	= "SELECT sum FROM deposits WHERE status = 0";
$result	= mysql_query($query);
while($row = mysql_fetch_array($result)) {
	$depmoney = $depmoney + $row['sum'];
}
?>
<?php
	$nu	= mysql_fetch_array(mysql_query("SELECT login FROM users ORDER BY id DESC LIMIT 1"));
?>
<?php
	$nd	= mysql_fetch_array(mysql_query("SELECT * FROM deposits ORDER BY id DESC LIMIT 1"));
?>
<?php
	$no	= mysql_fetch_array(mysql_query("SELECT * FROM output ORDER BY id DESC LIMIT 1"));
?>



	<?php
$cusers		= mysql_num_rows(mysql_query("SELECT id FROM users")) + cfgSET('fakeusers');
$cwm		= mysql_num_rows(mysql_query("SELECT id FROM users WHERE pm_balance != 0 OR lr_balance != 0")) + cfgSET('fakeactiveusers');

$money	= cfgSET('fakewithdraws');
$query	= "SELECT sum FROM output WHERE status = 2";
$result	= mysql_query($query);
while($row = mysql_fetch_array($result)) {
	$money = $money + $row['sum'];
}

$depmoney	= cfgSET('fakedeposits');
$query	= "SELECT sum FROM deposits WHERE status = 0";
$result	= mysql_query($query);
while($row = mysql_fetch_array($result)) {
	$depmoney = $depmoney + $row['sum'];
}
?>





<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=windows-1251" />
    <meta name="format-detection" content="telephone=no">
	<meta http-equiv="x-rim-auto-match" content="none">
	<meta name="viewport" content="user-scalable=yes, width=device-width" />
	 <meta name="yandex-verification" content="644b2fe5149b7509" />
	 
			 
			
				
				
<title>Скрипт хайпа Avalon Technology</title>
<meta name="keywords" content="Avalon Technologies | Инвестируем в современные технологии и стартапы">  
   	<link rel="shortcut icon" href="favicon.png">
	<link rel="apple-touch-icon-precomposed" href="favicon.png">
	
   <script src="/js/html5shiv.js@ver=7.0.5"></script>
    <link href="https://fonts.googleapis.com/css2?family=Play:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-6jHF7Z3XI3fF4XZixAuSu0gGKrXwoX/w3uFPxC56OtjChio7wtTGJWRW53Nhx6Ev" crossorigin="anonymous">
    <link href="/css/reset.css@ver=7.0.5.css" rel="stylesheet" type="text/css" />
    <link href="/css/style.css@ver=7.3.0.css" rel="stylesheet" type="text/css" />
    <link href="/css/slick.css@ver=7.0.5.css" rel="stylesheet" type="text/css" />
    <link href="/css/slick-theme.css@ver=7.0.5.css" rel="stylesheet" type="text/css" />
    <link href="/css/jquery.fancybox.css@ver=7.0.5.css" rel="stylesheet" type="text/css" />
    <link href="/css/nouislider.css@ver=7.0.5.css" rel="stylesheet" type="text/css" />
    <link href="/css/animate.css@ver=7.0.5.css" rel="stylesheet" type="text/css" />
    <link href="/css/mobile.css@ver=7.1.4.css" rel="stylesheet" type="text/css" />
	
	 <link rel="stylesheet" href="/css/hyper.css" />
	


<link rel="canonical" href="https://ww.avalon1.ooo/"/>


<meta name="robots" content="noindex" />

</head>

<body>
      <div id="preloader">
        <div class="inner"> 
        </div>
    </div>
	<div class="main" id="main">
		<header>
        	<div class="container">
            	<div class="header-blocks">
				<style>
@media screen and (max-width: 1299px) {
.logo {
overflow: visible;
}
}
	
	</style>
                	<a href="/" class="logo"><img src="/img/logo.svg" alt=""></a>
					<!--<a href="/" class="logo"><img src="/img/logo-snow.svg" alt="" style="width: 218px;margin-top: -22px;"></a>-->
                    <div class="header-right">
					
					<nav class="main-menu">
                            <div class="top-block">
                                <div class="logo">
                                    <img src="/img/footer-logo.svg" alt="avalon">
									<!--<img src="./img/logo2-snow.svg" alt="avalon" style="width: 216px;margin-top: -12px;">-->
                                </div>
                                <button class="mob-nav-close"></button>
                            </div>
                            

							                            <div class="btn-login-group">
                                <a href="/login" class="btn btn-login">
                                    <i class="far fa-sign-in-alt"></i>
                                    Вход
                                </a> 
                                <a href="/registration" class="btn btn-login">
                                    <i class="far fa-user-plus"></i>
                                    Регистрация
                                </a>
                            </div>
							                            <ul class="menu-items">
<li class="ico-home"><a href="" class="ico-home">Главная</a></li>
                               <li class="nav-open"><a href="#how" class="ico-flag nav-open-fix">О нашей работе</a>
                                	<ul>
                                    	<li><a href="/#how" class="smoothScroll">Как мы работаем?</a></li>
                                        <li><a href="/#steps" class="smoothScroll">Как с нами заработать?</a></li>
										<li><a href="/#" data-toggle="modal" data-target="#modalCalculator">Калькулятор доходности</a></li>
										<li><a href="/#invest" class="smoothScroll">Куда инвестируем?</a></li>
										<li><a href="/#features" class="smoothScroll">Преимущества работы с нами</a></li>
                                    </ul>
                                </li>
								 <li class="nav-open"><a href="#" class="ico-about-company nav-open-fix">О компании</a>
                                	<ul>
                                    	<li><a href="/about ">О компании</a></li>
										<li><a href="/news">Новости</a></li>
                                        <li><a href="/law">Клиентское соглашение</a></li>
                                    </ul>
                                </li>
								 
                                 <li><a href="/#tarifs" class="ico-tarifs smoothScroll">Тарифы</a></li>
                                <li><a href="/reviews" class="ico-testimonials">Отзывы</a></li>
                                <li><a href="/faq" class="ico-faq">FAQ</a></li>
                                <li><a href="/#contacts" class="ico-contacts smoothScroll">Контакты</a></li>                            </ul>

                            <div class="contacts">
                                <div class="item">
                                    <i class="ico-phone"></i>
                                    <a href="tel:+7 (495) 032-22-22">+7 (495) 032-22-22</a>
                                </div>
                                <div class="item">
                                    <i class="ico-email"></i>
                                    <a href="mailto:support@avalon.cc">support@avalon.cc</a>
                                </div>
                                <div class="item">
                                    <i class="ico-address"></i>
                                    <span>г. Москва, БЦ «Башня Федерация», Пресненская набережная, 12</span>
                                </div>
                            </div>
                            <div class="socials">
                                <a href="https://vk.com/avalon_ltd" target="_blank" class="item vk"></a>
                                <a href="https://t.me/avalon_ltd" target="_blank" class="item telegram"></a>
                                <a href="https://www.youtube.com/channel/UCwPM8kjBj4tN5zBOHxsshPA?sub_confirmation=1" target="_blank" class="item youtube"></a>
                            </div>
                        </nav>


 <?php if(!$login) {?>

							<button class="btn btn-login">
															  <a href="/login">
                                    <i class="far fa-sign-in-alt"></i>
                                    Войти
                                </a> 
                                <a href="/registration">
                                    <i class="far fa-user-plus"></i>
                                    Регистрация
                                </a>
							                           
                        </button>
						
						
						   <?php } else {?>
						   
						   
						   <button class="btn btn-login">
															  <a href="/deposit">
                                    <i class="far fa-sign-in-alt"></i>
                                    Кабинет
                                </a> 
                                <a href="/exit.php">
                                    <i class="far fa-user-plus"></i>
                                    Выйти
                                </a>
							                           
                        </button>
						   
						   
						   
						   		   <?php }?>
						
                        <!--<a href="/account/login/" class="btn"><svg width="15" height="18" viewBox="0 0 15 18" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M11.7 6.3V4.5C11.7 3.30653 11.2259 2.16193 10.382 1.31802C9.53807 0.474106 8.39347 0 7.2 0C6.00653 0 4.86193 0.474106 4.01802 1.31802C3.17411 2.16193 2.7 3.30653 2.7 4.5V6.3C1.98392 6.3 1.29716 6.58446 0.790812 7.09081C0.284464 7.59716 0 8.28392 0 9V15.3C0 16.0161 0.284464 16.7028 0.790812 17.2092C1.29716 17.7155 1.98392 18 2.7 18H11.7C12.4161 18 13.1028 17.7155 13.6092 17.2092C14.1155 16.7028 14.4 16.0161 14.4 15.3V9C14.4 8.28392 14.1155 7.59716 13.6092 7.09081C13.1028 6.58446 12.4161 6.3 11.7 6.3ZM4.5 4.5C4.5 3.78392 4.78446 3.09716 5.29081 2.59081C5.79716 2.08446 6.48392 1.8 7.2 1.8C7.91608 1.8 8.60284 2.08446 9.10919 2.59081C9.61554 3.09716 9.9 3.78392 9.9 4.5V6.3H4.5V4.5ZM12.6 15.3C12.6 15.5387 12.5052 15.7676 12.3364 15.9364C12.1676 16.1052 11.9387 16.2 11.7 16.2H2.7C2.46131 16.2 2.23239 16.1052 2.0636 15.9364C1.89482 15.7676 1.8 15.5387 1.8 15.3V9C1.8 8.7613 1.89482 8.53239 2.0636 8.3636C2.23239 8.19482 2.46131 8.1 2.7 8.1H11.7C11.9387 8.1 12.1676 8.19482 12.3364 8.3636C12.5052 8.53239 12.6 8.7613 12.6 9V15.3Z"/>
</svg> Вход  |  Регистрация</a>-->
						<a href="#" class="mob-nav"><svg width="20" height="14" viewBox="0 0 20 14" fill="none" xmlns="http://www.w3.org/2000/svg">
<path fill-rule="evenodd" clip-rule="evenodd" d="M0 1C0 0.447715 0.447715 0 1 0H19C19.5523 0 20 0.447715 20 1C20 1.55228 19.5523 2 19 2H1C0.447715 2 0 1.55228 0 1ZM0 7C0 6.44772 0.447715 6 1 6H19C19.5523 6 20 6.44772 20 7C20 7.55228 19.5523 8 19 8H1C0.447715 8 0 7.55228 0 7ZM1 12C0.447715 12 0 12.4477 0 13C0 13.5523 0.447715 14 1 14H19C19.5523 14 20 13.5523 20 13C20 12.4477 19.5523 12 19 12H1Z" fill="black"/></svg></a>
                    </div>
                </div>
            </div>
			<script type="text/javascript">!function(){var t=document.createElement("script");t.type="text/javascript",t.async=!0,t.src="https://vk.com/js/api/openapi.js?169",t.onload=function(){VK.Retargeting.Init("VK-RTRG-516113-i8wEM"),VK.Retargeting.Hit()},document.head.appendChild(t)}();</script><noscript><img src="https://vk.com/rtrg?p=VK-RTRG-516113-i8wEM" style="position:fixed; left:-999px;" alt=""/></noscript>
        </header>
        <div class="header-fix">
        	<div class="container">
            	<div class="header-blocks">
                	<a href="/" class="logo"><img src="/img/logo2.svg" alt=""></a>
					<!--<a href="/" class="logo"><img src="/img/logo2-snow.svg" alt="" style="width: 205px;margin-top: -12px;"></a>-->
                    <div class="header-right">
                    	<nav>
                        	<ul>
<li class="ico-home"><a href="" class="ico-home">Главная</a></li>
                               <li class="nav-open"><a href="#how" class="ico-flag nav-open-fix">О нашей работе</a>
                                	<ul>
                                    	<li><a href="/#how" class="smoothScroll">Как мы работаем?</a></li>
                                        <li><a href="/#steps" class="smoothScroll">Как с нами заработать?</a></li>
										<li><a href="/#" data-toggle="modal" data-target="#modalCalculator">Калькулятор доходности</a></li>
										<li><a href="/#invest" class="smoothScroll">Куда инвестируем?</a></li>
										<li><a href="/#features" class="smoothScroll">Преимущества работы с нами</a></li>
                                    </ul>
                                   
                                </li>
								<li class="nav-open"><a href="#" class="ico-about-company nav-open-fix">О компании</a>
                                	<ul>
                                    	<li><a href="/about ">О компании</a></li>
										<li><a href="/news">Новости</a></li>
                                        <li><a href="/law">Клиентское соглашение</a></li>
                                    </ul>
                                   
                                </li>
								 
                                 <li><a href="/#tarifs" class="ico-tarifs smoothScroll">Тарифы</a></li>
                                <li><a href="/reviews" class="ico-testimonials">Отзывы</a></li>
                                <li><a href="/faq" class="ico-faq">FAQ</a></li>
                                <li><a href="/#contacts" class="ico-contacts smoothScroll">Контакты</a></li>
        
                            </ul>
                        </nav>
						
						
						
						
						 <?php if(!$login) {?>

							<button class="btn btn-login">
															  <a href="/login">
                                    <i class="far fa-sign-in-alt"></i>
                                    Войти
                                </a> 
                                <a href="/registration">
                                    <i class="far fa-user-plus"></i>
                                    Регистрация
                                </a>
							                           
                        </button>
						
						
						   <?php } else {?>
						   
						   
						   <button class="btn btn-login">
															  <a href="/deposit">
                                    <i class="far fa-sign-in-alt"></i>
                                    Кабинет
                                </a> 
                                <a href="/exit.php">
                                    <i class="far fa-user-plus"></i>
                                    Выйти
                                </a>
							                           
                        </button>
						   
						   
						   
						   		   <?php }?>
                       <!-- <a href="/account/login/" class="btn"><svg width="15" height="18" viewBox="0 0 15 18" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M11.7 6.3V4.5C11.7 3.30653 11.2259 2.16193 10.382 1.31802C9.53807 0.474106 8.39347 0 7.2 0C6.00653 0 4.86193 0.474106 4.01802 1.31802C3.17411 2.16193 2.7 3.30653 2.7 4.5V6.3C1.98392 6.3 1.29716 6.58446 0.790812 7.09081C0.284464 7.59716 0 8.28392 0 9V15.3C0 16.0161 0.284464 16.7028 0.790812 17.2092C1.29716 17.7155 1.98392 18 2.7 18H11.7C12.4161 18 13.1028 17.7155 13.6092 17.2092C14.1155 16.7028 14.4 16.0161 14.4 15.3V9C14.4 8.28392 14.1155 7.59716 13.6092 7.09081C13.1028 6.58446 12.4161 6.3 11.7 6.3ZM4.5 4.5C4.5 3.78392 4.78446 3.09716 5.29081 2.59081C5.79716 2.08446 6.48392 1.8 7.2 1.8C7.91608 1.8 8.60284 2.08446 9.10919 2.59081C9.61554 3.09716 9.9 3.78392 9.9 4.5V6.3H4.5V4.5ZM12.6 15.3C12.6 15.5387 12.5052 15.7676 12.3364 15.9364C12.1676 16.1052 11.9387 16.2 11.7 16.2H2.7C2.46131 16.2 2.23239 16.1052 2.0636 15.9364C1.89482 15.7676 1.8 15.5387 1.8 15.3V9C1.8 8.7613 1.89482 8.53239 2.0636 8.3636C2.23239 8.19482 2.46131 8.1 2.7 8.1H11.7C11.9387 8.1 12.1676 8.19482 12.3364 8.3636C12.5052 8.53239 12.6 8.7613 12.6 9V15.3Z"/>
</svg> Вход  |  Регистрация</a>-->
						<a href="#" class="mob-nav"><svg width="20" height="14" viewBox="0 0 20 14" fill="none" xmlns="http://www.w3.org/2000/svg">
<path fill-rule="evenodd" clip-rule="evenodd" d="M0 1C0 0.447715 0.447715 0 1 0H19C19.5523 0 20 0.447715 20 1C20 1.55228 19.5523 2 19 2H1C0.447715 2 0 1.55228 0 1ZM0 7C0 6.44772 0.447715 6 1 6H19C19.5523 6 20 6.44772 20 7C20 7.55228 19.5523 8 19 8H1C0.447715 8 0 7.55228 0 7ZM1 12C0.447715 12 0 12.4477 0 13C0 13.5523 0.447715 14 1 14H19C19.5523 14 20 13.5523 20 13C20 12.4477 19.5523 12 19 12H1Z" fill="black"/></svg></a>
                    </div>
                </div>
            </div>
        </div>
       		 


<?php
	defined('ACCESS') or die();
	if(!$page) {
		include "includes/index.php";
	} elseif(file_exists("../".$page."/index.php")) {
		print "";
		include "../".$page."/".$page."_ru.php";
	} else {
		include "includes/errors/404.php";
	}
?>
 
	




	<footer>
        	<div class="container">
            	<div class="footer-blocks">
                    <div class="footer-block">
                    	<div class="footer-title">Контакты</div>
                        <p>Телефон: <a href="tel:74950322222">+7 (495) 032-22-22</a></p>
                        <p>E-mail: <a href="mailto:support@avalon.cc" class="font-fix">support@avalon.cc</a></p>
                        <div class="soc">
                        	<a target="_blank" href="https://vk.com/avalon_ltd" class="soc1"><svg width="20" height="13" viewBox="0 0 20 13" fill="none" xmlns="http://www.w3.org/2000/svg">
<path fill-rule="evenodd" clip-rule="evenodd" d="M19.5411 1.33452C19.6802 0.870979 19.5411 0.530273 18.8794 0.530273H16.6914C16.135 0.530273 15.8787 0.824561 15.7396 1.14917C15.7396 1.14917 14.6269 3.86121 13.0505 5.62287C12.5406 6.13283 12.3088 6.2949 12.0306 6.2949C11.8915 6.2949 11.6902 6.13283 11.6902 5.66929V1.33452C11.6902 0.778144 11.5288 0.530273 11.0651 0.530273H7.62678C7.2792 0.530273 7.07009 0.788459 7.07009 1.0332C7.07009 1.56067 7.85808 1.68226 7.93935 3.16573V6.38789C7.93935 7.09431 7.81182 7.22246 7.53363 7.22246C6.7919 7.22246 4.98773 4.49808 3.91748 1.38094C3.70774 0.775018 3.49738 0.530273 2.93819 0.530273H0.750175C0.125029 0.530273 0 0.824561 0 1.14917C0 1.72868 0.741892 4.6031 3.45393 8.40461C5.26217 11.0005 7.80932 12.408 10.1274 12.408C11.5183 12.408 11.6902 12.0955 11.6902 11.5571V9.59489C11.6902 8.96974 11.822 8.84503 12.2622 8.84503C12.587 8.84503 13.1432 9.00725 14.4415 10.259C15.925 11.7423 16.1694 12.408 17.004 12.408H19.192C19.8171 12.408 20.1297 12.0955 19.9493 11.4786C19.7521 10.8638 19.0438 9.97201 18.1039 8.91458C17.5939 8.31178 16.8289 7.66272 16.5973 7.33827C16.2727 6.92098 16.3654 6.73563 16.5973 6.36492C16.5973 6.36492 19.2629 2.60967 19.5411 1.33468V1.33452Z" fill="white"/>
</svg></a>
							<a target="_blank" href="https://t.me/avalon_ltd" class="soc2"><svg width="18" height="16" viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg">
<path fill-rule="evenodd" clip-rule="evenodd" d="M13.3347 15.4277C14.3831 15.8864 14.7763 14.9253 14.7763 14.9253L17.5503 0.989718C17.5285 0.050487 16.2616 0.618394 16.2616 0.618394L0.731508 6.71247C0.731508 6.71247 -0.0111401 6.97458 0.0543876 7.43328C0.119915 7.89197 0.709665 8.1104 0.709665 8.1104L4.61949 9.42095C4.61949 9.42095 5.79899 13.2871 6.03925 14.0297C6.25768 14.7505 6.45426 14.7724 6.45426 14.7724C6.67269 14.8598 6.86927 14.7069 6.86927 14.7069L9.40301 12.4134L13.3347 15.4277ZM14.0118 3.45807C14.0118 3.45807 14.5579 3.13043 14.536 3.45807C14.536 3.45807 14.6234 3.50175 14.3394 3.80755C14.0773 4.06966 7.89587 9.61768 7.06585 10.3603C7.00033 10.404 6.95664 10.4695 6.95664 10.5569L6.71637 12.6101C6.67269 12.8285 6.38873 12.8504 6.32321 12.6538L5.2966 9.29004C5.25292 9.15898 5.2966 9.00608 5.42766 8.91871L14.0118 3.45807Z" fill="white"/>
</svg></a>
                            <a target="_blank" href="https://www.youtube.com/channel/UCwPM8kjBj4tN5zBOHxsshPA?sub_confirmation=1" class="soc3"><svg width="20" height="14" viewBox="0 0 20 14" fill="none" xmlns="http://www.w3.org/2000/svg">
<path fill-rule="evenodd" clip-rule="evenodd" d="M17.3362 0.83711C18.1393 1.05334 18.7726 1.68657 18.9888 2.4897C19.3904 3.95695 19.3749 7.01501 19.3749 7.01501C19.3749 7.01501 19.3749 10.0576 18.9888 11.5249C18.7726 12.328 18.1393 12.9612 17.3362 13.1775C15.869 13.5636 9.99996 13.5636 9.99996 13.5636C9.99996 13.5636 4.1464 13.5636 2.66371 13.162C1.86058 12.9458 1.22735 12.3126 1.01112 11.5094C0.625 10.0576 0.625 6.99956 0.625 6.99956C0.625 6.99956 0.625 3.95695 1.01112 2.4897C1.22735 1.68657 1.87602 1.03789 2.66371 0.821666C4.13096 0.435547 9.99996 0.435547 9.99996 0.435547C9.99996 0.435547 15.869 0.435547 17.3362 0.83711ZM13.0117 6.99958L8.13112 9.81052V4.18863L13.0117 6.99958Z" fill="white"/>
</svg></a>
                        </div>
                    </div>
                    <div class="footer-nav">
<div class="footer-title">О нашей работе <svg width="10" height="6" viewBox="0 0 10 6" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M4.77701 5.30779L0.450621 0.500689C0.276869 0.307633 0.413877 0 0.673609 0H9.32639C9.58612 0 9.72313 0.307633 9.54938 0.50069L5.22299 5.30779C5.10382 5.4402 4.89618 5.4402 4.77701 5.30779Z" fill="white"/></svg></div>
						<ul>
                            <li><a href="/#how" class="smoothScroll">Как мы работаем?</a></li>
                            <li><a href="/#steps" class="smoothScroll">Как с нами заработать?</a></li>
                           <li><a href="/#" data-toggle="modal" data-target="#modalCalculator">Калькулятор доходности</a></li>
                            <li><a href="/#invest" class="smoothScroll">Куда мы инвестируем?</a></li>
                            <li><a href="/#features" class="smoothScroll">Преимущества работы с нами</a></li>
                        </ul>
                    </div>
                    <div class="footer-nav">
                    	<div class="footer-title">Информация <svg width="10" height="6" viewBox="0 0 10 6" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M4.77701 5.30779L0.450621 0.500689C0.276869 0.307633 0.413877 0 0.673609 0H9.32639C9.58612 0 9.72313 0.307633 9.54938 0.50069L5.22299 5.30779C5.10382 5.4402 4.89618 5.4402 4.77701 5.30779Z" fill="white"/></svg></div>
						<ul>
                            <li><a href="/about ">О компании</a></li>
                            <li><a href="/news">Новости компании</a></li>
                            <li><a href="/law">Клиентское соглашение</a></li>
							 <li><a href="/login">Личный кабинет</a></li>
                        </ul>
                    </div>
                    <div class="footer-nav">
                    	<div class="footer-title">Помощь <svg width="10" height="6" viewBox="0 0 10 6" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M4.77701 5.30779L0.450621 0.500689C0.276869 0.307633 0.413877 0 0.673609 0H9.32639C9.58612 0 9.72313 0.307633 9.54938 0.50069L5.22299 5.30779C5.10382 5.4402 4.89618 5.4402 4.77701 5.30779Z" fill="white"/></svg></div>
						<ul>
                            <li><a href="/#tarifs" class="smoothScroll">Тарифы</a></li>
							<li><a href="/reviews">Отзывы</a></li>
							<li><a href="/faq">FAQ</a></li>
							<li><a href="/#contacts" class="smoothScroll">Контакты</a></li>
                        </ul>
                    </div>
					
					                    
                </div>
            </div>
        </footer>
        <div class="footer-bottom">
        	<div class="container">
            	<div class="footer-bottom-blocks">
                	<div class="footer-bottom-logo"><a href=""><img src="/img/footer-logo.svg" alt=""></a><!--<img src="./img/logo2-snow.svg" style="width: 216px;margin-top: -12px;margin-bottom: 4px;">--></div>
                	<!--<div class="footer-copy">&copy; 2020 Avalon Technologies. ОГРН: 1187746184834, ИНН: 9721062465. AVALON INVEST LIMITED, company number: 09020532</div>-->
					<div class="footer-copy" style="font-family: sans-serif;">&copy; 2022 ООО "АВАЛОН", ОГРН: 1187746184834, ИНН: 9721062465. AVALON INVEST LIMITED, company number: 09020532 <br> <br>
					Avalon Technologies не предоставляет банковские и/или брокерские услуги, зарегистрирована в Великобритании под номером 09020532. Согласно официальной документации, она носит название “AVALON INVEST LIMITED”. Брокером для проведения торговых сделок трейдерами компании является Just2Trade Online. Ltd сертифицирована и регулируется Кипрской Комиссией по ценным бумагам и биржам в соответствии с лицензией No.281/15 от 25/09/2015 на осуществление брокерской деятельности. Вся предоставленная на сайте информация не является публичной офертой, предложением приобрести и/или продать какие-либо финансовые инструменты (в т.ч. акции), а также не призывает к каким-либо действиям. Перед принятием решения пользователь должен самостоятельно оценить различные риски и выгоды, а также определить свою готовность и возможность принять таковые.</div>
					
					<div style="font-family: sans-serif; text-align:center; margin:auto; margin-top: 10px;">
					Мы принимаем Visa, MasterCard, МИР, Maestro
					<br>
					<img src="/account/images/card/visalogo.png" style="width: 78px;margin-top: 3px;">
					<img src="/account/images/card/mslogo.png" style="width: 98px;">
					<img src="/account/images/card/mirlogo.png" style="width: 81px;">
					<img src="/account/images/card/maestrologo.png" style="width: 79px;margin-top: 2.5px">
					</div>
					
                </div>
            </div>
        </div>
		
		 <!-- #modalCalculator -->
    <div class="modal fade" id="modalCalculator" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <button type="button" class="modal-close" data-dismiss="modal">
                    <svg width="23" height="23" viewBox="0 0 23 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M11.5 14.9551L3.45509 23L0 19.5449L8.04492 11.5L0 3.45509L3.45509 0L11.5 8.04492L19.5449 0L23 3.45509L14.9551 11.5L23 19.5449L19.5449 23L11.5 14.9551Z" fill="#C4C4C4" />
                    </svg>
                </button>
                <div class="calc-wrap">
                    <div class="calc-item-title">Сумма инвестирования</div>
                    <div class="calc-item-inp-block">
                        <input type="text" class="calc-item-inp" value="100">
                        <div class="calc-item-inp-text">&#8381;</div>
                    </div>
                    <div class="calc-item-slider">
                        <div id="modal_calc_slider"></div>
                    </div>
                    <div class="calc-item-title calc-item-title2">Выберите срок инвестиций</div>
                    <div class="calc-btns">
                        <a href="#" class="active">1 день</a>
                        <a href="#">7 дней</a>
                        <a href="#">14 дней</a>
                        <a href="#">28 дней</a>
                    </div>
                    <div class="calc-item-info-blocks">
                        <div class="calc-item-info">
                            <div class="calc-item-info-block green">
                                <div class="calc-item-info-block-title">Прибыль</div>
                                <div class="calc-item-info-block-text">+<span class="sum2">0</span><i>&#8381;</i></div>
                            </div>
                            <div class="calc-item-info-block">
                                <div class="calc-item-info-block-title">Итоговая сумма</div>
                                <div class="calc-item-info-block-text"><span class="sum1">0</span><i>&#8381;</i></div>
                            </div>
                            <div class="calc-item-info-block">
                                <div class="calc-item-info-block-title">В процентах</div>
                                <div class="calc-item-info-block-text"><span class="percent">1.3%</span></div>
                            </div>
                        </div>
                        <div class="calc-item-info">
                            <div class="calc-item-info-block">
                                <div class="calc-item-info-block-title">Сроки</div>
                                <div class="calc-item-info-block-text"><span class="day">1 день</span></div>
                            </div>
                            <div class="calc-item-info-block">
                                <div class="calc-item-info-block-title">Бонус 
                                    <div class="calc-faq">
                                        <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M8.361 11.961C8.3223 12.0038 8.28623 12.0488 8.253 12.096C8.21894 12.1462 8.1917 12.2006 8.172 12.258C8.14605 12.309 8.12785 12.3636 8.118 12.42C8.11358 12.4799 8.11358 12.5401 8.118 12.6C8.11496 12.7181 8.13962 12.8352 8.19 12.942C8.23042 13.0537 8.29491 13.1551 8.3789 13.2391C8.46289 13.3231 8.56432 13.3876 8.676 13.428C8.78373 13.4756 8.90022 13.5002 9.018 13.5002C9.13579 13.5002 9.25227 13.4756 9.36 13.428C9.47169 13.3876 9.57312 13.3231 9.6571 13.2391C9.74109 13.1551 9.80558 13.0537 9.846 12.942C9.88597 12.8326 9.90431 12.7164 9.9 12.6C9.90069 12.4816 9.87798 12.3641 9.83319 12.2545C9.78841 12.1448 9.72241 12.0451 9.639 11.961C9.55534 11.8766 9.45579 11.8097 9.34612 11.764C9.23645 11.7183 9.11881 11.6948 9 11.6948C8.88119 11.6948 8.76356 11.7183 8.65388 11.764C8.54421 11.8097 8.44467 11.8766 8.361 11.961ZM9 0C7.21997 0 5.47991 0.527841 3.99987 1.51677C2.51983 2.50571 1.36628 3.91131 0.685088 5.55585C0.00389956 7.20038 -0.17433 9.00998 0.172936 10.7558C0.520203 12.5016 1.37737 14.1053 2.63604 15.364C3.89471 16.6226 5.49836 17.4798 7.24419 17.8271C8.99002 18.1743 10.7996 17.9961 12.4442 17.3149C14.0887 16.6337 15.4943 15.4802 16.4832 14.0001C17.4722 12.5201 18 10.78 18 9C18 7.8181 17.7672 6.64778 17.3149 5.55585C16.8626 4.46392 16.1997 3.47177 15.364 2.63604C14.5282 1.80031 13.5361 1.13738 12.4442 0.685084C11.3522 0.232792 10.1819 0 9 0ZM9 16.2C7.57598 16.2 6.18393 15.7777 4.9999 14.9866C3.81586 14.1954 2.89302 13.0709 2.34807 11.7553C1.80312 10.4397 1.66054 8.99201 1.93835 7.59535C2.21616 6.19868 2.9019 4.91577 3.90883 3.90883C4.91577 2.90189 6.19869 2.21616 7.59535 1.93835C8.99201 1.66053 10.4397 1.80312 11.7553 2.34807C13.0709 2.89302 14.1954 3.81586 14.9866 4.99989C15.7777 6.18393 16.2 7.57597 16.2 9C16.2 10.9096 15.4414 12.7409 14.0912 14.0912C12.7409 15.4414 10.9096 16.2 9 16.2ZM9 4.5C8.52576 4.49969 8.0598 4.62431 7.64902 4.8613C7.23824 5.09829 6.89712 5.43929 6.66 5.85C6.59488 5.95243 6.55116 6.06698 6.53146 6.18676C6.51176 6.30653 6.51649 6.42905 6.54537 6.54695C6.57425 6.66484 6.62667 6.77568 6.6995 6.87279C6.77232 6.9699 6.86404 7.05127 6.96913 7.11202C7.07421 7.17276 7.19051 7.21162 7.311 7.22626C7.4315 7.2409 7.55371 7.23101 7.67029 7.19719C7.78686 7.16337 7.89539 7.10632 7.98934 7.02947C8.0833 6.95261 8.16074 6.85755 8.217 6.75C8.2963 6.61265 8.41047 6.4987 8.54797 6.41968C8.68547 6.34066 8.84141 6.29937 9 6.3C9.2387 6.3 9.46762 6.39482 9.6364 6.5636C9.80518 6.73238 9.9 6.9613 9.9 7.2C9.9 7.43869 9.80518 7.66761 9.6364 7.83639C9.46762 8.00518 9.2387 8.1 9 8.1C8.76131 8.1 8.53239 8.19482 8.36361 8.3636C8.19482 8.53238 8.1 8.7613 8.1 9V9.9C8.1 10.1387 8.19482 10.3676 8.36361 10.5364C8.53239 10.7052 8.76131 10.8 9 10.8C9.2387 10.8 9.46762 10.7052 9.6364 10.5364C9.80518 10.3676 9.9 10.1387 9.9 9.9V9.738C10.4952 9.52202 10.9956 9.1037 11.3137 8.55618C11.6318 8.00866 11.7473 7.36676 11.6401 6.7427C11.5328 6.11864 11.2097 5.55211 10.7271 5.14216C10.2445 4.73221 9.63319 4.50491 9 4.5Z" fill="#5068D4" />
                                        </svg>
                                        <span>Бонусный процент прибавляется к заработанной сумме после завершения депозитного периода</span>
                                    </div>
                                </div>
                                <div class="calc-item-info-block-text">+<span class="bonus">0</span>%</div>
                            </div>
                            <div class="calc-item-info-block">
                                <div class="calc-item-info-block-title">Капитализация <div class="calc-faq"><svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M8.361 11.961C8.3223 12.0038 8.28623 12.0488 8.253 12.096C8.21894 12.1462 8.1917 12.2006 8.172 12.258C8.14605 12.309 8.12785 12.3636 8.118 12.42C8.11358 12.4799 8.11358 12.5401 8.118 12.6C8.11496 12.7181 8.13962 12.8352 8.19 12.942C8.23042 13.0537 8.29491 13.1551 8.3789 13.2391C8.46289 13.3231 8.56432 13.3876 8.676 13.428C8.78373 13.4756 8.90022 13.5002 9.018 13.5002C9.13579 13.5002 9.25227 13.4756 9.36 13.428C9.47169 13.3876 9.57312 13.3231 9.6571 13.2391C9.74109 13.1551 9.80558 13.0537 9.846 12.942C9.88597 12.8326 9.90431 12.7164 9.9 12.6C9.90069 12.4816 9.87798 12.3641 9.83319 12.2545C9.78841 12.1448 9.72241 12.0451 9.639 11.961C9.55534 11.8766 9.45579 11.8097 9.34612 11.764C9.23645 11.7183 9.11881 11.6948 9 11.6948C8.88119 11.6948 8.76356 11.7183 8.65388 11.764C8.54421 11.8097 8.44467 11.8766 8.361 11.961ZM9 0C7.21997 0 5.47991 0.527841 3.99987 1.51677C2.51983 2.50571 1.36628 3.91131 0.685088 5.55585C0.00389956 7.20038 -0.17433 9.00998 0.172936 10.7558C0.520203 12.5016 1.37737 14.1053 2.63604 15.364C3.89471 16.6226 5.49836 17.4798 7.24419 17.8271C8.99002 18.1743 10.7996 17.9961 12.4442 17.3149C14.0887 16.6337 15.4943 15.4802 16.4832 14.0001C17.4722 12.5201 18 10.78 18 9C18 7.8181 17.7672 6.64778 17.3149 5.55585C16.8626 4.46392 16.1997 3.47177 15.364 2.63604C14.5282 1.80031 13.5361 1.13738 12.4442 0.685084C11.3522 0.232792 10.1819 0 9 0ZM9 16.2C7.57598 16.2 6.18393 15.7777 4.9999 14.9866C3.81586 14.1954 2.89302 13.0709 2.34807 11.7553C1.80312 10.4397 1.66054 8.99201 1.93835 7.59535C2.21616 6.19868 2.9019 4.91577 3.90883 3.90883C4.91577 2.90189 6.19869 2.21616 7.59535 1.93835C8.99201 1.66053 10.4397 1.80312 11.7553 2.34807C13.0709 2.89302 14.1954 3.81586 14.9866 4.99989C15.7777 6.18393 16.2 7.57597 16.2 9C16.2 10.9096 15.4414 12.7409 14.0912 14.0912C12.7409 15.4414 10.9096 16.2 9 16.2ZM9 4.5C8.52576 4.49969 8.0598 4.62431 7.64902 4.8613C7.23824 5.09829 6.89712 5.43929 6.66 5.85C6.59488 5.95243 6.55116 6.06698 6.53146 6.18676C6.51176 6.30653 6.51649 6.42905 6.54537 6.54695C6.57425 6.66484 6.62667 6.77568 6.6995 6.87279C6.77232 6.9699 6.86404 7.05127 6.96913 7.11202C7.07421 7.17276 7.19051 7.21162 7.311 7.22626C7.4315 7.2409 7.55371 7.23101 7.67029 7.19719C7.78686 7.16337 7.89539 7.10632 7.98934 7.02947C8.0833 6.95261 8.16074 6.85755 8.217 6.75C8.2963 6.61265 8.41047 6.4987 8.54797 6.41968C8.68547 6.34066 8.84141 6.29937 9 6.3C9.2387 6.3 9.46762 6.39482 9.6364 6.5636C9.80518 6.73238 9.9 6.9613 9.9 7.2C9.9 7.43869 9.80518 7.66761 9.6364 7.83639C9.46762 8.00518 9.2387 8.1 9 8.1C8.76131 8.1 8.53239 8.19482 8.36361 8.3636C8.19482 8.53238 8.1 8.7613 8.1 9V9.9C8.1 10.1387 8.19482 10.3676 8.36361 10.5364C8.53239 10.7052 8.76131 10.8 9 10.8C9.2387 10.8 9.46762 10.7052 9.6364 10.5364C9.80518 10.3676 9.9 10.1387 9.9 9.9V9.738C10.4952 9.52202 10.9956 9.1037 11.3137 8.55618C11.6318 8.00866 11.7473 7.36676 11.6401 6.7427C11.5328 6.11864 11.2097 5.55211 10.7271 5.14216C10.2445 4.73221 9.63319 4.50491 9 4.5Z" fill="#5068D4" />
                                        </svg><span>Капитализация процентов – это способ расчета процентов по вкладу, при котором сумма вклада сначала увеличивается на уже начисленные проценты, а затем от полученной суммы считается процент за очередной период</span></div>
                                </div>
                                <div class="calc-item-info-block-text"><span class="cap">Нет</span></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bottom">
                    <a href="/login" class="btn btn3">Инвестировать прямо сейчас</a>
                </div>
            </div>
        </div>
    </div>
    </div>
    
    <a href="#main" class="totop smoothScroll">
    	<svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M8 1C8.55228 1 9 1.44772 9 2V15C9 15.5523 8.55228 16 8 16C7.44772 16 7 15.5523 7 15V2C7 1.44772 7.44772 1 8 1Z" fill="white"/><path fill-rule="evenodd" clip-rule="evenodd" d="M7.29289 0.292893C7.68342 -0.0976311 8.31658 -0.0976311 8.70711 0.292893L15.7071 7.29289C16.0976 7.68342 16.0976 8.31658 15.7071 8.70711C15.3166 9.09763 14.6834 9.09763 14.2929 8.70711L8 2.41421L1.70711 8.70711C1.31658 9.09763 0.683417 9.09763 0.292893 8.70711C-0.0976311 8.31658 -0.0976311 7.68342 0.292893 7.29289L7.29289 0.292893Z" fill="white"/></svg> <p>Вверх</p></a>
	<script src="/js/jquery-1.8.3.min.js@ver=7.0.7"></script>
    <script src="/js/maskinput.js@ver=7.0.7"></script>
    <script src="/js/slick.min.js@ver=7.0.7"></script>
    <script src="/js/jquery.fancybox.js@ver=7.0.7"></script>
    <script src="/js/jquery.spincrement.min.js@ver=7.0.7"></script>
    <script src="/js/nouislider.min.js@ver=7.0.7"></script>
	<script src="/js/wow.min.js@ver=7.0.7"></script>
    <script src="/js/scripts.js@ver=7.1.7"></script>
    <script src="/js/index.js@ver=7.1.3"></script>
	
	
 
 	
 	

	




</body>
</html>

