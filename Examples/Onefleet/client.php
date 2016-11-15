<?php
	namespace Mag;

	$vdir=$_SERVER['DOCUMENT_ROOT'].'/route4me/examples/';

    require $vdir.'/../vendor/autoload.php';
	
	use Route4Me\Route4Me;
	use Route4Me\Member;
	
	Route4Me::setApiKey('11111111111111111111111111111111');
	
	$client = new Onfleet\Client();
	
	$client->createAdministrator($data);

?>