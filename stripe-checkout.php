<?php

require "vendor/autoload.php";

$stripe =new \Stripe\StripeClient(
    'sk_test_51LgIR2JblQF3jJqWBq5N7JyVWW5sWpclXIbHksjBywAJCBk1Be1d4qESvLxasnxzUIfIEute1DvJxgSozB8U4xfS00jDG9CjBx'
);
$product = $stripe->products->retrieve(
	'prod_MP88Oy49N0IS8z',
	[]
);
$price = $stripe->prices->retrieve('price_1LgJsfJblQF3jJqWz4nOj6Zs',[]);
#echo '<pre>';
#var_dump($product);
#var_dump($price);
#echo '</pre>';
?><!DOCTYPE html>
<html>
  <head>
    <title>Buy</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://polyfill.io/v3/polyfill.min.js?version=3.52.1&features=fetch"></script>
    <script src="https://js.stripe.com/v3/"></script>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  </head>
  <body style="background-color: #EEE3CB;">
    <section>
      <div class="container text-center" style="background-color: #F9F9F9; padding-bottom: 161px">
      <div class="product">
        <img src="<?php echo array_pop($product->images); ?>" alt="<?php echo $product->name; ?>" style="width: 500px; float: right;"/>
        <div class="description">
          <h3 style="text-align: left; color: #AD8B73; font-size:46px; float: left; padding-top: 50px;"><?php echo $product->name; ?></h3>
          <p style="text-align: left; padding-left: 10px; padding-right: 500px; padding-top: 10px;"><?php echo $product->description; ?></p>
          <h5 style="text-align: left; margin-left: 50px; padding-top: 100px;"><?php echo strtoupper($price->currency); ?> <?php echo $price->unit_amount_decimal; ?></h5>
        </div>
      </div>
      <form action="/my-product.php" method="POST">
        <button type="submit" id="checkout-button">Checkout</button>
      </form>
      </div>
    </section>
  </body>
</html>