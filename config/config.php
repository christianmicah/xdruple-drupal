<?php

$config = array(
  'environment' => array(
    'local' => array(
      'redirect_auto_redirect' => 0,
      'htmailer_development' => 'developer.wsg@xtuple.com',
      'commerce_authnet_aim' => array(
        'txn_mode' => 'developer',
        'log' => array(
          'request' => 'request',
          'response' => 'response',
        ),
      ),
      'commerce_ups_log' => array(
        'request' => 'request',
        'response' => 'response',
      ),
    ),
    'development' => array(
      'redirect_auto_redirect' => 0,
      'htmailer_development' => 'developer.wsg@xtuple.com',
      'commerce_authnet_aim' => array(
        'txn_mode' => 'developer',
        'log' => array(
          'request' => 'request',
          'response' => 'response',
        ),
      ),
      // Commerce UPS
      'commerce_ups_log' => array(
        'request' => 'request',
        'response' => 'response',
      ),
    ),
    'production' => array(
      'error_level' => 0,
      'cache' => 1,
      'jquery_update_compression_type' => 'min',
      'page_compression' => 1,
      'preprocess_css' => 1,
      'preprocess_js' => 1,
      'commerce_authnet_aim' => array(
        'txn_mode' => 'developer',
        'log' => array(
          'request' => 0,
          'response' => 0,
        ),
      ),
      'commerce_ups_log' => array(
        'request' => NULL,
        'response' => NULL,
      ),
    ),
  ),
  'commerce_authnet_aim' => array(
    'txn_type' => 'authorize',
    'email_customer' => 0,
    'card_types' => array(
      'visa' => 'visa',
      'mastercard' => 'mastercard',
      'amex' => 'amex',
      'discover' => 'discover',
      'dc' => 0,
      'dci' => 0,
      'cb' => 0,
      'jcb' => 0,
      'maestro' => 0,
      'visaelectron' => 0,
      'laser' => 0,
      'solo' => 0,
      'switch' => 0,
    ),
  ),
);
