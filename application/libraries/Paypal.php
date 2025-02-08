<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Paypal  {

    protected $id;
    protected $secret;
    protected $ci;
    protected $url;
    public $return_url;

    public function __construct() {
        $this->ci = &get_instance();
        $this->id = $this->ci->config->item('paypal_client_id');
        $this->secret = $this->ci->config->item('paypal_client_secret');
        $this->url = $this->ci->config->item('paypal_endpoint');
        $this->return_url = base_url('paypal/return');
    }

    // Create a PayPal order
    public function create_order($amount) {

        // PayPal API URL
        $url = $this->url . "/v2/checkout/orders";

        // Prepare request headers
        $headers = [
            "Content-Type: application/json",
            "Authorization: Bearer " . $this->get_access_token()
        ];

        // Prepare request body
        $body = json_encode([
            "intent" => "CAPTURE",
            "purchase_units" => [[
                "amount" => [
                    "currency_code" => "USD",
                    "value" => $amount
                ]
            ]],

            "application_context" => [
                "return_url" =>$this->return_url,
            ]
        ]);

        // Send API request
        $response = $this->send_request($url, $headers, $body);

        if (isset($response->id)) {
            $payment_url;
            foreach ($response->links as $key => $link) {
                if($link->rel=='approve'){
                    $payment_url=$link->href;
                }
            }

            if($payment_url){
                return ['status'=>true,"id" => $response->id,'payment_url'=>$payment_url];
            }else{
                return ['status'=>false];
            }
        } else {
            return ['status'=>false];
        }
    }

    // Capture PayPal Payment
    public function capture_order($orderId) {
        $url = $this->url . "/v2/checkout/orders/$orderId/capture";

        $headers = [
            "Content-Type: application/json",
            "Authorization: Bearer " . $this->get_access_token()
        ];

        $response = $this->send_request($url, $headers, "", "POST");

        if (isset($response->status) && $response->status === "COMPLETED") {
            return ["status" => true,'response'=>$response];
        } else {
            return ["status"=>false];
        }
    }

    // Get PayPal Access Token
    private function get_access_token() {
        $url = $this->url . "/v1/oauth2/token";
        $client_id =$this->id;
        $secret = $this->secret;

        $headers = ["Accept: application/json", "Accept-Language: en_US"];
        $body = "grant_type=client_credentials";

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_USERPWD, "$client_id:$secret");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $body);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $response = json_decode(curl_exec($ch));
        curl_close($ch);

        return $response->access_token ?? null;
    }

    // Send cURL Request
    private function send_request($url, $headers, $body = "", $method = "POST") {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $body);

        $response = json_decode(curl_exec($ch));
        curl_close($ch);

        return $response;
    }
}
?>
