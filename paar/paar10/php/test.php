<?php

if(!$_POST) {
	echo 'Not sent';
}

echo 'Message has been sent';

var_dump($_POST);

die();