<?php
namespace App\Services;

use GuzzleHttp\Client;

class EmailVerificationService
{
    protected $client;

    public function __construct()
    {
        $this->client = new Client();
    }

    public function verifyEmail($email)
    {
        try {
            $response = $this->client->request('GET', 'https://api.hunter.io/v2/email-verifier', [
                'query' => [
                    'email' => $email,
                    'api_key' => env('EMAIL_VERIFICATION_API_KEY'),
                ]
            ]);

            $verificationResult = json_decode($response->getBody()->getContents());

            return $verificationResult->data->status === 'valid';
        } catch (\Exception $e) {
            // Log the exception or handle it as per your requirement
            return false;
        }
    }
}
