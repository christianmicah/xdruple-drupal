<?php require_once __DIR__ . '/../vendor/autoload.php';

use Drupal\DrupalConfigReader;

include_once __DIR__ . '/config.php';
include_once __DIR__ . '/environment.php';

$configReader = new DrupalConfigReader($environment, $config, $parameters);
$configReader->read();
