<?php

$config = array(
  'environment' => array(
    'local' => array(
      'redirect_auto_redirect' => 0,
      'htmailer_development' => 'developer.wsg@xtuple.com',
    ),
    'development' => array(
      'redirect_auto_redirect' => 0,
      'htmailer_development' => 'developer.wsg@xtuple.com',
    ),
    'production' => array(
      'error_level' => 0,
      'cache' => 1,
      'jquery_update_compression_type' => 'min',
      'page_compression' => 1,
      'preprocess_css' => 1,
      'preprocess_js' => 1,
    ),
  ),
);
