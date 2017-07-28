<?php
require_once('../../vendor/autoload.php');

$stripe = array(
	"secret_key" => "sk_test_Pefh4NBx2YcPC2rZIxA36bDd",
  "publishable_key" => "pk_test_GbyVsB6rZNkIDXOszWkxzvID"
);

\Stripe\Stripe::setApiKey($stripe['secret_key']);
?>



















