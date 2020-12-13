<?php

$action = filter_input(INPUT_POST, 'action');

if ($action = 'signin') {
    include($_SERVER['DOCUMENT_ROOT']."/info3135/test/signin/signin.php");
}
