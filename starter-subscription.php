<?php
require_once('vendor/autoload.php');

$stripe =new \Stripe\StripeClient(
    'sk_test_51LgIR2JblQF3jJqWBq5N7JyVWW5sWpclXIbHksjBywAJCBk1Be1d4qESvLxasnxzUIfIEute1DvJxgSozB8U4xfS00jDG9CjBx'
);
$product = $stripe->products->create([
  'name' => 'Starter Subscription',
  'description' => '¥1,710/Month subscription',
]);
echo "Success! Here is your starter subscription product id: " . $product->id . "\n";

$price = $stripe->prices->create([
  'unit_amount' => 1200,
  'currency' => 'jpy',
  'recurring' => ['interval' => 'month'],
  'product' => $product['id'],
]);
echo "Success! Here is your premium subscription price id: " . $price->id . "\n";

?>