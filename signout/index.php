<?php

$action = filter_input(INPUT_POST, 'action');

if ($action = 'signout') {
	include($_SERVER['DOCUMENT_ROOT']."/info3135/test/signout/signout.php");
}