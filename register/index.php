<?php

$action = filter_input(INPUT_POST, 'action');

if ($action = 'register') {
    include($_SERVER['DOCUMENT_ROOT']."/info3135/test/register/register.php");
}
