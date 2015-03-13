<?php

if (!$loader = @include __DIR__.'/../vendor/autoload.php') {
	die('Run Composer to get the auto loader:'.PHP_EOL.
	    'curl -s http://getcomposer.org/installer | php'.PHP_EOL.
	    'php composer.phar install'.PHP_EOL);
}

$loader->add('ManDate\Test', __DIR__);