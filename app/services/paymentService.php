<?php
use Mollie\Api\MollieApiClient;

class PaymentService
{
    function checkout()
    {
        try {

            require('vendor/autoload.php');

            $mollie = new MollieApiClient();
            $mollie->setApiKey("test_Ds3fz4U9vNKxzCfVvVHJT2sgW5ECD8");

            $name = $_POST['name'];
            $email = $_POST['email'];
            $amount = $_POST['amount'];


            $payment = $mollie->payments->create([
                "amount" => [
                    "currency" => "EUR",
                    "value" => $amount
                ],
                "description" => "Payment for " . $name,
                "redirectUrl" => "https://example.com/checkout-successful.php",
                "webhookUrl" => "https://example.com/mollie-webhook.php",
            ]);

            header("Location: " . $payment->getCheckoutUrl(), true, 303);
        } catch (\Mollie\Api\Exceptions\ApiException $e) {
            echo "API call failed: " . htmlspecialchars($e->getMessage());
        }

    }
}