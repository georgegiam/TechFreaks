<?php

// Require configuration file
require_once("config.inc.php");

// Actions list
$_action = "";
if(isset($_REQUEST['action']))
	$_action = $_REQUEST['action'];

switch ($_action) {

	case 'register':
		require_once("php/register.php");
		break;

	case 'contact':
		require_once("php/contact.php");
		break;

	default:
		// Do nothing
		break;

}

// Display content
echo file_get_contents("views/index.html");
