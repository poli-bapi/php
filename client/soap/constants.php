<?php
define('MERCHANT_CODE','PMobile');
define('AUTHENTICATION_CODE','1X4@wir&4K!');
$server='http://'.$_SERVER['SERVER_NAME'];
if($_SERVER['SERVER_PORT']!=80){
	$server.=':'+$_SERVER['SERVER_PORT'];
}

define('NOTIFYURL', $server.'/getpoli/client/rest/notify.php');
define('SUCCESSFULURL',$server.'/getpoli/client/rest/receipt.php');

//define('NOTIFYURL', $server.'/client/soap/notify.php');
//define('SUCCESSFULURL',$server.'/client/soap/receipt.php');
define('UNSUCCESSFULURL',$server);
define('CHECKOUTURL',$server);
define('HOMEPAGE',$server);

define('DBHOST','localhost');
define('DBUSER','root');
define('DBPASS','');
define('DBNAME','getpoli');


//