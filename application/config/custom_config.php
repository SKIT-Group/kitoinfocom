<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$config['company_name']= $_ENV['COMPANY_NAME'] ?? "XYZ Company";
$config['company_email']= $_ENV['COMPANY_EMAIL'] ?? "support@gmail.com";
$config['company_mobile']= $_ENV['COMPANY_MOBILE'] ?? "+91 999-999-9999";

//paypal

$config['paypal_client_id']=$_ENV['CLIENT_ID'] ?? "";
$config['paypal_client_secret']=$_ENV['CLIENT_SECRET'] ?? "";
$config['paypal_endpoint']=$_ENV['PAYPAL_ENDPOINT'] ?? "https://api-m.sandbox.paypal.com";