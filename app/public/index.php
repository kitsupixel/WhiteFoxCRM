<?php

define("TIMESTAMP_START", microtime(true));

require __DIR__.'/../vendor/autoload.php';

$app = new WhiteFoxCRM();

if (!$app->canProceed())
	exit;

include "app.html";