<?php
namespace App\Http\Controllers;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;

class PaymobController extends Controller
{
    private $client;
    private $apiUrl;
    private $username;
    private $password;
    private $token;

    public function __construct()
    {
        $this->client = new Client();
        $this->apiUrl = 'https://uae.paymob.com/api';
        $this->username = '0522064751';
        $this->password = 'Green@1234';
    }

    public function authenticate()
    {
        $response = $this->client->post($this->apiUrl. '/auth/tokens', [
            'json' => [
                'username' => $this->username,
                'password' => $this->password,
            ],
        ]);

        $tokenResponse = json_decode($response->getBody()->getContents(), true);

        if (isset($tokenResponse['token'])) {
            $this->token = $tokenResponse['token'];
            return $this->token;
        } else {
            Log::error('Failed to authenticate with Paymob API');
            return null;
        }
    }


    public function createPaymentLink($amount , $full_name , $email , $phone_number ,$paymentMethodId )
    {
        if (!$this->token) {
            $this->authenticate();
        }

        $response = $this->client->post($this->apiUrl. '/ecommerce/payment-links', [
            'headers' => [
                'Authorization' => 'Bearer '. $this->token,
            ],
            'json' => [
       
                'is_live' => 'true',
                 

                'payment_methods' => $paymentMethodId,
 
                'amount_cents' => $amount .'00' ,
                 'currency' => 'Aed',
                 'full_name' => $full_name,
                 'email' => $email,
                 'phone_number' => $phone_number ,



 
            ],
        ]);

        $paymentLinkResponse = json_decode($response->getBody()->getContents(), true);

        if (isset($paymentLinkResponse['client_url'])) {
            return $paymentLinkResponse['client_url'];
        } else {
            Log::error('Failed to create payment link with Paymob API');
            return null;
        }
    }



    
}
