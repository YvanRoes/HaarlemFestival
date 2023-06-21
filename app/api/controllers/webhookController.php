<?php
require_once __DIR__ . '/../../vendor/autoload.php';

use Mollie\Api\MollieApiClient;


class WebHookController
{
  function index()
  {
    try {
      $mollie = new \Mollie\Api\MollieApiClient();
      $mollie->setApiKey('test_Ds3fz4U9vNKxzCfVvVHJT2sgW5ECD8');

      
    } catch (Exception $e) {
      echo "API call failed: " . htmlspecialchars($e->getMessage());
    }
  }
}
