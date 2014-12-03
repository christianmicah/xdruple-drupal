<?php require_once __DIR__ . '/../vendor/autoload.php';

use CDD\Drupal\DrupalConfigReader;

include_once __DIR__ . '/config.php';
include_once __DIR__ . '/environment.php';

$configReader = new DrupalConfigReader($environment_name, $config, $parameters);
$configReader->read();
