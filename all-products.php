<?php
require "vendor/autoload.php";

$stripe =new \Stripe\StripeClient(
    'sk_test_51LgIR2JblQF3jJqWBq5N7JyVWW5sWpclXIbHksjBywAJCBk1Be1d4qESvLxasnxzUIfIEute1DvJxgSozB8U4xfS00jDG9CjBx'
);
$result = $stripe->products->all(
    ['limit' => 4]
);
var_dump($result);