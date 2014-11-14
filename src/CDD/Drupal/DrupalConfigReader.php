<?php namespace CDD\Drupal;

class DrupalConfigReader {
  private $environment = '';
  private $config = array();

  public function __construct($environment, array $config = array(), array $parameters = array()) {
    $this->config = array_merge_recursive($config, $parameters);
    $this->environment = $environment;
  }

  public function read() {
    foreach ($this->config as $namespace => $settings) {
      $method = "{$namespace}Settings";
      if (method_exists($this, $method)) {
        $this->$method($settings);
      }
    }
  }

  protected function environmentSettings($settings) {
    if (!empty($settings[$this->environment])) {
      global $environment;
      $environment = $settings[$this->environment];
    }
  }

  protected function rescuedSettings($settings) {
    if (!empty($settings)) {
      global $rescued_clients;

      $app_name = $settings['app_name'];
      $url = $settings['url'];
      $iss = $settings['iss'];
      $key_file = $settings['key_file'];
      $debug = isset($settings['debug']) ? $settings['debug'] : TRUE;

      $rescued_clients = array(
        'xtuple' => array(
          'settings' => array(
            'discovery' => array(
              'application_name' => $app_name,
              'auth_class' => 'Rescued_OAuth2',
              'oauth2_revoke_uri' => "$url/oauth/revoke-token",
              'oauth2_token_uri' => "$url/oauth/token",
              'oauth2_auth_url' => "$url/dialog/authorize",
              'oauth2_federated_signon_certs_url' => "$url/oauth/certs",
              'oauth2_scenario' => 'service_account',
              'keyfile' => $key_file,
              'keyfile_pass' => 'notasecret',
              'iss' => $iss,
              'scope' => "$url/auth",
              'prn' => 'admin',
              'grant_type' => 'assertion',
              'debug' => $debug,
            ),
          ),
          'name' => 'xtuple',
          'label' => 'xtuple',
          'url' => "$url/discovery/v1alpha1/apis/v1alpha1/rest",
          'type' => 'discovery',
          'api_url' => "$url/api/v1alpha1",
        ),
      );
    }
  }
}
